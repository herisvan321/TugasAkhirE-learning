<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
	protected $primaryKey = 'id_materi';
    protected $fillanble = ['judul','id_group','id_user','deskripsi','file','pertemuan'];
}
