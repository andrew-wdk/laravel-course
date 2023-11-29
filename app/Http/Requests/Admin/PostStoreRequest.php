<?php

namespace App\Http\Requests\Admin;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|string|max:200',
            'body' => 'required',
            'attachment' => 'file|mimes:pdf,png,jpg,svg|max:10240',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|integer|in:0,1',
            'type' => 'required|string|in:' . implode(',', Post::TYPES),
            'publish_at' => 'date|after:' . today()
        ];
    }

    public function messages(): array
    {
        return [
            'title' => 'custom message',
        ];
    }
}
