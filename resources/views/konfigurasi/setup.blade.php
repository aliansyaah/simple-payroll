@extends('layouts.master')
@section('title', 'Laravel')
@section('content')
<div class="section-body">
    <!-- <h2 class="section-title">Forms</h2>
    <p class="section-lead">
    Examples and usage guidelines for form control styles, layout options, and custom components for creating a wide variety of forms.
    </p> -->

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            {{-- Jika belum ada data, tampilkan tombol tambah --}}
            @if (sizeof($setup) == 0)
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Tambah Data</button>
            @endif
            <hr>

            {{-- Flash message --}}
            @if (session('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>x</span>
                        </button>
                        {{ session('message') }}
                    </div>
                </div>
            @endif

            <table class="table table-striped table-bordered table-sm">
                <tr>
                    <th>No.</th>
                    <th>Hari Kerja</th>
                    <th>Nama Aplikasi</th>
                    <th>Action</th>
                </tr>
                @foreach ($setup as $no => $val)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $val->jumlah_hari_kerja }}</td>
                        <td>{{ $val->nama_aplikasi }}</td>
                        {{-- <td>1</td>
                        <td>{{ $setup->jumlah_hari_kerja }}</td> --}}
                        <td>
                            <a href="#" data-id="{{ $val->id }}" class="badge badge-warning btn-edit">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{-- Pakai versi bootstrap 4 untuk handle bug pagination --}}
            {{-- {{ $setup->links('pagination::bootstrap-4') }} --}}
        </div>
    </div>
</div>
    @section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-add">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('setup.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- Utk mengubah warna text mjd merah jika ada error --}}
                                    <label @error('nama_aplikasi') class="text-danger" @enderror>
                                        Nama Aplikasi
                                        {{-- Jika ada error, print pesan error --}}
                                        @error('nama_aplikasi')
                                            | {{ $message }}
                                        @enderror
                                    </label>
                                    {{-- old('attr-name') berfungsi agar ketika user ada kesalahan, valuenya tidak hilang --}}
                                    <input type="text" name="nama_aplikasi" class="form-control" value="{{ old('nama_aplikasi') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('jumlah_hari_kerja') class="text-danger" @enderror>
                                        Jumlah Hari Kerja
                                        @error('jumlah_hari_kerja')
                                            | {{ $message }}
                                        @enderror
                                    </label>
                                    <input type="text" name="jumlah_hari_kerja" class="form-control" value="{{ old('jumlah_hari_kerja') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="form-edit">
                    @csrf
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary btn-update">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
@endsection

@push('page-scripts')
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@push('after-script')
<script>
    $(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;   // didapat dari "data-id" di <a href>

        swal({
            title: 'Apakah Anda yakin?',
            text: 'Data yang sudah dihapus tidak bisa dikembalikan lagi!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // Saat kita pilih OK
                // swal('Poof! Your imaginary file has been deleted!', {
                //     icon: 'success',
                // });
                $(`#deleteForm${id}`).submit();
                // $('#deleteForm').submit();
            } else {
                // Saat kita pilih cancel
                // swal('Your imaginary file is safe!');
            }
        });
    });

    @if($errors->any())
        $('#modal-add').modal('show');
    @endif

    $(".btn-edit").on('click', function(){
        // console.log($(this).data('id'));
        let id = $(this).data('id');

        $.ajax({
            url: `/konfigurasi/setup/${id}/edit`,
            method: "GET",
            success: function(data){
                // console.log(data);
                $('#modal-edit').find('.modal-body').html(data);
                $('#modal-edit').modal('show');
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $(".btn-update").on('click', function(){
        let id = $('#form-edit').find('#setup_id').val();
        let formData = $('#form-edit').serialize();
        console.log(id);
        console.log(formData);

        $.ajax({
            url: `/konfigurasi/setup/${id}`,
            method: "PATCH",
            data: formData,
            success: function(data){
                // console.log(data);
                $('#modal-edit').modal('hide');
                window.location.assign('/konfigurasi/setup');
            },
            error: function(err){
                console.log(err);
                console.log('error status: '+err.status);

                let err_log = err.responseJSON.errors;
                if(err.status == 422){
                    if(typeof(err_log.nama_aplikasi) !== 'undefined'){
                        // JQuery, cari elemen dgn id = "modal-edit" & name = "nama_aplikasi",
                        // timpa elemen sblmnya (prev) dgn html span
                        $('#modal-edit').find('[name="nama_aplikasi"]')
                        .prev().html('<span style="color: red">Nama Aplikasi | '+ err_log.nama_aplikasi[0] +'</span>')
                    }else{
                        $('#modal-edit').find('[name="nama_aplikasi"]')
                        .prev().html('<span>Nama Aplikasi</span>')
                    }

                    if(typeof(err_log.jumlah_hari_kerja) !== 'undefined'){
                        $('#modal-edit').find('[name="jumlah_hari_kerja"]')
                        .prev().html('<span style="color: red">Jumlah Hari Kerja | '+ err_log.jumlah_hari_kerja[0] +'</span>')
                        
                        // Atau bisa juga pakai alert
                        // alert('Jumlah Hari Kerja '+err_log.jumlah_hari_kerja[0]);
                    }else{
                        $('#modal-edit').find('[name="jumlah_hari_kerja"]')
                        .prev().html('<span>Jumlah Hari Kerja</span>')
                    }
                }
            }
        });
    });
</script>
@endpush