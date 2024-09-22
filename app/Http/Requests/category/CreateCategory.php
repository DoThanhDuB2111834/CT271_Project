<?php

namespace App\Http\Requests\category;

use App\Models\category;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategory extends FormRequest
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
        function checkConstraintsCategories(string $attribute, mixed $value, Closure $fail)
        {
            $Categories = $value ?? [];
            $checkContraintCategory = true;

            foreach ($Categories as $item) {
                $category = category::find($item);
                if (count(array_intersect($category->children()->pluck('category.id')->toArray(), $Categories)) > 0) {
                    $checkContraintCategory = false;
                }
            }
            if (!$checkContraintCategory) {
                $fail("Violate contraint category.");
            }
        }

        return [
            'name' => 'required',
            'parentCategorys' => [
                function (string $attribute, mixed $value, Closure $fail) {
                    checkConstraintsCategories($attribute, $value, $fail);
                },
            ],
            'chidrenCategorys' => [
                function (string $attribute, mixed $value, Closure $fail) {
                    checkConstraintsCategories($attribute, $value, $fail);
                },
            ],
        ];
    }
}
