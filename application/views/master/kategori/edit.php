<input type="hidden" name="kode" value="<?= $data['id_kategori'] ?>">
<div class="form-group">
    <label class="control-label">Nama Kategori</label>
    <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama_kategori'] ?>">
</div>
<div class="form-group">
    <label>Tampilkan di halaman utama</label>
    <div class="radio">
        <label>
            <input name="utama" type="radio" class="ace" value="1" <?= $data['utama_kategori'] == 1 ? 'checked' : null ?>>
            <span class="lbl"> Ya</span>
        </label>
        <label>
            <input name="utama" type="radio" class="ace" value="0" <?= $data['utama_kategori'] == 0 ? 'checked' : null ?>>
            <span class="lbl"> Tidak</span>
        </label>
    </div>
    <div id="utama"></div>
</div>