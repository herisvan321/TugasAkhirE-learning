<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CekMahasiswa;
use App\CekDosen;
use App\Biodata;
use App\Foto;
use App\Reques;
use App\Berita;
use Session;

class LoginController extends Controller
{

    public function home()
    {
        $berita = Berita::orderBy('id','desc')->get();
        return view('default',compact('berita'));
    }
    public function login(Request $r)
    {
    	
    	//dd($credentials);
    	if($r->pilihan == 'dosen')
    	{
    		$credentials = ['id_user' => $r->get('id'),'password' => $r->get('password')];
    		if (auth()->guard('dosen')->attempt($credentials)) 
    		{
    			return redirect('/homedosen');
    		}
    		else{
    			return redirect('/auth');
    		}
    	}
    	elseif($r->pilihan == 'mahasiswa')
    	{
    		$credentials = ['id' => $r->get('id'),'password' => $r->get('password')];
    		if (auth()->guard('mahasiswa')->attempt($credentials)) 
    		{
    			return redirect('/homemahasiswa');
    		}
    		else{
    			return redirect('/auth');
    		}
    	}
    }

    public function register(Request $r)
    {
        $cekAkun = User::where('noinduk',$r->id)->first();
        if(count($cekAkun) > 0)
        {
            Session::flash('gagal','Anda Telah Register!');
            return back();
        }
        else
        {
            if(isset($_POST['cek']))
            {
                $cekmahasiswa = CekMahasiswa::find($r->id);
                $cekdosen = CekDosen::find($r->id);
                $cekbidata = Biodata::where('noinduk',$r->id)->first();

                if(count($cekmahasiswa) > 0)
                {
                    if(count($cekbidata) > 0)
                    {
                        $id = $cekbidata->id;
                        $type = 'mahasiswa';
                        $name = $cekbidata->namadepan.' '. $cekbidata->namabelakang;
                        Session::flash('sukses','Biodata Telah Disimpan Silakan isi Password anda');
                        return view('password',compact('id','type','name'));
                    }else{
                       $type = 'mahasiswa';
                       $id = $r->id;
                       return view('register',compact('type','id')); 
                   }

               }
               else if(count($cekdosen) > 0)
               {
                if(count($cekbidata) > 0)
                {
                    $id = $cekbidata->id;
                    $type = 'dosen';
                    $name = $cekbidata->namadepan.' '. $cekbidata->namabelakang;
                    Session::flash('sukses','Biodata Telah Disimpan Silakan isi Password anda');
                    return view('password',compact('id','type','name'));
                }else{
                    $type = 'dosen';
                    $id = $r->id;
                    return view('register',compact('type','id'));
                }
            }
            else
            {
                Session::flash('gagal','No induk anda belum terdaftar silahkan hubungi Admin ');
                return back();
            }
        }
        elseif(isset($_POST['biodata']))
        {
            $cekbidata = Biodata::find($r->id);
            if(count($cekbidata) > 0)
            {
                $id = $r->id;
                $type = $r->type;
                $name = $r->namadepan.' '. $r->namabelakang;
                Session::flash('sukses','Biodata Telah Disimpan Silakan isi Password anda');
                return view('password',compact('id','type','name'));
            }
            else{
                $id = $r->id;
                $type = $r->type;

                $name = $r->namadepan.' '. $r->namabelakang;
                if($r->namabelakang == '')
                {
                    $namabelakang = ' ';
                }
                else{
                    $namabelakang = $r->namabelakang;
                }
                $input = new Biodata();
                $input->noinduk = $r->id;
                $input->namadepan = $r->namadepan;
                $input->namabelakang = $namabelakang;
                $input->email = $r->email;
                $input->jenkel = $r->jenkel;
                $input->tempat = $r->tempat;
                $input->tgl_lahir = $r->tgl_lahir;
                $input->nohp = $r->nohp;
                $input->alamat = $r->alamat;
                $input->save();
                Session::flash('sukses','Biodata Telah Disimpan Silakan isi Password anda');
                return view('password',compact('id','type','name'));
            }
        }
        elseif(isset($_POST['pass']))
        {
                $input = new User();
                $input->noinduk = $r->id;
                $input->nama_user = $r->name;
                $input->level = $r->type;
                $input->password = bcrypt($r->password);
                $input->save();

                $in = new Foto();
                $in->noinduk = $r->id;
                $in->foto = 'foto';
                $in->save();

                Session::flash('sukses','Selamat Akun Anda Telah dibuat! , Silahkan login');
                return redirect('/login');
            
        }
    }
}
    public function saverequest(Request $r)
    {
        $in = new Reques();
        $in->nama = $r->nama;
        $in->email = $r->email;
        $in->pesan = $r->pesan;
        $in->save();
        return back();
    }
}
