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
        @if ($tim->idTim == 1) <!-- Ubah kondisi menjadi $tim->idTim == 1 -->
        @foreach ($users as $user)
        @if ($user->idPengguna == $tim->idPengguna )
        <h3>Welcome, {{ $tim->namaTim }}</h3>

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
                        @if ($member->idTim==1)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $member->namaMember }}</td>
                            <td>{{ $member->kedudukan }}</td>
                            <td>
                                <button class="btn btn-primary" onclick="editMember(this)">Edit</button>
                                <form action="{{ route('deleteMember', ['namaMember' => $member->namaMember]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        <tr id="addMemberRow" style="display: none;">
                            <td colspan="4">
                                @include('tim.add-member-form')
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        @endforeach
        @endif
        @endforeach

        <!-- Tombol Submit untuk Kembali ke Halaman Lain -->
        <div class="row mt-3">
            <div class="col">
                <form action="yourCompetitionx" method="GET">
                    <button type="submit" class="btn btn-primary">Kembali</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function editMember(button) {
            var row = $(button).closest('tr'); // Mendapatkan baris terdekat yang berisi data member
            var namaMember = row.find('td:nth-child(2)').text(); // Mendapatkan nama member dari kolom kedua pada baris tersebut
            var kedudukan = row.find('td:nth-child(3)').text(); // Mendapatkan kedudukan member dari kolom ketiga pada baris tersebut

            // Menampilkan form edit member dengan data yang sudah ada
            var addMemberRow = $('#addMemberRow');
            addMemberRow.find('input[name="namaMember"]').val(namaMember); // Mengisi input namaMember pada form dengan data namaMember yang sudah ada
            addMemberRow.find('input[name="kedudukan"]').val(kedudukan); // Mengisi input kedudukan pada form dengan data kedudukan yang sudah ada
            addMemberRow.show(); // Menampilkan form edit member
        }
    </script>
</body>

</html>