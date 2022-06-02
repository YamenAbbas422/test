<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Register the user (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'fname' => 'string|required',
            'lname' => 'string|required',
            'email' => 'email|required|unique:users',
            'password' => 'string | min:6|confirmed',
            'mobile' => 'integer|required|unique:users',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Registration Faild',
                'error' => $validator->errors()
            ]);
        }
        $user = User::create([
            'fname' => request()->get('fname'),
            'lname' => request()->get('lname'),
            'email' => request()->get('email'),
            'password' => bcrypt(request()->get('password')),
            'mobile' => request()->get('mobile'),
        ]);
        $token = random_int(0000,9999);
        $email =  $user->email;
        Mail::send('emails.emailVerificationEmail', ['token' => $token], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Email Verification Mail');
        });
        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);
        return response()->json([
            'message' => 'User Created!',
            'user' => $user
        ]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        $field = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $val = request()->merge([$field => $credentials['email']]);
        if ($field == 'mobile') {
            $user_mobile = User::where('mobile', $credentials['email'])->first();
            if ($user_mobile != null){
            $user = User::where('email', $user_mobile->email)->first();
            $credentials = array('email' => $user->email, 'password' => request('password'));
            }else{
                return response()->json([
                    'message'=>'Mobile Number is not found'
                ],400);
            }
        } else {
            $user = User::where('email', $credentials['email'])->first();
            if ($user == null){
                return response()->json([
                    'message'=>'Email is not found'
                ],400);
            }
        }
        if ($user->is_email_verified == 0) {
            return response()->json([
                'message' => 'please verified your account'
            ]);
        }
        
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        // return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl'),
            'user' => auth()->user()
        ]);
    }
    public function verifyAccount($token)
    {

        $verifyUser = UserVerify::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->verified) {
                $verifyUser->user->email_verified_at = now();
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }
        return redirect('/login');
    }
    public function forgot()
    {
        $credentials = request()->validate(['email' => 'required|email']);
        $user = User::where('email', $credentials['email'])->first();
        if ($user == null) {
            return response()->json('Eamil is not register.');
        }
        Password::sendResetLink($credentials);
        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }
}
