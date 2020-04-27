<?php
include 'config/koneksi.php';
if (isset($_POST['simpan'])){
	$sql = mysqli_query($con, "INSERT INTO tbl_ortu VALUES('$_POST[nama_ortu]','$_POST[ttl]','$_POST[jk]','$_POST[pekerjaan]','$_POST[pendidikan]','$_POST[agama]','$_POST[no_hp]')");
	if ($sql) {
    echo "<script>alert('data berhasil masuk');document.location.href='dashboard.php?menu=ortu';</script>";
  }else{
    echo "<script>alert('data gagal');document.location.href='dashboard.php?menu=ortu';</script>";
  }
} if (isset($_GET['hapus'])){
  $sql = mysqli_query($con,"DELETE FROM tbl_ortu WHERE nama_ortu = '$_GET[nama_ortu]'");
  if ($sql) {
    echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=ortu';</script>";
  }else{
    echo "<script>alert('Data Gagal Dihapus');document.location.href='?menu=ortu';</script>";
  }
}
?>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Input Data Orang Tua Calon Siswa</h6>
            </div>
            <div class="card-body">
            <form method="post">
              <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="nama_ortu" class="form-control" placeholder="nama orangtua/wali">
                    </div>
                  </div>
                    
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="ttl" class="form-control" placeholder="tempat tanggal lahir">
                    </div>
                    <div class="col">
                    <input type="text" name="jk" class="form-control" placeholder="jenis kelamin">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="pekerjaan" class="form-control" placeholder="pekerjaan">
                    </div>
                    <div class="col">
                    <input type="text" name="pendidikan" class="form-control" placeholder="pendidikan">
                    </div>
                </div>
            </div>
             <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="agama" class="form-control" placeholder="agama">
                    </div>
                    <div class="col">
                    <input type="text" name="no_hp" class="form-control" placeholder="nomor handphone">
                    </div>
                </div>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
            </form>
            <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>nama orang tua</th>
                      <th>tempat tanggal lahir</th>
                      <th>jenis kelamin</th>
                      <th>pekerjaan</th>
                      <th>pendidikan</th>
                      <th>agama</th>
                      <th>nomor HP</th>
                      </tr>
                  </thead>
                  <tbody>
<?php
$sql = mysqli_query($con,"SELECT * FROM tbl_ortu");
      while ($r = mysqli_fetch_array($sql)) {
        ?>
        <tr>
          <td><?php echo $r['nama_ortu'];?></td>
          <td><?php echo $r['ttl'];?></td>
          <td><?php echo $r['jk'];?></td>
          <td><?php echo $r['pekerjaan'];?></td>
          <td><?php echo $r['pendidikan'];?></td>
          <td><?php echo $r['agama'];?></td>
          <td><?php echo $r['no_hp'];?></td>
           <td><a class="btn btn-danger" href="?menu=ortu&hapus&nama_ortu=<?php echo $r['nama_ortu'] ?>">HAPUS</a></td>
        </tr>
      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>