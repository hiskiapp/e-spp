@extends('layouts.master')
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
        <form class="validation" novalidate method="POST" action="{{ url('admin/transactions/add') }}">
          @csrf
          
          <input type="number" name="users_id" id="users_id" hidden>
          <input type="number" name="amount_spp" id="amount_spp" hidden>
          <input type="number" name="total_spp" id="total_spp" hidden>

          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label class="form-control-label" for="username">NIS *</label>
              <input type="number" name="username" class="form-control" id="username" placeholder="NIS" required autocomplete="off" data-toggle="modal" data-target="#studentsModal">
              <div class="invalid-feedback">
                Silahkan Isi Form NIS Terlebih Dahulu
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-control-label" for="name">Nama Lengkap *</label>
              <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" required autocomplete="off" readonly>
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-control-label" for="name">Rombel *</label>
              <input type="text" class="form-control" id="rombel" placeholder="Rombel" required autocomplete="off" readonly>
            </div>
          </div>
          <div class="form-row" id="form-spp">
            <div class="col-md-6 mb-3">
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label class="form-control-label" for="name">Pembayaran Bulan Terakhir *</label>
                  <input type="text" class="form-control" id="last_month" placeholder="Nama Lengkap" required autocomplete="off" value="-" readonly>
                  <input type="number" id="last_month_int" hidden>
                </div>
                <div class="col-md-12 mb-3">
                  <label class="form-control-label" for="for_month">Bayar Sampai Bulan *</label>
                  <select class="form-control" name="for_month" id="for_month" required>
                    <option selected disabled>== PILIH ==</option>
                  </select>
                  <div class="invalid-feedback">
                    Pilih Jenis Kelamin Terlebih Dahulu.
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
                        <span class="text-success font-weight-600">Rp <span id="amount_spp_display" class="text-success">0</span></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary" id="btn-submit" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="studentsModal" tabindex="-1" role="dialog" aria-labelledby="studentsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentsModalLabel">Pilih Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table" id="data-students">
            <thead>
              <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Rombel</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('bottom')
<!-- Optional JS -->
<script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

<script type="text/javascript">
  const last_month_int = 0;
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

  var table = $('#data-students').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: '{{ url("admin/json/students") }}',
    },
    columns: [
    { data: 'username', name: 'username' },
    { data: 'name', name: 'name' },
    { data: 'rombel', name: 'rombel' },
    ],
  });

  $('#data-students').on( 'click', 'tr', function () {
    var data = table.row(this).data();
    $('#studentsModal').modal('hide');
    $("#username").val(data.username);
    $("#name").val(data.name);
    $("#rombel").val(data.rombel);

    $.ajax({
      url: "{{ url('admin/json/info-student') }}/"+data.username,
      dataType: "json",
      success: function(data){
        $("#last_month_int").val(data.last_month_int);
        if (data.last_month_int == 12) {
          swal({title:"LUNAS!!",text:"SPP Telah Lunas!",type:"success",buttonsStyling:!1,confirmButtonClass:"btn btn-success"});
          $( "#btn-submit" ).prop( "disabled", true);
          $( "#for_month" ).prop( "disabled", true);
        }else{
          $( "#btn-submit" ).prop( "disabled", false );
          $( "#for_month" ).prop( "disabled", false);
          $("#users_id").val(data.users_id);
          $("#amount_spp").val(data.amount_spp);
          $("#amount_spp_display").html(addCommas(data.amount_spp));
          $('#last_month').val(data.last_month);
          $('#for_month').empty();
          $('#for_month').append($('<option>', { 
              value: '',
              text : '== PILIH ==' 
            }));
          $.each(data.list_month, function (i, item) {
            $('#for_month').append($('<option>', { 
              value: item.value,
              text : item.text 
            }));
          });
        }
      },
      error: function(data) { 
        console.log(data);
      }
    });
  });

  $('#for_month').on('change', function(){
    var i = ($(this).val() - $('#last_month_int').val()) * $('#amount_spp').val();
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