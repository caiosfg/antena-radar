<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSatelliteRequest extends FormRequest
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
            'name' => 'required|string|min:10|max:100',
            'description' => 'required|string|min:10|max:100',
            'uf' => 'required|string|max:2',
            'avatar' => 'nullable|string',
            'location' => 'required|string|min:10|max:100',
            'active' => 'nullable|boolean',
            'category' => 'nullable|string',
            'height' => 'required|numeric|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ];
    }
}
