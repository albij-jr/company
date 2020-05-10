<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        if(request()->isMethod('PUT')){
            return [
            'name' =>'required',
            'website' =>'required'
        ];
        }else{
            return [
            'name' =>'required',
            'email' => 'required|email|unique:companies,email',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:5000|dimensions:min_width=100,min_height=100',
            'website' =>'required'
        ];
        }
    }
}
