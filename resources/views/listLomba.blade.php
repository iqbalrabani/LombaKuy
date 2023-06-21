<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - List Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <h1>LombaKuy!</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lomba</th>
                    <th>Ketegori Lomba</th>
                    <th>Kapasitas</th>
                    <th>Batas Pendaftaran</th>
                    <th>Penyelenggara</th>
                    <th>Biaya</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lombas as $m)
                <tr>
                    <td>{{ $m->idLomba }}</td>
                    <td>{{ $m->namaLomba }}</td>
                    <td>{{ $m->kategoriLomba }}</td>
                    <td>{{ $m->kapasitas }}</td>
                    <td>{{ $m->batasPendaftaran }}</td>
                    <td>{{ $m->penyelenggara }}</td>
                    <td>{{ $m->biaya }}</td>
                    <td><button type='button' class='btn btn-info'>Show</button>
                    <button type='button' class='btn btn-danger'>Apply</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>