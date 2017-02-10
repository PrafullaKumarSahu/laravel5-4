<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;

use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;


class RegistrationRequest extends FormRequest
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
        //validate the form data
        return [
            'name' => 'required|min:5',
            'email' => 'required|email', 
            'password' => 'required|min:6|confirmed'
        ];
    }

    public function persist()
    {
        // $user = User::create([
        //     'name' => request('name'),
        //     'email' => request('email'),
        //     'password' => bcrypt(request('password'))
        //     ]);
        $user = User::create(
            $this->only(['name', 'email', 'password'])
            );

        //signed them in
        auth()->login($user);
        //send them an email
        Mail::to($user)->send(new Welcome($user));
    }
}
