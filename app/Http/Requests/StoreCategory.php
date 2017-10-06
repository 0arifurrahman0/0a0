<?php

namespace App\Http\Requests;

use App\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'category_name'    => 'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Category Name required',
        ];
    }

    public function saveCategory()
    {
        $id = Auth::id();

        Category::create([
            'category_name' => $this->category_name,
            'category_details' => $this->category_details,
            'edited_by' => $id,
        ]);
    }
}
