<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Conditions\UserBookCondition;
use App\Models\Conditions\UserCondition;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/mybook/';

    /** @var UserCondition $user_condition */
    protected $user_condition;

    /**
     * Create a new controller instance.
     *
     * @param UserBookCondition $user_book_condition
     * @return void
     */
    public function __construct(UserCondition $user_condition)
    {
        $this->middleware('guest')->except('logout');
        $this->user_condition = $user_condition;
    }

    public function redirectToGoogle()
    {
        // Google へのリダイレクト
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // Google 認証後の処理
        // あとで処理を追加しますが、とりあえず dd() で取得するユーザー情報を確認
        $gUser = Socialite::driver('google')->stateless()->user();
        $user = $this->user_condition->where('email', $gUser->email)->first();
        if (is_null($user)) {
            $user = $this->createUserByGoogle($gUser);
            dd($user);
        }

        \Auth::login($user, true);
        return redirect('/');
    }

    private function createUserByGoogle($gUser)
    {
        return $this->user_condition->save([
            'name' => $gUser->name,
            'email' => $gUser->email,
            'password' => \Hash::make(uniqid()),
        ]);
    }
}
