<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
//   Note:: (user_id) is a foreign-key| যদি ট্যাবল এর নামের সাথে এই ফরেন কি এর নাম মিল রেখে,, রাখা হয় তাহলে এখানে এই ফরেন কি (user_id) পাস না করলেও অটোমেটিক পেয়ে যাবে।। সমস্যা হবে না।।
