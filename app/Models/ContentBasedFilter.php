<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;

class ContentBasedFilter extends Model
{
    protected $primaryKey = 'cf_id';
    protected $table = 'content_filtering';


    protected $building_details = [];
    protected $content_filtering = [];
    protected $hargaTermahal = 100;
    protected $ruanganWeight;
    protected $lantaiWeight;
    protected $kkWeight;
    protected $tipeWeight;
    protected $fasilitasWeight;


    public function __construct($building_details='building_details', $content_filtering='content_filtering')
    {
        $this->building_details = $building_details;
        $this->content_filtering = $content_filtering;
    }

    public static function building_details(){
        
        return $this->belongsToMany('App\BuildingDetails', 'building_details');
    }

    public static function filteredByUser(){
        $filteredByUser = ContentBasedFilter::orderBy('cf_id', 'DESC')->where('user_id', Auth::user()->user_id);
        return $filteredByUser;
    }

    public static function generateContentMatrix()
    {
        $buildingsDB = DB::table('content_filtering')
        ->leftjoin('users as users', 'users.user_id', '=', 'content_filtering.user_id')
        ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'content_filtering.tipe_id')
        ->leftjoin('cities as ct', 'ct.kk_id', '=', 'content_filtering.kk_id')
        ->get();

        $buildingsAsociativeMatrix = array ();

        for($i = 0; $i < sizeof($buildingsDB); $i++)
        {
            $buildingsAsociativeMatrix[$i] = array(
                'cf_id'           => $buildingsDB[$i]->cf_id,
                'user_id'           => $buildingsDB[$i]->user_id,
                'tipe_id'           => $buildingsDB[$i]->tipe_id,
                'kk_id'           => $buildingsDB[$i]->kk_id,
                'nama_tipe'           => $buildingsDB[$i]->nama_tipe,
                'nama_kk'           => $buildingsDB[$i]->nama_kk,
                'jmlh_ruangan'         => $buildingsDB[$i]->jmlh_ruangan,
                'jmlh_lantai'        => $buildingsDB[$i]->jmlh_lantai,
                'keterangan_fasilitas'   => $buildingsDB[$i]->keterangan_fasilitas,
            );
        }
        // dd($buildingsAsociativeMatrix);
        return $buildingsAsociativeMatrix;
    }

    public function storeContentFiltering($data)
    {
        DB::table('content_filtering')->insert($data);
    }

    public function setCities(float $weight): void
    {
        $this->kkWeight = $weight;
    }

    public function setTipe(float $weight): void
    {
        $this->tipeWeight = $weight;
    }

    public function setRuanganWeight(float $weight): void
    {
        $this->ruanganWeight = $weight;
    }

    public function setLantaiWeight(float $weight): void
    {
        $this->lantaiWeight = $weight;
    }
    public function setFasilitasWeight(float $weight): void
    {
        $this->fasilitasWeight = $weight;
    }
    

    public function calculateSimilaritiesMatrix(): array
    {
        $matrix = [];
        // dd($this->building_details[1]['kk_id']);
        foreach ($this->content_filtering as $building) 
        {

            $similarityScores = [];
            // dd($building);
            foreach ($this->building_details as $_building) 
            {
                if ($building['kk_id'] != $_building['kk_id'] || $building['tipe_id'] != $_building['tipe_id'] || $building['jmlh_ruangan'] != $_building['jmlh_ruangan']
                && $building['jmlh_lantai'] != $_building['jmlh_lantai'] && $building['keterangan_fasilitas'] != $_building['keterangan_fasilitas']) 
                {
                    continue;
                }
                $similarityScores['building_id_' . $_building['building_id']] = $this->calculateSimilarity($building, $_building);

            }
            $matrix['building_id_' . $building['kk_id']] = $similarityScores;
        }
        return $matrix;
    }

    // public function calculateSimilaritiesMatrix(): array
    // {
    //     $matrix = [];
    //     // dd($this->building_details[1]['kk_id']);
    //     foreach ($this->content_filtering as $building) 
    //     {

    //         $similarityScores = [];
    //         // dd($building);
    //         foreach ($this->building_details as $_building) 
    //         {
    //             if ($building['kk_id'] != $_building['kk_id']) 
    //             {
    //                 continue;
    //             }
    //             $similarityScores['building_id_' . $_building['building_id']] = $this->calculateSimilarity($building, $_building);

    //         }
    //         $matrix['building_id_' . $building['kk_id']] = $similarityScores;
    //     }
    //     return $matrix;
    // }


    // public function calculateSimilaritiesMatrix(): array
    // {
    //     $matrix = [];

    //     foreach ($this->content_filtering as $building) {

    //         $similarityScores = [];

    //         foreach ($this->building_details as $_building) {
    //             if ($building['building_id'] === $_building['building_id']) {
    //                 continue;
    //             }
    //             $similarityScores['building_id_' . $_building['building_id']] = $this->calculateSimilarity($building, $_building);
    //         }
    //         $matrix['building_id_' . $building['building_id']] = $similarityScores;
    //     }
    //     return $matrix;
    // }

    public function getBuildingBySimiliarities($buildingId, $matrix): array
    {
        $similarities = $matrix['building_id_' . $buildingId] ?? null;
        $sortedBuildings = [];

        if (is_null($similarities)) {
            throw new Exception('Cant find building with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $buildingIdKey => $similarity) {
            $id = intval(str_replace('building_id_', '', $buildingIdKey)); 
            $building_details = array_filter($this->building_details, function ($building) use ($id) 
            { 
                return $building['building_id'] === $id; 
            });
            if (! count($building_details)) {
                continue;
            }
            $building = $building_details[array_keys($building_details)[0]]; 
            $building['similarity'] = $similarity;
            $sortedBuildings[] = $building;
        }
        return $sortedBuildings;
    }

    protected function calculateSimilarity($buildingA, $buildingB)
    {
        return array_sum([
                (Similarity::jaccard($buildingA['nama_tipe'], $buildingB['nama_tipe']) * $this->tipeWeight),
                (Similarity::jaccard($buildingA['nama_kk'], $buildingB['nama_kk']) * $this->kkWeight),
                (Similarity::jaccard($buildingA['jmlh_ruangan'], $buildingB['jmlh_ruangan']) * $this->ruanganWeight),
                (Similarity::jaccard($buildingA['jmlh_lantai'], $buildingB['jmlh_lantai']) * $this->lantaiWeight),
                (Similarity::jaccard($buildingA['keterangan_fasilitas'], $buildingB['keterangan_fasilitas']) * $this->fasilitasWeight)
            ]) / ($this->kkWeight + $this->tipeWeight + $this->ruanganWeight + $this->lantaiWeight + $this->fasilitasWeight);
            // ($this->kkWeight + $this->tipeWeight + $this->ruanganWeight + $this->lantaiWeight + $this->fasilitasWeight);
    }
}
