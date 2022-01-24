<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date_format:Y-m-d',
            'distance' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Du måste ange ett datum',
            'date.date_format' => 'Datumet är felformaterat',
            'distance.required' => 'Du måste ange en distans',
            'distance.numeric' => 'Distansen får bara vara siffror' 
        ];
    }
}
