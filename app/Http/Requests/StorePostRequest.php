<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
           'title' => 'required|max:255',
           'body' => 'required|max:9999',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           'category_ids' => 'required|array|max:3',
           'category_ids.*' => 'exists:categories,id',
           'is_premium' => 'sometimes|boolean',
        ];
    }
}