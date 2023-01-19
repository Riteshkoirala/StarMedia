<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $notes = Note::Where('user_id', Auth::id())->latest('updated_at')->paginate(5);
        // $notes = Auth::user()->notes()->latest('updated_at')->paginate(5);
        $notes = Note::latest('updated_at')->paginate(5);
        return view('home.index')->with('notes', $notes);

    }
}
