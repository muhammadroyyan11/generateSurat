<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body {
            font-family: 'Times New Roman';
            background-color: #fff;
        }

        .kopSurat {
            width: 750px;
            margin: 0 auto;
            background-color: #fff;
            height: 500px;
            padding: 20px;
        }

        .koptable {
            border-bottom: 3px solid #000;
            padding: 0px;
            width: 100%;
        }

        .tengah {
            text-align: center;
            line-height: 7px;
        }

        .nosurat {
            margin-top: 20px;
            padding: 0px;
            width: 60%;
        }

        .isino {
            margin-top: 10px;
            font-size: 13pt;
        }

        .isi-surat {
            font-size: 13pt;
            line-height: 30px;
        }

        .biodata {
            margin-left: 7%;
        }

        .ttd {
            margin-left: 75%;
            text-align: left;
        }

        .ttd-table {
            width: 100%;
        }
    </style>
</head>
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<body onload="window.print()">
    <div class="kopSurat">
        <table class="koptable">
            <tr>
                <td><img src="https://akademik.iaiq.ac.id/wp-content/uploads/2023/05/LOGO-IAIQ.png" alt="" width="130px"></td>
                <td class="tengah">
                    <h2>INSTITUTE AGAMA ISLAM AL-QODIRI JEMBER</h2>
                    <b>Terakreditasi BAN-PT; NOMOR: 1486/SK/BAN-PT/Ak.KP/IX/2022</b>
                    <p>Sekretariat: Jl.Manggar 139-A Gebang Poreng Po.Box.161-Patrang Jember 68117</p>
                    <p>Telp. 0341 - 412034, Website: www.iaiq.ac.id E-mail: akademik@iaiq.ac.id</p>
                </td>
            </tr>
        </table>
        <table class="nosurat">
            <tr class="isino">
                <td style="width: 100px;">Nomor</td>
                <td>:</td>
                <td><?= $row->nomor_surat?></td>
            </tr>
            <tr class="isino">
                <td style="width: 100px;">Lampiran</td>
                <td>:</td>
                <td>-</td>
            </tr>
            <tr class="isino">
                <td style="width: 100px;">Perihal</td>
                <td>:</td>
                <td><b>Surat Keterangan Aktif Kuliah</b></td>
            </tr>
        </table><br><br><br>
        <div class="isi-surat">
            <p>Yang bertanda tangan dibawah ini Rektor Institut Agama Islam (IAI) Al-Qodiri Jember,
                menerangkan bahwa :</p>
        </div>

        <table class="biodata" style="width: 100%;">
            <tr class="isino">
                <td style="width: 170px;">Nama</td>
                <td>:</td>
                <td><?= $row->nama_lengkap ?></td>
            </tr>
            <tr class="isino">
                <td style="width: 170px;">Tempat,Tgl lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>:</td>
                <td><?= $row->tempat_lahir ?>, <?= tgl_indo($row->tgl_lahir) ?></td>
            </tr>
            <tr class="isino">
                <td style="width: 170px;">NIK/KTP</td>
                <td>:</td>
                <td><?= $row->nik ?></td>
            </tr>
            <tr class="isino">
                <td style="width: 170px;">NIM</td>
                <td>:</td>
                <td><?= $row->nim ?></td>
            </tr>
            <tr class="isino">
                <td style="width: 170px;">Fakultas</td>
                <td>:</td>
                <td><?= $row->fakultas ?></td>
            </tr>
            <tr class="isino">
                <td style="width: 170px;">Program Studi</td>
                <td>:</td>
                <td><?= $row->program_studi ?></td>
            </tr>
        </table><br><br>
        <div class="isi-surat">
            <p>Adalah benar-benar tercatat sebagai mahasiswa aktif Tahun Akademik <?= $row->tahun_akademik ?> Semester <?= $row->semester ?> di Institut Agama Islam Al-Qodiri Jember.</p>
            <p>Demikian surat keterangan ini dibuat, untuk digunakan sebagaimana mestinya.</p>
        </div><br>
        <div class="ttd">
            <table border="0    " style="width: 10rem;">
                <tr>
                    <td>Jember, <?= tgl_indo($row->tanggal_pembuatan) ?></td>
                </tr>
                <tr>
                    <td>Ka.Biro.AUAKK</td>
                </tr>
                <!-- ttd barcode  -->
                <tr>
                    <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmn5wzwwFIX8tiK81gDL0nQ3RSyrDUjqpyEg&s" alt="" width="75%"></td>
                </tr>
                <tr>
                    <td><b><u>Ja’far Sodiq, M.Pd.I</u></b></td>
                </tr>
            </table><br><br>
        </div>
        <div class="tembusan">
            <label for="tembusan">Tembusan :</label>
            <ol>
                <li>Rektor IAl-Qodiri Jember</li>
                <li>Dekan Fakultas <?= $row->fakultas?></li>
                <li>Ka.Prodi</li>
                <li>Arsip</li>
            </ol>
        </div>
    </div>
</body>

</html>