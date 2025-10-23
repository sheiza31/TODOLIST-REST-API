<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTasksRequest extends FormRequest
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
            'is_completed' => 'required|boolean',
        ];
    }

    public function messages() : array {
        return [
            'is_completed.required' => 'Status is required',
            'is_completed.boolean' => 'Status is invalid',
        ];
    }

   protected function prepareForValidation()
{
    if ($this->has('is_completed')) {
        $val = $this->input('is_completed');

        // ubah semua format ke boolean
        if (in_array($val, ['true', '1', 1, true], true)) {
            $this->merge(['is_completed' => true]);
        } else {
            $this->merge(['is_completed' => false]);
        }
    }
}

}
