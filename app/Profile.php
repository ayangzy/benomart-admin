<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = ['name', 'phone', 'address', 'accountname', 'accountno', 'bankname', 'paystackref', 'user_id', 'slug', 'image'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}