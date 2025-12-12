<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredRequest;
use App\Models\Shop\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View|JsonResponse
    {
        if($request->ajax()){
            return response()->json([
                'body' => view('auth.partials._register-form')->render(),
                'header' => 'Регистрация'
            ]);
        }
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisteredRequest $request): RedirectResponse|JsonResponse
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));

        Auth::login($user);

        if($request->ajax()) {
            return response()->json([
                'header' => 'Подтверждение Email',
                'body' => view('auth.partials._verify-email')->render(),
            ]);
        }
        return redirect(route('shop.home', absolute: false));
    }
}
