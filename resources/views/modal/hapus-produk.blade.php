<!-- Default Modals -->
<form action="{{ route('produk.destroy', $prod->id_produk) }}" method="POST" id="hapus">
    @csrf
    @method('DELETE')
    <div id="modalHapus{{ $prod->id_produk }}" class="modal fade" tabindex="-1" aria-labelledby="modalHapus"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Hapus Data Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <span>Apakah anda ingin menghapus data <b>{{ $prod->nama_produk }}</b>?</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
