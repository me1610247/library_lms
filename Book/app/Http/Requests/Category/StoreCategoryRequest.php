<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
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
            $status = Category::$status;
            return [
                'title' => ['required', 'string', 'unique:categories,title', 'max:50', function ($attribute, $value, $fail) {
                    if ($value == 'mohammed') {
                        $fail('not allowed');
                    }
                }],
                'status' => ['required', Rule::in($status)],
                'description' => ['required','string'],
                'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'mimetypes:image/jpeg,image/png', 'max:700']
            ];
        
    }
}
