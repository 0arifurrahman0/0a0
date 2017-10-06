<?php

namespace App\Http\Requests;

use App\Sale;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSale extends FormRequest
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
            'customer_id'    => 'required',
            'sale_date'    => 'required|date',
            'sale_status'    => 'required|string|max:100',
            'sale_quantity'    => 'required|numeric',
            'sale_rate'    => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'customer_id.required' => 'customer Name is Required',
            'sale_date.required' => 'Date is Required',
            'sale_status.required' => 'Select a Status',
            'sale_quantity.required' => 'Quantity is Required',
            'sale_rate.required' => 'Sale Rate is Required',
        ];
    }

    public function saveSale($saleId) {

        $id = Auth::id();

        Sale::where('id', $saleId)->update([
            'customer_id' => $this->customer_id,
            'sale_date' => $this->sale_date,
            'sale_status' => $this->sale_status,
            'sale_invoiceNo' => $this->sale_invoiceNo,
            'product_id' => $this->product_id,
            'sale_quantity' => $this->sale_quantity,
            'sale_rate' => $this->sale_rate,
            'sale_total' => $this->sale_total,
            'edited_by' => $id,
        ]);
    }
}
