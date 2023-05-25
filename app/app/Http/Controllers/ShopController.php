<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop_account;
use Illuminate\Support\Facades\Auth;
use App\Reserve;
use App\Http\Requests\ShopDate;





class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $reserve=Reserve::where('shop_account_id',Auth::id())->get();

        $all=Shop_account::where('user_id',Auth::id())->first();

        // dd($all);
        return view('shop_page',[
            'shop'=>$all,
            'reserve'=>$reserve,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop=Shop_account::find($id);
        return view('shop_edit',[
            'shop'=>$shop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopDate $request, $id)
    {
        $image = request()->file('image');
        if(request()->file('image')!==NULL){

            request()->file('image')->storeAs('', $image, 'public');
        }
        
        $shop=Shop_account::where('user_id',Auth::id())->first();
        if(!$shop){
            $shop=new Shop_account;
        }
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->tel = $request->tel;
        $shop->pr = $request->pr;
        $shop->image = $image;
        $shop->bad_count = 0;
        $shop->user_id = Auth::id();
        


        $shop->save();
        return redirect('shop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop_account::find($id);
 
        $shop->delete();
        return redirect('shop_page');
    }

    public function bad_count($id)
    {
        $count = Shop_account::where('user_id',$id)->first();
        $count->bad_count+=1;

        $count->save();

        return redirect('comment')->with('flash_message', '違反報告しました');

    }


}
