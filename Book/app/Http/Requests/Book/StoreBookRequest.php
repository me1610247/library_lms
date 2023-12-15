<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
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
            'title' => ['required', 'string', 'unique:categories,title', 'max:50', function ($attribute, $value, $fail) {
                if ($value == 'mohammed') {
                    $fail('not allowed');
                }
            }],
            'status' => ['required', Rule::in($status)],
            'description' => ['required','string'],
            'category_id' => ['required', Rule::exists('categories', 'id')->where('status', 'active')]

        ];
    }
}
