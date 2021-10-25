<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user=User::find(auth()->id());
        $videos=$user->videoInHistory()->get();
        $title='Watch History';

        return view('history.history-index',compact('videos','title'));
    }

    public function destroy($id){
        auth()->user()->videoInHistory()->wherePivot('id',$id)->detach();

        return back()->with('success','The video was deleted successfully from watch history');
    }

    public function destroyAll(){
        auth()->user()->videoInHistory()->detach();

        return back()->with('success','The watch history videos was deleted successfully');
    }
}
