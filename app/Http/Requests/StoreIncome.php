<?php

namespace App\Http\Requests;

use App\Income;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreIncome extends FormRequest
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
            'income_paymentFrom'    => 'required|string|max:100',
            'income_paymentDate'    => 'required|date',
            'income_amount'    => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'income_paymentFrom.required' => 'Customer Name required',
            'income_paymentDate.required' => 'Date is required',
            'income_amount.required' => 'Amount is required',
        ];
    }

    public function saveIncome()
    {
        $id = Auth::id();

        Income::create([
            'income_paymentFrom' => $this->income_paymentFrom,
            'income_paymentDate' => $this->income_paymentDate,
            'income_amount' => $this->income_amount,
            'income_paymentType' => $this->income_paymentType,
            'income_paymentAccount' => $this->income_paymentAccount,
            'income_details' => $this->income_details,
            'edited_by' => $id,
        ]);
    }
}
