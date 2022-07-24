<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class SubscriptionRequest extends FormRequest
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
        $user_id = Request::get('user_id');
        $website_id = Request::get('website_id');  
        return [
            'website_id' => 'required|exists:App\Models\Website,id|unique:user_subscriptions,website_id,NULL,id,user_id,' . $user_id,
            'user_id' => 'required|exists:App\Models\User,id|unique:user_subscriptions,user_id,NULL,id,website_id,' . $website_id,
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'website_id.unique' => 'The user is already subscribed to this website',
            'user_id.unique' => 'The user is already subscribed to this website',
            'user_id.exists' => 'This user is not available',
            'website.exists' => 'The Website does not exists',
        ];
    }
}
