<!DOCTYPE html>
<html>

<head>
    <title>Daftar Tim Lomba</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Daftar Tim Lomba</h1>
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
                                <button class="btn btn-primary">Add New Member</button>
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
                                <button class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>789012</td>
                            <td>Anggota</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger" onclick="confirmDelete()">Kick</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
        @endforeach
    </div>
</body>
@include('tim/confirm-delete-modal')

<script>
    function confirmDelete() {
        $('#confirmDeleteModal').modal('show');
    }
</script>

</html>