<?php

namespace App\Http\Requests;

use App\Customer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
            'customer_name'    => 'required|string|max:100',
            'customer_email'    => 'required|string|email|max:100|unique:customers',
            'customer_phone'    => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Customer Name required',
            'customer_email.required' => 'Customer Email required',
            'customer_phone.required' => 'Customer Phone required',
        ];
    }

    public function saveCustomer()
    {
        $id = Auth::id();

        Customer::create([
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'customer_phone' => $this->customer_phone,
            'customer_address' => $this->customer_address,
            'customer_description' => $this->customer_description,
            'edited_by' => $id,
        ]);
    }
}
