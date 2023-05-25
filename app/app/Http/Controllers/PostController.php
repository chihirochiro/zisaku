<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\Comment;
use App\Http\Requests\PostDate;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 自分の投稿内容の表示
        $post = new Post; 

        $all = $post->all()->toArray();

        return view('general',[
            'posts'=>$all,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->del_flg == 0){
            return view('new_posts');
        }else{
            return redirect('mypage');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostDate $request)
    {
        // 新規投稿内容のDB保存
        $post = new Post;       

        $post->title = $request->title;
        $post->worries = $request->worries;
        $post->budget = $request->budget;
        $post->station = $request->station;
        $post->other = $request->other;
        $post->user_id = Auth::id();

        $post->save();
        return redirect('mypage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $shop = Comment::where('post_id',$id)->where('user_id',Auth::id())->get();
        // $user = Comment::where('post_id',$id)->where('user_id','!=',Auth::id())->get();
        $comments = Comment::where('post_id',$id)->get();
        $role = Auth::user()->role;

        $like_model = new Like;
        $details=Post::withCount('likes')->where('id',$id)->first();

        return view('posts_detail',compact('comments','details','like_model','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('post_edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);     

        $post->title = $request->title;
        $post->worries = $request->worries;
        $post->budget = $request->budget;
        $post->station = $request->station;
        $post->other = $request->other;
        $post->user_id = Auth::id();

        $post->save();
        return redirect('mypage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
 
        $post->delete();
        return redirect('mypage')->with('flash_message', '投稿を削除しました');
    }

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $like = new Like;
        $post = Post::findOrFail($post_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }

    public function serch(Request $request){
        $users = Post::paginate(20);
        $search=$request->input('search');
        $query = Post::query();
        if ($search) {
        $spaceConversion = mb_convert_kana($search, 's');
        $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
        foreach($wordArraySearched as $value) {
        $query->where('title', 'like', '%'.$value.'%')->orWhere('worries', 'like', '%'.$value.'%');
        }

        $users = $query->paginate(20);

        return view('home',[
            'posts'=>$users
        ]);

        }
    }
}
