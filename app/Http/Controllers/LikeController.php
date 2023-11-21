<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

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

    public function composeLikes(View $view)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $likedPublicationsIds = $user->likes->pluck('publication_id')->unique();
            $likedPublications = Publication::whereIn('id', $likedPublicationsIds)->get();

            $view->with('likedPublications', $likedPublications);
        } else {
            $view->with('likedPublications', collect());
        }
    }
}
