<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Category;

class UpdateCategoryRequest extends FormRequest
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
                'title' => ['required', 'string', 'unique:categories,title,' . $this->category->id, 'max:50'],
                'status' => ['required', Rule::in($status)],
                'image' => ['image', 'mimes:png,jpg,jpeg', 'mimetypes:image/jpeg,image/png', 'max:700']
            ];
        
    }
}
