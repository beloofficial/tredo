<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name'=>'required',
            'surname'=>'required',
            'patronymic'=>"nullable",
            'sex'=>'nullable',
            'salary'=>'required|integer',
            'departments'=>'required',
        ];
    }
    
    public function messages()
    {
        return [
            'salary.required' => 'A Salary is required',
            'salary.integer' => 'A Salary must be integer',
            
            'name.required' => 'A Name is required',
            'surname.required' => 'A Surname is required',


        ];
    }
}
