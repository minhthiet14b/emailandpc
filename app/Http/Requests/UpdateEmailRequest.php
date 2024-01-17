<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pc_name' => 'required|string|max:250',
            'name' => 'required|string|max:250',
            'chinese_name' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:emails,email,'.$this->id,
            'dep_id' => 'required',
            'ip' =>'ip',
        ];
    }
}
