<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\MessageDataTable;
use Illuminate\Http\Request;
use App\Message;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class MessageController extends Controller
{

     

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index($type= null, MessageDatatable $message)
            {
               if(request()->segment(2) == 'message-unwatched'){
                  return $message->with('type', 'unwatched')->render('admin.message.index',['title'=>'الرسائل غير المقروؤة']);
               }else{
                  return $message->render('admin.message.index',['title'=>'الرسائل']);
               }
            }


          
            public function destroy($id)
            {
               $message = Message::find($id);
               it()->delete($message->ad_main_photo);
               it()->delete('message',$id);
               it()->delete($message->ad_other_photo);
               it()->delete('message',$id);

               @$message->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {

                $data = $r->input('selected_data');
              
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$message = Message::find($id);

                    	it()->delete($message->ad_main_photo);
                    	it()->delete('message',$id);
                    	it()->delete($message->ad_other_photo);
                    	it()->delete('message',$id);
                    	@$message->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $message = Message::find($data);
 
                    	it()->delete($message->ad_main_photo);
                    	it()->delete('message',$data);
                    	it()->delete($message->ad_other_photo);
                    	it()->delete('message',$data);

                    @$message->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

    public function show($id){
      $msg = Message::find($id);
      $msgOwner = \App\User::where('email', $msg->email)->get(['id'])->toArray();
      $owner = '' ;
      // set message to be watched
      Message::where('id', $id)->update(['watched' => 'yes']);
      
      if(empty($msgOwner)){
        // means message sent without login 
         return view('admin.message.show', ['msg' => $msg, 'title' => 'رسالة من '.$msg->name]);
      }else{
         return view('admin.message.show', ['msg' => $msg, 'title' => 'رسالة من '.$msg->name, 'owner' => $msgOwner]);

      }
      
    }

            
}