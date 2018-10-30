<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building ;
use App\User; 
use DB; 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcomePage', 'single', 'search', 'getFlatInfo']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    // show home page
    public function index()
    {

        $flats = Building::where('active', '1')->orderBy('id', 'desc')->paginate(9);
        return view('home', compact('flats'));
    }
    // show welcome page
    public function welcomePage(){ 

        $users = User::all();
        // GET USERS COUNT
        $onlineCount = 0 ;
        foreach($users as $user){
            if($user->isOnline()){
                $onlineCount++;
            }
        }

        $flats = Building::where('active', '1')->orderBy('id', 'desc')->take(12)->get();
        $usersCount = DB::table('users')->count();
        $flatsCount = DB::table('buildings')->count();
        return view('welcome', compact('flats', 'usersCount', 'flatsCount', 'onlineCount'));
    }

    // show single page
    public function single($id){
        // cannot see unactive ads 
        $flat = Building::find($id);
        if($flat->active == 1){
            $sameFlats = Building::where('ad_sort', $flat->ad_sort) // sort ['تمليك, إيجار']
                         ->where('ad_town', $flat->ad_town)         // place
                         ->where('active', 1)                       // active
                         ->whereNotIn('id', [$id])                  // not the same ad
                         ->orderBy(DB::raw('RAND()'))               // random 
                         ->take(6)                                  // get 6 ads only
                         ->get();                                                    
            $sameFlatsCount = $sameFlats->count();
            // check if no ads like this 
            if($sameFlatsCount == 0){
                // not found any ad like this ad
                $randFlats = Building::where('active', 1)           // active
                                       ->whereNotIn('id', [$id])    // not the same ad
                                       ->orderBy(DB::raw('RAND()')) // random
                                       ->take(6)                    // get 6 ads only
                                       ->get();
                return view('single', ['flat' => $flat, 'rand' => $randFlats, 'title' => 'إعلانات اخرى']);

            }else{ // there is ads like this ad 
                return view('single', ['flat' => $flat, 'same' => $sameFlats, 'title' =>'إعلانات مشابهة']);
            }
                
        }else{
            // ad is not active
            return back();
        }
    }

    // show add flat page 
    public function addNew(){       
        // return user back if he dosen't insert his phone
        if(empty(auth()->user()->phone)){
            session()->flash('failedToAdd', 'برجاء إكمال معلومات حسابك الشخصى قبل اضافة إعلان');
            return redirect(url('profile'));
        }
        return view('new');
    }
    // add new flat function
    public function addNewPost(){

        $main_image = '';
        // validate the add form 
        $this->validate(request(),
            [
                    'ad_title'          => 'required|String|min:3|max:160',
                    'ad_description'    => 'required|String:min:10',
                    'ad_price'          => 'required|integer|min:200',
                    'ad_space'          => 'integer|required|min:40',
                    'ad_other_photo'    => 'sometimes|nullable',
                    'ad_main_photo'     => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
                    'ad_room_count'     => 'integer|required|min:1|max:9',
                    'ad_kitchen_count'  => 'integer|required|min:1|max:10',
                    'ad_bathroom_count' => 'integer|required|min:1|max:10',
                    'ad_reseption_count'=> 'integer|required|min:1|max:10',
                    'ad_town'           => 'required|string',
                    'ad_sort'           =>'required|String|in:إيجار,تمليك',
                    'ad_status'         => 'required|string'

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
            ]
        );
            // check if flat is furnished or not 
            $furnished = request()->has('furnished') ? 'yes' : 'no' ;
            // check if request has main photo to upload it 
            if(request()->hasFile('ad_main_photo')){
                      $main_image = it()->upload('ad_main_photo','building') ;
              }

              
                // insert data in buildings  
            DB::table('buildings')->insert([
                    
                    'ad_title'       => request('ad_title'),
                    'ad_description' => request('ad_description'),
                    'ad_main_photo'  => $main_image,
                    'ad_space' => request('ad_space'),
                    'ad_room_count' => request('ad_room_count'),
                    'ad_bathroom_count' => request('ad_bathroom_count'),
                    'ad_kitchen_count' => request('ad_kitchen_count'),
                    'ad_reseption_count' => request('ad_reseption_count'),
                    'ad_town' => request('ad_town'),
                    'ad_status' => request('ad_status'),
                    'ad_sort' => request('ad_sort'),
                    'ad_price' => request('ad_price'),
                    'ad_owner' => auth()->guard('web')->user()->id,
                    'admin_owner' => '0',
                    'ad_owner_phone' => auth()->guard('web')->user()->phone,
                    'ad_furnished' => $furnished,
                    'ad_keywords'  => 'شقةو بيعو شراءو إيجارو',
                    'active'       => '0'
            ]);


            // open session to print success adding message 
            session()->flash('success', 'تم إضافة إعلانك بنجاح وفى انتظار تفعيله');
            return redirect('profile/ads');

    }

    // search for rent and ownershipsflats 
    public function rentSearch($type){
        // rent search 
        if($type == 'rent'){
            $result = Building::where('active', '1')->where('ad_sort', 'إيجار')->orderBy('id', 'desc')->paginate(9);
           
            $flat_type = 'إيجار';
            $sortCount = DB::table('buildings')->where('active', '1')->where('ad_sort', 'إيجار')->count();
            $title = 'شقق للإيجار' ; 
        }elseif($type == 'ownership'){
            $result = Building::where('active', '1')->where('ad_sort', 'تمليك')->orderBy('id', 'desc')->paginate(9);
            $flat_type = 'تمليك';
            $sortCount = DB::table('buildings')->where('active', '1')->where('ad_sort', 'تمليك')->count();
            $title = 'شقق للتمليك';
        }else{
            return back(); // if not in [rent, ownership]
        }


        return view('home', ['flats' => $result, 'flat_type' => $flat_type, 'sortCount' => $sortCount, 'homeTitle' =>  $title]);
    }

    // profile 
    public function profile(){
            $id = auth()->user()->id;
            $user = User::find($id);
            return view('profile', ['user' => $user]);
    }

    // edit profile 
    public function profilePost(){

            $id = auth()->user()->id;
            $data = $this->validate(request(), [
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users,email,'.$id,
            'phone'    => 'required|min:11',
            'photo'    => 'sometimes|nullable',
            'old-password' => 'required',
            'password' => 'sometimes|nullable|confirmed',
            'password_confirmation' => 'required_with:password' 
            ],[],[
                // nice names 
                'old-password' => 'كلمة المرور',

            ]);
        // check if old password = user password
        if(!\Hash::check(request('old-password'), auth()->user()->password)){
            // open session with err message
            session()->flash('incorrect_old_pass', 'كلمة المرور غير صحيحة');
            return back();
        }else{

        if(request()->hasFile('photo')){
                      if(!file_exists(public_path('storage/user/'.User::find($id)->photo))){
                        \Storage::delete(User::find($id)->photo);
                        $data['photo'] = it()->upload('photo', 'user') ;
                      }else{
                        $data['photo'] = it()->upload('photo', 'user') ; 
                      }

        }
        if(request()->has('password') && request('password') != ''){
            $data['password'] = bcrypt(request('password'));
        }else{
            $data['password'] = User::find($id)->password;
        }
        unset($data['password_confirmation']);
        unset($data['old-password']);
        User::where('id', $id)->update($data);
        session()->flash('success', 'تم تحديث معلومات الملف الشخصى بنجاح');
        return back();
        }
        // end check password
    }
    //////////////////////// User Ads //////////////////////
    public function userAds(){
        $id = auth()->user()->id;
        $user = User::find($id);
        $userAds = $user->userAds()->orderBy('id', 'desc')->paginate(5);
        return view('user_ads', compact('userAds'));
    }
    // advanced search  
    public function search(Request $req){
        $flat = Building::where('active', '1')->where('ad_status', request('ad_status'))->get();

        $search = array_except($req->toArray(), ['page']); // convert request to an array
        $q = '' ;
        $maxReq = 10 ; ;
        $empty = 0 ; 
        foreach($search as $key => $val){
            if($val == ''){
                $empty++;
            }
        }       
        if($empty == $maxReq && !request()->has('ad_furnished')){
            return back(); // all input field is empty 
        }
        // ad_furnished field
        request()->has('ad_furnished') ? $search['ad_furnished'] = 'yes' : $search['ad_furnished'] = '';


        $result = [] ; // result of requests to path it to view
        foreach($search as $key => $val){
            // check if any field is empty and the key not price-from 
            // to avoid select it from database
            if($val != ''){
                // if user insert price from and skip price to
                if($key == 'price-from' && !empty(request('price-from')) && empty(request('price-to'))){
                    $q = DB::table('buildings')->select('*')->where('ad_price', '>=', $val);
                }
                // if user insert price to and skip price from 
                else if($key == 'price-to' && !empty(request('price-to')) && empty(request('price-from'))){
                    $q = DB::table('buildings')->select('*')->where('ad_price', '<=', $val);
                }
                // if user insert price from and price to 
                else if(!empty(request('price-from')) && !empty(request('price-to'))){
                    $q = DB::table('buildings')->select('*')->whereBetween('ad_price', [request('price-from'), request('price-to')]);
                }
                // if user dosn't insert the price
                else{

                    if(request('price-from') == '' && request('price-to') == '' && !request()->has('ad_furnished')){
                        $q  = DB::table('buildings')->select('*')->where('active', '1')->where($key, $val); // where not furnished .. and
                    }else{
                        $q  = DB::table('buildings')->select('*')->where('active', '1')->where('ad_furnished', 'yes')->where($key, $val); // where furnished.. and

                    }
                }
                $result[$key] = $val; // using for breadCrumb
            }
        }// end loop
        $flats = $q->paginate(6);
        $count = $q->count(); // get count of ads result
        // print flash message if count = 0 
        if($count == 0){
            session()->flash('notFound', 'نأسف لذلك .. لايوجد إعلانات مطابقة لبحثك');
            return back();
        }
        return view('home', ['flats' => $flats, 'advancedSearchTitle' => 'نتائج البحث', 'count' => $count, 'result' => $result]);
        
    }

    // get flat informations using ajax 
    public function getFlatInfo($id){
        $flat = Building::find($id)->toJson(); 
        return $flat ;
    }

    // edit flat 
    public function editFlat($id){
       $flat = Building::find($id);
       // check if the ad is not active and the user is the owner of the ad
       if($flat->active == 0 && auth()->user()->id == $flat->ad_owner){
            return view('edit_flat', ['flat' => $flat, 'title' => 'تعديل إعلان  | '.$flat->ad_title]);
       }else{
            // redirect to the base path
            return redirect(url(''));
       }
    }

    // edit flat final 
    public function editFlatPost($id){
        // validate the add form 
        $data = 
            $this->validate(request(),
            [
                    'ad_title'          => 'required|String|min:3|max:160',
                    'ad_description'    => 'required|String:min:10',
                    'ad_price'          => 'required|integer|min:200',
                    'ad_space'          => 'integer|required|min:40',
                    'ad_other_photo'    => 'sometimes|nullable',
                    'ad_main_photo'     => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
                    'ad_room_count'     => 'integer|required|min:1|max:9',
                    'ad_kitchen_count'  => 'integer|required|min:1|max:5',
                    'ad_bathroom_count' => 'integer|required|min:1|max:5',
                    'ad_reseption_count'=> 'integer|required|min:1|max:8',
                    'ad_town'           => 'required|string',
                    'ad_sort'           =>'required|String|in:إيجار,تمليك',
                    'ad_status'         => 'required|string'

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
            ]
        );
        // check if flat is furnished
        if(request()->has('furnished')){
            $data['ad_furnished'] = 'yes' ;
        } else{
            $data['ad_furnished'] = 'no' ; 
            // check if request has file
        }
        if(request()->hasFile('ad_main_photo')){
                      if(file_exists(public_path('storage/'.Building::find($id)->ad_main_photo))){
                        \Storage::delete(Building::find($id)->ad_main_photo);
                        $data['ad_main_photo'] = it()->upload('ad_main_photo', 'building') ;
                      }else{
                        $data['ad_main_photo'] = it()->upload('ad_main_photo', 'building') ; 
                      }

        }
        //update the ad
        Building::where('id', $id)->update($data);
        session()->flash('success', 'تم تحديث إعلانك بنجاح');
        return back();
    }
}
 