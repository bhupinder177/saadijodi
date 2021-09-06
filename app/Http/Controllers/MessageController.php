<?php
namespace App\Http\Controllers;
use App\Model\User;
use App\Model\Message;
use App\Model\Country;
use App\Model\Notification;
use App\Model\MessageRoom;
use App\Model\UserLocations;
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
    $result = UserLocations::with('statedetail')->where('userId',$id)->first();
    $offset = '';


    if(!empty($result->statedetail))
    {
      if(!empty($result->statedetail->timezone))
      {
        $timezoneArray = explode(" ",$result->statedetail->timezone);
        if(!empty($timezoneArray))
        {
          $timezone = $timezoneArray[1];
        }
      }
      else
      {
        $timezone ='0';
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
    $rooms = MessageRoom::with('user','oppositeUser','user.online','oppositeUser.online')->where('userId',$id)->orwhere('oppositeUserId',$id)->orderby('last_message_at','desc')->get();
    if(count($rooms) > 0)
    {
    $messages = Message::where('roomid',$rooms[0]->roomId)->orderBy('id','desc')->limit(10)->get();
    $up = Message::where('roomId',$rooms[0]->roomId)->update(array('is_read'=>1));

    $messages =  $messages->reverse();
    if(count($messages) > 0)
    {
      $count = count($messages);
      $count = $count - 1;
      $offset = $messages[$count]->id;
    }

    }
    $title = "Messages";

    return view('front.chat.chat',['title'=>$title,'rooms'=>$rooms,'offset'=>$offset,'messages'=>$messages,'timezone'=>$timezone]);
  }

  public function chatHistory(Request $request)
  {
    $id = Auth::User()->id;
    $h = '0 Hours';
    $m = '0 Minutes';

    $post = array();
    $requestdata = array();
    $result = UserLocations::with('statedetail')->where('userId',$id)->first();

    if(!empty($result->statedetail))
    {
      if(!empty($result->statedetail->timezone))
      {
        $timezoneArray = explode(" ",$result->statedetail->timezone);
        if(!empty($timezoneArray))
        {
          $timezone = $timezoneArray[1];
        }
      }
      else
      {
        $timezone ='0';
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

    $messages = Message::where('roomId', $request->data_room)->orderBy('id','desc')->limit(10)->get();
    $messages =  $messages->reverse();
    $update = Message::where(array('roomId'=>$request->data_room,"userId"=>$request->sender))->update(array("is_read"=>1));
    $user = User::where('id',$request->sender)->first();
    $room = MessageRoom::where('roomId',$request->data_room)->first();
    $image = CommonHelper::getImage($request->sender);

    if(!empty($image))
    {
      $img = url("profiles/".$image->image);
    }
    else
    {
      $img = url("front/images/_D.jpg");
    }

    $roomId = $request->data_room;
    $offset = 10;

    $rooms = MessageRoom::where('userId',$id)->orwhere('oppositeUserId',$id)->get();
    $array = [];

    if(count($rooms) > 0)
    {
      foreach($rooms as $r)
      {
        if($r->userId != $id)
        {
          $array[] = $r->userId;
        }
        if($r->oppositeUserId != $id)
        {
          $array[] = $r->oppositeUserId;
        }
      }
    }
   $allunread = Message::whereIn('userId',$array)->where('is_read',0)->count();

    $returnHTML = view('front.chat.chat-thread', compact('messages','user','roomId','offset','timezone','allunread'))->render();
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
           $result = UserLocations::with('statedetail')->where('userId',$id)->first();

           if(!empty($result->statedetail))
           {
             if(!empty($result->statedetail->timezone))
             {
               $timezoneArray = explode(" ",$result->statedetail->timezone);
               if(!empty($timezoneArray))
               {
                 $timezone = $timezoneArray[1];
               }
             }
             else
             {
               $timezone ='0';
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
                 $this->response['time'] = date('h:i A',strtotime($timezone, strtotime(Date("h:i A")))).','.date('d M, Y');
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
    $result = UserLocations::with('statedetail')->where('userId',$id)->first();

    if(!empty($result->statedetail))
    {
      if(!empty($result->statedetail->timezone))
      {
        $timezoneArray = explode(" ",$result->statedetail->timezone);
        if(!empty($timezoneArray))
        {
          $timezone = $timezoneArray[1];
        }
      }
      else
      {
        $timezone ='0';
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

    $messages = Message::where('roomId',$request->data_room)->where('id','<',$request->data_offset)->orderBy('id','desc')->limit(10)->get();
    if(count($messages) > 0)
    {
    $messages = $messages->reverse();
    $count = count($messages);
    $count = $count - 1;
    $offset = $messages[$count]->id;
    }

    $rooms = MessageRoom::where('userId',$id)->orwhere('oppositeUserId',$id)->get();
    $array = [];

    if(count($rooms) > 0)
    {
      foreach($rooms as $r)
      {
        if($r->userId != $id)
        {
          $array[] = $r->userId;
        }
        if($r->oppositeUserId != $id)
        {
          $array[] = $r->oppositeUserId;
        }
      }
    }
   $allunread = Message::whereIn('userId',$array)->where('is_read',0)->count();

    $returnHTML = view('front.chat.chat-oldhistory', compact('messages','timezone','offset','allunread'))->render();
   return new JsonResponse(['rhtml' => $returnHTML,'offset'=>$offset]);
  }

  public function gettime(Request $request)
  {
    $id = Auth::User()->id;
    $h = '0 Hours';
    $m = '0 Minutes';

    $result = UserLocations::with('statedetail')->where('userId',$id)->first();

    if(!empty($result->statedetail))
    {
      if(!empty($result->statedetail->timezone))
      {
        $timezoneArray = explode(" ",$result->statedetail->timezone);
        if(!empty($timezoneArray))
        {
          $timezone = $timezoneArray[1];
        }
      }
      else
      {
        $timezone ='0';
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
      $this->response['time'] = date('h:i A',strtotime($timezone, strtotime(Date("h:i A")))).','.date('d M, Y');
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
