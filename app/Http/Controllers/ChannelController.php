<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function index(){
        $channels=User::all()->sortByDesc('created_at');
        $title='The latest videos';
        
        return view('channels',compact('channels','title'));
    }

    public function search(Request $request){
        $channels=User::where('name','LIKE',"%{$request->term}%")->paginate(12);
        $title= 'View search results for' . $request->term;

        return view('channels',compact('channels','title'));
    }

    public function adminIndex(){
        $users=User::all();

        return view('admin.channels.index',compact('users'));
    }

    public function adminUpdate(Request $request,User $user){
        $user->administration_level=$request->administration_level;

        $user->save();

        session()->flash('flash_message','Channels Permissions have Updated Successfully');

        return redirect()->route('channels.index');
    }   

    public function adminDelete(User $user){

        $user->delete();

        session()->flash('flash_message','The Channel has deleted successfully');

        return redirect()->route('channels.index');
    }

    public function adminBlock(User $user){
        $user->block=1;

        $user->save();

        session()->flash('flash_message','The Channel has blocked successfully');

        return redirect()->route('channels.index');
    }

    public function blockedChannels(){
        $channels=User::where('block','1')->get();

        return view('admin.channels.blocked-channels',compact('channels'));
    }

    public function openBlock(Request $request,User $user){
        $user->block = 0;
        $user->save();

        session()->flash('flash_message','The blocked channel was removed successfully');

        return redirect()->route('channels.blocked');
    }

    public function allChannels(){
        $channels=User::all()->sortByDesc('created_at');

        return view('admin.channels.all',compact('channels'));
    }
}
