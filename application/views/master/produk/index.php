<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            <a href="<?= site_url('produk/create') ?>" class="btn btn-success btn-xs"><i class="ace-icon glyphicon glyphicon-plus"></i>Tambah Data</a>
        </div>
        <div class="box-body table-responsive">
            <table id="data-tabel" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center" width="40px">No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th class="center">Status</th>
                        <th class="center">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $d) { ?>
                        <tr>
                            <td class="center"><?= $no ?></td>
                            <td><?= $d['nama_produk'] ?></td>
                            <td><?= $d['nama_kategori'] ?></td>
                            <td><?= rupiah($d['harga_produk']) ?></td>
                            <td class="center"><?= $d['status_produk'] == 1 ? 'Tampilkan' : 'Tidak Tampilkan' ?></td>
                            <td class="center">
                                <a class="green" href="<?= site_url('produk/edit/' . $d['id_produk']) ?>"><i class="ace-icon icon-pencil7 bigger-120"></i></a>
                                <a class="red" href="javascript:void(0)" onclick="destroy('<?= $d['id_produk'] ?>')"><i class="ace-icon icon-trash bigger-120"></i></a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function destroy(kode) {
        Swal({
            title: "Apakah kamu yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya, hapus data ini"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: BASE_URL + 'produk/destroy',
                    data: {
                        kode: kode
                    },
                    dataType: "json",
                    success: function(resp) {
                        if (resp.status == "0100") {
                            Swal.fire({
                                title: 'Deleted!',
                                text: resp.message,
                                type: 'success'
                            }).then((resp) => {
                                location.reload();
                            })
                        } else {
                            Swal.fire('Oops...', resp.message, 'error');
                        }
                    }
                });
            }
        })
    }
</script>