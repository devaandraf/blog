<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        // insert table user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = \Str::random(60);
        $user->save();

        // insert table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());
    	// $this->validate($request,[
     //        'nama_depan' => 'required',
     //        'nama_belakang' => 'required',
     //        'jenis_kelamin' => 'required',
     //        'agama' => 'required',
     //        'alamat' => 'required',
     //        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048']);

     //    $ava = $request->file('foto');
     //    $extension = $ava->getClientOriginalExtension();
     //    $namaImg = $request->nama_depan.'-'.$request->nama_belakang.'.'.$extension;
     //    $ava->move(public_path("img "), $namaImg);
     //    //Storage::disk('public')->put($ava->getFilename().'.'.$extension,  File::get($ava));

     //    Siswa::create([
     //        'nama_depan' => $request->nama_depan,
     //        'nama_belakang' => $request->nama_belakang,
     //        'jenis_kelamin' => $request->jenis_kelamin,
     //        'agama' => $request->agama,
     //        'alamat' => $request->alamat,
     //        'foto' => $namaImg 
     //    ]);
    	return redirect('/siswa')->with('sukses', 'Data Berhasil Diinput');
    }

    public function edit($id)
    {
    	$siswa = \App\Siswa::find($id);
    	return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
    	$siswa = \App\Siswa::find($id);
    	$siswa->update($request->all());
        if ($request->hasFile('foto')){
            $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
    	$siswa = \App\Siswa::find($id);
    	$siswa->delete($siswa);
    	return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus');
    }

    public function profile($id)
    {
        $siswa = \App\Siswa::find($id);
        $matpel = \App\Mapel::all();
        return view('siswa.profile', ['siswa' => $siswa, 'matpel' => $matpel]);
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa = \App\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id', $request->matpel)->exists())
        {
        return redirect('siswa/'.$idsiswa.'/profile')->with('error', 'Nilai Sudah Ada');
        }
        $siswa->mapel()->attach($request->matpel, ['nilai' => $request->nilai]);

        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses', 'Nilai Berhasil Dimasukkan');
    }
}
