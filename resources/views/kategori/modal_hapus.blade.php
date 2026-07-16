<!-- MODAL DELETE -->

<div class="modal fade" id="deleteModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Hapus Kategori

                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">
                @if (isset($kategori) && $kategori->barangs->count() > 0)
                    
                        Kategori ini memiliki barang terkait. Anda tidak dapat menghapus kategori ini.
                    
                @else
                    Apakah kamu yakin ingin menghapus kategori ini?
                    <strong id="deleteBarangName"></strong> ?
                @endif


            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary" data-bs-dismiss="modal">

                    Batal

                </button>

                <button type="button" class="btn btn-danger" 
                id="confirmDelete"
                data-bs-dismiss="modal">
                
                
                    Ya, Hapus
                </button>

            </div>

        </div>

    </div>

</div>
