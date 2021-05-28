<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required',
            'start' => 'required',
            'end' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'La fecha es obligatoria',
            'start.required' => 'La hora de entrada es obligatoria',
            'end.required' => 'La hora de salida es obligatoria'
        ];
    }
}
