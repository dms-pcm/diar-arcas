<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Absensi extends Model
{
    use HasFactory, SoftDeletes, Userstamps;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user','id');
    }
}
