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
                {{-- <a href="{{ route('crud.add') }}" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> --}}
                {{-- <a href="{{ url('home') }}" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> --}}
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data</button>
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
                    <th>Action</th>
                </tr>
                @foreach ($setup as $no => $val)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $val->jumlah_hari_kerja }}</td>
                        {{-- <td>1</td>
                        <td>{{ $setup->jumlah_hari_kerja }}</td> --}}
                        <td>
                            <a href="{{ route('crud.edit', $val->id) }}" class="badge badge-warning">Edit</a>
                            {{-- <a href="{{ route('crud.edit', $setup->id) }}" class="badge badge-warning">Edit</a> --}}

                            {{-- "id" pada atribut data-id adalah nama dataset --}}
                            {{-- <a href="#" data-id="{{ $val->id }}" class="badge badge-danger swal-confirm">
                                <form action="{{ route('crud.delete', $val->id) }}" id="deleteForm{{ $val->id }}" method="POST">
                                <form action="{{ route('crud.delete', $val->id) }}" id="deleteForm" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                                Delete
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
            </table>
            {{-- For pagination button --}}
            {{-- {{ $setup->links() }} --}}
            
            {{-- Pakai versi bootstrap 4 untuk handle bug pagination --}}
            {{-- {{ $setup->links('pagination::bootstrap-4') }} --}}
        </div>
    </div>
</div>
    @section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
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
</script>
@endpush