<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\PostModel;
use App\Models\MemberModel;
use App\Models\GroupModel;
use App\Models\PersonModel;
use App\Models\AddressModel;
use Validator;

class MainController extends Controller
{
    function data($id,$id1){
        return view('data',['firstkey'=>$id,'secondkey'=>$id1]);
     // return 'ID1 :'.$id. '<br> ID2:'.$id1;
    
  
    }

    function setting ($id,$id1){
        return view('setting',['firstkey'=>$id,'secondkey'=>$id1]);
      //  return 'ID1 :'.$id. '<br> ID2:'.$id1;
    }

     // Get data from DB
    function index(){
       return DB::select('select * from post');
     
    }

    
     // Get data from DB Using Model
    function getDataDB(){
      return PostModel::all();
     
    }
     // Insert data into DB
      function postData(Request $request){
      $post = new PostModel;
      $post->type = $request->type;
      $post->name = $request->name;
      $post->description = $request->description;
      $statusResult = $post->save();

      if($statusResult){
        return "your data has been saved";
      }
      else{
        return "your data has not been saved";
      }

  }
      

    // QueryBuilder (get,update,insert,delete data from DB without Model)
    function getQueryBuilder(Request $request){
      return DB::table('post');
    //  ->count();
    //  ->where('id',5)->first();
    //  ->delete();
    //  ->get();
    //   ->update(
    //     [
    //       "type"=>'vlog',
    //        "name"=>'travel',
    //        "description"=>'vacation'
    //     ]
    //   );
    //   ->insert(
    //   [
    //     'type' => $request->type,
    //     'name' => $request-> name,
    //      'description' => $request-> description

    //     ]
    //   );
    }

     // upload image in DB
      function uploadImage(Request $request){
       $post = new PostModel;
       $post->type = $request->type;
       $post->name = $request->name;
      
        if($request->hasFile('description')) {
         $file = $request->file('description');
         $extension = $file->extension();
         $filename = time().".".$extension;
         $path = $file->move(public_path('upload/'),$filename);
         $post->description = $path;
         $statusResult = $post->save();

         if($statusResult){
         // return "your data has been saved";
         return([
           'result'=> "your data has been saved"
         ]);
        }
        else{
          return "your data has not been save";
        }
      }

      } 

      // Validation check for api

      function validationCheck(Request $request){

        $rules = array(
            "type" => "required",
            "name" => "required",
            "description" => "required"
        );

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) {
         //  return $validator->errors();
         return response()->json($validator->errors(),401);
        }

        else{
          return "all field valid";
        }

      }

      // Nested Json Response
       function getNestedJson(){
      //  $res = MemberModel::with('groupInfo:group_id,name,description')->get();
      //    return $res;
      //   return $res->select(['id','member_name','group_id'])->get();
    
          // For proper Nested Result
       $res = PersonModel::with('address:person_id,id,address_name')->get();
       return $res;

      }
          // SearchOption
      function searchName(Request $request){

               //OneWay 
        //  $query = $request->name;
        //  $result = DB::table('persons')
        //                 ->where('name','like',"%$query%")->get();
        //           return $result;


              //Otherway for Search
                  $query = $request->name;
               //   $result = PersonModel::where('name','like',"%$query%")->get();
                   //show particular column or items
                  $result = PersonModel::select('person_id','name')
                              ->where('name','like',"%$query%")->get();
                           return $result;      
      }
    }

