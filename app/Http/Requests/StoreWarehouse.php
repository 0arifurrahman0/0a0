<?php

namespace App\Http\Requests;

use App\Warehouse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouse extends FormRequest
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
            'warehouse_name'    => 'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'warehouse_name.required' => 'Warehouse Name required',
        ];
    }

    public function saveWarehouse()
    {
        $id = Auth::id();

        Warehouse::create([
            'warehouse_name' => $this->warehouse_name,
            'warehouse_details' => $this->warehouse_details,
            'edited_by' => $id,
        ]);
    }
}
