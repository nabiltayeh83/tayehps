<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
			'email' => 'required|email|unique:users',
			'password1' => 'required|min:6',
        ];
    }


	public function messages(){
			return[
				'name.required' => 'يجب إدخال الإسم',
				'email.required' => 'يجب إدخال البريد الإلكتروني',
				'email.email' => 'يجب إدخال البريد الإلكتروني بشكل صحيح',
				'email.unique' => 'البريد الإلكتروني مدخل من قبل',
				'password1.required' => 'يجب إدخال كلمة المرور',
				'password1.min' => 'طول كلمة المرور يجب أن لا يقل عن 6 خانات',
				
			];
		}



}
