<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContenderRequest extends FormRequest
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
            'id' => 'numeric',
            'name' => 'required|min:5|max:60|regex:/^\b(?!.*?\s{2})[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ ]{1,50}\b$/',
            'email' => 'required|email|unique:contenders,email',
            'gender' => 'required'
        ];
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'=>'errors.form.name.required',
            'name.min'=>'errors.form.name.min',
            'name.max'=>'errors.form.name.max',
            'name.regex'=>'errors.form.name.invalid',
            'email.required'=>'errors.form.email.required',
            'email.email'=>'errors.form.email.invalid',
            'email.unique' => 'errors.form.email.unique',
            'gender.required'=>'errors.form.gender.required',
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'email' => 'trim|lowercase',
            'name' => 'trim|capitalize|escape'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors'=>$validator->errors()], 401));
    }
}
