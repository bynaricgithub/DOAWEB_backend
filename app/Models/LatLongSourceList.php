<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatLongSourceList extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'lat_long_source_list';
}
