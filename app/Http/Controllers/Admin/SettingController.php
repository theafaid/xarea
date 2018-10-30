<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SettingDataTable;
use Illuminate\Http\Request;
use App\Setting;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class SettingController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SettingDataTable $setting)
            {
               return $setting->render('admin.setting.index',['title'=>trans('admin.setting')]);
            }
            
            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                if($id != 1){
                    return back();
                }else{   
                    $setting =  Setting::find($id);
                    return view('admin.setting.show',['title'=>trans('admin.show'),'setting'=>$setting]);
                }
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                
                return view('admin.setting.edit',['title'=>trans('admin.edit')]);
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
                 'sitename'=>'required|string',
                 'site_description'=>'sometimes|nullable|string|min:10|max:160',
                 'site_header_text' => 'sometimes|nullable|string|max:25|string',
                 'site_header_description' => 'sometimes|nullable|string',
                 'site_logo'=>''.it()->image().'|nullable|sometimes',
                 'site_status'=>'required|in:on,off',
                 'site_header_background' => ''.it()->image(). '|nullable|sometimes',
                 'maintenence_message'=>'nullable|sometimes|string',
                 'keywords' => 'sometimes|nullable|string',
                 'site_email' => 'sometimes|nullable|email',
                 'site_facebook' => 'sometimes|nullable|url',
                 'site_twitter' => 'sometimes|nullable|url',
                 'site_googleplus' => 'sometimes|nullable|url',
                 'site_phone' => 'sometimes|nullable|numeric',
                 'site_address' => 'sometimes|nullable|string',
                 'site_footer_text' => 'sometimes|nullable|string'

             ];

             $nicenames = [
                'sitename' => 'إسم الموقع',
                'site_description' => 'وصف الموقع لمحركات البحث',
                'site_header_text' => 'عنوان مقدمة الصفحة الرئيسية',
                'site_header_description' => 'وصف مقدمة الصفحة الرئيسية',
                'site_logo' => 'شعار موقعك',
                'site_status' => 'حالة موقعك',
                'site_header_background' => 'خلفية مقدمة الصفحة الرئيسية',
                'maintenence_message' => 'رسالة الصيانة',
                'keywords' => 'الكلمات المفتاحية',
                'site_email' => 'البريد الإلكترونى لموقعك',
                'site_facebook' => 'رابط حساب فيسبوك لموقعك',
                'site_twitter' => 'رابط حساب تويتر لموقعك',
                'site_googleplus' => 'رابط جوجل بلس',
                'site_phone' => 'رقم الهاتف الخاص بموقعك',
                'site_address' => 'عنوان الموقع',
                'site_footer_text' => 'رسالة حقوق النشر'
             ];


             $data = $this->validate(request(), $rules, [], $nicenames);

               if(request()->hasFile('site_logo')){
              it()->delete(Setting::find($id)->site_logo);
              $data['site_logo'] = it()->upload('site_logo','setting/logo');
               }

               if(request()->hasFile('site_header_background')){
              it()->delete(Setting::find($id)->site_logo);
              $data['site_header_background'] = it()->upload('site_header_background','setting/headerBackgorund');
               }
               
              Setting::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('setting'));
            }


            
}