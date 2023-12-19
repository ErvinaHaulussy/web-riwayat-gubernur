<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2 class="my-3">Form Tambah Data Gubernur</h2>

                <?= $validation->listErrors(); ?>

                <form action="<?= base_url('users/simpan'); ?>" method="POST">
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <label for="nama_pelabuhan" class="col-sm-2 col-form-label">Nama nama pelabuhan</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>"
                                name="nama" value="<?= old('nama'); ?>">
                            >
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
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
                        <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewimg()">
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

</body>

</html>