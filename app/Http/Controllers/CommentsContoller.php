<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use Carbon\Carbon;

class CommentsContoller extends Controller
{
    public function store_comment(Request $request){

        try{
            $comment = new Comments;
            $comment->comment_description=$request->comment_description;
            $comment->save();

            return response()->json([
                'message'=>'Comment added successfully',
                'comment'=>$comment,
                'status'=>200,
            ]) ;

        }catch (\Exception $e){

            return response()->json([
                'message'=>'Comment adding unsuccessful',
                'comment'=>$comment,
                'status'=>201,
                '4'=>$e,
            ]);
        }
    }

    public function show_comments(){
        
        $comments = Comments::all();
        return response()->json($comments);
    }
}
