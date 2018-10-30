<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\UserDataTable;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class UserController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(UserDataTable $user)
            {
               return $user->render('admin.user.index',['title'=>trans('admin.user')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.user.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function store()
            {
              $rules = [
             'name'=>'required',
             'email'=>'required|unique:admins',
             'password'=>'required|confirmed|min:6',
             'password_confirmation'=>'required',
             'photo'=>''.it()->image().'|nullable|sometimes',
             'phone'=>'numeric|nullable|sometimes',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'email'=>trans('admin.email'),
             'password'=>trans('admin.password'),
             'password_confirmation'=>trans('admin.password_confirmation'),
             'photo'=>trans('admin.photo'),
             'phone'=>trans('admin.phone'),

              ]);
		          $data['password'] = bcrypt(request('password'));
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','user');
              }
              User::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('user'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $user =  User::find($id);
                return view('admin.user.show',['title'=>trans('admin.show'),'user'=>$user]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $user =  User::find($id);
                return view('admin.user.edit',['title'=>trans('admin.edit'),'user'=>$user]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {
                $rules = [
             'name'=>'required',
             'email'=>'required',
             'password' => 'sometimes|nullable',
             'photo'=>''.it()->image().'|nullable|sometimes',
             'phone'=>'numeric|nullable|sometimes',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'email'=>trans('admin.email'),
             'photo'=>trans('admin.photo'),
             'phone'=>trans('admin.phone'),
                   ]);
              
               if(request()->hasFile('photo')){
              it()->delete(User::find($id)->photo);
              $data['photo'] = it()->upload('photo','user');
               }

               if(request('password') == ''){
                $data['password'] = User::find($id)->password; 
               }else{
                $data['password'] = bcrypt(request('password'));
               }

              User::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('user'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $user = User::find($id);

               it()->delete($user->photo);
               it()->delete('user',$id);

               @$user->delete();
               session()->flash('success',trans('admin.deleted'));
               return redirect(aurl('user'));
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$user = User::find($id);

                    	it()->delete($user->photo);
                    	it()->delete('user',$id);
                    	@$user->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $user = User::find($data);
 
                    	it()->delete($user->photo);
                    	it()->delete('user',$data);

                    @$user->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}