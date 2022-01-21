<?php

namespace App\Http\Requests\V1\Jurnallar;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\V1\Jurnallar\JurnalToplami;

class CreateJurnalToplamiRequest extends FormRequest
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
        return JurnalToplami::$rules;
    }
}
