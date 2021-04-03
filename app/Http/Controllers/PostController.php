<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index(){
        return Post::all();
    }

    public function store(Request $request)
    {
        try{
             $post = new Post();
             $post->title = $request->title;
             $post->body = $request->body;
             
             if($post->save()){
                return response()->json(['status'=>'sucess','message'=>'Post craeted sucessfully']);
             }

            }catch(Exception $e){
                return response()->json(['status'=>'error','message'=>$e->getMessage()]);
      
        }
        
         
            
         }
     
         public function update(Request $request, $id)
         {

            try{
                $post = Post::where('id',$id)->first();
                
                $post->title = $request->title;
                $post->body = $request->body;
               
                if($post->save()){
                   return response()->json(['status'=>'sucess','message'=>'Post updated sucessfully']);
                }
   
               }catch(Exception $e){
                   return response()->json(['status'=>'error','message'=>$e->getMessage()]);
         
           }

         }

         public function delete($id){
             $post= Post::where('id',$id)->delete();
             return response()->json(['status'=>'sucess','message'=>'Post deleted sucessfully']);


         }

}
