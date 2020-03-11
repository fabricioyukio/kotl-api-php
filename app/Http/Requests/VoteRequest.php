<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class VoteRequest extends FormRequest
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
            'contender_id' => 'required|numeric',
            'voter_email' => 'required|email'
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
            'contender_id.required'=>'errors.form.contender.required',
            'contender_id.numeric'=>'errors.form.type.numeric',
            'voter_email.required'=>'errors.form.voter_email.required',
            'voter_email.email'=>'errors.form.voter_email.invalid',
        ];
    }
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors'=>$validator->errors()], 401));
    }
}
