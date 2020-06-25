<?php

namespace App\Http\Controllers;

use App\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{


    public function profile() {

		$user = Auth::user();
        return view('profile', compact('user'));
	}
	


    public function update_image(Request $request) {

      
    	if($request->hasFile('image')){


			$rules = [
				"image" => "mimes:jpeg,png,jpg",
			];
			$this->validate($request, $rules);

			if($rules) {

				$filename = $request->image->getClientOriginalName();

				if(auth()->user()->avatar) {
					Storage::delete('/public/images/'. auth()->user()->avatar);
				}
				
				$request->image->storeAs('images', $filename ,'public');

				auth()->user()->update(['avatar'=> $filename]);
			}

			


    	}

		// $notification = 'Su foto de perfil se ha actualizado correctamente.';
		// return redirect('/profile')->with(compact('notification'));
		return back();

	}



	public function update_profile(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            // 'rut' => 'nullable|digits:9',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:8|max:14'

        ];
        $this->validate($request, $rules);

        $user = Auth::user();

        $data = $request->only('name','email','phone','address');
      

        $user->fill($data);
        $user->save();


            $notification = 'Su informacion se ha actualizado correctamente.';
            return redirect('/profile')->with(compact('notification'));
    }
	


	
}
