<!DOCTYPE html>
<html>

<head>
    <title>Detail Tim Lomba</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Detail Tim Lomba</h1>
        @foreach($tims as $tim)
        
        <h3>Welcome, {{ $tim->namaTim }}</h3>

        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Tim ID</th>
                            <th scope="col">Nama Tim</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $tim->idTim }}</td>
                            <td>{{ $tim->namaTim }}</td>
                            <td class="text-center">
                                <button class="btn btn-primary" onclick="showAddMemberForm()">Add New Member</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">ID Pengguna</th>
                            <th scope="col">Kedudukan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>123456</td>
                            <td>Ketua</td>
                            <td>
                                <button class="btn btn-primary" onclick="editMember(this)">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>789012</td>
                            <td>Anggota</td>
                            <td>
                                <button class="btn btn-primary" onclick="editMember(this)">Edit</button>
                                <button class="btn btn-danger" onclick="confirmDelete(this)">Kick</button>
                            </td>
                        </tr>
                        <tr id="addMemberRow" style="display: none;">
                            <td></td>
                            <td><input type="text" class="form-control" placeholder="Nama"></td>
                            <td><input type="text" class="form-control" placeholder="ID Pengguna"></td>
                            <td><input type="text" class="form-control" placeholder="Kedudukan"></td>
                            <td>
                                <button class="btn btn-primary" onclick="saveMember(this)">Save</button>
                                <button class="btn btn-secondary" onclick="cancelAddMember(this)">Cancel</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <a class="btn btn-primary" href="{{ url('/yourCompetition') }}">Save</a>
            </div>
        </div>
        @endforeach
    </div>

    @include('tim.confirm-delete-modal')

    <script>
        function confirmDelete(button) {
            // Mengatur referensi baris yang akan dihapus
            var row = $(button).closest('tr');
            $('#confirmDeleteModal').data('row', row).modal('show');
        }

        function deleteMember() {
            var row = $('#confirmDeleteModal').data('row');
            row.remove();
            $('#confirmDeleteModal').modal('hide');
        }

        function showAddMemberForm() {
            var addMemberRow = $('#addMemberRow');
            var clonedRow = addMemberRow.clone();
            clonedRow.removeAttr('id').show();
            clonedRow.find('input').val('');
            clonedRow.insertBefore(addMemberRow);
        }

        function cancelAddMember(button) {
            var row = $(button).closest('tr');
            row.remove();
        }

        function editMember(button) {
            var row = $(button).closest('tr');
            var columns = row.find('td');

            // Get the values from the current row
            var nama = columns.eq(1).text();
            var idPengguna = columns.eq(2).text();
            var kedudukan = columns.eq(3).text();

            // Create input fields to edit the values
            var namaInput = '<input type="text" class="form-control" value="' + nama + '">';
            var idPenggunaInput = '<input type="text" class="form-control" value="' + idPengguna + '">';
            var kedudukanInput = '<input type="text" class="form-control" value="' + kedudukan + '">';

            // Replace the values in the row with input fields
            columns.eq(1).html(namaInput);
            columns.eq(2).html(idPenggunaInput);
            columns.eq(3).html(kedudukanInput);

            // Change the button to "Save"
            var saveButton = '<button class="btn btn-primary" onclick="saveMember(this)">Save</button>';
            $(button).replaceWith(saveButton);

            var cancelButton = '<button class="btn btn-danger" onclick="confirmDelete(this)">Kick</button>';
            row.find('.btn-secondary').replaceWith(cancelButton);
        }

        function saveMember(button) {
            var row = $(button).closest('tr');
            var columns = row.find('td');

            // Get the updated values from the input fields
            var nama = columns.eq(1).find('input').val();
            var idPengguna = columns.eq(2).find('input').val();
            var kedudukan = columns.eq(3).find('input').val();

            // Update the row with the new values
            columns.eq(1).html(nama);
            columns.eq(2).html(idPengguna);
            columns.eq(3).html(kedudukan);

            // Change the button back to "Edit"
            var editButton = '<button class="btn btn-primary" onclick="editMember(this)">Edit</button>';
            $(button).replaceWith(editButton);

            // Change the "Cancel" button to "Kick"
            var cancelButton = '<button class="btn btn-danger" onclick="confirmDelete(this)">Kick</button>';
            row.find('.btn-secondary').replaceWith(cancelButton);
        }
    </script>
</body>

</html>