<div class="row">
    <div class="col-md-6">
        <input type="hidden" name="id" value="{{ $setup->id }}" id="setup_id">
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
            <input type="text" name="nama_aplikasi" class="form-control" value="{{ $setup->nama_aplikasi }}">
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
            <input type="text" name="jumlah_hari_kerja" class="form-control" value="{{ $setup->jumlah_hari_kerja }}">
        </div>
    </div>
</div>