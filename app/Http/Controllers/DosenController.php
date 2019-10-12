<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Group;
use App\User;
use App\Pertemuan;
use App\Kuis;
use App\Materi;
use App\JudulKuis;
use App\EntryMahasiswa;
use App\Jawaban;
use App\Absen;
use App\Posting;
use App\MulaiUjian;
use App\Nilai;
use App\Foto;
use App\Biodata;
use App\Pesan;
use App\Homepesan;
use App\Reques;
use App\AllNilai;
use DB;
use PDF;

class DosenController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
  public function index()
  {
   $id_user = Auth::user()->noinduk;
   $user = DB::table('users')
   ->join('biodatas','users.noinduk','=','biodatas.noinduk')
   ->join('fotos','users.noinduk','=','fotos.noinduk')
   ->where('users.noinduk','=',$id_user)
   ->first(); 
   $trefresh = "";
   
      //dd($id_user);
   return view('dosen.section.default',compact('user','trefresh'));
 }

 public function logout()
 {
   auth()->guard('dosen')->logout();

   return redirect('/');
 }
 public function buatgroup()
 {
   $id_user = Auth::user()->noinduk;
   $user = DB::table('users')
   ->join('biodatas','users.noinduk','=','biodatas.noinduk')
   ->join('fotos','users.noinduk','=','fotos.noinduk')
   ->where('users.noinduk','=',$id_user)
   ->first(); 
   $jmlgroup = Group::where('noinduk',$id_user)->orderBy('created_at','desc')->get();
   $jmlgrouppemrograman = Group::where('noinduk',$id_user)->where('type','1')->get();
   $jmlgroupbiasa = Group::where('noinduk',$id_user)->where('type','0')->get();
   $trefresh = "";
   return view('dosen.section.buatgroup',compact('user','jmlgroup','jmlgrouppemrograman','jmlgroupbiasa','trefresh')); 
 }
 public function rekapnilai()
 {
   $id_user = Auth::user()->noinduk;
   $user = DB::table('users')
   ->join('biodatas','users.noinduk','=','biodatas.noinduk')
   ->join('fotos','users.noinduk','=','fotos.noinduk')
   ->where('users.noinduk','=',$id_user)
   ->first(); 
   $tgroup = Group::where('noinduk',$id_user)->orderBy('id_group','desc')->get();
   $trefresh = "";
   return view('dosen.section.rekapnilai',compact('user','tgroup','trefresh'));
 }
 public function rekapnilaimasuk($slug)
 {
   $id_user = Auth::user()->noinduk;
   $user = DB::table('users')
   ->join('biodatas','users.noinduk','=','biodatas.noinduk')
   ->join('fotos','users.noinduk','=','fotos.noinduk')
   ->where('users.noinduk','=',$id_user)
   ->first(); 
   $tgroup = Group::where('slug',$slug)->first();
   $join = DB::table('gabung_groups')
   ->where('id_group',$tgroup->id_group)->get();
  //$group = DB::table('groups')
  //->where('id_group',$tgroup->id_group)->first();
   $judulkuis = JudulKuis::where('id_group',$tgroup->id_group)->orderBy('created_at','asc')->get();
   $nilai = Nilai::where('id_group',$tgroup->id_group)->get();
       //dd($join);
   if(count($judulkuis) > 0)
   {
     $pdf =  PDF::loadView('dosen.section.rekapnilaimasuk',compact('user','tgroup','join','judulkuis'));
        //$pdf->setPaper('A4');
        //dd($joinabsen);
    return  $pdf->stream(); //
     //return view('dosen.section.rekapnilaimasuk',compact('user','tgroup','join','judulkuis','nilai'));
  }
  else
  {
    Session::flash('gagal','data belum ada!');
    return back();
  }
}
public function daftarhadir()
{
 $id_user = Auth::user()->noinduk;
 $user = DB::table('users')
 ->join('biodatas','users.noinduk','=','biodatas.noinduk')
 ->join('fotos','users.noinduk','=','fotos.noinduk')
 ->where('users.noinduk','=',$id_user)
 ->first(); 
 $tgroup = Group::where('noinduk',$id_user)->orderBy('id_group','desc')->get();
 $trefresh = "";
 return view('dosen.section.daftarhadir',compact('user','tgroup','trefresh'));
}
public function setting()
{
 $id_user = Auth::user()->noinduk;
 $user = DB::table('users')
 ->join('biodatas','users.noinduk','=','biodatas.noinduk')
 ->join('fotos','users.noinduk','=','fotos.noinduk')
 ->where('users.noinduk','=',$id_user)
 ->first(); 
 $trefresh = "";
 return view('dosen.section.akun',compact('user','trefresh'));
}

public function pertanyaangroup(Request $r)
{
 $id_user = Auth::user()->noinduk;
 $user = DB::table('users')
 ->join('biodatas','users.noinduk','=','biodatas.noinduk')
 ->join('fotos','users.noinduk','=','fotos.noinduk')
 ->where('users.noinduk','=',$id_user)
 ->first(); 
 $trefresh = "";
 if($r->pertanyaan == 'ya')
 {
  return view('dosen.section.group.grouppemrograman',compact('user','trefresh'));
}
else if($r->pertanyaan == 'tidak')
{
  return view('dosen.section.group.groupbiasa',compact('user','trefresh'));
}
}

public function simpangroup(Request $r)
{
  $pertemuan = $r->pertemuan;
  $id_user = Auth::user()->noinduk;
  $data = '1234567890';
  $id_group = '';
  for ($i=0; $i < 9; $i++) { 
    $pos = rand(0,strlen($data)-1);
    $id_group .= $data{$pos};
  }
  if(isset($_POST['biasa']))
  {
   $input  = new Group();
   $input->id_group = $id_group;
   $input->noinduk = $id_user;
   $input->judul = $r->judul;
   $input->slug = str_slug($r->judul,'-');
   $input->deskripsi = $r->deskripsi;
   $input->pertemuan = $pertemuan;
   $input->type = $r->type;
   $input->save();

   $no = 1;
   for ($i=0; $i < $pertemuan; $i++) { 
     $in = new Pertemuan();
     $in->id_group = $id_group;
     $in->noinduk = $id_user;
     $in->pertemuan = $no++;
     $in->status = '0';
     $in->save(); 
   }

   Session::flash('sukses','Group baru berhasil dibuat!');
   return redirect('/homedosen/view/buatgroup');
 }
 else if(isset($_POST['pemrograman']))
 {
  $input  = new Group();
  $input->id_group = $id_group;
  $input->noinduk = $id_user;
  $input->judul = $r->judul;
  $input->slug = str_slug($r->judul,'-');
  $input->deskripsi = $r->deskripsi;
  $input->pertemuan = $pertemuan;
  $input->type = $r->type;
  $input->save();

  $no = 1;
  for ($i=0; $i < $pertemuan; $i++) { 
   $in = new Pertemuan();
   $in->id_group = $id_group;
   $in->noinduk = $id_user;
   $in->pertemuan = $no++;
   $in->status = '0';
   $in->save(); 
 }

 Session::flash('sukses','Group baru berhasil dibuat!');
 return redirect('/homedosen/view/buatgroup');
}
}

public function simpanpertemuan(Request $r)
{
  Session::flash('sukses','Group baru berhasil dibuat!');
  return redirect('/homedosen/view/buatgroup');
}

public function masukgroup($slug)
{
  $id_user = Auth::user()->noinduk;
  $user = DB::table('users')
  ->join('biodatas','users.noinduk','=','biodatas.noinduk')
  ->join('fotos','users.noinduk','=','fotos.noinduk')
  ->where('users.noinduk','=',$id_user)
  ->first(); 
  $cekgroup = Group::where('slug',$slug)->first();
     //dd($cekgroup); 
  $join2grup = DB::table('groups')
  ->join('pertemuans','groups.id_group','=','pertemuans.id_group')
  ->where('groups.id_group',$cekgroup->id_group)->get();
  $posting = Posting::where('id_group',$cekgroup->id_group)->orderBy('id','desc')->get();
  $trefresh = "";
  return view('dosen.section.homegroup',compact('user','cekgroup','join2grup','join3grup','join31grup','join4grup','posting','trefresh'));
}

public function aktifpertemuan(Request $r)
{
  $pilih = Pertemuan::where('id_group','=',$r->id_group)->where('pertemuan','=',$r->pilih)->first();
  $update = Pertemuan::find($pilih->id_pertemuan);
  $update->status = '1';
  $update->save();
  return back();
}

public function homepertemuan($slug,$pertemuan)
{
  $id_user = Auth::user()->noinduk;
  $user = DB::table('users')
  ->join('biodatas','users.noinduk','=','biodatas.noinduk')
  ->join('fotos','users.noinduk','=','fotos.noinduk')
  ->where('users.noinduk','=',$id_user)
  ->first(); 
  $cekgroup = Group::where('slug',$slug)->first();
  $tmateri = Materi::where('id_group',$cekgroup->id_group)->where('noinduk',$cekgroup->noinduk)->where('pertemuan',$pertemuan)->orderBy('id_materi','desc')->get();
  $tjkuis = JudulKuis::where('id_group',$cekgroup->id_group)->where('noinduk',$cekgroup->noinduk)->where('pertemuan',$pertemuan)->orderBy('created_at','desc')->get(); 
         //dd($cekgroup); 
  $trefresh = "";
  $join2grup = DB::table('groups')
  ->join('pertemuans','groups.id_group','=','pertemuans.id_group')
  ->where('groups.id_group',$cekgroup->id_group)->first();
  $cpertemuan = Pertemuan::where('id_group',$cekgroup->id_group)->where('pertemuan',$pertemuan)->first();
  //dd($cpertemuan);
  return view('dosen.section.homepertemuan',compact('user','pertemuan','join2grup','tmateri','tjkuis','id_user','trefresh','cpertemuan'));
}

public function deletegroup()
{
  Session::flash('sukses','Group Berhasil Dihapus!');
  return back();
}
public function editgroup()
{
 $id_user = Auth::user()->noinduk;
 $user = DB::table('users')
 ->join('biodatas','users.noinduk','=','biodatas.noinduk')
 ->join('fotos','users.noinduk','=','fotos.noinduk')
 ->where('users.noinduk','=',$id_user)
 ->first();
 $trefresh = ""; 
 return view('dosen.section.editgroup',compact('user','trefresh'));
}
public function daftarhadirmahasiswa($id_group,$slug)
{

  $cek = Pertemuan::where('id_group',$id_group)->get();
        //$absen = AmbilAbsen::where(id)
        //
  $joinabsen = DB::table('gabung_groups')
  ->where('id_group',$id_group)->get();
  $group = DB::table('groups')
  ->where('id_group',$id_group)->first();
  $pdf =  PDF::loadView('dosen.section.absen',compact('cek','joinabsen','id_group','group'));
        //$pdf->setPaper('A4');
        //dd($joinabsen);
        return  $pdf->stream(); //view('dosen.section.absen',compact('cek','joinabsen','id_group')); 
      }

      public function saveEvent(Request $r)
      {
      //dd(count($r->file));
        if(count($r->file) > 0)
        {
          $doc = $r->file('file');
          $ext = $doc->getClientOriginalExtension();
          $namafile = date('YmdHis').".$ext";
          $upload = 'upload/materi/';
          $r->file('file')->move($upload,$namafile);
        }

        if(isset($_POST['btnfile']))
        {
          $input = new Materi();
          $input->id_group = $r->id_group;
          $input->noinduk = $r->id_user;
          $input->judul = $r->judul;
          $input->deskripsi = $r->deskripsi;
          $input->upload = $namafile;
          $input->id_pertemuan = $r->id_pertemuan;
          $input->coding = '0';
          $input->pertemuan = $r->pertemuan;
          $input->status = '0';
          $input->save();
          return back();
        }
        elseif(isset($_POST['btnvideo']))
        {
          $input = new Materi();
          $input->id_group = $r->id_group;
          $input->noinduk = $r->id_user;
          $input->judul = $r->judul;
          $input->deskripsi = $r->deskripsi;
          $input->upload = $namafile;
          $input->id_pertemuan = $r->id_pertemuan;
          $input->coding = '0';
          $input->pertemuan = $r->pertemuan;
          $input->status = '1';
          $input->save();
          return back();
        }
        elseif(isset($_POST['btncoding']))
        {
          $input = new Materi();
          $input->id_group = $r->id_group;
          $input->noinduk = $r->id_user;
          $input->judul = $r->judul;
          $input->deskripsi = $r->deskripsi;
          $input->upload = '0';
          $input->id_pertemuan = $r->id_pertemuan;
          $input->coding = $r->coding;
          $input->pertemuan = $r->pertemuan;
          $input->status = '2';
          $input->save();
          return back();
        }
      }
      public function EventKuis($id_group,$id_user,$pertemuan,$id_kuis)
      {
        $id_user = Auth::user()->noinduk;
        $user = DB::table('users')
        ->join('biodatas','users.noinduk','=','biodatas.noinduk')
        ->join('fotos','users.noinduk','=','fotos.noinduk')
        ->where('users.noinduk','=',$id_user)
        ->first();
        $tsoal = Kuis::where('id_group',$id_group)->where('noinduk',$id_user)->where('pertemuan',$pertemuan)->where('id_kuis',$id_kuis)->orderBy('created_at','desc')->get();
        $tbobot = 0;
        foreach ($tsoal as $t) {
         $tbobot += $t->bobot;
       }
       $joinbiodata = DB::table('biodatas')
       ->join('mulai_ujians','biodatas.noinduk','=','mulai_ujians.noinduk')
       ->where('mulai_ujians.id_kuis',$id_kuis)->get();
       $trefresh = "";
       return view('dosen.section.soalkuis',compact('user','id_group','noinduk','pertemuan','id_kuis','tsoal','tbobot','joinbiodata','id_user','trefresh'));
     }
     public function saveEventKuis(Request $r)
     {
      if(isset($_POST['btnkuis']))
      {
        $wtk = $r->waktu;
        $jam = 0;
        $menit = 0;
        if($wtk == 30)
        {
          $jam = "0";
          $menit = "30";
        }
        else if($wtk == 60)
        {
          $jam = "1";
          $menit = "0";
        }
        else if($wtk == 90)
        {
          $jam = "1";
          $menit = "30";
        }
        else if($wtk == 120)
        {
          $jam = "2";
          $menit = "0";
        } 

        $data = '1234567890';
        $id_kuis = '';
        for ($i=0; $i < 9; $i++) { 
          $pos = rand(0,strlen($data)-1);
          $id_kuis .= $data{$pos};
        }
        $input = new JudulKuis();
        $input->id_group = $r->id_group;
        $input->noinduk = $r->id_user;
        $input->id_kuis = $id_kuis;
        $input->judul = $r->judul;
        $input->waktu = $r->waktu;
        $input->pertemuan = $r->pertemuan;
        $input->jam = $jam;
        $input->menit = $menit;
        $input->jml_soal = '0';
        $input->id_pertemuan = $r->id_pertemuan;
        $input->save();
        return back();
      }
      elseif(isset($_POST['btnsoal']))
      {
        $input = new Kuis();
        $input->id_kuis = $r->id_kuis;
        $input->id_group = $r->id_group;
        $input->noinduk = $r->id_user;
        $input->pertemuan = $r->pertemuan;
        $input->soal = $r->soal;
        $input->bobot = $r->bobot;
        $input->save();
            //
        $ga = JudulKuis::where('id_group',$r->id_group)->where('id_kuis',$r->id_kuis)->where('noinduk',$r->id_user)->first();
        $ga->jml_soal = $ga->jml_soal + 1;
        $ga->save();
            //
        return back();
      }
    }

    public function eventjawaban($id_user1,$id_kuis)
    {
      $id_user = Auth::user()->noinduk;
      $user = DB::table('users')
      ->join('biodatas','users.noinduk','=','biodatas.noinduk')
      ->join('fotos','users.noinduk','=','fotos.noinduk')
      ->where('users.noinduk','=',$id_user)
      ->first();

      $cek = DB::table('jawabans')
      ->where('id_kuis',$id_kuis)->where('noinduk',$id_user1)->get();

      $joinbiodata = DB::table('biodatas')
      ->join('mulai_ujians','biodatas.noinduk','=','mulai_ujians.noinduk')
      ->where('mulai_ujians.noinduk',$id_user1)->first();
      $cek1 = MulaiUjian::where('id_kuis',$id_kuis)->where('noinduk',$id_user)->first();
      $ceknilai = 0;
      foreach ($cek as $v) {
       $ceknilai += $v->nilai; 
     }

        //dd($cek);
     $nilai = Nilai::where('id_kuis',$id_kuis)->where('noinduk',$id_user1)->first();
        //dd($nilai);
     $trefresh = "";
     return view('dosen.section.lihatjawaban',compact('cek','user','joinbiodata','ceknilai','id_kuis','nilai','trefresh'));
   }

   public function absen(Request $r)
   {
     $in = new Absen();
     $in->id_group = $r->id_group;
     $in->pertemuan = $r->pertemuan;
     $in->save();
     return back();
   }

   public function saveeventjawaban(Request $r)
   {
     $cek = MulaiUjian::where('id_kuis',$r->id_kuis)->where('noinduk',$r->id_user)->first();
       //dd($cek->id_group);
     if(isset($_POST['btnsimpan']))
     {
       $id = $r->id;
       $jm = count($r->id);
       //dd($jm);
       for ($i=0; $i < $jm; $i++) { 
        $up = Jawaban::find($id[$i]);
        $up->nilai = $r->nilai[$i];
        $up->update();
      }
      return back();
    }elseif(isset($_POST['btnsimpannilai'])){
      $in = new Nilai();
      $in->id_group = $cek->id_group;
      $in->id_kuis = $r->id_kuis;
      $in->noinduk = $r->id_user;
      $in->nilai = $r->nilai;
      $in->save();

      $cekallnilai = AllNilai::where('id_group',$cek->id_group)->where('noinduk',$r->id_user)->first();

      $incek = AllNilai::find($cekallnilai->id_all_nilai);
      $incek->nilai = $incek->nilai + $r->nilai;
      $incek->save();
      return back();
      
    }
  }
  public function settingUpdate(Request $r)
  {
    $id_user = Auth::user()->noinduk;
    $c = User::where('noinduk',$id_user)->first();
    if(isset($_POST['biodata']))
    {
      if($r->namabelakang == '')
      {
       $b = 'kosong';
     }
     else{
      $b = $r->namabelakang;
    }
    $input = Biodata::where('noinduk',$id_user)->first();
    //dd($input);
    $input->namadepan = $r->namadepan;
    $input->namabelakang = $b;
    $input->email = $r->email;
    $input->jenkel = $r->jenkel;
    $input->tempat = $r->tempat;
    $input->tgl_lahir = $r->tgl_lahir;
    $input->nohp = $r->nohp;
    $input->alamat = $r->alamat;
    $input->save();
    Session::flash('sukses','Biodata Berhasil Di Update!');
    return back();
  }
  elseif(isset($_POST['pass']))
  {
    //$c = User::where('noinduk',$id_user)->first();
    //dd($c);
    $cek = User::find($id_user);
    $cek->password = bcrypt($r->password);
    $cek->save();
    Session::flash('sukses','Password Berhasil Di Update!');
    return back();
  }
  elseif(isset($_POST['foto']))
  {
      //dd($r->all());

   $filefoto = $r->file('foto');
   $ext = $filefoto->getClientOriginalExtension();
   $fotoname = date('YmdHis').".$ext";

   $cekfoto = DB::table('fotos')->where('noinduk',$id_user)->first();
   //dd($r->file('foto'));
   $updatefoto = Foto::find($cekfoto->id);
    //dd($updatefoto);
   $updatefoto->noinduk = $id_user;
   $updatefoto->foto = $fotoname;
   $updatefoto->save();
   $r->file('foto')->move('upload/home/',$fotoname);
   $target = 'upload/home/'.$cekfoto->foto;
   if($cekfoto->foto == 'foto')
   {
       //
   }
   else{
    $target = 'upload/home/'.$cekfoto->foto;
    $hapusfoto = unlink($target);
  }
  Session::flash('sukses','Foto Berhasil Di Update!');
  return back();
}
}
public function cariuser(Request $r)
{
  $id_user = Auth::user()->noinduk;
  $user = DB::table('users')
  ->join('biodatas','users.noinduk','=','biodatas.noinduk')
  ->join('fotos','users.noinduk','=','fotos.noinduk')
  ->where('users.noinduk','=',$id_user)
  ->first(); 


  $cariuser = Biodata::where('namadepan','LIKE','%'. $r->cari .'%')->orWhere('namabelakang','LIKE','%'. $r->cari .'%')->get();
      //dd($cariuser);
  $trefresh = "";
  return view('dosen.section.cariuser',compact('user','joingroup','cariuser','noinduk','id_user','trefresh'));
}

public function pemrograman()
{
  $id_user = Auth::user()->noinduk;
  $user = DB::table('users')
  ->join('biodatas','users.noinduk','=','biodatas.noinduk')
  ->join('fotos','users.noinduk','=','fotos.noinduk')
  ->where('users.noinduk','=',$id_user)
  ->first(); 
  $trefresh = "";
  $jmlgroup = Group::where('noinduk',$id_user)->orderBy('id_group','desc')->get();
  return view('dosen.section.group.pemrograman',compact('user','joingroup','jmlgroup','trefresh'));
}
public function pendidikan()
{
  $id_user = Auth::user()->noinduk;
  $user = DB::table('users')
  ->join('biodatas','users.noinduk','=','biodatas.noinduk')
  ->join('fotos','users.noinduk','=','fotos.noinduk')
  ->where('users.noinduk','=',$id_user)
  ->first(); 
  $jmlgroup = Group::where('noinduk',$id_user)->orderBy('id_group','desc')->get();
  $trefresh = "";
  return view('dosen.section.group.pendidikan',compact('user','joingroup','jmlgroup','trefresh'));
}
public function homepesan()
{
  $id_user = Auth::user()->noinduk;
  $user = DB::table('users')
  ->join('biodatas','users.noinduk','=','biodatas.noinduk')
  ->join('fotos','users.noinduk','=','fotos.noinduk')
  ->where('users.noinduk','=',$id_user)
  ->first(); 
  $jmlgroup = Group::where('noinduk',$id_user)->orderBy('id_group','desc')->get();
  $pesan = Homepesan::orderBy('created_at','desc')->get();
  //abort(404);
  $trefresh = "";
  return view('dosen.section.homepesan',compact('user','joingroup','jmlgroup','pesan','id_user','trefresh'));
}
public function posting(Request $r)
{
 $id_user = Auth::user()->noinduk;
 $in = new Posting();
 $in->noinduk = $id_user;
 $in->id_group = $r->id_group;
 $in->isi_posting = $r->posting;
 $in->save();
 return back();
}
public function pesan($id_user1)
{
  $id_user = Auth::user()->noinduk;
  $user = DB::table('users')
  ->join('biodatas','users.noinduk','=','biodatas.noinduk')
  ->join('fotos','users.noinduk','=','fotos.noinduk')
  ->where('users.noinduk','=',$id_user)
  ->first(); 
  $jmlgroup = Group::where('noinduk',$id_user)->orderBy('id_group','desc')->get();
  $cek = Homepesan::where('id_noinduk_1',$id_user1)->where('id_noinduk_2',$id_user)->first();
  $cek2 = Homepesan::where('id_noinduk_2',$id_user1)->where('id_noinduk_1',$id_user)->first();
  if(count($cek) > 0)
  {
    return redirect('homedosen/view/pesan/'.$cek->id_pesan);
  }
  elseif(count($cek2) > 0){
    return redirect('homedosen/view/pesan/'.$cek2->id_pesan);
  }
  else{
    $trefresh = "";
    return view('dosen.section.pesan',compact('user','joingroup','jmlgroup','id_user1','trefresh'));
  }
}
public function kirimpesan(Request $r)
{
  $id_user = Auth::user()->noinduk;
  $data = '1234567890';
  $id_pesan = '';
  for ($i=0; $i < 8; $i++) { 
    $pos = rand(0,strlen($data)-1);
    $id_pesan .= $data{$pos};
  }
  $cek1 = DB::table('homepesans')->where('id_noinduk_1',$r->id_user)->where('id_noinduk_2',$id_user)->first();
  $cek2 = DB::table('homepesans')->where('id_noinduk_2',$r->id_user)->where('id_noinduk_1',$id_user)->first();
  if(count($cek1) > 0)
  {
   $in = new Pesan();
   $in->id_pesan = $cek1->id_pesan;
   $in->pengirim = $id_user;
   $in->isi = $r->isi;
   $in->save();

   $in1 = Homepesan::find($cek1->id_pesan);
   $in1->jumlah1 = $in1->jumlah1+1;
   $in1->pesan_terakhir = $r->isi;
   $in1->save();
   return back();
 }
 elseif(count($cek2) > 0)
 {
  $in = new Pesan();
  $in->id_pesan = $cek2->id_pesan;
  $in->pengirim = $id_user;
  $in->isi = $r->isi;
  $in->save();

  $in1 = Homepesan::find($cek2->id_pesan);
  $in1->jumlah2 = $in1->jumlah2+1;
  $in1->pesan_terakhir = $r->isi;
  $in1->save();
  return back();
}
else{
 $in = new Pesan();
 $in->id_pesan = $id_pesan;
 $in->pengirim = $id_user;
 $in->isi = $r->isi;
 $in->save();

 $in1 = new Homepesan();
 $in1->id_pesan = $id_pesan;
 $in1->id_noinduk_1 = $id_user;
 $in1->id_noinduk_2 = $r->id_user;
 $in1->jumlah1 = 0;
 $in1->jumlah2 = 1;
 $in1->pesan_terakhir = $r->isi;
 $in1->save();
 return back(); 
}
}
public function viewpesan($id_pesan)
{
  $id_user = Auth::user()->noinduk;
  $user = DB::table('users')
  ->join('biodatas','users.noinduk','=','biodatas.noinduk')
  ->join('fotos','users.noinduk','=','fotos.noinduk')
  ->where('users.noinduk','=',$id_user)
  ->first(); 
  $jmlgroup = Group::where('noinduk',$id_user)->orderBy('id_group','desc')->get();
  $noin = 0;
  $cek = Homepesan::where('id_pesan',$id_pesan)->first();
  if($cek->id_noinduk_1 == $id_user)
  {
    $noin = $cek->id_noinduk_2;
    $cek->jumlah1 = 0;
    $cek->save();
  }
  elseif($cek->id_noinduk_2 == $id_user){
    $noin = $cek->id_noinduk_1;
    $cek->jumlah2 = 0;
    $cek->save();
  }
  $pesan = DB::table('pesans')->where('id_pesan',$id_pesan)->get();
  $trefresh = "tampil";
  return view('dosen.section.viewpesan',compact('user','joingroup','jmlgroup','pesan','id_user','noin','trefresh'));
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
    $trefresh = "";
    return view('dosen.section.cari',compact('user','cari','noinduk','joingroup','id_user','trefresh'));
  }
}
}
