<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'transaction_code' => 'required|unique:transactions,transaction_code',
            'member_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date',
        ];
    }
}
