<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequestFormRequest extends FormRequest
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
            //
            'contact_name'=>'required|alpha_num|min:5',
            'mobile'=>'required|digits:8',
            'email'=>'required|email',
            'book_name'=>'required|alpha_num|min:5',
            'pickup_date'=>'required|date'
        ];
    }
}
