<input type="hidden" name="kode" value="<?= $data['id_pelanggan'] ?>">
<div class="form-group">
    <label class="control-label">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama_pelanggan'] ?>">
</div>
<div class="form-group">
    <label class="control-label">Email</label>
    <input type="text" name="email" id="email" class="form-control" value="<?= $data['email_pelanggan'] ?>">
</div>
<div class="form-group">
    <label class="control-label">No. HP</label>
    <input type="text" name="phone" id="phone" class="form-control" value="<?= $data['phone_pelanggan'] ?>">
</div>
<div class="form-group">
    <label class="control-label">Alamat</label>
    <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $data['alamat_pelanggan'] ?>">
</div>
<div class="form-group">
    <label class="control-label">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="">-- Pilih --</option>
        <option value="1" <?= $data['status_pelanggan'] == 1 ? 'selected' : null ?>>Aktif</option>
        <option value="0" <?= $data['status_pelanggan'] == 0 ? 'selected' : null ?>>Tidak Aktif</option>
    </select>
</div>