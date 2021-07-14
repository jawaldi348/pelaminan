<div class="form-group">
    <label class="control-label">Bank</label>
    <select name="bank" id="bank" class="form-control">
        <option value="">-- Pilih --</option>
        <?php foreach ($bank as $b) { ?>
            <option value="<?= $b['id_bank'] ?>"><?= $b['nama_bank'] ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-group">
    <label class="control-label">Nomor Rekening</label>
    <input type="text" name="nomor" id="nomor" class="form-control">
</div>
<div class="form-group">
    <label class="control-label">Atasnama</label>
    <input type="text" name="pemilik" id="pemilik" class="form-control">
</div>