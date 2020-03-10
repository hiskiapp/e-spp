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
							<li class="breadcrumb-item"><a href="{{ url('admin/rombels') }}">Rombel</a></li>
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
							<div class="col-md-6 mb-3">
								<label class="form-control-label" for="name">Nama Rombel *</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Nama Rombel" required autocomplete="off" value="{{ (empty($data) ? old('name') : $data->name) }}">
								<div class="invalid-feedback">
									Silahkan Isi Form Nama Terlebih Dahulu
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label class="form-control-label" for="major_competency">Kompetensi Keahlian *</label>
								<input type="text" name="major_competency" class="form-control" id="major_competency" placeholder="Kompetensi Keahlian" required value="{{ (empty($data) ? old('major_competency') : $data->major_competency) }}">
								<div class="invalid-feedback">
									Silahkan Isi Form Nama Terlebih Dahulu
								</div>
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