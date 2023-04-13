<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CouponForm extends FormRequest
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
        if(request()->routeIs('coupon.store'))
        {
            $nameValidation = 'unique:coupons';

        }elseif(request()->routeIs('coupon.update'))
        {
            $nameValidation = 'required|unique:coupons,coupon_name,'.$this->coupon->id;
        }
        return [
            '*'           => 'required',
            'coupon_name' => $nameValidation,
            'discount'    => 'numeric|min:1|max:99',
            'validity'    => 'date|after:today',
            'limit'       => 'numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'limit.numeric' => 'Limit should be in number',
        ];
    }
}
