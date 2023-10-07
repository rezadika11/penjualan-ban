<!-- Default Modals -->
<form action="{{ route('penjualan.destroy', $item->id_penjualan) }}" method="POST" id="hapus">
    @csrf
    @method('DELETE')
    <div id="modalHapus{{ $item->id_penjualan }}" class="modal fade" tabindex="-1" aria-labelledby="modalHapus"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Hapus Data Penjualan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <span>Apakah anda ingin menghapus penjualan?</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
