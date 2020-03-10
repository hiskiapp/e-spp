@extends('users.layouts.master')
@push('up')
<!-- Page plugins -->
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
@endpush
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
              <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
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
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <h3 class="mb-0">{{ $page_title }}</h3>
        @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }} alert-dismissible fade show mt-3" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text"><strong>{{ ucwords(Session::get('message_type')) }}!</strong> {{ Session::get('message') }}</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
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
      <div class="card-body">
        @if($is_waiting)
        <span class="h2">Mohon Selesaikan Dahulu Pembayaran Sebelumnya!</span>
        @else
        <form class="validation" novalidate method="POST" action="{{ url('transactions/add') }}">
          @csrf

          <input type="number" name="total_spp" id="total_spp" hidden>

          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="date">Tanggal *</label>
              <input type="text" class="form-control" id="date" value="{{ now()->format('j F Y') }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="for_month">Payment Method *</label>
              <select class="form-control" name="payment_method" id="payment_method" required>
                <option selected disabled>== PILIH ==</option>
                <option>OVO</option>
              </select>
              <div class="invalid-feedback">
                Pilih Jenis Pembayaran Terlebih Dahulu.
              </div>
            </div>
          </div>
          <div class="form-row" id="form-spp">
            <div class="col-md-6 mb-3">
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label class="form-control-label" for="name">Pembayaran Bulan Terakhir *</label>
                  <input type="text" class="form-control" id="last_month" value="{{ $last_month }}" readonly>
                </div>
                <div class="col-md-12 mb-3">
                  <label class="form-control-label" for="for_month">Bayar Sampai Bulan *</label>
                  <select class="form-control" name="for_month" id="for_month" required>
                    <option selected disabled>== PILIH ==</option>
                    @foreach($months as $m)
                    <option value="{{ $m['value'] }}">{{ $m['text'] }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Required!
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-control-label" for="detail_spp">Rincian SPP *</label>
              <div class="card-deck" id="detail_spp">
                <div class="card bg-gradient-default">
                  <div class="card-body">
                    <div class="mb-2">
                      <sup class="text-white">Rp</sup> <span id="total_spp_display" class="h2 text-white">0</span>
                      <div class="text-light mt-2 text-sm">Biaya SPP 1 Bulan </div>
                      <div>
                        <span class="text-success font-weight-600">Rp <span class="text-success">{{ number_format($amount_spp) }}</span></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col mb-3">
              <label class="form-control-label" for="description">Pesan Khusus *</label>
              <textarea class="form-control" name="description" id="description" rows="3" placeholder="Optional"></textarea>
            </div>
          </div>
          <button class="btn btn-primary" id="btn-submit" type="submit">Submit</button>
        </form>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
@push('bottom')
<script type="text/javascript">
  $('#for_month').on('change', function () {
    var last_month = {{ $last_month_int }};
    var amount_spp = {{ $amount_spp }};

    var i = ($(this).val() - last_month) * amount_spp;
    $('#total_spp').val(i);
    $('#total_spp_display').html(addCommas(i));
  });

  function addCommas(nStr)
  {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
  }
</script>
@endpush