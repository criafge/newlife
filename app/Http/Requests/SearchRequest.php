<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'district_id' => 'required_without_all:category',
            'category_id' => 'required_without_all:district',
        ];
    }

    public function messages(): array
    {
        return [
            'district_id.required_without_all' => 'Выберите район или вид животного',
            'category_id.required_without_all' => 'Выберите район или вид животного',
        ];
    }
}
