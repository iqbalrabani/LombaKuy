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
                <form id="timForm" method="POST" action="/tim/simpan-tim">
                    @csrf
                    <div class="form-group">
                        <label for="namaTim">Nama Tim:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="namaTim" name="namaTim" placeholder="Masukkan Nama Tim">
                            <div class="input-group-append">
                                <button id="simpanBtn" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="POST" action="/tim/tambah-member">
                    @csrf
                    <div class="form-group">
                        <label for="namaMember">Nama Anggota:</label>
                        <input type="text" class="form-control" id="namaMember" name="namaMember" placeholder="Masukkan Nama Anggota">
                    </div>
                    <div class="form-group">
                        <label for="kedudukan">Kedudukan:</label>
                        <input type="text" class="form-control" id="kedudukan" name="kedudukan" placeholder="Masukkan Kedudukan">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Anggota</button>
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
                            <th scope="col">Kedudukan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $index => $member)
                        @if ($member->idTim==$idPengguna)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $member->namaMember }}</td>
                            <td>{{ $member->kedudukan }}</td>
                            <td>
                                <form action="{{ route('deleteMember', ['namaMember' => $member->namaMember]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#timForm').submit(function(e) {
                e.preventDefault(); // Mencegah form dikirim secara default

                var namaTim = $('#namaTim').val(); // Mengambil nilai dari input namaTim
                $('#namaTim').val(namaTim); // Memasukkan nilai namaTim ke dalam input namaTim
                this.submit(); // Mengirimkan form setelah nilai namaTim dimasukkan
            });
        });
    </script>
</body>

</html>