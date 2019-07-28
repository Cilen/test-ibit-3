<?php


namespace App;


class Calculator
{
    public function calculate($first_operand, $second_operand, $action){
        switch ($action) {
            case "+":
                $result = $first_operand + $second_operand;
                break;
            case "-":
                $result = $first_operand - $second_operand;
                break;
            case "*":
                $result = $first_operand * $second_operand;
                break;
            case "/":
                $result = $first_operand / $second_operand;
                break;
            default:
                $result = "NULL";
        }
        return $result;
    }
}
