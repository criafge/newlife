<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStoreRequest extends FormRequest
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
            'title' => 'required', 
            'description' => 'required', 
            'photo' => 'required', 
            'phone' => 'required|regex:/\+7\([0-9][0-9][0-9]\)[0-9]{3}(\-)[0-9]{2}(\-)[0-9]{2}$/',
            'category_id' => 'required',
            'district_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'required', 
            'description.required' => 'required', 
            'photo.required' => 'required', 
            'phone.required' => 'required',
            'category_id.required' => 'required',
            'district_id.required' => 'required',
        ];
    }
}
