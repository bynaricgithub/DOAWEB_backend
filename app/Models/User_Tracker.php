<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Tracker extends Model
{
    use HasFactory;
    protected $table="user_tracker";
    public static $fields = ['id','ip','count','created_at','updated_at'];
    protected $guarded = [];
    public static function getFields()
    {
        return User_Tracker::$fields;
    }
}
?>