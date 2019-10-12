<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\GabungGroup;
use App\Materi;
use App\JudulKuis;
use App\MulaiUjian;
use App\Kuis;
use App\Jawaban;
use App\AmbilAbsen;
use App\User;
use App\Foto;
use App\Biodata;
use App\Posting;
use App\Tugas;
use App\Homepesan;
use App\Pesan;
use App\AllNilai;
use DB;
use Auth;
use Session;

class MahasiswaController extends Controller
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
      $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
      //dd($user->foto);
      $trefresh = "";
   		return view('mahasiswa.section.default',compact('user','joingroup','trefresh'));
   }
   public function cari(Request $r)
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
$trefresh = "";
       $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
        return view('mahasiswa.section.cari',compact('user','cari','noinduk','joingroup','id_user','trefresh'));
      }
   }

   public function masukidgroup(Request $r)
   {
      $id_user = Auth::user()->noinduk;
      $cekgroup = Group::where('id_group',$r->id_group)->first();
      if(count($cekgroup) > 0)
      {
         $in = new GabungGroup();
         $in->id_group = $r->id_group;
         $in->noinduk = $id_user;
         $in->save();

         $incek = new AllNilai();
         $incek->id_group = $r->id_group;
         $incek->noinduk = $id_user;
         $incek->nilai = 0;
         $incek->save();


         Session::flash('sukses','selamat anda telah bergabung dengan group '.$cekgroup->judul);
         return redirect('/homemahasiswa/view/masuk/group/'.$cekgroup->slug);
      }
      else{
        return back();
      }
   }

   public function homegroup($slug)
   {
      $id_user = Auth::user()->noinduk;
      $user = DB::table('users')
      ->join('biodatas','users.noinduk','=','biodatas.noinduk')
      ->join('fotos','users.noinduk','=','fotos.noinduk')
      ->where('users.noinduk','=',$id_user)
      ->first();

       $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
       $cekgroup = Group::where('slug',$slug)->first();
      $join2grup = DB::table('groups')
       ->join('pertemuans','groups.id_group','=','pertemuans.id_group')
       ->where('groups.id_group',$cekgroup->id_group)->get();

       $posting = Posting::where('id_group',$cekgroup->id_group)->orderBy('id','desc')->get();
$trefresh = "";
      return view('mahasiswa.section.homegroup',compact('user','joingroup','join2grup','cekgroup','posting','trefresh'));
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
        $tmateri = Materi::where('id_group',$cekgroup->id_group)->where('pertemuan',$pertemuan)->orderBy('created_at','desc')->get();
        $tjkuis = JudulKuis::where('id_group',$cekgroup->id_group)->where('pertemuan',$pertemuan)->orderBy('created_at','desc')->get(); 
         //dd($cekgroup); 
        $join2grup = DB::table('groups')
        ->join('pertemuans','groups.id_group','=','pertemuans.id_group')
        ->where('groups.id_group',$cekgroup->id_group)->first();

         $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();

      $cekabsen = AmbilAbsen::where('id_group',$join2grup->id_group)->where('noinduk',$id_user)->where('pertemuan',$pertemuan)->first();
      //dd($cekabsen);
$trefresh = "";
        return view('mahasiswa.section.homepertemuan',compact('user','pertemuan','join2grup','tmateri','tjkuis','joingroup','cekabsen','id_user','trefresh'));
    }

   public function nilai()
   {
      $id_user = Auth::user()->noinduk;
      $user = DB::table('users')
      ->join('biodatas','users.noinduk','=','biodatas.noinduk')
      ->join('fotos','users.noinduk','=','fotos.noinduk')
      ->where('users.noinduk','=',$id_user)
      ->first();

       $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();

      $jotable = DB::table('gabung_groups')
      ->join('groups','gabung_groups.id_group','=','groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)
      ->orderBy('gabung_groups.created_at','desc')->get();
      $trefresh = "";
      return view('mahasiswa.section.nilai',compact('user','joingroup','jotable','trefresh'));
   }
   public function setting()
   {
      $id_user = Auth::user()->noinduk;
      $user = DB::table('users')
      ->join('biodatas','users.noinduk','=','biodatas.noinduk')
      ->join('fotos','users.noinduk','=','fotos.noinduk')
      ->where('users.noinduk','=',$id_user)
      ->first();

       $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
$trefresh = "";
      return view('mahasiswa.section.setting',compact('user','joingroup','trefresh'));
   }
   public function logout()
    {
    	auth()->guard('mahasiswa')->logout();

    	return redirect('/');
    }

    public function masukmateri(Request $r,$id)
    {
       $id_user = Auth::user()->noinduk;
        $user = DB::table('users')
        ->join('biodatas','users.noinduk','=','biodatas.noinduk')
        ->join('fotos','users.noinduk','=','fotos.noinduk')
        ->where('users.noinduk','=',$id_user)
        ->first();

         $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
$trefresh = "";
        $c = Materi::find($id);
        if($c->status == 2)
        {
          return view('mahasiswa.section.coding',compact('c','trefresh'));
        }
        else{
        return view('mahasiswa.section.materi',compact('user','c','joingroup','trefresh'));
        }
    }

    public function homekuis($id_group ,$id_user,$pertemuan,$id_kuis)
    {

      $id_user = Auth::user()->noinduk;
        $user = DB::table('users')
        ->join('biodatas','users.noinduk','=','biodatas.noinduk')
        ->join('fotos','users.noinduk','=','fotos.noinduk')
        ->where('users.noinduk','=',$id_user)
        ->first();

         $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
        $c = JudulKuis::where('id_kuis',$id_kuis)->first();
        //dd($joingroup);
$trefresh = "";
       return view('mahasiswa.section.homekuis',compact('user','joingroup','id_group','id_kuis','pertemuan','c','trefresh'));
    }

    public function mulaiujian(Request $r)
    {
      //dd(date('d'));
      $id_user = Auth::user()->noinduk;
        $user = DB::table('users')
        ->join('biodatas','users.noinduk','=','biodatas.noinduk')
        ->join('fotos','users.noinduk','=','fotos.noinduk')
        ->where('users.noinduk','=',$id_user)
        ->first();
$trefresh = "";
         $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
      $cekkuis = MulaiUjian::where('id_kuis',$r->id_kuis)->where('noinduk',$id_user)->first();
      $kuis = Kuis::where('id_kuis',$r->id_kuis)->where('pertemuan',$r->pertemuan)->get();

      if(count($cekkuis) > 0)
      {
         $judulKuis = MulaiUjian::where('id_kuis',$r->id_kuis)->where('id_group',$cekkuis->id_group)->first();
        $tanggal = date('m d, Y',strtotime($judulKuis->created_at));
        //dd($tanggal);
          return view('mahasiswa.section.ujian',compact('user','joingroup','kuis','cekkuis','judulKuis','tanggal','trefresh'));
      }
      else{
        $jam = date('H') + $r->jam;
        $menit = date('i') + $r->menit;
        $waktu = $jam.':'.$menit.':'.'00';
        $in = new MulaiUjian();
        $in->id_group = $r->id_group;
        $in->id_kuis = $r->id_kuis;
        $in->noinduk = $id_user;
        $in->pertemuan = $r->pertemuan;
        $in->waktu = $waktu;
        $in->save();

        $cekkuis = MulaiUjian::where('id_kuis',$r->id_kuis)->where('noinduk',$id_user)->first();
        $judulKuis = JudulKuis::where('id_kuis',$r->id_kuis)->where('id_group',$cekkuis->id_group)->first();
        $tanggal = date('m d, Y',strtotime($judulKuis->created_at));


      return back();
      }
    }

    public function savejawaban(Request $r)
    {
      $id_user = Auth::user()->noinduk;
      $jumlah = count($r->jawaban);
      $kosong = 'kosong';
      //dd($jumlah);
      for ($i=0; $i < $jumlah; $i++) { 
        if($r->jawaban[$i] == '')
        {
           $in = new Jawaban();
           $in->id_kuis = $r->id_kuis;
           $in->noinduk = $id_user;
           $in->id_soal = $r->id_soal[$i];
           $in->soal = $r->soal[$i];
           $in->jawaban = $kosong;
           $in->pertemuan = $r->pertemuan;
           $in->bobot = $r->bobot[$i];
           $in->nilai = "0";
           $in->save();
        }
        else{
          $in = new Jawaban();
         $in->id_kuis = $r->id_kuis;
         $in->noinduk = $id_user;
         $in->id_soal = $r->id_soal[$i];
         $in->soal = $r->soal[$i];
         $in->jawaban = $r->jawaban[$i];
         $in->pertemuan = $r->pertemuan;
         $in->bobot = $r->bobot[$i];
         $in->nilai = "0";
         $in->save();
        }
         
      }
      $cekgroup = Group::where('id_group',$r->id_group)->first();
      Session::flash('sukses','Anda baru saja telah menyelesaikan kuis');
       return redirect('/homemahasiswa/view/proses/masuk/group/'.$cekgroup->slug.'/'.$r->pertemuan);
    }
    public function cariuser(Request $r)
    {
      $id_user = Auth::user()->noinduk;
      $user = DB::table('users')
      ->join('biodatas','users.noinduk','=','biodatas.noinduk')
      ->join('fotos','users.noinduk','=','fotos.noinduk')
      ->where('users.noinduk','=',$id_user)
      ->first();
      $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();

      $cariuser = Biodata::where('namadepan','LIKE','%'. $r->cari .'%')->orWhere('namabelakang','LIKE','%'. $r->cari .'%')->get();
      //dd($cariuser);
      $trefresh = "";
      return view('mahasiswa.section.cariuser',compact('user','joingroup','cariuser','noinduk','id_user','trefresh'));
    }

    public function groupnilai($slug)
    {
      $id_user = Auth::user()->noinduk;
      $user = DB::table('users')
      ->join('biodatas','users.noinduk','=','biodatas.noinduk')
      ->join('fotos','users.noinduk','=','fotos.noinduk')
      ->where('users.noinduk','=',$id_user)
      ->first();
      $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();

       $cekidgroup = Group::where('slug',$slug)->first();
       //dd(count($cekidgroup));
       $joinnilai = DB::table('nilais')
       ->where('id_group',$cekidgroup->id_group)
       ->where('noinduk',$id_user)
       ->get();
       //dd($joinnilai);
       $trefresh = "";
       return view('mahasiswa.section.allnilai',compact('user','joingroup','joinnilai','trefresh'));
    }

    public function absen(Request $r)
    {
      $id_user = Auth::user()->noinduk;
      $in = new AmbilAbsen();
      $in->id_group = $r->id_group;
      $in->noinduk = $id_user;
      $in->pertemuan = $r->pertemuan;
      $in->save();
      return back();
    }
     public function settingUpdate(Request $r)
  {
    $id_user = Auth::user()->noinduk;
    if(isset($_POST['biodata']))
    {
      if($r->namabelakang == '')
      {
         $b = 'kosong';
      }
      else{
        $b = $r->namabelakang;
      }
      $input = Biodata::find($r->id);
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
     //dd($cekfoto);
     $updatefoto = Foto::find($cekfoto->id);
     //dd($updatefoto);
     $updatefoto->noinduk = $id_user;
     $updatefoto->foto = $fotoname;
     $r->file('foto')->move('upload/home/',$fotoname);
     if($cekfoto->foto == 'foto')
     {
       //
     }
     else{
      $target = 'upload/home/'.$cekfoto->foto;
      $hapusfoto = unlink($target);
     }
     $updatefoto->update();
     Session::flash('sukses','Foto Berhasil Di Update!');
        return back();
    }
  }

  public function pemrograman()
  {
    $id_user = Auth::user()->noinduk;
      $user = DB::table('users')
      ->join('biodatas','users.noinduk','=','biodatas.noinduk')
      ->join('fotos','users.noinduk','=','fotos.noinduk')
      ->where('users.noinduk','=',$id_user)
      ->first();
      $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
      $trefresh = "";
      return view('mahasiswa.section.group.pemrograman',compact('user','joingroup','joinnilai','trefresh'));
  }
  public function pendidikan()
  {
    $id_user = Auth::user()->noinduk;
      $user = DB::table('users')
      ->join('biodatas','users.noinduk','=','biodatas.noinduk')
      ->join('fotos','users.noinduk','=','fotos.noinduk')
      ->where('users.noinduk','=',$id_user)
      ->first();
      $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
      $trefresh = "";
      return view('mahasiswa.section.group.pendidikan',compact('user','joingroup','joinnilai','trefresh'));
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
  public function tugas(Request $r)
  {
     $id_user = Auth::user()->noinduk;
     $doc = $r->file('file');
     $ext = $doc->getClientOriginalExtension();
     $namafile = $id_user.'-'.date('YmdHis').".$ext";
     $upload = 'upload/tugas/';
     $r->file('file')->move($upload,$namafile);
     $in = new Tugas();
     $in->id_group = $r->id_group;
     $in->pertemuan = $r->pertemuan;
     $in->noinduk = $id_user;
     $in->upload = $namafile;
     $in->save();

     Session::flash('sukses','Berhasil mengUpload Tugas!');
     return back();
  }
  public function homepesan()
{
  $id_user = Auth::user()->noinduk;
   $user = DB::table('users')
   ->join('biodatas','users.noinduk','=','biodatas.noinduk')
   ->join('fotos','users.noinduk','=','fotos.noinduk')
   ->where('users.noinduk','=',$id_user)
   ->first(); 
    $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
  $jmlgroup = Group::where('noinduk',$id_user)->orderBy('id_group','desc')->get();
  $pesan = Homepesan::orderBy('created_at','desc')->get();
  $trefresh = "";
  //abort(404);
  return view('mahasiswa.section.homepesan',compact('user','joingroup','jmlgroup','pesan','id_user','trefresh'));
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
     $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
      $trefresh = "";
    if(count($cek) > 0)
    {
      return redirect('homemahasiswa/view/pesan/'.$cek->id_pesan);
    }
    elseif(count($cek2) > 0){
      return redirect('homemahasiswa/view/pesan/'.$cek2->id_pesan);
    }
    else{
    return view('mahasiswa.section.pesan',compact('user','joingroup','jmlgroup','id_user1','trefresh'));
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
     $joingroup = DB::table('groups')
      ->join('gabung_groups','groups.id_group','=','gabung_groups.id_group')
      ->where('gabung_groups.noinduk',$id_user)->orderBy('gabung_groups.created_at','desc')->get();
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
      //$cek1 = Homepesan::where('id_pesan',$id_pesan)->first();
      $cek->jumlah2 = 0;
      $cek->save();
    }
    $trefresh = "tampil";
  $pesan = DB::table('pesans')->where('id_pesan',$id_pesan)->get();
     return view('mahasiswa.section.viewpesan',compact('user','joingroup','jmlgroup','pesan','id_user','noin','trefresh'));
  }
}
