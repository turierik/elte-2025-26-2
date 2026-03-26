<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdatePostRequest extends FormRequest
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
            'title' => 'required|max:50',
            'content' => 'required|min:50',
            // 'author_id' => 'required|integer|exists:users,id',
            'tags' => 'array',
            'tags.*' => 'integer|distinct|exists:tags,id',
            'image' => 'image'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A cím kitöltése kötelező!',
            'title.max' => 'A cím legfeljebb :max karakter lehet!'
        ];
    }
}
