<div class="row">

    <div class="col-lg-6 mb-3">

        <label for="nama_barang" class="form-label fw-semibold">

            Nama Barang

        </label>

        <input type="text" name="nama_barang" id="nama_barang"
            class="form-control @error('nama_barang') is-invalid @enderror"
            value="{{ old('nama_barang', $barang?->nama_barang) }}" placeholder="Masukkan nama barang">

        @error('nama_barang')
            <div class="invalid-feedback">

                {{ $message }}

            </div>
        @enderror

    </div>

    <div class="col-lg-6 mb-3">

        <label for="kategori_id" class="form-label fw-semibold">

            Kategori

        </label>

        <select name="kategori_id" id="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror">

            <option value="">-- Pilih Kategori --</option>

            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}"
                    {{ old('kategori_id', $barang?->kategori_id) == $kategori->id ? 'selected' : '' }}>

                    {{ $kategori->nama_kategori }}

                </option>
            @endforeach

        </select>

        @error('kategori_id')
            <div class="invalid-feedback">

                {{ $message }}

            </div>
        @enderror

    </div>

    <div class="col-lg-12 mb-3">

        <label for="deskripsi" class="form-label fw-semibold">

            Deskripsi

        </label>

        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror"
            placeholder="Masukkan deskripsi barang">{{ old('deskripsi', $barang?->deskripsi) }}</textarea>

        @error('deskripsi')
            <div class="invalid-feedback">

                {{ $message }}

            </div>
        @enderror

    </div>

    <div class="col-lg-6 mb-4">

        <label for="harga" class="form-label fw-semibold">

            Harga

        </label>

        <div class="input-group">

            <span class="input-group-text">

                Rp

            </span>

            <input type="number" name="harga" id="harga"
                class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $barang?->harga) }}"
                placeholder="0">

        </div>

        @error('harga')
            <div class="invalid-feedback d-block">

                {{ $message }}

            </div>
        @enderror

    </div>

    <div class="col-lg-6 mb-4">

        <label for="stok" class="form-label fw-semibold">
            Stok
        </label>

        <div class="input-group">

            <span class="input-group-text">

                Stok

            </span>

            <input type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror"
                value="{{ old('stok', $barang?->stok) }}" placeholder="0">

        </div>
        @error('stok')
            <div class="invalid-feedback d-block">

                {{ $message }}

            </div>
        @enderror
    </div>

    //label input barang
    div
    //input gambar 
    
</div>

<div class="col-12">

    <hr>

</div>

<div class="col-12 d-flex justify-content-end gap-2">

    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

    <button type="submit" class="btn btn-primary">

        <i class="bi bi-check-lg"></i>

        Simpan

    </button>

</div>

</div>
