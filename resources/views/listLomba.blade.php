<!DOCTYPE html>
<html>

<head>
    <title>Pick Your Competitions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>


    <div class="container">
        <br>
        <h1>List of Ongoing Competitions</h1>
        <br>

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
                    <td>
                        <button class="btn btn-info mr-2 show-button" data-id="{{ $m->idLomba }}" data-toggle="modal" data-target="#contohModal">Show</button>
                        
                        <a href="/applyCompetition/{{ $idPen }}/{{ $m->idLomba }}" class='btn btn-primary'>Apply</a>

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
                    <p><strong>ID Lomba:</strong> <span id="idLomba"></span></p>
                    <p><strong>Nama Lomba:</strong> {{ $m->namaLomba }}</p>
                    <p><strong>Kategori Lomba:</strong> {{ $m->kategoriLomba }}</p>
                    <p><strong>Kapasitas:</strong> {{ $m->kapasitas }}</p>
                    <p><strong>Batas Pendaftaran:</strong> {{ $m->batasPendaftaran }}</p>
                    <p><strong>Penyelenggara:</strong> {{ $m->penyelenggara }}</p>
                    <p><strong>Biaya Pendaftaran:</strong> {{ $m->biaya }}</p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.show-button').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/getRingkasan/' + id,
                    type: 'GET',
                    success: function(response) {
                        $('#ringkasanContent').html(response);
                        $('#contohModal').modal('show');
                    },
                    error: function() {
                        // alert('Failed to retrieve summary. Please try again.');
                    }
                });
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.show-button').click(function() {
                var idLomba = $(this).data('id');
                $('#idLomba').text(idLomba);
            });
        });
    </script>


</body>

</html>