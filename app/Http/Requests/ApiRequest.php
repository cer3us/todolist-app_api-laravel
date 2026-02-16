<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRequest extends FormRequest
{

    protected function failedValidation(Validator $validator)
    {

        //redefined the function to return custom json data:
        throw new HttpResponseException(
            response()
                ->json($validator->errors()->getMessages(), 422)
        );
    }
}
