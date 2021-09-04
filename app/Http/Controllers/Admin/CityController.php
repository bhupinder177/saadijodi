<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\States;
use App\Model\Cities;
use Illuminate\Http\Request;
use App\Helpers\GlobalFunctions as CommonHelper;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\URL;
// use Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;



class CityController extends Controller
{
    //

    public function index(Request $request)
    {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Cities::query();
        $state = States::where('id',$request->id)->first();


        if($request->ajax()){
            $query = Cities::query();
            if(isset($request->peritem))
            {
              $perpage = $request->peritem;
            }

            if(!empty($request->search))
            {
              $search = $request->search;
              $query->where(function ($query)use($search)
              {
                  $query->where('name', 'like', '%' . $search . '%');
              });
            }



            $users = $query->where('state_id',$request->id)->orderby('id','DESC')->paginate($perpage);

            $html =  view('admin.city.cityajax',['prefix'=>$this->prefix,'id'=>$request->id,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else
        {
           $users = $query->where('state_id',$request->id)->orderby('id','DESC')->paginate($perpage);


          return view('admin.city.city',['prefix'=>$this->prefix,'state'=>$state,'id'=>$request->id,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
         }
    }

    public function add($id)
  {
    $this->prefix = request()->route()->getPrefix();
      $country = States::where('id',$id)->first();
    return view('admin.city.add',['prefix'=>$this->prefix,'state'=>$country]);
  }

  public function save(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'name' => 'required|string',
          'state_id' => 'required|string',
        ]);

      if ($validator->fails())
      {
        $errors = $validator->errors();
       $response['validation']  = false;
       $response['errors']      = $errors;
       return response($response);
      }
      else
     {

       $this->prefix = request()->route()->getPrefix();
       $check = Cities::where('name', 'like', '%' . $request->name . '%')->where('state_id',$request->state_id)->first();
       if(empty($check))
       {
       $user = new Cities([
           'name' => $request->name,
           'state_id' => $request->state_id,

       ]);

      $res =  $user->save();


     if($res)
     {
       $response['success']         = true;
       $response['delayTime']       = '3000';
       $response['success_message'] = 'City Added Successfully.';
       $response['url'] = url($this->prefix.'/city?id='.$request->state_id);
       $response['resetform'] ='true';
       return response($response);
     }
      else
      {
       $response['formErrors'] = true;
       $response['delayTime']     = '3000';
       $response['errors'] = 'City Not Added.';
       return response($response);
       }
     }
     else
     {
        $response['formErrors'] = true;
        $response['delayTime']     = '3000';
        $response['errors'] = 'City already Exist.';
        return response($response);

     }
   }

  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'name' => 'required|string',
          'state_id' => 'required|string',
        ]);

      if ($validator->fails())
      {
        $errors = $validator->errors();
       $response['validation']     = false;
       $response['errors']      = $errors;
       return response($response);

      }
      else
     {
       $this->prefix = request()->route()->getPrefix();

       $id = Crypt::decrypt($request['id']);


       $data1['name'] = $request['name'];

       $res = Cities::where('id',$id)->update($data1);
        if($res)
        {
           $response['success']         = true;
           $response['delayTime']       = '3000';
           $response['success_message'] = 'City Updated Successfully.';
           $response['url'] = url($this->prefix.'/city?id='.$request['state_id']);

           return response($response);
         }
         else
         {
           $response['formErrors'] = true;
           $response['delayTime']     = '3000';
           $response['errors'] = 'city Not Update.';
           return response($response);
         }
     }

  }

  public function edit($id)
   {
     $id = Crypt::decrypt($id);
     $this->prefix = request()->route()->getPrefix();

     $result = Cities::where(array("id"=>$id))->first();
     return view('admin.city.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }




    public function delete(Request $request)
    {

      $res = Cities::destroy($request['id']);


      if($res)
      {
        $response['success']         = true;
        $response['delayTime']       = '2000';
        $response['success_message'] = 'City Deleted successfully.';

        return response($response);
      }
      else
      {
        $response['formErrors'] = true;
        $response['delayTime']     = '2000';
        $response['errors'] = 'City Not Deleted.';
        return response($response);
    }
  }









}
