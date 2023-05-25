<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Shop_account;




class AdminController extends Controller
{
    public function adminIndex()
    {
        return view('management');
    }

    public function adminPost()
    {
        $post = new Post; 

        $all = $post->all()->toArray();

        return view('manage_post',[
            'posts'=>$all,
        ]);
        
    }

    public function adminGeneral()
    {
        $general = new User; 

        $all = $general->all();

        return view('manage_general',[
            'generals'=>$all,
        ]);
        
    }

    public function adminShop()
    {
        $shop = new Shop_account; 

        $all = Shop_account::orderBy('bad_count', 'desc')->get();

        return view('manage_shop',[
            'shops'=>$all,
        ]);
    }
}
