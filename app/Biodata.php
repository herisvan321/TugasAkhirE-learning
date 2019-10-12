<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
	protected $primaryKey = 'noinduk';
   protected $fillable = ['id','namadepan','namabelakang','email','jenkel','tempat','tgl_lahir','nohp','alamat'];
}
