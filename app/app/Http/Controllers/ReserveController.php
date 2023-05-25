<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;
use Illuminate\Support\Facades\Auth;



class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 自分の投稿内容の表示
        $reserve = new Reserve; 

        $all = $reserve->all()->toArray();

        return view('shop_page',[
            'reserve'=>$all,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reserve');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserve = new Reserve;       

        $reserve->name = $request->name;
        $reserve->date = $request->date;
        $reserve->tel = $request->tel;
        $reserve->others = $request->other;
        // 相手方（一般ユーザーのIDを登録）
        $reserve->user_id = 1;
        $reserve->shop_account_id = Auth::id();

        $reserve->save();
        return redirect('shop');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details=Reserve::where('id',$id)->first();

        return view('reserve_detail',compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserve=Reserve::find($id);
        return view('reserve_edit',compact('reserve'));
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
        $reserve=Reserve::find($id);     

        $reserve->name = $request->name;
        $reserve->date = $request->date;
        $reserve->tel = $request->tel;
        $reserve->other = $request->other;
        $reserve->user_id = Auth::id();

        $reserve->save();
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
        $reserve = Reserve::find($id);
 
        $reserve->delete();
        return redirect('shop')->with('flash_message', '投稿を削除しました');
    }
}
