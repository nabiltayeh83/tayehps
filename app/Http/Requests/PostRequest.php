<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title_ar' => 'required',
			'details_ar' => 'required', 
			'photo' => 'nullable|image|mimes:jpeg,jpg,bmp,png,gif|max:2048'
        ];
    }
	
	
	public function messages(){
		return [
			'title_ar.required' => 'يجب إدخال العنوان',
			'details_ar.required' => 'يجب إدخال التفاصيل',
			'photo.image' => 'يجب إختيار صورة صحيحة',
			'photo.max' => 'يجب إختيار صورة بحجم أقل من 2048 كيلو بايت',
			'photo.mimes' => 'يجب إختيار صورة ذات إمتداد مناسب (jpeg | jpg | bmp | png | gif)',
			];
		}
	
}
