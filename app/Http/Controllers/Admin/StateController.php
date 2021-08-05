<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\States;
use App\Model\Country;
use Illuminate\Http\Request;
use App\Helpers\GlobalFunctions as CommonHelper;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\URL;
use Validator;
use Illuminate\Support\Facades\Crypt;



class StateController extends Controller
{
    //

    public function index(Request $request,$id)
    {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = States::query();
        $country = Country::where('id',$id)->first();


        if($request->ajax()){
            $query = States::query();
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



            $users = $query->where('country_id',$request->id)->orderby('id','DESC')->paginate($perpage);

            $html =  view('admin.state.stateajax',['prefix'=>$this->prefix,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else
        {
           $users = $query->where('country_id',$id)->orderby('id','DESC')->paginate($perpage);


          return view('admin.state.state',['prefix'=>$this->prefix,'country'=>$country,'id'=>$id,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
         }
    }

    public function add($id)
  {
    $this->prefix = request()->route()->getPrefix();
      $country = Country::where('id',$id)->first();
    return view('admin.state.add',['prefix'=>$this->prefix,'country'=>$country]);
  }

  public function save(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'name' => 'required|string',
          'country_id' => 'required|string',
           'timezone' => 'required|string',
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

       $user = new States([
           'name' => $request->name,
           'country_id' => $request->country_id,
           'timezone' => $request->timezone,

       ]);

      $res =  $user->save();


     if($res)
     {
       $response['success']         = true;
       $response['delayTime']       = '3000';
       $response['success_message'] = 'State Added Successfully.';
       $response['url'] = url($this->prefix.'/state/'.$request->country_id);
       $response['resetform'] ='true';
       return response($response);
     }
     else
     {
       $response['formErrors'] = true;
       $response['delayTime']     = '3000';
       $response['errors'] = 'State Not Added.';
       return response($response);
     }
   }

  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'name' => 'required|string',
          'country_id' => 'required|string',
          'timezone' => 'required|string',
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
       $data1['timezone'] = $request['timezone'];

       $res = States::where('id',$id)->update($data1);
        if($res)
        {
           $response['success']         = true;
           $response['delayTime']       = '3000';
           $response['success_message'] = 'State Updated Successfully.';
           $response['url'] = url($this->prefix.'/state/'.$request['country_id']);

           return response($response);
         }
         else
         {
           $response['formErrors'] = true;
           $response['delayTime']     = '3000';
           $response['errors'] = 'State Not Update.';
           return response($response);
         }
     }

  }

  public function edit($id)
   {
     $id = Crypt::decrypt($id);
     $this->prefix = request()->route()->getPrefix();

     $result = States::where(array("id"=>$id))->first();
     return view('admin.state.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }




    public function delete(Request $request)
    {

      $res = States::destroy($request['id']);


      if($res)
      {
        $response['success']         = true;
        $response['delayTime']       = '2000';
        $response['success_message'] = 'State Deleted successfully.';

        return response($response);
      }
      else
      {
        $response['formErrors'] = true;
        $response['delayTime']     = '2000';
        $response['errors'] = 'State Not Deleted.';
        return response($response);
    }
  }









}
