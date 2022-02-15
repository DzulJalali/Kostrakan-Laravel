<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentSimilarity extends Model
{
    protected $building_details       = [];
    protected $featureWeight  = 1;
    protected $priceWeight    = 1;
    protected $categoryWeight = 1;
    protected $priceHighRange = 1000;

    public function __construct(array $building_details)
    {
        $this->building_details       = $building_details;
        $this->priceHighRange = max(array_column($building_details, 'price'));
    }

    public function setFeatureWeight(float $weight): void
    {
        $this->featureWeight = $weight;
    }

    public function setPriceWeight(float $weight): void
    {
        $this->priceWeight = $weight;
    }

    public function setCategoryWeight(float $weight): void
    {
        $this->categoryWeight = $weight;
    }

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        foreach ($this->building_details as $product) {

            $similarityScores = [];

            foreach ($this->building_details as $_building) {
                if ($product->building_id === $building->building_id) {
                    continue;
                }
                $similarityScores['building_id_' . $_building->building_id] = $this->calculateSimilarityScore($product, $_building);
            }
            $matrix['building_id_' . $product->building_id] = $similarityScores;
        }
        return $matrix;
    }

    public function getProductsSortedBySimularity(int $buildingId, array $matrix): array
    {
        $similarities   = $matrix['building_id_' . $buildingId] ?? null;
        $sortedProducts = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find product with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $buildingIdKey => $similarity) {
            $id      = intval(str_replace('building_id_', '', $buildingIdKey));
            $building_details = array_filter($this->building_details, function ($product) use ($id) { return $product->building_id === $id; });
            if (! count($building_details)) {
                continue;
            }
            $product = $building_details[array_keys($building_details)[0]];
            $product->similarity = $similarity;
            $sortedProducts[] = $product;
        }
        return $sortedProducts;
    }

    protected function calculateSimilarityScore($productA, $productB)
    {
        $productAFeatures = implode('', get_object_vars($productA->features));
        $productBFeatures = implode('', get_object_vars($productB->features));

        return array_sum([
            (Similarity::hamming($productAFeatures, $productBFeatures) * $this->featureWeight),
            (Similarity::euclidean(
                Similarity::minMaxNorm([$productA->price], 0, $this->priceHighRange),
                Similarity::minMaxNorm([$productB->price], 0, $this->priceHighRange)
            ) * $this->priceWeight),
            (Similarity::jaccard($productA->categories, $productB->categories) * $this->categoryWeight)
        ]) / ($this->featureWeight + $this->priceWeight + $this->categoryWeight);
    }
}
