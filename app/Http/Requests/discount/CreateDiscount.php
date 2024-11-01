<?php

namespace App\Http\Requests\discount;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateDiscount extends FormRequest
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
            'description' => 'required',
            'percentage' => 'required',
            'startedDate' => 'required|date|before:endedDate',
            'endedDate' => 'required|after:startedDate',
            'product_ids' => 'required',
        ];
    }

    public function messages()
    {
        return ['startedDate.before' => 'Ngày bắt đầu phải nhỏ hơn ngày kết thúc.', 'endedDate.after' => 'Ngày kết thúc phải lớn hơn ngày bắt đầu.',];
    }

    protected function failedValidation(Validator $validator)
    {
        $description = $this->input('description');
        $percentage = $this->input('percentage');
        $startedDate = $this->input('startedDate');
        $endedDate = $this->input('endedDate');

        $product_ids = $this->input('product_ids') ?? [];

        $product_infors = [];
        for ($i = 0; $i < count($product_ids); $i++) {
            $id = $product_ids[$i];
            $product = Product::find($id);
            $name = $product->name;
            $size = $product->size;
            $color = $product->color;
            $price = $product->price;
            $item = collect(['id' => $id, 'name' => $name, 'size' => $size, 'color' => $color, 'price' => $price]);
            array_push($product_infors, $item);
        }
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput(['description' => $description, 'percentage' => $percentage, 'startedDate' => $startedDate, 'endedDate' => $endedDate, 'product_infors' => $product_infors])
        );
    }
}
