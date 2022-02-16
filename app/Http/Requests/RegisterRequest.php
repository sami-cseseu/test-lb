<?php

namespace App\Http\Requests;

use App\Rules\AddressWithStreetAndHouseNo;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => ['required','max:255', new AddressWithStreetAndHouseNo],
            'postal_code' => 'required|max:50',
            'city' => 'required||max:50',
            'phone' => 'required||numeric', //digits:12
            'description' => 'max:300',
            'email' => 'required|email|max:255|ends_with:.com,.de,.at',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'first_name' => 'Vorname',
            'last_name' => 'Nachname',
            'address' => 'Address',
            'postal_code' => 'Postleitzahl',
            'city' => 'Ort',
            'phone' => 'Telefon',
            'description' => 'Beschreibung',
            'email' => 'Email',
        ];
    }
}
