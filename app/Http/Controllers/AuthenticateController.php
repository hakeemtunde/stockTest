<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ETicket\CommonStr;
use Auth;

class AuthenticateController extends Controller
{

    public function auth(Request $request)
    {
        $rules = [
            CommonStr::USERNAME => 'required|min:3',
            CommonStr::PASSWORD => 'required'
        ];
        
        $request->validate($rules);
        
        $user_data = $request->only([CommonStr::USERNAME, 
            CommonStr::PASSWORD]);
        
        if (Auth::attempt($user_data)) {
            return redirect(CommonStr::DASHBOARD_PATH);
        }

//         return response([CommonStr::FAIL_LOGIN_MSG], 401);
        return redirect()->back()->withInput($request->all());

        
    }
}
