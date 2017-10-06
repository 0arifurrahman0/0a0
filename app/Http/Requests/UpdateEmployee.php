<?php

namespace App\Http\Requests;

use App\Employee;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployee extends FormRequest
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
            'employee_fname'    => 'required|string|max:100',
            'employee_lname'    => 'required|string|max:100',
            'employee_email'    => 'required|string|email|max:100',
            'employee_phone'    => 'required|max:50',
            'employee_gender'    => 'required',
            'employee_nid'    => 'required',
        ];
    }

    public function messages() {
        return [
            'employee_fname.required' => 'First Name required',
            'employee_lname.required' => 'Last Name required',
            'employee_email.required' => 'Employee Email required',
            'employee_phone.required' => 'Employee Phone required',
            'employee_gender.required' => 'Employee Gender required',
            'employee_nid.required' => 'Employee NID required',
        ];
    }

    public function saveEmployee($employeeId) {

        $id = Auth::id();

        Employee::where('id', $employeeId)->update([
            'employee_fname' => $this->employee_fname,
            'employee_lname' => $this->employee_lname,
            'employee_email' => $this->employee_email,
            'employee_phone' => $this->employee_phone,
            'employee_gender' => $this->employee_gender,
            'employee_nid' => $this->employee_nid,
            'employee_birthday' => $this->employee_birthday,
            'employee_address' => $this->employee_address,
            'employee_salary' => $this->employee_salary,
            'edited_by' => $id,
        ]);
    }
}
