<input type="hidden" name="kode" value="<?= $data['id_user'] ?>">
<div class="form-group">
    <label class="control-label">Username</label>
    <input type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>">
</div>
<div class="form-group">
    <label class="control-label">Password <i>(Kosongkan jika tidak rubah password)</i></label>
    <input type="password" name="password" id="password" class="form-control">
</div>
<div class="form-group">
    <label class="control-label">Level</label>
    <select name="level" id="level" class="form-control">
        <option value="">-- Pilih --</option>
        <option value="1" <?= $data['level'] == 1 ? 'selected' : null ?>>Admin</option>
        <option value="2" <?= $data['level'] == 2 ? 'selected' : null ?>>Pimpinan</option>
    </select>
</div>