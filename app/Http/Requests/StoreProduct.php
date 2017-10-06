<?php

namespace App\Http\Requests;

use App\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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

    public function messages()
    {
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

    public function saveProduct()
    {

        $explode = explode(',', $this->product_image);

        $data = base64_decode($explode[1]);

        if ( str_contains($explode[0], 'jpeg') ) {
            $extension = 'jpg';
        } elseif ( str_contains($explode[0], 'png') ) {
            $extension = 'png';
        } else {
            $extension = 'gif';
        }

        $filename = str_random(10) . '_' . time() . '.' . $extension;

        $path = public_path() . '/images/products/' . $filename;

        file_put_contents($path, $data);

        $id = Auth::id();

        Product::create([
            'product_name' => $this->product_name,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
            'supplier_id' => $this->supplier_id,
            'product_supplierPrice' => $this->product_supplierPrice,
            'product_sellPrice' => $this->product_sellPrice,
            'product_image' => $filename,
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