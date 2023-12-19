<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        /* Add custom styles here */
        .img-preview {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2 class="my-3">Form Tambah Data Gubernur</h2>

                <?= $validation->listErrors(); ?>

                <form action="/riwayat/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <label for="nama_gubernur" class="col-sm-2 col-form-label">Nama Gubernur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_gubernur" name="nama_gubernur" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tahun_menjabat" class="col-sm-2 col-form-label">Tahun Menjabat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tahun_menjabat" name="tahun_menjabat">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="periode" name="periode">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="wakil_gubernur" class="col-sm-2 col-form-label">Wakil Gubernur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="wakil_gubernur" name="wakil_gubernur">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="asal_partai" class="col-sm-2 col-form-label">Asal Partai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="asal_partai" name="asal_partai">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-4">
                            <img src="/img/default.jpeg" class="img-thumbnail img-preview" alt="Preview">
                        </div>
                        <div class="col-sm-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto"
                                    onchange="previewimg()">
                                <label class="custom-file-label" for="foto">Pilih Gambar</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewimg() {
            const sampul = document.querySelector('#foto');
            const sampullabel = document.querySelector('.custom-file-label');
            const imgpreview = document.querySelector('.img-preview');

            // Periksa apakah ada berkas yang dipilih
            if (sampul.files.length > 0) {
                sampullabel.textContent = sampul.files[0].name;

                const filesampul = new FileReader();
                filesampul.readAsDataURL(sampul.files[0]);

                filesampul.onload = function (e) {
                    imgpreview.src = e.target.result;
                };
            } else {
                sampullabel.textContent = 'Pilih berkas sampul';
                imgpreview.src = ''; // Reset gambar pratinjau jika tidak ada berkas yang dipilih
            }
        }
    </script>
</body>

</html>