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
    <table border="0" style="width: 100%; font-size: 10pt;">
        <tr>
            <td>Tanggal : <?= format_indo($awal) . ' s/d ' . format_indo($akhir) ?></td>
        </tr>
    </table>
    <table class="table-rincian" width="100%">
        <tr align="center">
            <td align="center">No</td>
            <td align="center">No Pesanan</td>
            <td align="center">Pelanggan</td>
            <td align="center">Tanggal Transfer</td>
            <td align="center">Bank</td>
            <td align="center">No Rekening</td>
            <td align="center">Nominal</td>
        </tr>
        <?php $no = 1;
        $total = 0;
        foreach ($data as $d) {
            $total = $total + $d['jumlah_konfirmasi'];
        ?>
            <tr>
                <td align="center"><?= $no ?></td>
                <td><?= $d['id_pesan'] ?></td>
                <td><?= $d['nama_pelanggan'] ?></td>
                <td><?= format_biasa($d['tanggal_transfer']) ?></td>
                <td><?= $d['nama_bank'] ?></td>
                <td><?= $d['nomor_rekening'] ?></td>
                <td><?= akuntansi($d['jumlah_konfirmasi']) ?></td>
            </tr>
        <?php $no++;
        } ?>
        <tr>
            <td colspan="6" align="right">Total</td>
            <td align="right"><?= akuntansi($total); ?></td>
        </tr>
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