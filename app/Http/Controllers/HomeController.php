<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periode;
use Session;
use App\CekMahasiswa;
use App\CekDosen;
use App\Berita;
use App\User;
use App\Posting;
use App\Foto;
use App\Biodata;
use App\JudulKuis;
use App\Reques;
use DB;
use App\Group;
use Auth;
use Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->level == 'dosen')
        {
            return redirect('/homedosen');
        }
        elseif($user->level == 'mahasiswa')
        {
            return redirect('/homemahasiswa');
        }
        else{
        $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        $tbiodata = Biodata::orderBy('updated_at','desc')->get(); 
        $re = Reques::orderBy('id','desc')->paginate(15);
        return view('auth.section.default',compact('tampilfoto','tbiodata','re'));
        } 
    }
    public function entryperiode()
    {
        $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        $tampil = Periode::orderBy('id','desc')->get();
        return view('auth.section.periode',compact('tampil','tampilfoto'));
    }
    public function entrymahasiswa()
    {
        $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        return view('auth.section.entrymahasiswa',compact('tampilfoto'));
    }
    public function entrydosen()
    {
        $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        return view('auth.section.entrydosen',compact('tampilfoto'));
    }
    public function entryberita()
    {
        $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        return view('auth.section.entryberita',compact('tampilfoto'));
    }
    public function updatemahasiswa()
    {
        $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        $tbiodata = Biodata::orderBy('updated_at','desc')->get();
        return view('auth.section.updatemahasiswa',compact('tampilfoto','tbiodata'));
    }
    public function updatedosen()
    {
        $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        $tbiodata = Biodata::orderBy('updated_at','desc')->get();
        return view('auth.section.updatedosen',compact('tampilfoto','tbiodata'));
    }
    public function akun()
    {
        $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        //dd(count($tampilfoto));
        return view('auth.section.akun',compact('tampilfoto'));
    }


    public function saveperiode(Request $r)
    {
        $cekperiode = Periode::where('periode','=',$r->periode)->get();
        $ceksemester = Periode::where('semester','=',$r->semester)->get();
        if(count($cekperiode) > 0)
        {
            Session::flash('pesangagalperiode','Gagal Menyimpan data Periode dikarenakan Data '.$r->periode.' Sudah Ada');
            return back();
        }
        else if(count($ceksemester) > 0)
        {
            Session::flash('pesangagalperiode','Gagal Menyimpan data Periode dikarenakan Data '.$r->semester.' Sudah Ada, Cek Tulisan Anda');
            return back();
        }
        else{
            $periode = new Periode();
            $periode->periode = $r->periode;
            $periode->semester = $r->semester;
            $periode->save();
            Session::flash('pesansuksesperiode','Data '.$r->periode.' Berhasi di Simpan!');
            return back();
        }
    }

    public function deleteperiode($id)
    {
        $deleteperiode = Periode::find($id);
        $deleteperiode->delete();
        Session::flash('pesansuksesperiode','Data '.$deleteperiode->periode.' Berhasi di Hapus!');
        return back();
    }

    public function saveMahasiswa(Request $r)
    {
        $cekmahasiswa = CekMahasiswa::find($r->id);
        if(count($cekmahasiswa) > 0)
        {
            Session::flash('gagalmahasiswa','Gagal Menyimpan data Mahasiswa dengan  NPM '.$r->id.' di Karenakan Sudah Ada');
            return back();
        }
        else{
            $mahasiswa = new CekMahasiswa();
            $mahasiswa->id = $r->id;
            $mahasiswa->nama = $r->nama;
            $mahasiswa->save();
            Session::flash('suksesmahasiswa','Data dengan NPM'.$r->id.' Berhasi di disimpan!');
            return back();
        }
    }
    public function saveMahasiswaExcel(Request $r)
    {
        //dd($r->file);
        try {
            Excel::load($r->file,function($reder){
                foreach ($reder->toObject() as $row) {
                    $mahasiswa = new CekMahasiswa();
                    $mahasiswa->id = $row->id;
                    $mahasiswa->nama = $row->nama;
                    $mahasiswa->save();
                }
            });
            Session::flash('suksesmahasiswa','Data  Berhasi di Import!');
            return back();
        } catch (\Exception $e) {
            Session::flash('gagalmahasiswa','Gagal di Import, kemungkinan data npm ada yang sama');
            return back();
        }
        
    }
    public function saveDosen(Request $r)
    {
        //dd($r>all());
        $cekdosen = CekDosen::find($r->id);
        if(count($cekdosen) > 0)
        {
            Session::flash('gagal','Gagal Menyimpan data Dosen dengan  NIDN '.$r->id.' di Karenakan Sudah Ada');
            return back();
        }
        else{
            $mahasiswa = new CekDosen();
            $mahasiswa->id = $r->id;
            $mahasiswa->nama = $r->nama;
            $mahasiswa->save();
            Session::flash('sukses','Data dengan NIDN '.$r->id.' Berhasi di disimpan!');
            return back();
        }
    }
    public function saveDosenExcel(Request $r)
    {
        //dd($r->file);
        try {
            Excel::load($r->file,function($reder){
                foreach ($reder->toObject() as $row) {
                    $mahasiswa = new CekDosen();
                    $mahasiswa->id = $row->id;
                    $mahasiswa->nama = $row->nama;
                    $mahasiswa->save();
                }
            });
            Session::flash('sukses','Data  Berhasi di Import!');
            return back();
        } catch (\Exception $e) {
            Session::flash('gagal','Gagal di Import, kemungkinan data NIDN ada yang sama!');
            return back();
        }
    }
    public function saveBerita(Request $r)
    {
        $berita = new Berita();
        $berita->berita = $r->berita;
        $berita->save();
        Session::flash('sukses','Berita Berhasi di publikasikan!');
        return back();
    }

    public function updateAkun(Request $r,$id)
    {

        if($r->password == '')
        {
            $akun = User::find($id);
            $akun->nama_user = $r->name;
            $akun->password = $akun->password;
            $akun->update();
            Session::flash('sukses','Akun Berhasil di Update');
            return back();
        }
        else{
            $akun = User::find($id);
            $akun->nama_user = $r->name;
            $akun->password = bcrypt($r->password);
            $akun->update();
            Session::flash('sukses','Akun Berhasil di Update');
            return back();
        }
    }
    public function foto(Request $r)
    {
        $filefoto = $r->file('foto');
        $ext = $filefoto->getClientOriginalExtension();
        $fotoname = date('YmdHis').".$ext";
        //dd($fotoname);
        $cekfoto = Foto::where('noinduk',Auth::user()->noinduk)->get();
        if(count($cekfoto) > 0)
        {
            $firstfoto = Foto::where('noinduk',Auth::user()->noinduk)->first();
            $updatefoto = Foto::find($firstfoto->id);
            $updatefoto->noinduk = \Auth::user()->noinduk;
            $updatefoto->foto = $fotoname;
            $r->file('foto')->move('upload/admin/',$fotoname);
            $target = 'upload/admin/'.$firstfoto->foto;
            $hapusfoto = unlink($target);
            $updatefoto->update();
        }
        else{
            $input = new Foto();
            $input->noinduk = \Auth::user()->noinduk;
            $input->foto = $fotoname;
            $r->file('foto')->move('upload/admin/',$fotoname);
            $input->save();

        }
        Session::flash('sukses','Foto Berhasil di Update');
        return back();
    }
    public function cariuser(Request $r)
    {
      $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
      $cariuser = Biodata::where('namadepan','LIKE','%'. $r->cari .'%')->orWhere('namabelakang','LIKE','%'. $r->cari .'%')->get();
      //dd($cariuser);
      return view('auth.section.cariuser',compact('cariuser','tampilfoto'));
     }
     public function posting(Request $r)
     {
       $id_user = Auth::user()->noinduk;
       $in = new Posting();
       $in->noinduk = $id_user;
       $in->isi_posting = $r->posting;
       $in->save();
       return back();
   }
   public function password(Request $r)
   {
     $up1 = \DB::table('users')->where('noinduk',$r->noinduk)->first();
     $up = User::find($r->noinduk);
     $up->password = bcrypt($r->password);
     $up->save();
     Session::flash('sukses','password dengan nomor induk '.$r->id_user.' berhasil di update');
     return back();
   }
   public function carigroup(Request $r)
   {
      $id_user = Auth::user()->noinduk;
      $user = DB::table('users')
      ->join('biodatas','users.noinduk','=','biodatas.noinduk')
      ->join('fotos','users.noinduk','=','fotos.noinduk')
      ->where('users.noinduk','=',$id_user)
      ->first();
//  
      if($r->cari == '')
      {
        Session::flash('gagal','isi kolom pencarian');
        return back();
      }
      else{
        $cari = Group::where('id_group','like','%'. $r->cari .'%')->orWhere('judul','like','%'. $r->cari .'%')->orderBy('created_at','desc')->get();

       $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
      $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        return view('auth.section.cari',compact('user','cari','noinduk','joingroup','id_user','tampilfoto'));
      }
   }
   public function user()
   {
     $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        $tbiodata = Biodata::orderBy('updated_at','desc')->get(); 
     return view('auth.section.user',compact('tampilfoto','tbiodata'));
   }
   public function group()
   {
     $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
     $tbiodata = Group::orderBy('updated_at','desc')->get(); 
     return view('auth.section.group',compact('tampilfoto','tbiodata'));
   }
   public function nilai()
   {
     $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
        $tbiodata = Group::orderBy('created_at','desc')->get();  
     return view('auth.section.nilai',compact('tampilfoto','tbiodata'));
   }
   public function tnilai($id_group)
   {
     $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
     $join = DB::table('gabung_groups')
     ->where('id_group',$id_group)->get();
     $judulkuis = JudulKuis::where('id_group',$id_group)->get();  
     return view('auth.section.tnilai',compact('tampilfoto','join','judulkuis'));
   }
   public function masukgroup($slug)
{
  $id_user = Auth::user()->noinduk;
   $user = DB::table('users')
   ->join('biodatas','users.noinduk','=','biodatas.noinduk')
   ->join('fotos','users.noinduk','=','fotos.noinduk')
   ->where('users.noinduk','=',$id_user)
   ->first(); 
   $tampilfoto = Foto::where('noinduk','=',Auth::user()->noinduk)->first();
 $cekgroup = Group::where('slug',$slug)->first();
     //dd($cekgroup); 
 $join2grup = DB::table('groups')
 ->join('pertemuans','groups.id_group','=','pertemuans.id_group')
 ->where('groups.id_group',$cekgroup->id_group)->get();
$posting = Posting::where('id_group',$cekgroup->id_group)->orderBy('id','desc')->get();
$trefresh = "";
 return view('auth.section.homegroup',compact('user','cekgroup','join2grup','join3grup','join31grup','join4grup','posting','tampilfoto'));
}
}
