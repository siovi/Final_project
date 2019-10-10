<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;
use App\User;
use App\Post;
use Auth;

class HomeController extends Controller
{

    


   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $employee = DB::table('employees')
                    ->join('genders', 'genders.id', '=', 'employees.gender_id')
                    ->join('positions', 'positions.id', '=', 'employees.position_id')
                    ->get();

                    $gender = DB::table('genders')
                    ->get();

        $position = DB::table('positions')
                    ->get();

        return view('home', ['employees' => $employee , 'genders' => $gender , 'positions' => $position]);

         $user_id=Auth::user()->id;
      $profile=Profile::find($user_id);
*/
        $user_id= Auth::user()->id;
        $profile=Profile::find($user_id);
                 /*->join('profiles', 'users.id', '=', 'profiles.user_id')
                 ->select('users.*', 'profiles.*')
                 ->where(['profiles.user_id' =>$user_id])
                ->get();*/

        $posts = Post::paginate(2);       
        return view('home', ['profile' => $profile, 'posts'=> $posts]);

    }
}
