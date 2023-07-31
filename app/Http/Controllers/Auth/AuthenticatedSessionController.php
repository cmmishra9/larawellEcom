<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    /**
     * Social Login Google and Facebook
     */
    public function socialLogin($driver){
        return Socialite::driver($driver)->redirect();
    }

    public function handleSocialLogin($driver){
        try{
            $user = Socialite::driver($driver)->user();
        } catch(\Exception $e){
            return redirect()->route("login");
        }

        $userexist = User::where("email", $user->getEmail())->first();

        if($userexist){
            auth()->login($userexist, true);
        }else {
            $newUser = new User;

            $newUser->provider_name = $driver;
            $newUser->provider_id  = $user->getId();
            $newUser->name         = $user->getName();
            $newUser->email        = $user->getEmail();
            $newUser->email_verified_at = now();
            $newUser->avatar       = $user->getAvatar();
            $newUser->save();

            auth()->login($newUser, true);

        }

        return redirect($this->redirectPath());
    }
}
