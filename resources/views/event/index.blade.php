<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - List Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <h1>Admin Dashboard</h1>
        <br>
        <form action="/event/add" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" id="idLomba" name="idLomba" placeholder="ID">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" id="namaLomba" name="namaLomba" placeholder="Nama lomba">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" id="kategoriLomba" name="kategoriLomba"
                        placeholder="Kategori">
                </div>
                <div class="form-group col-md-1">
                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" onfocus="(this.type='date')" class="form-control" id="batasPendaftaran"
                        name="batasPendaftaran" placeholder="Batas pendaftaran">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara"
                        placeholder="Penyelenggara">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya">
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-success">Add Lomba</button>
                </div>
            </div>
        </form>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lomba</th>
                    <th>Kategori Lomba</th>
                    <th>Kapasitas</th>
                    <th>Batas Pendaftaran</th>
                    <th>Penyelenggara</th>
                    <th>Biaya</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lombas as $l)    
                    <tr>
                        <td>{{ $l->idLomba }}</td>
                        <td>{{ $l->namaLomba }}</td>
                        <td>{{ $l->kategoriLomba }}</td>
                        <td>{{ $l->kapasitas }}</td>
                        <td>{{ $l->batasPendaftaran }}</td>
                        <td>{{ $l->penyelenggara }}</td>
                        <td>{{ $l->biaya }}</td>
                        <td>
                            <button class="btn btn-info mr-2 show-button" data-id="{{ $l->idLomba }}" data-toggle="modal" data-target="#contohModal">Show</button>
                            {{-- <button type="submit" class="btn btn-info mr-2" data-toggle="modal" data-target="#contohModal">Show</button> --}}
                            <a href='/event/edit/{{$l->idLomba}}' class='btn btn-primary mr-2'>Edit</a>
                            <a href='/event/delete/{{$l->idLomba}}' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'>Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal untuk menampilkan ringkasan lomba -->
    <div class="modal fade" id="contohModal" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Ringkasan Lomba</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>ID Lomba:</strong> {{ $l->idLomba }}</p>
                    <p><strong>Nama Lomba:</strong> {{ $l->namaLomba }}</p>
                    <p><strong>Kategori Lomba:</strong> {{ $l->kategoriLomba }}</p>
                    <p><strong>Kapasitas:</strong> {{ $l->kapasitas }}</p>
                    <p><strong>Batas Pendaftaran:</strong> {{ $l->batasPendaftaran }}</p>
                    <p><strong>Penyelenggara:</strong> {{ $l->penyelenggara }}</p>
                    <p><strong>Biaya Pendaftaran:</strong> {{ $l->biaya }}</p>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('.show-button').click(function () {
                var id = $(this).data('id');
                $.ajax({
                    url: '/getRingkasan/' + id,
                    type: 'GET',
                    success: function (response) {
                        $('#ringkasanContent').html(response);
                        $('#contohModal').modal('show');
                    },
                    error: function () {
                        alert('Failed to retrieve summary. Please try again.');
                    }
                });
            });
        });
    </script>
</body>
</html>