<!-- add-member-form.blade.php -->
<form id="addMemberForm" method="POST" action="{{ route('tambahMember') }}">
    @csrf
    <tr>
        <td></td>
        <td>
            <div class="form-group">
                <input type="text" class="form-control" id="namaMember" name="namaMember" placeholder="Masukkan Nama Anggota">
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="text" class="form-control" id="kedudukan" name="kedudukan" placeholder="Masukkan Kedudukan">
            </div>
        </td>
        <td>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <!-- <button class="btn btn-secondary" onclick="cancelAddMember(this)">Cancel</button> -->
        </td>
    </tr>
</form>