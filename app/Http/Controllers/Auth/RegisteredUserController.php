<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailMailer;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'gender' => ['required', 'in:male,female'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif|max:2048'],
        ]);
        $mot = fake()->unique()->password();
        $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'email' => $request->email,
            'profile_image' => $profileImagePath,
            'password' => Hash::make($mot),
            'role' => 'student',
        ]);

        event(new Registered($user));

        // Auth::login($user);

        Mail::to($request->email)->send(new EmailMailer($mot));

        return redirect(route('login', absolute: false));
    }
}
