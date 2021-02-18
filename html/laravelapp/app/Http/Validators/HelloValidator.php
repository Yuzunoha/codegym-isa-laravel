<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator
{
    public function validateHello($a, $v, $p)
    {
        return $v % 2 === 0;
    }
}
