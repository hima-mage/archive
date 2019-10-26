<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'profileUpdate'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::orderBy('id' , 'desc');
        if(request()->has('search') && request()->get('search') != ''){
            $videos = $videos->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $videos = $videos->paginate(30);
        return view('home' , compact('videos'));
    }

    public function category($id){
        $cat = Category::findOrFail($id);
        $videos = Video::where('cat_id' , $id)->orderBy('id' , 'desc')->paginate(30);
        return view('front-end.category.index' , compact('videos' , 'cat'));
    }

    public function video($id){
        $video = Video::with('cat' , 'user')->findOrFail($id);
        return view('front-end.video.index' , compact('video'));
    }

    public function welcome(){
        $videos = Video::orderBy('id' , 'desc')->paginate(9);
        $videos_count = Video::count();
        return view('welcome' , compact('videos' , 'videos_count'));
    }

    public function page($id , $slug = null){
        $page = Page::findOrFail($id);
        return view('front-end.page.index' , compact('page'));
    }

    public function profile($id , $slug = null){
        $user = User::findOrFail($id);
        return view('front-end.profile.index' , compact('user'));
    }

    public function profileUpdate(\App\Http\Requests\FrontEnd\Users\Store $request){
        $user = User::findOrFail(auth()->user()->id);
        $array = [];
        if($request->email != $user->email){
            $email = User::where('email' , $request->email)->first();
            if($email == null){
                $array['email'] =  $request->email;
            }
        }
        if($request->name != $user->name){
            $array['name'] =  $request->name;
        }
        if($request->password != ''){
            $array['password'] =  Hash::make($request->password);
        }
        if(!empty($array)){
            $user->update($array);
        }
        alert()->success('Your Profile Has Been Updated' , 'Done');
        return redirect()->route('front.profile' , ['id' => $user->id , 'slug' =>slug($user->name)]);
    }

}
