<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\NewsModel;

class NewsController extends Controller
{
    //

 //__________________Create__________________________________

    function create(Request $req)
    {
        $validator = Validator::make($req->all(),[
            "title"=>"required",
            "description"=>"required",
            "type"=>"required",
            "date"=>"required"
        ],[
           
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $news = new NewsModel();
        $news->title = $req->title;
        $news->description= $req->description;
        $news->type = $req->type;
        $news->date = $req->date;
        $news->save();
        return response()->json(["msg"=>"News Added Successfully","data"=>$news]);
    }


//_______________________Show_____________________________________

    function show()
    {
        $news=NewsModel::all();
        return response()->json($news);
    }

    //_____________________Show By ID__________________________

    // function showById(Request $req)
    // {
    //     //$news=NewsModel::find($id);
    //     $news=NewsModel::where('id',$req->id)->first();
    //     return response()->json($news);
    // }


     function showById($id)
    {
        $news=NewsModel::find($id);
        //$news=NewsModel::where('id',$req->id)->first();
        return response()->json($news);
    }
//______________________Update______________________________

    function update(Request $req,$id)
    {
        $validator = Validator::make($req->all(),[
            "title"=>"required",
            "description"=>"required",
            "type"=>"required",
            "date"=>"required"
        ],[
           
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }


        $news = NewsModel::find($id);

        if($news)
        {
            $news->title = $req->title;
            $news->description= $req->description;
            $news->type = $req->type;
            $news->date = $req->date;
            //$news->save();
            $news->update();
            return response()->json(["msg"=>"News Updated Successfully","data"=>$news]);
        }
        else
        {
            return response()->json(["msg"=>"News Not Found"]);
        }
       
    }

//______________________Delete________________________________

    function delete($id)
    {
        $news=NewsModel::find($id);
        if($news)
        {
            $news->delete();
            return response()->json(["msg"=>"News Deleted Successfully","data"=>$news]);

        }
        else
        {
            return response()->json(["msg"=>"News Not Found"]);
        }
    }

    //_____________________Get News By Type_____________________________

    function showByType(Request $req)
    {
        //$news=NewsModel::find($type);
        $news=NewsModel::where('type',$req->type)->get();
        return response()->json($news);
    }

    //_______________________Get News By Date______________________________

    function showByDate(Request $req)
    {
        //$news=NewsModel::find($type);
        $news=NewsModel::where('date',$req->date)->get();
        return response()->json($news);
    }


    //_____________________Get News By Type And Date_______________________
    
    function showByTypeAndDate(Request $req)
    {
        //$news=NewsModel::find($type);
        $news=NewsModel::where('type',$req->type)->where('date',$req->date)->get();
        return response()->json($news);
    }
   
}
