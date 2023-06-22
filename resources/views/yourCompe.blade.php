<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - List Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div>
        <header class="d-flex justify-content-end py-3 mb-4 border-bottom">
            <ul class="nav nav-pills ms-auto">
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">Mahasiswa</a>
                  </li> --}}
              <li class="nav-item">
                <a href="/sesi/logout" class="nav-link active" aria-current="page">LOGOUT</a>
              </li>

            </ul>
          </header>

    </div>
    <div class="container">
        <br>
        <h1>LombaKuy!</h1>
        <br>
        <br>
        <form method="GET" action="{{ route('registration.submit') }}">
            @csrf

            <div class="form-row align-items-center">
                <h3>Your Competitions</h3>
                <div class="col text-right">
                    <button type="submit" class="btn btn-primary">Register New Competition</button>
                </div>
            </div>
        </form>
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
                    <th>Team Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_lombas as $x)
                @if ($x->idPengguna==1)
                @foreach ($lombas as $m)
                @if ($x->idLomba == $m->idLomba )
                <tr>
                    <td>{{ $m->idLomba }}</td>
                    <td>{{ $m->namaLomba }}</td>
                    <td>{{ $m->kategoriLomba }}</td>
                    <td>{{ $m->kapasitas }}</td>
                    <td>{{ $m->batasPendaftaran }}</td>
                    <td>{{ $m->penyelenggara }}</td>
                    <td>{{ $m->biaya }}</td>
                    <td><button type='button' class='btn btn-info'>Show Team</button></td>
                    <td><a href='/lomba/delete/{{$m->idLomba}}' class='btn btn-danger'>Delete</a></td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>