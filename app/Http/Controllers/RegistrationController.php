<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function create(){
        return view('registration.create');
    }
    
    public function store(){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        //$user = new User;
        //$user->name = request('name');
        //$user->email = request('email');
        //$user->password = bcrypt(request('name'));
        //$user->save();
        
        auth()->login($user);
        
        \Mail::to($user)->send(new Welcome($user));
        session()->flash('message', 'Thanks so much for signing up!');
        return redirect()->home();
    }
}
