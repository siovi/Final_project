<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Http\Requests;
use App\Profile;
use Auth;

class ProfileController extends Controller
{
    public function profile(){
		return view('profiles.profile',array('user' =>Auth::user ()));
	}

	public function addProfile(Request $request){

		//server validation
		$this->validate($request, [
			'name'=>'required',
			'designation'=>'required',
			'profile_pic'=>'required'

		]);


		//code to post data in the Post Model

		$profiles = new Profile;
		$profiles->name=$request->input('name');
		$profiles->user_id=Auth::user()->id;
		$profiles->designation=$request->input('designation');

		/**$this->validate ($request, [
			'category'=> 'required']);
		$category= new Category;
		$category ->category= $request->input('category');
		$category->save()	;
		return redirect('/category')-> with ('response', 'Category Added Successifully');**/


		if(input::hasFile('profile_pic')) {
			$file = Input::file('profile_pic');
			$file->move(public_path(). '/uploads/' ,
			 $file-> getClientOriginalName());
			$url=URL:: to("/"). '/uploads/' .
			 $file-> getClientOriginalName();
				
		}

		$profiles->profile_pic=$url;
		$profiles->save();
		return redirect('/profile')-> with ('response', 'Profile Added Successifully');
	}
}

