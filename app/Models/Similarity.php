<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Similarity extends Model
{
    public static function hamming(string $string1, string $string2, bool $returnDistance = false): float
    {
        $a        = str_pad($string1, strlen($string2) - strlen($string1), ' ');
        $b        = str_pad($string2, strlen($string1) - strlen($string2), ' ');
        $distance = count(array_diff_assoc(str_split($a), str_split($b)));

        if ($returnDistance) {
            return $distance;
        }
        return (strlen($a) - $distance) / strlen($a);
    }

    public static function euclidean(array $array1, array $array2, bool $returnDistance = false): float
    {
        $a = $array1;
        $b = $array2;
        $set = [];

        foreach ($a as $index => $value) {
            $set[] = $value - $b[$index] ?? 0;
        }

        $distance = sqrt(array_sum(array_map(function ($x) { return pow($x, 2); }, $set)));

        if ($returnDistance) {
            return $distance;
        }
        
        return 1 - $distance;
    }

    public static function jaccard(string $string1, string $string2, string $separator = ','): float
    {
        $a = explode($separator, $string1);
        $b = explode($separator, $string2);
        $intersection = array_unique(array_intersect($a, $b));
        $union = array_unique(array_merge($a, $b));

        return count($intersection) / count($union);
    }

    public static function minMaxNorm(array $values, $min = null, $max = null): array   /*Transformamos el conjunto de valores dado ($values) en un conjunto de valores dentro del rango 0 a 1 (Normalización min-max)*/
    {
        $norm = [];
        $min = $min ?? min($values);
        $max = $max ?? max($values);

        foreach ($values as $value) {
            $numerator = $value - $min;
            $denominator = $max - $min;
            $minMaxNorm = $numerator / $denominator;
            $norm[] = $minMaxNorm;
        }
        return $norm;
    }
}
