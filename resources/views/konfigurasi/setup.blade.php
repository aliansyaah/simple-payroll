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
            <!-- <a href="/crud/add" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> -->
            {{-- <a href="{{ route('crud.add') }}" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> --}}
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
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Action</th>
                </tr>
                @foreach ($inventory as $no => $val)
                    <tr>
                        <td>{{ $inventory->firstItem()+$no }}</td>
                        <td>{{ $val->inventory_kode }}</td>
                        <td>{{ $val->inventory_name }}</td>
                        <td>
                            {{-- <a href="{{ route('crud.edit', $val->id) }}" class="badge badge-warning">Edit</a> --}}

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
            {{-- {{ $inventory->links() }} --}}
            
            {{-- Pakai versi bootstrap 4 untuk handle bug pagination --}}
            {{ $inventory->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
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