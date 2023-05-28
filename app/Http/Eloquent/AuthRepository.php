<?php
namespace App\Http\Eloquent;
use App\Http\Interfaces\AuthRepositoryInterface;
use App\Models\ContractVerification;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthRepository implements AuthRepositoryInterface
{
    protected $user_Ob;
    protected $verification_Ob;
    public function __construct(User $user, Verification $verification)
    {
        $this->user_Ob = $user;
        $this->verification_Ob = $verification;
    }
    public function sendVerificationCode($request)
    {
        $userToVerify = $this->user_Ob->whereEmail($request->email)->first();
        if (isset($userToVerify)) {
            $userToVerify->verified_status = 0;
            $userToVerify->save();
            $this->verification_Ob->user_id = $userToVerify->id;
            $digits = 4;
            $code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            $this->verification_Ob->code = $code;
            $this->verification_Ob->save();
            // $data = array('name' => $userToVerify->name, 'code' => $code);
            // Mail::send('verify', $data, function ($message) use ($userToVerify) {
            //     $message->to($userToVerify->email)->subject('activation code');
            //     $message->from('events@gmail.com', 'Events App');
            // });
            return 'code_sent';
        } else {
            return "user_not_found";
        }
    }

    public function verifyCode($request)
    {
        $verificationCode = $this->verification_Ob->whereCode($request->code)->first();
        if (isset($verificationCode)) {
            $userTovVerify = $this->user_Ob->whereId($verificationCode->user_id)->first();
            if ($userTovVerify->verified_status == 0) {
                $verificationCode->delete();
                $userTovVerify->verified_status = 1;
                $userTovVerify->save();
                return  $userTovVerify;
            } else {
                $verificationCode->delete();
                return 'user_already_verified';
            }
        } else {
            return 'invalid_code';
        }
    }
    public function changePassword($request)
    {
        $userToChangePassword = $this->user_Ob->where('id', $request->id)->first();
        if (isset($request->password)) {
            $check = Hash::check($request->password, $userToChangePassword->password);
            if (!$check) {
                return 'invalid_password';
            }
        }
        $userToChangePassword->password = Hash::make($request->password);
        $userToChangePassword->save();
        return $userToChangePassword;
    }

}