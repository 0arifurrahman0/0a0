<?php

namespace App\Http\Requests;

use App\Expense;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExpense extends FormRequest
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
            'expense_paymentTo'    => 'required|string|max:100',
            'expense_paymentDate'    => 'required|date',
            'expense_amount'    => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'expense_paymentTo.required' => 'Supplier Name required',
            'expense_paymentDate.required' => 'Date is required',
            'expense_amount.required' => 'Amount is required',
        ];
    }

    public function saveExpense($expenseId) {

        $id = Auth::id();

        Expense::where('id', $expenseId)->update([
            'expense_paymentTo' => $this->expense_paymentTo,
            'expense_paymentDate' => $this->expense_paymentDate,
            'expense_amount' => $this->expense_amount,
            'expense_paymentType' => $this->expense_paymentType,
            'expense_paymentAccount' => $this->expense_paymentAccount,
            'expense_details' => $this->expense_details,
            'edited_by' => $id,
        ]);
    }
}
