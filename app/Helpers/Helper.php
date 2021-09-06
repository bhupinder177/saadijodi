<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Crypt;
use DOMDocument;
use DB;
use Mail;
use Session;
use Redirect;
use App\Estimation;
use PDF;
use App\Model\Notification;
use App\Model\Message;
use App\Model\MessageRoom;
use App\Model\UserImages;


class GlobalFunctions {

    //Generates 12 characters unique code string
    public static function generateRef()
    {
        $lengths = 12;
        return $randomStrings = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengths);
    }

    public static function cryptdata($data)
    {
      return $res = Crypt::encryptString($data);
    }

    //function to send mail
    public static function sendmail($from,$fromname,$to,$toname,$subject,$data,$mailview,$cc=null,$attachment=null)
        {

            $response = Mail::send($mailview, $data, function($message) use ($from,$fromname,$to,$toname,$subject,$attachment,$cc)
            {
                $message->from($from,$fromname);
                $message->to($to,$toname);
                if($cc)
                {
                    $message->cc($cc);
                }
                $message->bcc('ben@greenleafairquotes.com');
                $message->subject($subject);
              if($attachment != '')
                $message->attach($attachment);
            });
            if(Mail::failures())
            {
                $response = 0;
            }
            else
          {
              $response = 1;
            }
                return $response;
      }

      public static function sendNotification($token,$msgtext)
      {

          $from = "AAAAZYLjqZc:APA91bHp2DW1fzQjc7lr4iliyVPao5S6HGj2bWupQ0LzJwvWCdgDhfTdOc2BnO4N2prCmOhOZu44d1ximWStLeJOtzUEyoFaPQO9F5yy_2oNHs-lwXx6WhYI1NQ-3trYivCGUIwk6qwn";
          $msg = array
                (
                  'body'  =>$msgtext,
                  'title' => "Hi, From My Cab Share",
                  'receiver' => 'erw',
                  'icon'  => "http://carpool.1wayit.com/front/img/logo.png",/*Default Icon*/
                  'sound' => 'mySound'/*Default sound*/
                );

          $fields = array
                  (
                      'to' => $token,
                      'notification'  => $msg
                  );

          $headers = array
                  (
                      'Authorization: key=' . $from,
                      'Content-Type: application/json'
                  );
          //#Send Reponse To FireBase Server
          $ch = curl_init();
          curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
          curl_setopt( $ch,CURLOPT_POST, true );
          curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
          curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
          curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
          curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
          $result = curl_exec($ch );
          // echo $response1 = 1;
          curl_close( $ch );
      }



      public static function unreadmessage($id,$roomId)
      {
        return $unread = Message::where(array('roomId'=>$roomId,'userId'=>$id,"is_read"=>0))->count();
      }


    public static function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
          $output = NULL;
          if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
              $ip = $_SERVER["REMOTE_ADDR"];
              if ($deep_detect) {
                  if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                  if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                      $ip = $_SERVER['HTTP_CLIENT_IP'];
              }
          }
          $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
          $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
          $continents = array(
              "AF" => "Africa",
              "AN" => "Antarctica",
              "AS" => "Asia",
              "EU" => "Europe",
              "OC" => "Australia (Oceania)",
              "NA" => "North America",
              "SA" => "South America"
          );
          if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
              $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
              if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                  switch ($purpose) {
                      case "location":
                          $output = array(
                              "city"           => @$ipdat->geoplugin_city,
                              "state"          => @$ipdat->geoplugin_regionName,
                              "country"        => @$ipdat->geoplugin_countryName,
                              "country_code"   => @$ipdat->geoplugin_countryCode,
                              "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                              "continent_code" => @$ipdat->geoplugin_continentCode
                          );
                          break;
                      case "address":
                          $address = array($ipdat->geoplugin_countryName);
                          if (@strlen($ipdat->geoplugin_regionName) >= 1)
                              $address[] = $ipdat->geoplugin_regionName;
                          if (@strlen($ipdat->geoplugin_city) >= 1)
                              $address[] = $ipdat->geoplugin_city;
                          $output = implode(", ", array_reverse($address));
                          break;
                      case "city":
                          $output = @$ipdat->geoplugin_city;
                          break;
                      case "state":
                          $output = @$ipdat->geoplugin_regionName;
                          break;
                      case "region":
                          $output = @$ipdat->geoplugin_regionName;
                          break;
                      case "country":
                          $output = @$ipdat->geoplugin_countryName;
                          break;
                      case "countrycode":
                          $output = @$ipdat->geoplugin_countryCode;
                          break;
                  }
              }
          }
          return  $output;
      }

      public static function getip()
      {
          if (isset($_SERVER['HTTP_CLIENT_IP']))
          {
          $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
          }

          if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
          {
          $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
          }
          else
          {
          $real_ip_adress = $_SERVER['REMOTE_ADDR'];
          }
          return $real_ip_adress;
      }

      public static function getreview($id,$userId)
      {
          return $userrating = Review::where(array("bookingId"=>$id,"reviewBy"=>$userId))->first();
      }

      public static function getImage($userId)
      {

          return $userimage = UserImages::where(array("userId"=>$userId,"isProfile"=>1))->first();
      }

      public static function getnotificationInvite($userId,$to)
      {
        return $notification = Notification::where(array("notificationFrom"=>$userId,"notificationTo"=>$to))->first();
      }

      public static function getnotificationCount($userId)
      {
        return $count = Notification::where(array('notificationTo'=>$userId,"read"=>0))->count();

      }

      public static function allrooms($userId)
      {
        return $rooms = MessageRoom::with('user','oppositeUser','user.online','oppositeUser.online')->where('userId',$userId)->orwhere('oppositeUserId',$userId)->orderby('last_message_at','desc')->get();
      }

      public static function unreadmessageHeader($id)
      {
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

      }













}
