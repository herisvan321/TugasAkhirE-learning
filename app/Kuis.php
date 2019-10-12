<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $fillable = ['id_user','id_group','pertemuan','soal','bobot'];
}
