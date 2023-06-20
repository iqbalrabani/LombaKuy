<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tim Lomba</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Tim Lomba</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Tim</th>
                    <th scope="col">Nama Tim</th>
                    <th scope="col">ID Pengguna</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tims as $tim)
                <tr>
                    <td>{{ $tim->idTim }}</td>
                    <td>{{ $tim->namaTim }}</td>
                    <td>{{ $tim->idPengguna }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Tidak ada tim yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
