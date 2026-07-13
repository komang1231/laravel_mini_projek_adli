<div class="row">
    <div class="col-lg-12 mb-3">
        <label for="nama_kategori" class="form-label fw-semibold">
            Nama Kategori
        </label>

        <input
            type="text"
            name="nama_kategori"
            id="nama_kategori"
            class="form-control @error('nama_kategori') is-invalid @enderror"
            value="{{ old('nama_kategori', $kategori?->nama_kategori) }}"
            placeholder="Masukkan nama kategori">

        @error('nama_kategori')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-12">
        <hr>
    </div>

    <div class="col-12 d-flex justify-content-end gap-2">
        <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-lg"></i>
            Simpan
        </button>
    </div>
</div>