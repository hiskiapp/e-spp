@extends('layouts.master')
@section('header')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">{{ $page_title }}</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">Data Siswa</a></li>
							<li class="breadcrumb-item"><a href="{{ url('admin/students') }}">Master</a></li>
							<li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
<div class="row">
	<div class="col">
		<div class="card-wrapper">
			<!-- Custom form validation -->
			<div class="card">
				<!-- Card header -->
				<div class="card-header">
					<h3 class="mb-0">{{ $page_title }}</h3>
					@if ($errors->any())
					@foreach ($errors->all() as $error)
					<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
						<span class="alert-icon"><i class="ni ni-like-2"></i></span>
						<span class="alert-text"><strong>Error!</strong> {{ $error }}</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endforeach
					@endif
				</div>
				<!-- Card body -->
				<div class="card-body">
					<form class="validation" novalidate method="POST" action="">
						@csrf
						<div class="form-row">
							<div class="col-md-4 mb-3">
								<label class="form-control-label" for="username">NIS *</label>
								<input type="number" name="username" class="form-control" id="username" placeholder="NIS" required autocomplete="off" value="{{ (empty($data) ? old('username') : $data->username) }}">
								<div class="invalid-feedback">
									Silahkan Isi Form NIS Terlebih Dahulu
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label class="form-control-label" for="name">Nama Lengkap *</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" required autocomplete="off" value="{{ (empty($data) ? old('name') : $data->name) }}">
								<div class="invalid-feedback">
									Silahkan Isi Form Nama Terlebih Dahulu
								</div>
							</div>

							<div class="col-md-4 mb-3">
								<label class="form-control-label" for="rombels_id">Rombel *</label>
								<select class="form-control" name="rombels_id" id="rombels_id" required>
									@foreach($rombels as $rombel)
									<option{{ empty($data) ? '' : ($data->rombels_id == $rombel->id ? ' selected' : '') }} value="{{ $rombel->id }}">{{ $rombel->name }}</option>
									@endforeach
								</select>
								<div class="invalid-feedback">
									Pilih Rombel Terlebih Dahulu
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-{{ empty($data) ? '4' : '6'}} mb-3">
								<label class="form-control-label" for="email">E-Mail (optional)</label>
								<input type="email" name="email" class="form-control" id="email" placeholder="mail@domain.com" value="{{ (empty($data) ? old('email') : $data->email) }}">
							</div>
							@if(empty($data))
							<div class="col-md-4 mb-3">
								<label class="form-control-label" for="email">Password (default: wikrama) *</label>
								<input type="password" name="password" class="form-control" id="password" value="wikrama" required>
								<div class="invalid-feedback">
									Silahkan Isi Form Password Terlebih Dahulu
								</div>
							</div>
							@endif
							<div class="col-md-{{ empty($data) ? '4' : '6'}} mb-3">
								<label class="form-control-label" for="spp_id">Jenis Spp *</label>
								<select class="form-control" name="spp_id" id="spp_id" required>
									@foreach($spp as $s)
									<option{{ empty($data) ? '' : ($data->spp_id == $s->id ? ' selected' : '') }} value="{{ $s->id }}">{{ $s->info }} -- {{ number_format($s->amount) }}</option>
									@endforeach
								</select>
								<div class="invalid-feedback">
									Pilih Jenis Spp Terlebih Dahulu.
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-3 mb-3">
								<label class="form-control-label" for="gender">Kelamin *</label>
								<select class="form-control" name="gender" id="gender" required>
									<option{{ empty($data) ? '' : ($data->gender == 'Laki - Laki' ? ' selected' : '') }}>Laki - Laki</option>
									<option{{ empty($data) ? '' : ($data->gender == 'Perempuan' ? ' selected' : '') }}>Perempuan</option>
								</select>
								<div class="invalid-feedback">
									Pilih Jenis Kelamin Terlebih Dahulu.
								</div>
							</div>
							<div class="col-md-5 mb-3">
								<label class="form-control-label" for="address">Alamat (optional)</label>
								<textarea class="form-control" name="address" id="address" rows="1">{{ (empty($data) ? old('address') : $data->address) }}</textarea>
							</div>
							<div class="col-md-4 mb-3">
								<label class="form-control-label" for="telp">Telp (optional)</label>
								<input type="text" class="form-control" id="telp" placeholder="Telp" autocomplete="off" value="{{ (empty($data) ? old('telp') : $data->telp) }}">
							</div>
						</div>
						<button class="btn btn-primary" type="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('bottom')
<!-- Optional JS -->
<script>
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			var forms = document.getElementsByClassName('validation');
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
</script>
@endpush