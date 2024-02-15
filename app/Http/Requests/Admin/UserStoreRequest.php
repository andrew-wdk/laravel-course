<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required',
            'membership_no' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'NationalID' => 'required',
            'choosing_section' => 'required',
            'phone' => 'required',
            'points' => 'required',
            'father' => 'required',
            'role_id'=> 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title' => 'custom message',
        ];
    }
}
