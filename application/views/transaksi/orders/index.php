<div class="row">
    <div class="col-xs-12">
        <div class="table-header">Daftar Pesanan</div>
        <div class="box-body table-responsive">
            <table id="data-tabel" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">No Pesan</th>
                        <th>Pelanggan</th>
                        <th>Tanggal Pesan</th>
                        <th>Tanggal Acara</th>
                        <th>Total Bayar</th>
                        <th>Sudah Bayar</th>
                        <th>Sisa Bayar</th>
                        <th class="center">Status</th>
                        <th class="center" width="100px">#</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<div id="tampil_modal"></div>
<script>
    $(document).ready(function() {
        load_data();
    });

    function load_data() {
        $.ajax({
            url: "<?= site_url('orders/data') ?>",
            method: "POST",
            data: {
                action: 'fetch_data'
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                for (var count = 0; count < data.length; count++) {
                    html += '<tr>';
                    html += '<td class="center">' + data[count].id + '</td>';
                    html += '<td>' + data[count].pelanggan + '</td>';
                    html += '<td>' + data[count].tglpesan + '</td>';
                    html += '<td>' + data[count].tglacara + '</td>';
                    html += '<td>Rp ' + data[count].total + '</td>';
                    html += '<td>Rp ' + data[count].bayar + '</td>';
                    html += '<td>Rp ' + data[count].sisa + '</td>';
                    html += '<td class="center">' + data[count].status + '</td>';
                    html += '<td class="center">';
                    html += '<a class="blue" href="javascript:void(0)" onclick="detail(' + data[count].id + ')"><i class="ace-icon icon-eye8 bigger-120"></i></a>';
                    html += '&nbsp;';
                    html += '<a class="red" href="javascript:void(0)" onclick="cancel(' + data[count].id + ')"><i class="ace-icon icon-cancel-square2 bigger-120"></i></a>';
                    html += '</td>';
                    html += '</tr>';
                }
                $('tbody').html(html);
            }
        })
    }

    function detail(kode) {
        $.ajax({
            url: BASE_URL + 'orders/detail',
            type: "GET",
            data: {
                kode: kode
            },
            success: function(resp) {
                $("#tampil_modal").html(resp);
                $("#modal_alert").modal('show');
            }
        });
    }

    function cancel(kode) {
        Swal({
            title: "Perhatian!",
            text: "Apakah kamu yakin untuk batalkan pesanan ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Batalkan Pesanan"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "get",
                    url: "<?= site_url('orders/cancel') ?>",
                    data: {
                        kode: kode
                    },
                    dataType: "json",
                    success: function(resp) {
                        if (resp.status == "0100") {
                            Swal.fire({
                                title: 'Pembatalan!',
                                text: resp.pesan,
                                type: 'success'
                            }).then((resp) => {
                                load_data();
                            })
                        } else {
                            Swal.fire('Oops...', resp.pesan, 'error');
                        }
                    }
                });
            }
        })
    }
</script>