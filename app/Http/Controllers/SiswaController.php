<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
    	if($request->has('cari')){
    		$data_siswa = \App\Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->paginate();
    	}else{
    		$data_siswa = \App\Siswa::all();
    		$data_siswa = \App\Siswa::paginate(5);
    	}
    	return view ('siswa.index',['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
    	// dd(request->all);
    	// \App\Siswa::create($request->all());
    	$this->validate($request,[
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048']);

        $ava = $request->file('foto');
        $extension = $ava->getClientOriginalExtension();
        $namaImg = $request->nama_depan.'-'.$request->nama_belakang.'.'.$extension;
        $ava->move(public_path("img "), $namaImg);
        //Storage::disk('public')->put($ava->getFilename().'.'.$extension,  File::get($ava));

        Siswa::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'foto' => $namaImg 
        ]);
    	return redirect('/siswa')->with('sukses', 'Data Berhasil Diinput');
    }

    public function edit($id)
    {
    	$siswa = \App\Siswa::find($id);
    	return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
    	// $siswa = \App\Siswa::find($id);
    	// $siswa->update($request->all());

    	$this->validate($request,[
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048']);

    	$tableSiswa = Siswa::find($id);

    	if ($ava = $request->file('foto')) {
    		$namaImgTerpakai = public_path("img/{ $tableSiswa->foto }");

    		if (File::exists($namaImgTerpakai)) {
    			unlink($namaImgTerpakai);
    		}

    		$destinationPath = 'img/';
    		$extension = $ava->getClientOriginalExtension();
    		$namaImg = $request->nama_depan.'-'.$request->nama_belakang.'.'.$extension;
    		$ava->move($destinationPath, $namaImg);

    		$id = $request['id'];
    		$update = Siswa::where('id', $id)->first();
    		$update->nama_depan = $request['nama_depan'];
    		$update->nama_belakang = $request['nama_belakang'];
    		$update->jenis_kelamin = $request['jenis_kelamin'];
    		$update->agama = $request['agama'];
    		$update->alamat = $request['alamat'];
    		$update->foto = $namaImg;
    		$update->update();
    	}

    	return redirect('/siswa')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
    	$siswa = \App\Siswa::find($id);
    	$siswa->delete($siswa);
    	return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus');
    }
}
