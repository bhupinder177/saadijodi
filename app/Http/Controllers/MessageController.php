<?php
namespace App\Http\Controllers;
use App\Model\User;
use App\Model\Post;
use App\Model\PostRequest;
use App\Model\Message;
use App\Model\Country;
use App\Model\Notification;
use App\Model\MessageRoom;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Helpers\GlobalFunctions as CommonHelper;
use Illuminate\Http\JsonResponse;
use Session;
use DB;
use URL;
use Redirect;
use Auth;

class MessageController extends Controller
{

  public function index()
  {

    $id = Auth::User()->id;
    $h = '0 Hours';
    $m = '0 Minutes';
    $result = User::where('id',$id)->first();
    $messagesId = '';
    if(!empty($result->countryId))
    {
      $country = Country::where('id',$result->countryId)->first();
      if($country)
      {
        $result->country = $country->name;
        $timezone = str_replace("GMT","",$country->timezone);
      }
    }
    else
    {
     $timezone = '0';
    }
    if(!empty($timezone))
    {
     $zone = explode(":",$timezone);
     if(!empty($zone))
     {
      if(!empty($zone[0]))
      {
      $h = $zone[0].' Hours';
      }
      if(!empty($zone[1]))
      {
      $m = $zone[1].' Minutes';
      }
     $timezone = $h.' '.$m;
     }
    }
    $messages = array();
    $rooms = MessageRoom::with('user','oppositeUser')->where('userId',$id)->orwhere('oppositeUserId',$id)->orderby('last_message_at','desc')->get();
    if(count($rooms) > 0)
    {
    $count = Message::where('roomId',$rooms[0]->roomId)->count();
    if($count > 10)
    {
    $count = $count - 10;
    }
    else
    {
      $count = 0;
    }
    $messages = Message::where('roomid',$rooms[0]->roomId)->skip($count)->take(10)->get();
    $up = Message::where('roomId',$rooms[0]->roomId)->update(array('is_read'=>1));
     if($messages)
     {
      $messagesId = $messages[0]->id ?? '';
      }
    }
    $title = "Messages";

    return view('front.chat.chat',['title'=>$title,'rooms'=>$rooms,'offset'=>10,'messages'=>$messages,'timezone'=>$timezone,'messagesId'=>$messagesId]);
  }

  public function chatHistory(Request $request)
  {
    $id = Auth::User()->id;
    $h = '0 Hours';
    $m = '0 Minutes';
    $result = User::where('id',$id)->first();
    $post = array();
    $requestdata = array();
    if(!empty($result->countryId))
    {
      $country = Country::where('id',$result->countryId)->first();
      if($country)
      {
        $result->country = $country->name;
        $timezone = str_replace("GMT","",$country->timezone);
      }
    }
    else
    {
     $timezone = '0';
    }
    if(!empty($timezone))
    {
     $zone = explode(":",$timezone);
     if(!empty($zone))
     {
      if(!empty($zone[0]))
      {
      $h = $zone[0].' Hours';
      }
      if(!empty($zone[1]))
      {
      $m = $zone[1].' Minutes';
      }
     $timezone = $h.' '.$m;
     }
    }
    $count = Message::where('roomid',$request->data_room)->count();
    if($count > 10)
    {
    $count = $count - 10;
    }
    else
    {
      $count = 0;
    }
    $messages = Message::where('roomId', $request->data_room)->skip($count)->take(10)->get();
    $update = Message::where(array('roomId'=>$request->data_room,"userId"=>$request->sender))->update(array("is_read"=>1));
    $user = User::where('id',$request->sender)->first();
    $room = MessageRoom::where('roomId',$request->data_room)->first();
    $image = CommonHelper::getImage($request->sender);
    if($image)
    {
      $img = url("profiles/".$image->image);
    }
    else
    {
      $img = url("front/images/_D.jpg");
    }

    $roomId = $request->data_room;
    $offset = 10;
    $returnHTML = view('front.chat.chat-thread', compact('messages','user','roomId','offset','timezone'))->render();
     # udpate the chat message to is_read = true
    $message_ids = $messages->pluck('id');
   return new JsonResponse(['rhtml' => $returnHTML,'user'=>$user->firstName,'image'=>$img]);
  }



  public function saveChat(Request $request)
  {
    try{
         $validator = Validator::make($request->all(),[
               'roomId' => 'required|string',
               'userId' => 'required|string',
               'message' => 'required|string',
           ]);

          if ($validator->fails())
          {

            $errors = $validator->errors();
            $output['validation']     = false;
            $output['errors']      = $errors;
          }
          else
         {
           $id = Auth::User()->id;
           $h = '0 Hours';
           $m = '0 Minutes';
           $result = User::where('id',$id)->first();
           if(!empty($result->countryId))
           {
             $country = Country::where('id',$result->countryId)->first();
             if($country)
             {
               $result->country = $country->name;
               $timezone = str_replace("GMT","",$country->timezone);
             }
           }
           else
           {
            $timezone = '0';
           }
           if(!empty($timezone))
           {
            $zone = explode(":",$timezone);
            if(!empty($zone))
            {
             if(!empty($zone[0]))
             {
             $h = $zone[0].' Hours';
             }
             if(!empty($zone[1]))
             {
             $m = $zone[1].' Minutes';
             }
            $timezone = $h.' '.$m;
            }
           }
           $date = date("Y-m-d", strtotime($request->date));
           $chat = new Message([
                'userId' =>$request->userId,
                'message' =>$request->message,
                'roomId' =>$request->roomId,
                'is_read'=>0,
            ]);
            $result = $chat->save();
            if($result)
            {
              MessageRoom::where('roomId',$request->roomId)->update(array("message"=>$request->message,"last_message_at"=>date('Y-m-d H:i:s')));
            }

            if($result)
            {
              $image = CommonHelper::getImage($request->userId);
              if($image)
              {
                $img = url("profiles/".$image->image);
              }
              else
              {
                $img = url("front/images/_D.jpg");
              }
            }

            if($result)
             {
                 $this->response['success'] ="true";
                 $this->response['time'] = date('h:i A',strtotime($timezone, strtotime(Date("h:i")))).','.date('d M, Y');
                 $this->response['image'] = $img;
             }
             else
             {
               $this->response['formErrors'] ="true";
             }
             return response($this->response);
         }
      }
     catch(\Exception $e)
     {
      $this->response['message'] = $e->getMessage();
      $this->response['formErrors'] = "true";
      return response($this->response);
     }
  }

  public function getoldMessage(Request $request)
  {
    $id = Auth::User()->id;
    $h = '0 Hours';
    $m = '0 Minutes';
    $result = User::where('id',$id)->first();
    if(!empty($result->countryId))
    {
      $country = Country::where('id',$result->countryId)->first();
      if($country)
      {
        $result->country = $country->name;
        $timezone = str_replace("GMT","",$country->timezone);
      }
    }
    else
    {
     $timezone = '0';
    }
    if(!empty($timezone))
    {
     $zone = explode(":",$timezone);
     if(!empty($zone))
     {
      if(!empty($zone[0]))
      {
      $h = $zone[0].' Hours';
      }
      if(!empty($zone[1]))
      {
      $m = $zone[1].' Minutes';
      }
     $timezone = $h.' '.$m;
     }
    }
    $messages = Message::where('roomId',$request->data_room)->orderby('id','desc')->skip($request->data_offset)->take(10)->get();
    $messages = $messages->reverse();
    $returnHTML = view('front.chat.chat-oldhistory', compact('messages','timezone'))->render();
   return new JsonResponse(['rhtml' => $returnHTML]);
  }

  public function gettime(Request $request)
  {
    $id = Auth::User()->id;
    $h = '0 Hours';
    $m = '0 Minutes';
    $result = User::where('id',$id)->first();
    if(!empty($result->countryId))
    {
      $country = Country::where('id',$result->countryId)->first();
      if($country)
      {
        $result->country = $country->name;
        $timezone = str_replace("GMT","",$country->timezone);
      }
    }
    else
    {
     $timezone = '0';
    }
    if(!empty($timezone))
    {
     $zone = explode(":",$timezone);
     if(!empty($zone))
     {
      if(!empty($zone[0]))
      {
      $h = $zone[0].' Hours';
      }
      if(!empty($zone[1]))
      {
      $m = $zone[1].' Minutes';
      }
     $timezone = $h.' '.$m;
     }
    }

    $image = CommonHelper::getImage($request->userId);
    if($image)
    {
      $img = url("profiles/".$image->image);
    }
    else
    {
      $img = url("front/images/_D.jpg");
    }

    // if($timezone)
    // {
      $this->response['success'] ="true";
      $this->response['time'] = date('h:i A',strtotime($timezone, strtotime(Date("h:i")))).','.date('d M, Y');
      $this->response['image'] = $img;
    // }
    // else
    // {
    //   $this->response['success'] ="false";
    // }
    return response($this->response);
  }


  public function CreateChatRoom(Request $request)
  {
    try{
         $validator = Validator::make($request->all(),[
               'userId' => 'required|string',
               'id' => 'required|string',
               'type' => 'required|string',
           ]);

          if ($validator->fails())
          {

            $errors = $validator->errors();
            $output['validation']     = false;
            $output['errors']      = $errors;
          }
          else
         {
           $id = Auth::User()->id;

             $date = date("Y-m-d H:i:s", strtotime($request->date));
             $roomdata = new MessageRoom();
             if($id > $request->userId)
             {
              $room = $id.'_'.$request->userId;
             }
             else
             {
              $room = $request->userId.'_'.$id;
             }
             $roomdata->driverId = $id;
             $roomdata->customerId = $request->userId;
             if($request->type == 1)
             {
             $roomdata->postId = $request->id ;
             $a = "A".$request->id;
             }
             else
             {
               $roomdata->post_requestId = $request->id;
               $a = "B".$request->id;
             }
             $roomId = $a.'_'.$room;
             $roomdata->roomId = $roomId;

            $roomdata->last_message_at = date('Y-m-d H:i:s');
            $check = MessageRoom::where('roomId',$roomId)->first();
            if(!$check)
            {
            $result = $roomdata->save();

            if($result)
             {
                 $this->response['success'] ="true";
                 $this->response['url'] = url('chat');
             }
             else
             {
               MessageRoom::where('roomId',$roomId)->update(array('last_message_at'=>date('Y-m-d H:i:s')));
               $this->response['formErrors'] ="true";
               $this->response['url'] = url('chat');

             }
           }
           else
           {
             MessageRoom::where('roomId',$roomId)->update(array('last_message_at'=>date('Y-m-d H:i:s')));
             $this->response['success'] ="true";
             $this->response['url'] = url('chat');
           }
             return response($this->response);
         }
      }
     catch(\Exception $e)
     {
      $this->response['message'] = $e->getMessage();
      $this->response['formErrors'] = "true";
      return response($this->response);
     }
  }

  public function readmessage(Request $request)
  {
    try{
         $validator = Validator::make($request->all(),[
               'roomId' => 'required|string',
               'receiver' => 'required|string',
           ]);

          if ($validator->fails())
          {

            $errors = $validator->errors();
            $output['validation']     = false;
            $output['errors']      = $errors;
          }
        else
        {
        $update = Message::where(array('roomId'=>$request->roomId,"userId"=>$request->receiver))->update(array("is_read"=>1));
        if($update)
         {
             $this->response['success'] ="true";
         }
         else
         {
           $this->response['formErrors'] ="true";

         }
       }
         return response($this->response);
     }
    catch(\Exception $e)
   {
     $this->response['message'] = $e->getMessage();
     $this->response['formErrors'] = "true";
     return response($this->response);
    }
  }

}
