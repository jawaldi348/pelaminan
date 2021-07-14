<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <link href="<?= assets() ?>styles_cetak.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        body,
        td,
        th {
            font-family: sans-serif;
        }

        .currency:before {
            float: left;
            padding-left: 5px;
            content: 'Rp.';
        }

        .currency1 {
            float: right;
            padding-right: 5px;
        }

        .pagebreak {
            visibility: visible;
            page-break-after: always;
        }
    </style>
</head>

<body onload="window.print()">
    <table class="table-list" border="0" style="width: 100%">
        <tr style="font-size: 12pt;">
            <td align="right" width="15%"></td>
            <td align="center" width="70%" height="80px">
                <strong>
                    Pelaminan Basrida Wiwi<br />
                    Simp. Lintas Lubuk Alung, Rumah Perumnas H. Nurdin Belakang Telkom<br />
                    Telp. 085274405566<br />
                    <?= $title ?>
                </strong>
            </td>
            <td align="left" width="15%"></td>
        </tr>
    </table>
    <table class="table-rincian" width="100%">
        <tr align="center">
            <td align="center">No</td>
            <td align="center">Nama</td>
            <td align="center">Alamat</td>
            <td align="center">No HP</td>
            <td align="center">Email</td>
            <td align="center">Tgl Daftar</td>
            <td align="center">Status</td>
        </tr>
        <?php $no = 1;
        foreach ($data as $d) { ?>
            <tr>
                <td align="center"><?= $no ?></td>
                <td><?= $d['nama_pelanggan'] ?></td>
                <td><?= $d['alamat_pelanggan'] ?></td>
                <td><?= $d['phone_pelanggan'] ?></td>
                <td><?= $d['email_pelanggan'] ?></td>
                <td><?= format_timestamp($d['daftar_pelanggan']) ?></td>
                <td align="center"><?= $d['status_pelanggan'] == '1' ? 'Aktif' : 'Tidak Aktif' ?></td>
            </tr>
        <?php $no++;
        } ?>
    </table>
    <table border="0" style="width: 100%; font-size: 10pt;">
        <tr>
            <td width="80%"></td>
            <td style="border-bottom: none;">
                Lubuk Alung, <?= format_indo(date('Y-m-d')) ?><br>
                <br><br><br><br><br><br>
                Pimpinan
            </td>
        </tr>
    </table>
</body>

</html>