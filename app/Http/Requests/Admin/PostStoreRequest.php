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
            'attachment' => 'nullable|file|mimes:pdf,png,jpg,svg|max:10240',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string|in:0,1'. implode(',', Post::STATUSES),
           // 'type' => 'required|integer|in:1,2,3',
           'type' => 'required|string|in:' . implode(',', Post::TYPES),
            'publish_at' => 'nullable|date|after:' . today(),
            'expires_at' => 'nullable|date|after:' . today(),
            'image' => 'nullable|image',
        ];
    }

    public function messages(): array
    {
        return [
            'title' => 'custom message',
        ];
    }
}
