<?php

namespace App\Http\Requests;

use App\Supplier;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplier extends FormRequest
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
            'supplier_name'    => 'required|string|max:100',
            'supplier_email'    => 'required|string|email|max:100',
            'supplier_phone'    => 'required|max:50',
            'supplier_company'    => 'required',
        ];
    }

    public function messages() {
        return [
            'supplier_name.required' => 'Supplier Name required',
            'supplier_email.required' => 'Supplier Email required',
            'supplier_phone.required' => 'Supplier Phone required',
            'supplier_company.required' => 'Supplier Company Name required',
        ];
    }

    public function saveSupplier($supplierId) {

        $id = Auth::id();

        Supplier::where('id', $supplierId)->update([
            'supplier_name' => $this->supplier_name,
            'supplier_email' => $this->supplier_email,
            'supplier_phone' => $this->supplier_phone,
            'supplier_company' => $this->supplier_company,
            'supplier_address' => $this->supplier_address,
            'supplier_description' => $this->supplier_description,
            'edited_by' => $id,
        ]);
    }
}
