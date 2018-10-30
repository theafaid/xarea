<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AdminDataTable;
use Illuminate\Http\Request;
use App\Admin;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class AdminController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(AdminDataTable $admin)
            {
               return $admin->render('admin.admin.index',['title'=>trans('admin.admin')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.admin.create',['title'=>trans('admin.create')]);
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
             'email'=>'required|email|unique:admins',
             'password'=>'required|confirmed|min:6',
             'password_confirmation'=>'required',
             'photo'=>''.it()->image().'|nullable|sometimes',
             'phone'=>'numeric|sometimes|nullable',

               ];

              $data = $this->validate(request(),$rules,[],[
                 'name'=>trans('admin.name'),
                 'email'=>trans('admin.email'),
                 'password'=>trans('admin.password'),
                 'password_confirmation'=>trans('admin.password_confirmation'),
                 'photo'=>trans('admin.photo'),
                 'phone'=>trans('admin.phone'),

              ]);
		        
              if(request()->hasFile('photo')){
                $data['photo'] = it()->upload('photo','admin');
              }
              $data['password'] = bcrypt(request('password'));

              Admin::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('admin'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $admin =  Admin::find($id);
                return view('admin.admin.show',['title'=>trans('admin.show'),'admin'=>$admin]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $admin =  Admin::find($id);
                return view('admin.admin.edit',['title'=>trans('admin.edit'),'admin'=>$admin]);
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
             'email' => 'required|email|unique:admins,email,' . $id,
             'password'=>'sometimes|nullable|min:6',
             'phone'=>'numeric|nullable|sometimes',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'email'=>trans('admin.email'),
             'phone'=>trans('admin.phone'),
                   ]);

             if(request()->hasFile('photo')){
                if(!empty(Admin::find($id)->photo)){
                    it()->delete(Admin::find($id)->photo);
                    $data['photo'] = it()->upload('photo', 'admin');
                }else{
                    $data['photo'] = it()->upload('photo', 'admin');
                }
             }
              $data['password'] = bcrypt(request('password'));
              Admin::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('admin'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $admin = Admin::find($id);
               @$admin->delete();
               session()->flash('success',trans('admin.deleted'));
               return redirect(aurl('admin'));
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$admin = Admin::find($id);
                    	@$admin->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $admin = Admin::find($data);
 
                    	it()->delete($admin->photo);
                    	it()->delete('admin',$data);

                    @$admin->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }
            // profile page 
            public function profile(){
                $admin = Admin::find(admin()->user()->id);
                return view('admin.admin.profile', ['admin' => $admin]);
            }
            // edit admin profile 
            public function profilePost(){
                $data = $this->validate(request(), [
                    'name' => 'required|string', 
                    'email' => 'required|email',
                    'phone' => 'required|numeric',
                    'photo' => ''.it()->image().'|nullable|sometimes'
                ]);

                if(request()->hasFile('photo')){
                    if(!empty(admin()->user()->photo)){
                        it()->delete(Admin::find(admin()->user()->id)->photo);
                        $data['photo'] = it()->upload('photo', 'admin');
                    }else{
                        $data['photo'] = it()->upload('photo', 'admin');
                    }

                }

                Admin::where('id', admin()->user()->id)->update($data);
                session()->flash('success', 'تم تحديث بيانات حسابك الشخصى بنجاح');
                return back();
            }

            // delete admin account 
            public function deleteAccount(){
                $admin = Admin::find(admin()->user()->id);
                $admin->delete();
                return redirect(url(''));
            }            
            
}