<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreasuriesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'is_master' => 'required',
            'last_issal_' => 'required',
            'its_isal_exchange' => 'required|integer|min:0',
            'its_isal_collect' => 'required|integer|min:0',
            'active' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'أسم الخزنة مطلوب',
            'is_master.required' => 'نوع الخزنة مطلوب',
            'active.required' => 'هل هذا الصندوق مفعل؟',
            'its_isal_exchange.required' => 'اخر رقم ايصال صرف نقدية لهذه الخزينة',
            'its_isal_exchange.integer' => 'قيمة الأيصال يجب أن تكون رقماً ',
            'its_isal_collect.required' => 'اخر رقم ايصال تحصيل نقدية لهذه الخزينة',
            'its_isal_collect.integer' => 'قيمة الأيصال يجب أن تكون رقماً '
        ];
    }
}
