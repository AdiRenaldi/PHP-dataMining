<div class="container">
  <h2>Halaman Bernouli</h2>

  <form action="<?= Url::BASEURL ?>/Bernouli_/bernouli" method="post">
    <div class="form-group">
      <label for="input">Komentar</label>
      <textarea name="komentar" class="form-control" id="input" rows="3"></textarea>
    </div>
    <select class="custom-select" id="inputGroupSelect02" name="kelas">
      <option value="cyberbullying" >cyberbullying</option>
      <option value="non_cyberbullying">non cyberbullying</option>
    </select><br><br>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
  </form>
</div>