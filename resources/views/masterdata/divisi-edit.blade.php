<div class="row">
    <div class="col-md-6">
        <input type="hidden" name="id" value="{{ $divisi->id }}" id="setup_id">
        <div class="form-group">
            {{-- Utk mengubah warna text mjd merah jika ada error --}}
            <label @error('nama') class="text-danger" @enderror>
                Nama Divisi
                {{-- Jika ada error, print pesan error --}}
                @error('nama')
                    | {{ $message }}
                @enderror
            </label>
            {{-- old('attr-name') berfungsi agar ketika user ada kesalahan, valuenya tidak hilang --}}
            <input type="text" name="nama" class="form-control" value="{{ $setup->nama }}">
        </div>
    </div>
</div>