<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthForm extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    public function login()
    {
        try {
            $this->validate([
                'email'    => 'required|email|max:255',
                'password' => [
                    'required',
                    'min:5',
                    'max:18',
                    'regex:/^[a-zA-Z0-9!@#$%^&*()_+=\-{};:\'",.<>?]+$/'
                ],
            ], [
                'email.required'    => 'Email is required.',
                'email.email'       => 'Please enter a valid email address.',
                'email.max'         => 'Email must not be more than 255 characters.',
                'password.required' => 'Password is required.',
                'password.min'      => 'Password must be at least 5 characters.',
                'password.max'      => 'Password must not be more than 18 characters.',
                'password.regex'    => 'Password contains invalid characters.',
            ]);
        } catch (ValidationException $e) {
            $message = $e->validator->errors()->first();
            return notyf()->position('x', 'right')->position('y', 'top')->error($message);
        }

        $user = User::where('email', $this->email)->first();

        if (!$user || !Hash::check($this->password, $user->password)) {
            return notyf()->position('x', 'right')->position('y', 'top')->error('Invalid credentials');
        }

        Auth::login($user, $this->remember);
        notyf()->position('x', 'right')->position('y', 'top')->success('Login Successfully');
        return redirect()->route('admin.panel');
    }

    public function render()
    {
        return view('livewire.auth-form');
    }
}
