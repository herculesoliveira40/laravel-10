<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'subject' => 'required|string|max:255|min:3', 
            'body' => 'required|string|max:1000|min:3', 
        ];

        if($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $id = $this->support ?? $this->id; //id route web, support route api
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                // "unique:supports, subject, {$this->id}, id",
                Rule::unique('supports')->ignore($id),
            ];

        }

        return $rules;
    }




    public function messages()
    {
        return [
            'subject.required', 'body.required' => 'O campo  é obrigatorio',
 

        ];
    }
}
