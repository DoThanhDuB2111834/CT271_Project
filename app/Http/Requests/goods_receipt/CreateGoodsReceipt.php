<?php

namespace App\Http\Requests\goods_receipt;

use App\Models\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateGoodsReceipt extends FormRequest
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
            'reason' => 'required',
            'supplier_id' => 'required',
            'description' => 'required',
            'product_ids' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $reason = $this->input('reason');
        $supplier = $this->input('supplier');
        $description = $this->input('description');

        $product_ids = $this->input('product_ids') ?? [];
        $product_quantity = $this->input('product_quantity') ?? [];
        $product_price = $this->input('product_price') ?? [];

        $product_infors = [];
        for ($i = 0; $i < count($product_ids); $i++) {
            $id = $product_ids[$i];
            $product = Product::find($id);
            $name = $product->name;
            $size = $product->size;
            $color = $product->color;
            $item = collect(['id' => $id, 'name' => $name, 'size' => $size, 'color' => $color, 'quantity' => $product_quantity[$i], 'price' => $product_price[$i]]);
            array_push($product_infors, $item);
        }
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput(['reason' => $reason, 'supplier' => $supplier, 'description' => $description, 'product_infors' => $product_infors])
        );
    }
}
