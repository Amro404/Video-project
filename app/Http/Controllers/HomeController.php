<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FrontEnd\Messages\Store;
use Illuminate\Support\Facades\Hash;

use App\Models\Video;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\User;

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
            'commentUpdate', 'commentStore', 'profileUpdate'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::published()->orderBy("id", "DESC");

        if(request()->has("search") && request()->get("search") != "")
        {
            $videos = $videos->where("name", "like", "%" . request()->get("search") . "%");
        }

        $videos = $videos->paginate(30);

        return view('home', compact("videos"));
    }

    public function category($id)
    {
        $cat = Category::findOrFail($id);

        $videos = Video::published()->where("cat_id", $id)->orderBy("id", "DESC")->paginate(30);

        return view("front-end.category.index", compact("videos", "cat"));
    }

    public function skill($id)
    {
        $skill = Skill::findOrFail($id);

        $videos = Video::published()->whereHas("skills", function($query) use ($id) {

            $query->where("skill_id", $id);

        })->orderBy("id", "DESC")->paginate(30);

        return view("front-end.skill.index", compact("videos", "skill"));
    }

    public function video($id)
    {
       $video = Video::published()->findOrFail($id);

       return view("front-end.video.index", compact("video"));
    }

    public function tag($id)
    {
        $tag = Tag::findOrFail($id);

        $videos = Video::published()->whereHas("tags", function($query) use ($id) {

            $query->where("tag_id", $id);

        })->orderBy("id", "DESC")->paginate(30);

        return view("front-end.tag.index", compact("videos", "tag"));

    }

    public function commentStore(Request $request, $id)
    {

        $validatedDate = $request->validate([
            "comment" => "required|min:10|max:255"
        ]);

        $video = Video::published()->findOrFail($id);

        Comment::create($validatedDate + [            
            "video_id" => $video->id,
            "user_id" => auth()->user()->id
        ]);

        return redirect()->back();

    }

    public function commentUpdate(Request $request, $id)
    {
        $validatedDate = $request->validate([
            "comment" => "required|min:10|max:255"
        ]);
            
        $comment = Comment::findOrFail($id);

        if(auth()->user()->group == "admin" || auth()->user()->id == $comment->user_id) {

            $comment->update($validatedDate);
        }

        return redirect()->back();
    }

    public function messageStore(Store $request)
    {
        Message::create($request->all());
        return redirect()->back();
    }

    public function welcome()
    {
        $videos = Video::published()->orderBy("id", "DESC")->paginate(9);

        $videos_count = Video::published()->count();
        $comments_count = Comment::count();
        $tags_count = Tag::count();

        return view("welcome", compact("videos", "videos_count", "comments_count", "tags_count"));
    }

    public function page($id, $slug = null)
    {
        $page = Page::findOrFail($id);

        return view("front-end.page.index", compact("page"));

    }

    public function profile($id, $slug = null)
    {
        $user = User::findOrFail($id);

        return view("front-end.profile.index", compact("user"));
    }

    public function profileUpdate(\App\Http\Requests\FrontEnd\Users\Store $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $array = [];

        if($request->email != $user->email) {

            $email = User::where("email", $request->email)->first();

            if ($email == null) {
                 $array["email"] = $request->email;
            }

        }

        if($request->name != $user->name) {
            $array["name"] = $request->name;
        }

        if($request->password != "") {
            $array["password"] = Hash::make($request->password);
        }

        if (!empty($array)) {
            $user->update($array);
        }

        return redirect()->back();

    }
}
