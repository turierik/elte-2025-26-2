<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePizzaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return
            [
            'name' => 'string',
            'size' => 'required|integer|in:24,32,50',
            'base' => 'required|string|in:tomato,cream,bbq,none',
            'cheese_crust' => 'boolean',
            'customer_id' => 'required|integer|exists:customers,id'
        ];
    }
}
