<?php

Route::group(['middleware' => 'dosen'],function(){
	Route::get('/homedosen','DosenController@index');
	Route::get('/homedosen/view/buatgroup','DosenController@buatgroup');
	Route::get('/homedosen/view/rekapnilai','DosenController@rekapnilai');
	Route::get('/homedosen/view/rekapnilai/{slug}','DosenController@rekapnilaimasuk');
	Route::get('/homedosen/view/daftarhadir','DosenController@daftarhadir');
	Route::get('/homedosen/view/setting','DosenController@setting');
	Route::get('/homedosen/view/groupbiasa','DosenController@groupbiasa');
	Route::get('/homedosen/view/grouppemrograman','DosenController@pertanyaangroup@grouppemrograman');

	Route::get('/homedosen/proses/group','DosenController@pertanyaangroup');
	Route::post('/homedosen/proses/simpangroup','DosenController@simpangroup');
	Route::post('/homedosen/proses/simpanpertemuan','DosenController@simpanpertemuan');
	Route::post('/homedosen/proses/group/materi','DosenController@saveEvent');
	Route::post('/homedosen/proses/group/kuis','DosenController@saveEventKuis');

	Route::get('/homedosen/view/proses/edit/group','DosenController@editgroup');
	Route::get('/homedosen/proses/delete/group','DosenController@deletegroup');
	Route::get('/homedosen/view/proses/masuk/group/{slug}','DosenController@masukgroup');
	Route::post('/homedosen/view/proses/group/aktifpertemuan','DosenController@aktifpertemuan');
	Route::get('homedosen/view/proses/masuk/group/{slug}/{pertemuan}','DosenController@homepertemuan');
	Route::get('/homedosen/view/daftarhadir/mahasiswa/{id_group}/{slug}','DosenController@daftarhadirmahasiswa');
	Route::get('homedosen/view/proses/masuk/group/{id_group}/{id_user}/{pertemuan}/{id_kuis}','DosenController@EventKuis');
	Route::post('/logoutdosen','DosenController@logout');
	Route::get('/homedosen/proses/view/jawaban/{id_user1}/{id_kuis}/kuis','DosenController@eventjawaban');
	Route::post('homedosen/proses/absen','DosenController@absen');
	Route::post('/homedosen/proses/kuis/jawaban/mahasiswa','DosenController@saveeventjawaban');
	Route::post('/homedosen/proses/setting/update','DosenController@settingUpdate');
	Route::get('/homedosen/cariuser','DosenController@cariuser');
	Route::get('/homedosen/pemrograman','DosenController@pemrograman');
	Route::get('/homedosen/pendidikan','DosenController@pendidikan');
	Route::get('/homedosen/homepesan','DosenController@homepesan');
	Route::post('/homedosen/save/posting','DosenController@posting');
	Route::get('/homedosen/pesan/{id_user1}','DosenController@pesan');
	Route::post('/homedosen/pesan','DosenController@kirimpesan');
	Route::get('/homedosen/view/pesan/{id_pesan}','DosenController@viewpesan');
	Route::get('/homedosen/proses/cari','DosenController@carigroup');
});


Route::group(['middleware' => 'mahasiswa'],function(){
	Route::get('/homemahasiswa','MahasiswaController@index');
	Route::post('/logoutmahasiswa','MahasiswaController@logout');
	Route::get('/homemahasiswa/setting','MahasiswaController@setting');
	Route::post('/homemahasiswa/proses/setting/update','MahasiswaController@settingUpdate');
	Route::get('/homemahasiswa/cari','MahasiswaController@cari');
	Route::get('/homemahasiswa/nilai','MahasiswaController@nilai');
	Route::get('/homemahasiswa/view/masuk/group/{slug}','MahasiswaController@homegroup');
	Route::get('/homemahasiswa/view/proses/masuk/group/{slug}/{pertemuan}','MahasiswaController@homepertemuan');

	Route::get('homemahasiswa/view/proses/masuk/group/{id_group}/{id_user}/{pertemuan}/{id_kuis}','MahasiswaController@homekuis');

	Route::get('/homemahasiswa/proses/view/ujian','MahasiswaController@mulaiujian');

	Route::get('/homemahasiswa/view/pertemuan/{id}/materi','MahasiswaController@masukmateri');

	Route::get('/homemahasiswa/proses/cari','MahasiswaController@cari');
	

	Route::get('/homemahasiswa/cariuser','MahasiswaController@cariuser');

	Route::post('/homemahasiswa/proses/id_group','MahasiswaController@masukidgroup');

	Route::post('/homemahasiswa/proses/kuis/save','MahasiswaController@savejawaban');

	Route::get('/homemahasiswa/view/group/nilai/{slug}','MahasiswaController@groupnilai');

	Route::post('homemahasiswa/absen','MahasiswaController@absen');

	Route::get('/homemahasiswa/pemrograman','MahasiswaController@pemrograman');
	Route::get('/homemahasiswa/pendidikan','MahasiswaController@pendidikan');
	Route::post('/homemahasiswa/save/posting','MahasiswaController@posting');
	Route::post('/homemahasiswa/save/tugas','MahasiswaController@tugas');
	Route::get('/homemahasiswa/homepesan','MahasiswaController@homepesan');
	Route::get('/homemahasiswa/pesan/{id_user1}','MahasiswaController@pesan');
	Route::post('/homemahasiswa/pesan','MahasiswaController@kirimpesan');
	Route::get('/homemahasiswa/view/pesan/{id_pesan}','MahasiswaController@viewpesan');
});
 

Auth::routes();

Route::group(['middleware' => 'web'],function(){
	Route::get('/visi-misi', function () {
		return view('visi_misi');
	});
	Route::get('/auth', function () {
		return view('login');
	});
	Route::get('/register', function () {
		return view('ceknoinduk');
	});
	Route::post('/register','LoginController@register');
	Route::get('/','LoginController@home');
	Route::get('/homeadmin', 'HomeController@index')->name('home');
	Route::get('/homeadminperiode', 'HomeController@entryperiode')->name('home');
	Route::get('/homeadminentrymahasiswa', 'HomeController@entrymahasiswa')->name('home');
	Route::get('/homeadminentrydosen', 'HomeController@entrydosen')->name('home');
	Route::get('/homeadminentryberita', 'HomeController@entryberita')->name('home');
	Route::get('/homeadminupdatemahasiswa', 'HomeController@updatemahasiswa')->name('home');
	Route::get('/homeadminupdatedosen', 'HomeController@updatedosen')->name('home');
	Route::get('/homeadminakun', 'HomeController@akun')->name('home');


	Route::post('/homeadminperiode','HomeController@saveperiode');
	Route::delete('/homeadmin/delete/periode/{id}','HomeController@deleteperiode');
	Route::post('/homeadmin/entry/mahasiswa','HomeController@saveMahasiswa');
	Route::post('/homeadmin/entry/mahasiswa/uploadexcel','HomeController@saveMahasiswaExcel');
	Route::post('/homeadmin/entry/dosen','HomeController@saveDosen');
	Route::post('/homeadmin/entry/dosen/uploadexcel','HomeController@savedosenExcel');
	Route::post('/homeadmin/entry/berita','HomeController@saveberita');
	Route::put('/homeadmin/update/akun/{id}','HomeController@updateAkun');
	Route::post('/homeadmin/akun/foto','HomeController@foto');
	Route::get('/homeadmin/cariuser','HomeController@cariuser');
	Route::post('/homeadmin/save/posting','HomeController@posting');
	Route::post('/homeadmin/proses/update/password','HomeController@password');
	Route::get('/homeadmin/user','HomeController@user');
	Route::get('/homeadmin/group','HomeController@group');
	Route::get('/homeadmin/nilai','HomeController@nilai');
	Route::get('/homeadmin/view/nilai/{id_group}','HomeController@tnilai');
	Route::post('/save/request','LoginController@saverequest');
	Route::get('/homeadmin/proses/cari','HomeController@carigroup');
	Route::get('/homeadmin/view/masuk/group/{slug}','HomeController@masukgroup');
});

