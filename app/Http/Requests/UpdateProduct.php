<?php

namespace App\Http\Requests;

use App\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name'    => 'required|string|max:100',
            'subcategory_id'    => 'required',
            'supplier_id'    => 'required',
            'product_alertquantity'    => 'required|numeric',
            'product_unit'    => 'required|numeric',
            'product_supplierPrice'    => 'required|numeric',
            'product_sellPrice'    => 'required|numeric',
            'category_id'    => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'product_name.required' => 'Product Name is Required',
            'product_alertquantity.required' => 'Alert Quantity is Required',
            'product_supplierPrice.required' => 'Cost Price is Required',
            'product_sellPrice.required' => 'Sell Price is Required',
            'product_unit.required' => 'Product Quantity is Required',
            'category_id.required' => 'Category Name is Required',
            'subcategory_id.required' => 'Sub Category Name is Required',
            'supplier_id.required' => 'Supplier Name is Required',
        ];
    }

    public function saveProduct($productId) {

        $id = Auth::id();

        Product::where('id', $productId)->update([
            'product_name' => $this->product_name,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
            'supplier_id' => $this->supplier_id,
            'product_supplierPrice' => $this->product_supplierPrice,
            'product_sellPrice' => $this->product_sellPrice,
            'product_image' => $this->product_image,
            'product_code' => $this->product_code,
            'product_unit' => $this->product_unit,
            'product_alertquantity' => $this->product_alertquantity,
            'product_tax' => $this->product_tax,
            'warehouse_id' => $this->warehouse_id,
            'product_details' => $this->product_details,
            'product_detailsforinvoice' => $this->product_detailsforinvoice,
            'edited_by' => $id,
        ]);
    }
}
