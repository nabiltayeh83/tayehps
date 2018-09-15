<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangepasswordRequest extends FormRequest
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
             'oldpassword' => 'required',
			 'password' => 'required|min:6',
    		 'password_confirmation' => 'required_with:password|same:password',
        ];
    }
	
	
	public function messages(){
		return[
			'oldpassword.required' => 'يجب إدخال كلمة المرور الحالية',
			'password.required' => 'يجب إدخال كلمة المرور الجديدة',
			'password.min' => 'طول كلمة المرور يجب أن لا يقل عن 6 خانات',
			'password_confirmation.required' => 'يجب تأكيد كلمة المرور الجديدة',
			'password_confirmation.required_with' => 'يجب تأكيد كلمة المرور الجديدة',
			'password_confirmation.same' => 'تأكيد كلمة المرور غير متطابق مع كلمة المرور',
			
			];
		}
	
	
	
}
