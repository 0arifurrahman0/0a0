<?php

namespace App\Http\Requests;

use App\Purchase;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StorePurchase extends FormRequest
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
            'supplier_id'    => 'required',
            'purchase_date'    => 'required|date',
            'purchase_status'    => 'required|string|max:100',
            'purchase_quantity'    => 'required|numeric',
            'purchase_rate'    => 'required|numeric',

        ];
    }

    public function messages()
    {
        return [
            'supplier_id.required' => 'Supplier Name is Required',
            'purchase_date.required' => 'Purchase Date is Required',
            'purchase_status.required' => 'Select a Status',
            'purchase_quantity.required' => 'Quantity is Required',
            'purchase_rate.required' => 'Purchase Rate is Required',
        ];
    }

    public function savePurchase()
    {
        $id = Auth::id();

        Purchase::create([
            'supplier_id' => $this->supplier_id,
            'purchase_date' => $this->purchase_date,
            'purchase_status' => $this->purchase_status,
            'purchase_invoiceNo' => $this->purchase_invoiceNo,
            'product_id' => $this->product_id,
            'purchase_quantity' => $this->purchase_quantity,
            'purchase_rate' => $this->purchase_rate,
            'purchase_total' => $this->purchase_total,
            'edited_by' => $id,
        ]);
    }
}
