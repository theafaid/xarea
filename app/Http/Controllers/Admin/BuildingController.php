<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BuildingDataTable;
use Illuminate\Http\Request;
use App\Building;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class BuildingController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BuildingDataTable $building)
            {
               // active flats
               if(request()->segment(2) == 'building-inactive'){
                   return $building->with('type', 'inactive')->render('admin.building.index', ['title' => 'عقارات لم يتم تفعيلها']);
              // all flats 
               }elseif(request()->segment(2) == 'building'){
                  return $building->render('admin.building.index',['title'=>trans('admin.building')]);
               }
               // inactive flats 
               elseif(request()->segment(2) == 'building-active'){
                  return $building->with('type', 'active')->render('admin.building.index', ['title' => 'العقارات المفعلة مسبقا']);
               }

            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.building.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function store()
            {

            $data =  $this->validate(request(),
            [
                    'ad_title'          => 'required|String|min:3|max:160',
                    'ad_description'    => 'required|String:min:10',
                    'ad_price'          => 'required|integer|min:200',
                    'ad_space'          => 'integer|required|min:40',
                    'ad_other_photo'    => 'sometimes|nullable',
                    'ad_main_photo'     => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
                    'ad_room_count'     => 'required|min:1|max:9',
                    'ad_kitchen_count'  => 'required|min:1|max:5',
                    'ad_bathroom_count' => 'required|min:1|max:5',
                    'ad_reseption_count'=> 'required|min:1|max:8',
                    'ad_town'           => 'required|string',
                    'ad_sort'           =>'required|String|in:إيجار,تمليك',
                    'ad_status'         => 'required|string',
                    'ad_owner_phone'    => 'required',
                    'ad_keywords'       => 'string'

            ], [], 

            [
                // nice names 
                    'ad_title'          => 'عنوان الإعلان ',
                    'ad_description'    => 'وصف الشقة ',
                    'ad_space'          => 'مساحة الشقة ',
                    'ad_main_photo'     => 'الصورة الرئيسية للعقار',
                    'ad_other_photo'    => 'صور الشقة الأخرى',
                    'ad_room_count'     => 'عدد الغرف',
                    'ad_kitchen_count'  => 'عدد المطابخ',
                    'ad_bathroom_count' => 'عدد الحمامات',
                    'ad_reseption_count'=> 'عدد الريسيبشن',
                    'ad_town'           => 'المدينة',
                    'ad_status'         => 'حالة الشقة ',
                    'ad_sort'           => 'نوع العقد',
                    'ad_price'          => 'السعر',
                    'ad_keywords'       => 'الكلمات المفتاحية'
            ]
        );

          
		          $data['admin_owner'] = admin()->user()->id;
              $data['created_at'] = now();
               if(request()->hasFile('ad_main_photo')){
                $data['ad_main_photo'] = it()->upload('ad_main_photo','building');
              }
               if(request()->hasFile('ad_other_photo')){
                  $data['ad_other_photo'] = it()->upload('ad_other_photo','building');
              }
              // check if flat is furnished
              if(request()->has('furnished')){
                  $data['ad_furnished'] = 'yes' ;
              } else{
                  $data['ad_furnished'] = 'no' ; 
                  // check if request has file
              }
              Building::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('building'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $building =  Building::find($id);
                return view('admin.building.show',['title'=>trans('admin.show'),'building'=>$building]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $building =  Building::find($id);
                return view('admin.building.edit',['title'=>trans('admin.edit'),'building'=>$building]);
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
                   'ad_type'=>'required',
                   'ad_description'=>'required|String|min:31',
                   'ad_main_photo'=>''.it()->image().'|nullable|sometimes',
                   'ad_other_photo'=>''.it()->image().'|nullable|sometimes',
                   'ad_town'=>'required|String',
                   'ad_owner_phone'=>'required',
                   'ad_price'=>'required',
                   'ad_sort'=>'required|String|in:ownership,rent',
                   'ad_keywords'=>'nullable|sometimes|String',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'ad_type'=>trans('admin.ad_type'),
             'ad_description'=>trans('admin.ad_description'),
             'ad_main_photo'=>trans('admin.ad_main_photo'),
             'ad_other_photo'=>trans('admin.ad_other_photo'),
             'ad_town'=>trans('admin.ad_town'),
             'ad_owner_phone'=>trans('admin.ad_owner_phone'),
             'ad_price'=>trans('admin.ad_price'),
             'ad_sort'=>trans('admin.ad_sort'),
             'ad_keywords'=>trans('admin.ad_keywords'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              $data['updated_at'] = now();
               if(request()->hasFile('ad_main_photo')){
              it()->delete(Building::find($id)->ad_main_photo);
              $data['ad_main_photo'] = it()->upload('ad_main_photo','building');
               }
               if(request()->hasFile('ad_other_photo')){
              it()->delete(Building::find($id)->ad_other_photo);
              $data['ad_other_photo'] = it()->upload('ad_other_photo','building');
               }
              Building::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('building'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $building = Building::find($id);

               it()->delete($building->ad_main_photo);
               it()->delete('building',$id);
               it()->delete($building->ad_other_photo);
               it()->delete('building',$id);

               @$building->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$building = Building::find($id);

                    	it()->delete($building->ad_main_photo);
                    	it()->delete('building',$id);
                    	it()->delete($building->ad_other_photo);
                    	it()->delete('building',$id);
                    	@$building->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $building = Building::find($data);
 
                    	it()->delete($building->ad_main_photo);
                    	it()->delete('building',$data);
                    	it()->delete($building->ad_other_photo);
                    	it()->delete('building',$data);

                    @$building->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            //active or inactive a flat 
            public function setActive($id){
                $flat = Building::find($id);
                if(!empty($flat)){
                  if($flat->active == '0'){
                    Building::where('id', $id)->update(['active' => '1']);
                    session()->flash('success', 'تم تفعيل الشقة رقم   (' . $id . ') بنجاح');
                    return back();
                  }else{
                    session()->flash('success', 'تم إلغاء تفعيل الشقة رقم (' . $id . ') بنجاح' );
                    Building::where('id', $id)->update(['active' => '0']);
                    return back();
                  }
                }else{
                  return back();
                }
            }
}