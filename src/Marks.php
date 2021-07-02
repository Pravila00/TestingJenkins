<?php

namespace pravila;

class Marks{
    /**
     * @param array $numbers
     * @return float|int
     */
    public function get_mean_of_values(array $numbers){
        return array_sum($numbers) / count($numbers);
    }

    /**
     * @param array $array_ponderations
     * @param array $array_marks
     */
    public function get_final_mark(array $array_ponderations,array $array_marks){
        $final_mark = 0;
        $ponderations_id = array_keys($array_ponderations);
        foreach($ponderations_id as $ponderation_id){
            $numbers = array_values($array_marks[$ponderation_id]);
            $mean_numbers = $this->get_mean_of_values($numbers);
            $final_mark += $mean_numbers * ($array_ponderations[$ponderation_id]['ponderation'] / 100);
        }
        return $final_mark;
    }
}
