<?php

namespace Directoryxx\Finac\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class JournalAUpdate extends FormRequest
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
			'voucher_no' => 'required',
			'account_code' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator) {
		throw new HttpResponseException(
			response()->json(['errors' => $validator->errors()])
		);
    }
}
