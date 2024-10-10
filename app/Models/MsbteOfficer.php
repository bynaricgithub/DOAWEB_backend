<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsbteOfficer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'msbte_officers';

    public static $fields = ['id', 'name', 'post', 'img_path', 'phone', 'email', 'status', 'created_at', 'updated_at'];

    public static function getFields()
    {
        return MsbteOfficer::$fields;
    }
}
