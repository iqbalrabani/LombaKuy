<!-- confirm-delete-modal.blade.php -->

<!-- Modal Konfirmasi Hapus Data -->
<div id="confirmDeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus anggota ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="deleteMember()">OK</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- confirm-delete-modal.blade.php -->
