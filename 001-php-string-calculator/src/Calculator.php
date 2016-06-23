<?php

namespace codingdojo;

class Calculator
{
    public function add($numbers)
    {
        $delimiter = ',';
        if(strpos($numbers, "//") === 0) {
            $delimiter = substr($numbers, 2, 1);
            $numbers = substr($numbers, strpos($numbers, "\n"));
        }
        $numbers = $this->normalizeInput($numbers, $delimiter);
        if(strpos($numbers,",,")!== false){
            throw new \InvalidArgumentException;
        }
        $numbers = $this->getArrayOfNumbers($numbers, $delimiter);

        return array_sum($numbers);

    }

    private function normalizeInput($numbers, $delimiter)
    {
        return str_replace(["\n","//"], $delimiter, $numbers);
    }

    private function getArrayOfNumbers($numbers, $delimiter)
    {
        return array_map(function ($val) {
            return (int)trim($val);
        }, explode($delimiter, $numbers));
    }
}