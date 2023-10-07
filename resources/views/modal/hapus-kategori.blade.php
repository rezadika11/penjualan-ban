<!-- Default Modals -->
<form action="{{ route('kategori.destroy', $kat->id_kategori) }}" method="POST" id="hapus">
    @csrf
    @method('DELETE')
    <div id="modalHapus{{ $kat->id_kategori }}" class="modal fade" tabindex="-1" aria-labelledby="modalHapus"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Hapus Data Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <span>Apakah anda ingin menghapus data <b>{{ $kat->nama_kategori }}</b>?</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
