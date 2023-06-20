<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tim Lomba</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>List Lomba</h1>
        @php
            $tims = \App\Models\Tim::all();
        @endphp
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Tim</th>
                    <th scope="col">Nama Tim</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tims as $key => $tim)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $tim->idTim }}</td>
                    <td>{{ $tim->namaTim }}</td>
                    <td>
                        <a class="btn btn-primary">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Tidak ada tim yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
