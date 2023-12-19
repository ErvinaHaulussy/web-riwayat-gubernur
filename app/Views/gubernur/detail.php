<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        /* Add custom styles here */
        .mt-2 {
            margin-top: 2rem;
        }

        .center {
            text-align: center;
        }

        .table td {
            width: 50%;
            /* Set width for each column */
        }

        .table th,
        .table td {
            text-align: left;
        }

        .img-container {
            text-align: center;
        }

        .img-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mt-2 mb-4 center">Detail Riwayat</h2>
                <div class="img-container">
                    <img src="/img/<?= $daerah['foto'] ?>" class="img-fluid rounded-start" alt="..."
                        style="width: 25%; height: auto;">
                </div>

                <table class="table mt-4">
                    <tbody>
                        <tr class="table-primary">
                            <td>Nama Gubernur</td>
                            <td>
                                <?= $daerah['nama_gubernur'] ?>
                            </td>
                        </tr>
                        <tr class="table-success">
                            <td>Tahun Menjabat</td>
                            <td>
                                <?= $daerah['tahun_menjabat'] ?>
                            </td>
                        </tr>
                        <tr class="table-danger">
                            <td>Periode</td>
                            <td>
                                <?= $daerah['periode'] ?> tahun
                            </td>
                        </tr>
                        <tr class="table-info">
                            <td>Wakil Gubernur</td>
                            <td>
                                <?= $daerah['wakil_gubernur'] ?>
                            </td>
                        </tr>
                        <tr class="table-warning">
                            <td>Asal Partai</td>
                            <td>
                                <?= $daerah['asal_partai'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="/riwayat/edit/<?= $daerah['slug']; ?>" class="btn btn-warning">Edit</a>
                <br><br>
                <a href="/riwayat" class="btn btn-primary text-left">kembali ke riwayat Gubernur</a>

            </div>
        </div>
    </div>
</body>

</html>