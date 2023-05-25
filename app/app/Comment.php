<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function shop_accounts()
    {
        return $this->belongsTo('App\Shop_account','user_id','user_id');
    }
}
