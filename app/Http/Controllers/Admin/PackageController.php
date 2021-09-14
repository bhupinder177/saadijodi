<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Package;
use Illuminate\Http\Request;
use App\Helpers\GlobalFunctions as CommonHelper;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\URL;
use Validator;
use Illuminate\Support\Facades\Crypt;



class PackageController extends Controller
{
    //

    public function index(Request $request)
    {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Package::query();


        if($request->ajax()){
            $query = Package::query();
            if(isset($request->peritem))
            {
              $perpage = $request->peritem;
            }

            if(!empty($request->search))
            {
              $search = $request->search;
              $query->where(function ($query)use($search)
              {
                  $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%');
              });
            }



            $users = $query->orderby('id','DESC')->paginate($perpage);

            $html =  view('admin.package.packageajax',['prefix'=>$this->prefix,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else
        {
           $users = $query->orderby('id','DESC')->paginate($perpage);


          return view('admin.package.package',['prefix'=>$this->prefix,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
         }
    }

    public function add()
  {
    $this->prefix = request()->route()->getPrefix();
    return view('admin.package.add',['prefix'=>$this->prefix]);
  }

  public function save(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'name' => 'required|string',
          'price' => 'required|string',
          'chat' => 'required|string',
          'connects' => 'required|string',
          'duration' => 'required|string',
          'phoneNumberDisplay' => 'required|string',
          'description' => 'required|string',
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

       $user = new Package([
           'name' => $request->name,
           'price' => $request->price,
           'chat' => $request->chat,
           'duration' => $request->duration,
           'connects' => $request->connects,
           'phoneNumberDisplay' => $request->phoneNumberDisplay,
           'description' => $request->description,

       ]);

      $res =  $user->save();


     if($res)
     {
       $response['success']         = true;
       $response['delayTime']       = '3000';
       $response['success_message'] = 'Package Added Successfully.';
       $response['url'] = url($this->prefix.'/packages');
       $response['resetform'] ='true';
       return response($response);
     }
     else
     {
       $response['formErrors'] = true;
       $response['delayTime']     = '3000';
       $response['errors'] = 'Package Not Added.';
       return response($response);
     }
   }

  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'name' => 'required|string',
          'price' => 'required|string',
          'chat' => 'required|string',
          'connects' => 'required|string',
          'duration'=> 'required|string',
          'phoneNumberDisplay' => 'required|string',
          'description' => 'required|string',
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
       $data1['price'] = $request['price'];
       $data1['description'] = $request['description'];
       $data1['chat'] = $request->chat;
       $data1['connects'] = $request->connects;
       $data1['duration'] = $request->duration;
       $data1['phoneNumberDisplay'] = $request->phoneNumberDisplay;

       $res = Package::where('id',$id)->update($data1);
        if($res)
        {
           $response['success']         = true;
           $response['delayTime']       = '3000';
           $response['success_message'] = 'Package Updated Successfully.';
           $response['url'] = url($this->prefix.'/packages');

           return response($response);
         }
         else
         {
           $response['formErrors'] = true;
           $response['delayTime']     = '3000';
           $response['errors'] = 'Package Not Update.';
           return response($response);
         }
     }

  }

  public function edit($id)
   {
     $id = Crypt::decrypt($id);
     $this->prefix = request()->route()->getPrefix();

     $result = Package::where(array("id"=>$id))->first();
     return view('admin.package.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }




    public function delete(Request $request)
    {

      $res = Package::destroy($request['id']);


      if($res)
      {
        $response['success']         = true;
        $response['delayTime']       = '2000';
        $response['success_message'] = 'Package Deleted successfully.';

        return response($response);
      }
      else
      {
        $response['formErrors'] = true;
        $response['delayTime']     = '2000';
        $response['errors'] = 'Package Not Deleted.';
        return response($response);
    }
  }









}
