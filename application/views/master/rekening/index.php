<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            <a href="javascript:void(0)" class="btn btn-success btn-xs" onclick="create()"><i class="ace-icon glyphicon glyphicon-plus"></i>Tambah Data</a>
        </div>
        <div class="box-body table-responsive">
            <table id="data-tabel" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bank</th>
                        <th>Nomor</th>
                        <th>Atasnama</th>
                        <th class="center">#</th>
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
            url: "<?= site_url('rekening/data') ?>",
            method: "POST",
            data: {
                action: 'fetch_data'
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var html = '';
                var no = 1;
                if (data == 0) {
                    html += '<tr>';
                    html += '<td colspan="8">Belum ada data</td>';
                    html += '</tr>';
                } else {
                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html += '<td class="center" width="40px">' + no + '</td>';
                        html += '<td>' + data[count].nama_bank + '</td>';
                        html += '<td>' + data[count].nomor_rekening + '</td>';
                        html += '<td>' + data[count].atasnama_rekening + '</td>';
                        html += '<td class="center" width="100px">';
                        html += '<a class="green" href="javascript:void(0)" onclick="edit(' + data[count].id_rekening + ')"><i class="ace-icon icon-pencil7 bigger-120"></i></a>';
                        html += '&nbsp;';
                        html += '<a class="red" href="javascript:void(0)" onclick="destroy(' + data[count].id_rekening + ')"><i class="ace-icon icon-trash bigger-120"></i></a>';
                        html += '</td>';
                        html += '</tr>';
                        no++;
                    }
                }
                $('tbody').html(html);
            }
        })
    }

    function create() {
        $.ajax({
            url: BASE_URL + 'rekening/create',
            type: "GET",
            success: function(resp) {
                $("#tampil_modal").html(resp);
                $("#modal_create").modal('show');
            }
        });
    }

    function edit(kode) {
        $.ajax({
            url: BASE_URL + 'rekening/edit',
            type: "GET",
            data: {
                kode: kode
            },
            success: function(resp) {
                $("#tampil_modal").html(resp);
                $("#modal_create").modal('show');
            }
        });
    }

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
                    url: BASE_URL + 'rekening/destroy',
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
                                load_data();
                            })
                        } else {
                            Swal.fire('Oops...', resp.message, 'error');
                        }
                    }
                });
            }
        })
    }

    $(document).on('submit', '.form_create', function(e) {
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $('.store_data').button('loading');
            },
            success: function(resp) {
                if (resp.status == "0100") {
                    Swal.fire({
                        title: 'Sukses!',
                        text: resp.pesan,
                        type: 'success'
                    }).then(okay => {
                        if (okay) {
                            $("#modal_create").modal('hide');
                            load_data();
                        }
                    });
                } else {
                    $.each(resp.pesan, function(key, value) {
                        var element = $('#' + key);
                        element.closest('div.form-group')
                            .removeClass('has-error')
                            .addClass(value.length > 0 ? 'has-error' : 'has-success')
                            .find('.help-block')
                            .remove();
                        element.after(value);
                    });
                }
            },
            complete: function() {
                $('.store_data').button('reset');
            }
        });
        return false;
    });
</script>