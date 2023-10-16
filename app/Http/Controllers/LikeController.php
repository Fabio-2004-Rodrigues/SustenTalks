<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likePublication($publicationId)
    {
        $like = new Like();
        $like->user_id = Auth::id();
        $like->publication_id = $publicationId;
        $like->save();

        return redirect()->back();
    }

    public function unlikePublication($publicationId)
    {
        $like = Like::where('user_id', Auth::id())
            ->where('publication_id', $publicationId)
            ->first();

        if ($like) {
            $like->delete();
        }

        return redirect()->back();
    }
}
