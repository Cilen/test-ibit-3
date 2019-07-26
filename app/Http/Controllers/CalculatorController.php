<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatorRequest;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function addition(CalculatorRequest $data){
        $result = $data->firstNumber + $data->lastNumber;
        return $result;
    }

    public function subtraction(CalculatorRequest $data){
        $result = $data->firstNumber - $data->lastNumber;
        return $result;
    }

    public function multiplication(CalculatorRequest $data){
        $result = $data->firstNumber * $data->lastNumber;
        return $result;

    }
    public function division(CalculatorRequest $data){
        if ($data->lastNumber == 0) return $this->unknown();
        $result = $data->firstNumber / $data->lastNumber;
        return $result;

    }
    public function unknown(){
        return response('The data entered is incorrect', 400);
    }
}
