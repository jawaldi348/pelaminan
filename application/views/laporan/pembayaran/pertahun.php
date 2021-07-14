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
            <td>Tahun: <?= $tahun ?></td>
        </tr>
    </table>
    <table class="table-rincian" width="100%">
        <tr align="center">
            <td align="center">No</td>
            <td align="center">Bulan</td>
            <td align="center">Total Bayar</td>
        </tr>
        <?php $total = 0;
        $jml = 0;
        $nama_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        for ($bln = 1; $bln <= 12; $bln++) {
            $value = $this->db->query("SELECT count(id_konfirmasi) as jumlah,sum(jumlah_konfirmasi) as total FROM konfirmasi_bayar WHERE status_konfirmasi=1 AND DATE_FORMAT(tanggal_transfer,'%c')='$bln' AND DATE_FORMAT(tanggal_transfer,'%Y')='$tahun'")->row_array();
            echo "<tr>";
            echo "<td align='center'>$bln.</td>";
            echo "<td>$nama_bln[$bln]</td>";
            echo "<td align='right'>" . rupiah($value['total']) . "</td>";
            echo "</tr>";
            $total = $total + $value['total'];
            $jml = $jml + $value['jumlah'];
        }
        ?>
        <tr>
            <td colspan="2" align="right">Total</td>
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