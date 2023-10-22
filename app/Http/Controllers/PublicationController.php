<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $publications = Publication::All();

        return view('welcome', ['publications' => $publications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create-publication');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $publication = new Publication();

        $requestmedia = $request->media;
        $description = $request->description;

        if (empty($requestmedia) && empty($description)) {
            return redirect()->back()->withErrors(['error' => 'Você deve fornecer pelo menos uma mídia ou descrição.']);
        } else {

            if ($request->hasFile('media') && $request->file('media')->isValid()) {

                $extension = $requestmedia->extension();

                $mediaName = sha1($requestmedia->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $requestmedia->move(public_path('img/events/publications'), $mediaName);

                $publication->media = $mediaName;
            }

            $publication->description = $description;  // Ajustado aqui

            $user = auth()->user();
            $publication->user_id = $user->id;

            $publication->save();

            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        if (Auth::id() !== $publication->user_id) {
            return redirect()->back()->withErrors(['error' => 'Você não tem permissão para apagar esta publicação.']);
        } else {
            $publication->delete();

            return redirect('/');
        }
    }

    public function composePublications(View $view)
    {
        $publications = Publication::all();
        $view->with('publications', $publications);
    }
}
