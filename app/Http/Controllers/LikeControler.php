<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeControler extends Controller
{
    //


     public function postLikePost(Request $request)
    {
        
        $is_like = $request['isLike'] === 'true';
        $update = false;
        
        $user = Auth::user();
        $like = $user->likes();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
       
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

}
