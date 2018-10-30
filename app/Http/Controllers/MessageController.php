<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MessageController extends Controller
{
    
    public function contact(Request $request){
        if(auth()->guard('web')->user()){
            $data = $this->validate($request, [
                'message' => 'required|string'
            ], [], [
                'message' => 'حقل الرسالة',
            ]);

            DB::table('messages')->insert([
                'name' => auth()->guard('web')->user()->name,
                'email' => auth()->guard('web')->user()->email,
                'phone' => auth()->guard('web')->user()->phone,
                'message' => request('message'),
                'watched' => 'no',
                'created_at' => now()
            ]);

            session()->flash('success', 'تم إرسال رسالتك إلينا بنجاح');
        }else{
            // user is not login 
            $this->validate($request, 
            [
                'firstname' => 'required|string',
                'lastname'  => 'required|string', 
                'phone'      => 'required|string|min:11',
                'email'      => 'required|string|email',
                'message'    => 'required|string'            
            ],[], [
                // nicename
                'firstname' => 'الإسم الأول',
                'lastname'  => 'الإسم الأخير',
                'email'      => 'البريد الإلكترونى',
                'message'    => 'حقل الرسالة'
            ]);

            DB::table('messages')->insert(
                [
                    'name' => request('firstname') . " " . request('lastname'),
                    'phone' => request('phone'),
                    'email' => request('email'),
                    'message' => request('message'),
                    'watched' => 'no',
                    'created_at' => now()
                ]);

                // open session to print success message 
                session()->flash('success', 'تم إرسال رسالتك إلينا بنجاح');
            
        }
        return back();
    }
}
