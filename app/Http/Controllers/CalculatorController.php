<?php

namespace App\Http\Controllers;

use App\Calculator;
use App\Http\Requests\CalculatorRequest;

class CalculatorController extends Controller
{
    public function calculate(CalculatorRequest $data, Calculator $calculator){
        $first_operand = $data->input('first_operand');
        $second_operand = $data->input('second_operand');
        $action = $data->input('calc');

        $result = $calculator->calculate($first_operand, $second_operand, $action);

        return response()->json([
            'result' => $result,
        ]);

    }
}
