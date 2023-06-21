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
        <h3>Register More Competitions ?</h3>
        <form method="GET" action="{{ route('registration.submit') }}">
            @csrf

            <div class="form-row align-items-center">
                <div class="col">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama Tim" required>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </div>
        </form>

        <br>
        <h3>Your Competitions</h3>
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
                    <th>Team Info</th>
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
                    <td><button type='button' class='btn btn-info'>Show Team</button></td>
                    <td><button type='button' class='btn btn-danger'>Delete</button></td>
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