<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Stories;
use Illuminate\Http\Request;
use App\Helpers\GlobalFunctions as CommonHelper;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\URL;
use Validator;
use Illuminate\Support\Facades\Crypt;



class StoriesController extends Controller
{
    //

    public function index(Request $request)
    {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Stories::query();


        if($request->ajax()){
            $query = Stories::query();
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



            $users = $query->orderby('id','DESC')->paginate($perpage);

            $html =  view('admin.stories.storiesajax',['prefix'=>$this->prefix,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else
        {
          $users = $query->orderby('id','DESC')->paginate($perpage);
          return view('admin.stories.stories',['prefix'=>$this->prefix,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
         }
    }

    public function add()
  {
    $this->prefix = request()->route()->getPrefix();
    return view('admin.stories.add',['prefix'=>$this->prefix]);
  }

  public function save(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'image' => 'required|mimes:jpeg,jpg,png',
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
       $image = '';
       if ($request->hasFile('image'))
       {
         $request->file('data_name');
         $imgRef     = 'stories-'.time();
         $files        = $request->file('image');
         $name         = $files->getClientOriginalName();
         $extension2    = $files->extension();
         $type         = explode('.',$name);
         $files->move(public_path().'/stories/', $imgRef.'.'.$extension2);
         $image = $imgRef.'.'.$extension2;

       }
       $user = new Stories([
           'description' => $request->description,
           'image'=>$image,

       ]);

      $res =  $user->save();


     if($res)
     {
       $response['success']         = true;
       $response['delayTime']       = '3000';
       $response['success_message'] = 'Story Added Successfully.';
       $response['url'] = url($this->prefix.'/stories');
       $response['resetform'] ='true';
       return response($response);
     }
     else
     {
       $response['formErrors'] = true;
       $response['delayTime']     = '3000';
       $response['errors'] = 'Story Not Added.';
       return response($response);
     }
   }

  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(),[
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
       if ($request->hasFile('image'))
       {
         $request->file('data_name');
         $imgRef     = 'stories-'.time();
         $files        = $request->file('image');
         $name         = $files->getClientOriginalName();
         $extension2    = $files->extension();
         $type         = explode('.',$name);
         $files->move(public_path().'/stories/', $imgRef.'.'.$extension2);
         $data['image'] = $imgRef.'.'.$extension2;

       }
       $id = Crypt::decrypt($request['id']);

       $data1['description'] = $request['description'];

       $res = Stories::where('id',$id)->update($data1);
        if($res)
        {
           $response['success']         = true;
           $response['delayTime']       = '3000';
           $response['success_message'] = 'Story Updated Successfully.';
           $response['url'] = url($this->prefix.'/stories');

           return response($response);
         }
         else
         {
           $response['formErrors'] = true;
           $response['delayTime']     = '3000';
           $response['errors'] = 'Story Not Update.';
           return response($response);
         }
     }

  }

  public function edit($id)
   {
     $id = Crypt::decrypt($id);
     $this->prefix = request()->route()->getPrefix();

     $result = Stories::where(array("id"=>$id))->first();
     return view('admin.stories.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }




    public function delete(Request $request)
    {

      $res = Stories::destroy($request['id']);


      if($res)
      {
        $response['success']         = true;
        $response['delayTime']       = '2000';
        $response['success_message'] = 'Country Deleted successfully.';

        return response($response);
      }
      else
      {
        $response['formErrors'] = true;
        $response['delayTime']     = '2000';
        $response['errors'] = 'Country Not Deleted.';
        return response($response);
    }
  }









}
