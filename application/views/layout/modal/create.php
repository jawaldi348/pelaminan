<div class="modal fade" id="modal_create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?= $name ?></h4>
            </div>
            <?= form_open($post, ['class' => $class]) ?>
            <div class="modal-body">
                <?= $body ?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary store_data"><i class="ace-icon icon-floppy-disk"></i>Simpan</button>
                <button class="btn btn-sm btn-danger" data-dismiss="modal"><i class="ace-icon icon-cross2"></i>Batal</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>