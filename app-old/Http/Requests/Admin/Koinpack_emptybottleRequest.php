<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Koinpack_emptybottleRequest extends FormRequest
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
            // 'url' => 'max:500000',
            // 'url' => 'nullable|mimes:pdf,zip,doc,docx|max:10000',
            // 'foto'              => 'image|nullable',
            // 'category'          => 'max:255|nullable',
            // 'unique_id'         =>  'required|max:50|unique:koinpack_products,unique_id',
            // 'category_id'       =>  'required|max:255',
            // 'flavours'          =>  'required|integer|in:0,1',
            'name'              =>  'required|max:255',
            'image'             =>  'nullable|image',
            // 'info'              =>  'nullable|max:255',
            'price'             =>  'required',
            // 'return_refund'     =>  'nullable|max:255',
            // 'shipping_info'     =>  'nullable|max:255',
            'brand'             =>  'required|max:255',
            // 'discount'          =>  'required',
            'description1'      =>  'nullable|max:255',
            'description2'      =>  'nullable|max:255',
            'product_weight'    =>  'required',
            'unit'              =>  'required|max:255',
            'visibility'        =>  'required|integer|in:0,1',
            // 'final_price'       =>  'required',
            // 'delivery_Info'     =>  'nullable|max:255',
            // 'stock_availability'=>  'required|integer',
            // 'supplier_name'     =>  'required|max:255',
            // 'supplier_price'    =>  'required',
            
        ];
    }
}
