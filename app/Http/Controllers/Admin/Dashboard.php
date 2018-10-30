<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Message ; 
use App\User ; 
use App\Building; 

class Dashboard extends Controller {

	public function home() {
		$usersCount = User::get()->count();
		$adsCount   = Building::get()->count();
		$activeAds  = Building::where('active', '1')->get()->count();
		$inactiveAds= Building::where('active', '0')->get()->count();

		// GET ONLINE USER COUNT 
		$onlineUsers = 0 ; 
		$users = User::all();
		foreach($users as $user){
			if($user->isOnline()){
				$onlineUsers++ ; 
			}
		}

		return view('admin.home', ['title' => trans('admin.dashboard'), 'usersCount' => $usersCount, 'adsCount' => $adsCount, 'activeAds' => $activeAds, 'inactiveAds' => $inactiveAds, 'online' => $onlineUsers]);
	}

	public function theme($id) {
		if (session()->has('theme')) {
			session()   ->forget('theme');
		}
		session()->put('theme', $id);
	}
}
