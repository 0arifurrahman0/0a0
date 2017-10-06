<?php

namespace App\Http\Requests;

use App\Subcategory;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubcategory extends FormRequest
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
            'subcategory_name'    => 'required|string|max:100'
        ];
    }

    public function messages()
    {
        return [
            'subcategory_name.required' => 'Sub Category Name required'
        ];
    }

    public function saveSubcategory()
    {
        $id = Auth::id();

        Subcategory::create([
            'category_id' => $this->category_id,
            'subcategory_name' => $this->subcategory_name,
            'subcategory_details' => $this->subcategory_details,
            'edited_by' => $id,
        ]);
    }
}
