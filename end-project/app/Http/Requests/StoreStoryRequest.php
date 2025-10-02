<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoryRequest extends FormRequest
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
            'full_name' => 'required|string|max:255|min:1',
            'story_title' => 'required|string|max:255|min:3',
            'required_amount' => 'required|integer|min:1',
            'description' => 'required|string',
            'category' => 'required|string|in:health,education,travel,hobbies',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png, webp|max:4096',
            'avatar_image' => 'nullable|image|mimes:jpg,jpeg,png, webp|max:2048',
        ];
    }
}
