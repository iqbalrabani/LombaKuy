<!DOCTYPE html>
<html>
<head>
    <title>Form Tim Lomba</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Daftar Lomba</h1>
        <div class="row mt-3">
            <div class="col">
                <form>
                    <div class="form-group">
                        <label for="namaTim">Nama Tim:</label>
                        <input type="text" class="form-control" id="namaTim" placeholder="Masukkan Nama Tim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Anggota:</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anggota">
                    </div>
                    <div class="form-group">
                        <label for="idPengguna">ID Pengguna:</label>
                        <input type="text" class="form-control" id="idPengguna" placeholder="Masukkan ID Pengguna">
                    </div>
                    <div class="form-group">
                        <label for="kedudukan">Kedudukan:</label>
                        <input type="text" class="form-control" id="kedudukan" placeholder="Masukkan Kedudukan">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addMember()">Tambah Anggota</button>
                </form>
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
                    <tbody id="anggotaTableBody"></tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button class="btn btn-primary" onclick="saveTim()">Simpan</button>
                <button class="btn btn-secondary" onclick="resetForm()">Reset</button>
            </div>
        </div>
    </div>
    <script>
        var anggotaCounter = 0;

        function addMember() {
            var nama = $('#nama').val();
            var idPengguna = $('#idPengguna').val();
            var kedudukan = $('#kedudukan').val();

            if (nama !== '' && idPengguna !== '' && kedudukan !== '') {
                anggotaCounter++;
                var anggotaRow = '<tr>' +
                    '<td>' + anggotaCounter + '</td>' +
                    '<td>' + nama + '</td>' +
                    '<td>' + idPengguna + '</td>' +
                    '<td>' + kedudukan + '</td>' +
                    '<td><button class="btn btn-danger" onclick="removeMember(this)">Hapus</button></td>' +
                    '</tr>';
                $('#anggotaTableBody').append(anggotaRow);

                // Reset input fields
                $('#nama').val('');
                $('#idPengguna').val('');
                $('#kedudukan').val('');
            }
        }

        function removeMember(button) {
            $(button).closest('tr').remove();
        }

        function saveTim() {
            var namaTim = $('#namaTim').val();
            var anggotaRows = $('#anggotaTableBody tr');

            if (namaTim !== '' && anggotaRows.length > 0) {
                // Prepare data to be sent to the server
                var timData = {
                    namaTim: namaTim,
                    anggota: []
                };

                anggotaRows.each(function() {
                    var anggotaData = {
                        nama: $(this).find('td:nth-child(2)').text(),
                        idPengguna: $(this).find('td:nth-child(3)').text(),
                        kedudukan: $(this).find('td:nth-child(4)').text()
                    };
                    timData.anggota.push(anggotaData);
                });

                // Send the data to the server
                $.ajax({
                    url: '/yourCompetition',
                    method: 'POST',
                    data: JSON.stringify(timData),
                    contentType: 'application/json',
                    success: function(response) {
                        console.log('Tim berhasil disimpan:', response);
                        resetForm();
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan:', error);
                    }
                });
            } else {
                console.error('Form tidak lengkap!');
            }
        }

        function resetForm() {
            $('#namaTim').val('');
            $('#nama').val('');
            $('#idPengguna').val('');
            $('#kedudukan').val('');
            $('#anggotaTableBody').empty();
            anggotaCounter = 0;
        }
    </script>
</body>
</html>
