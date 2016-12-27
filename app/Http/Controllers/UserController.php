<?php

namespace App\Http\Controllers;

use App\Mail\Subscribed;
use App\Subscribers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function newsletter(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $check = Subscribers::where('email', $request->email)->get();

        if ($check->count() == 0) {
            Subscribers::create([
                'email' => $request->email
            ]);
        }

        Mail::to($request->email)->send(new Subscribed());

        return redirect('/');
    }

    public function admin() {
        return view('admin.index');
    }
}
