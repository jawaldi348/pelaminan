<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            <a href="javascript:void(0)" class="btn btn-success btn-xs" onclick="create()"><i class="ace-icon glyphicon glyphicon-plus"></i>Tambah Data</a>
        </div>
        <div class="box-body table-responsive">
            <table id="data-tabel" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nourut</th>
                        <th class="center">Utama</th>
                        <th class="center">#</th>
                    </tr>
                </thead>
                <tbody style="cursor: all-scroll;"></tbody>
            </table>
        </div>
    </div>
</div>
<div id="tampil_modal"></div>
<script>
    $(document).ready(function() {
        load_data();

        $('tbody').sortable({
            placeholder: "ui-state-highlight",
            update: function(event, ui) {
                var page_id_array = new Array();
                $('tbody tr').each(function() {
                    page_id_array.push($(this).attr('id'));
                });

                $.ajax({
                    url: "<?= site_url('kategori/data') ?>",
                    method: "POST",
                    data: {
                        page_id_array: page_id_array,
                        action: 'update'
                    },
                    success: function() {
                        load_data();
                    }
                })
            }
        });
    });

    function load_data() {
        $.ajax({
            url: "<?= site_url('kategori/data') ?>",
            method: "POST",
            data: {
                action: 'fetch_data'
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                for (var count = 0; count < data.length; count++) {
                    var utama = (data[count].utama_kategori == '1' ? 'Ya' : 'Tidak');
                    html += '<tr id="' + data[count].id_kategori + '">';
                    html += '<td>' + data[count].nama_kategori + '</td>';
                    html += '<td>' + data[count].nourut_kategori + '</td>';
                    html += '<td class="center" width="70px">' + utama + '</td>';
                    html += '<td class="center" width="100px">';
                    html += '<a class="green" href="javascript:void(0)" onclick="edit(' + data[count].id_kategori + ')"><i class="ace-icon icon-pencil7 bigger-120"></i></a>';
                    html += '&nbsp;';
                    html += '<a class="red" href="javascript:void(0)" onclick="destroy(' + data[count].id_kategori + ')"><i class="ace-icon icon-trash bigger-120"></i></a>';
                    html += '</td>';
                    html += '</tr>';
                }
                $('tbody').html(html);
            }
        })
    }

    function create() {
        $.ajax({
            url: BASE_URL + 'kategori/create',
            type: "GET",
            success: function(resp) {
                $("#tampil_modal").html(resp);
                $("#modal_create").modal('show');
            }
        });
    }

    function edit(kode) {
        $.ajax({
            url: BASE_URL + 'kategori/edit',
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
                    url: BASE_URL + 'kategori/destroy',
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