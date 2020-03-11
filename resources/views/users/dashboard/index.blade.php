@extends('users.layouts.master')
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
              <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
  <div class="col-xl-8 order-xl-1">
    <div class="row">
      <div class="col-lg-6">
        <div class="card bg-gradient-info border-0">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Pembayaran</h5>
                <span class="h2 font-weight-bold mb-0 text-white">Rp{{ number_format($total) }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                  <i class="ni ni-active-40"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">

            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card bg-gradient-danger border-0">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Pembayaran Terakhir</h5>
                <span class="h2 font-weight-bold mb-0 text-white">{{ spp_month($last_month) }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                  <i class="ni ni-spaceship"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">

            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Detail </h3>
          </div>
          <div class="col-4 text-right">
            <a href="{{ url('user') }}" class="btn btn-sm btn-primary">Edit Data</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h6 class="heading-small text-muted mb-4">User information</h6>
        <div class="row">
          <div class="col">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th>NIS</th>
                  <td>:</td>
                  <td>{{ $data->username }}</td>
                </tr>
                <tr>
                  <th>Nama Lengkap</th>
                  <td>:</td>
                  <td>{{ $data->name }}</td>
                </tr>
                <tr>
                  <th>Rombel</th>
                  <td>:</td>
                  <td>{{ $data->rombel->name }}</td>
                </tr>
                <tr>
                  <th>E-Mail</th>
                  <td>:</td>
                  <td>{{ $data->email }}</td>
                </tr>
                <tr>
                  <th>Jenis SPP</th>
                  <td>:</td>
                  <td>{{ $data->spp->info }} | {{ $data->spp->amount }}</td>
                </tr>
                <tr>
                  <th>Kelamin</th>
                  <td>:</td>
                  <td>{{ $data->gender }}</td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>:</td>
                  <td>{{ $data->address }}</td>
                </tr>
                <tr>
                  <th>Telp</th>
                  <td>:</td>
                  <td>{{ $data->telp }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 order-xl-2">
    <!-- Progress track -->
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <!-- Title -->
        <h5 class="h3 mb-0">Metode Pembayaran</h5>
      </div>
      <!-- Card body -->
      <div class="card-body">
        <!-- List group -->
        <ul class="list-group list-group-flush list my--3">
          <li class="list-group-item px-0">
            <div class="row align-items-center">
              <div class="col">
                <table>
                  <tr>
                    <td>OVO</td>
                    <td>:</td>
                    <td>{{ setting('ovo') }}</td>
                  </tr>
                  <tr>
                    <td>BRI</td>
                    <td>:</td>
                    <td>{{ setting('bri') }}</td>
                  </tr>
                </table>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- Progress track -->
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <!-- Title -->
        <h5 class="h3 mb-0">History Pembayaran</h5>
      </div>
      <!-- Card body -->
      <div class="card-body">
        <!-- List group -->
        <ul class="list-group list-group-flush list my--3">
          @foreach($history as $h)
          <li class="list-group-item px-0">
            <div class="row align-items-center">
              <div class="col">
                <h5>#{{ $h->id }} Bulan: {{ $h->for_month }}</h5>
                <p class="text-sm">Telah Dibayar Pada {{ Carbon\Carbon::parse($h->created_at)->format('j F Y, H:i') }} Dengan Nominal Rp{{ number_format($h->amount) }}</p>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection