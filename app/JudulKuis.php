<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JudulKuis extends Model
{
	protected $primaryKey = 'id_kuis';
    protected $fillable = ['id_user','id_group','pertemuan','judul','waktu'];
}
