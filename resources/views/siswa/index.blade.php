@extends('layouts.master')	

@section('content')
		@if(session('sukses'))
		<div class="alert alert-success" role="alert">
		  {{session('sukses')}}
		</div>
		@endif
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">DATA SISWA</h3>
									<div class="right">
										<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle">
										</i></button>
									</div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>NAMA DEPAN</th>
												<th>NAMA BELAKANG</th>
												<th>JENIS KELAMIN</th>
												<th>AGAMA</th>
												<th>ALAMAT</th>
												<th>FOTO</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data_siswa as $siswa)
											<tr>
												<td>{{$siswa->nama_depan}}</td>
												<td>{{$siswa->nama_belakang}}</td>
												<td>{{$siswa->jenis_kelamin}}</td>
												<td>{{$siswa->agama}}</td>
												<td>{{$siswa->alamat}}</td>
												<td>
													<img src="{{ url('img/'.$siswa->foto) }}" style="width: 90px;height: 90px;object-fit: cover;">
												</td>
												<td>
													<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">edit</a>
													<a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm">delete</a>	
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									{{$data_siswa->links()}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">	
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
				<form action="{{ url('/siswa/create') }} " method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
				    <label for="exampleInputEmail1">Nama Depan</label>
				    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Nama Belakang</label>
				    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
					    <select name="jenis_kelamin" name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
					      <option value="L">Laki-Laki</option>
					      <option value="P">Perempuan</option>
					    </select>
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Agama</label>
				    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="agama">
				</div>
				<div class="form-group">
				    <label for="exampleFormControlTextarea1">Alamat</label>
				    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>
				<div class="form-group">
				    <label for="exampleFormControlTextarea1">Gambar</label>
				    <input name="foto" type="file" class="form-control" id="exampleFormControlFile" rows="3"></input>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Submit</button>
		        </form>
		      </div>
		    </div>
		  </div>
@stop
