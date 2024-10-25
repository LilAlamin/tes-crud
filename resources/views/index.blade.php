<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <a href="/tambah-pegawai" class="btn btn-primary">Tambah Data</a>
    <table class="table table dark">
        <tr>
            <td>NIP</td>
            <td>Nama Pegawai</td>
            <td>Tanggal Lahir</td>
            <td>Tempat Lahir</td>
            <td>Alamat</td>
            <td>Aksi</td>
        </tr>
        @foreach ($data as $dat)
        @if ($dat->is_delete == 0)

        <tr>
            <td>{{ $dat->NIP }}</td>
            <td>{{ $dat->Nama }}</td>
            <td>{{ $dat->tanggal_lahir }}</td>
            <td>{{ $dat->tempat_lahir }}</td>
            <td>{{ $dat->alamat }}</td>
            <td>
                <a href="{{ route('edit_pegawai', $dat->id) }}" class="btn btn-warning">
                    Edit
                </a>

            </td>
            <td>
                <a href="#" class="btn btn-danger btn-hapus" data-id="{{ $dat->id }}">Hapus</a>
                <form id="delete-form-{{ $dat->id }}" action="{{ route('delete_pegawai', $dat->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

            </tr>
        @endif
        @endforeach
    </table>
</body>

<script>
    document.querySelectorAll('.btn-hapus').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah link langsung aktif
            const id = this.getAttribute('data-id'); // Ambil ID pegawai

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form secara otomatis
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
