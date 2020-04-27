<?php
include 'config/koneksi.php';
if (isset($_POST['simpan'])){
	$sql = mysqli_query($con, "INSERT INTO tbl_rapor VALUES('$_POST[bhs_indo]','$_POST[bhs_inggris]','$_POST[mtk]','$_POST[ipa]','$_POST[ips]')");
	if ($sql) {
    echo "<script>alert('data berhasil masuk');document.location.href='dashboard.php?menu=rapot';</script>";
  }else{
    echo "<script>alert('data gagal');document.location.href='dashboard.php?menu=rapot';</script>";
  }
} if (isset($_GET['hapus'])){
  $sql = mysqli_query($con,"DELETE FROM tbl_rapor WHERE bhs_indo = '$_GET[bhs_indo]'");
  if ($sql) {
    echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=rapot';</script>";
  }else{
    echo "<script>alert('Data Gagal Dihapus');document.location.href='?menu=rapot';</script>";
  }
}
?>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Input Data Rapot UN Calon Siswa</h6>
            </div>
            <div class="card-body">
            <form method="post">
              <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="bhs_indo" class="form-control" placeholder="bahasa indonesia">
                    </div>
                  </div>
                    
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="bhs_inggris" class="form-control" placeholder="bahasa inggris">
                    </div>
                    <div class="col">
                    <input type="text" name="mtk" class="form-control" placeholder="matematika">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="ipa" class="form-control" placeholder="ipa">
                    </div>
                    <div class="col">
                    <input type="text" name="ips" class="form-control" placeholder="ips">
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
                      <th>bahasa indonesia</th>
                      <th>bahasa inggris</th>
                      <th>matematika</th>
                      <th>ipa</th>
                      <th>ips</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$sql = mysqli_query($con,"SELECT * FROM tbl_rapor");
      while ($r = mysqli_fetch_array($sql)) {
        ?>
        <tr>
          <td><?php echo $r['bhs_indo'];?></td>
          <td><?php echo $r['bhs_inggris'];?></td>
          <td><?php echo $r['mtk'];?></td>
          <td><?php echo $r['ipa'];?></td>
          <td><?php echo $r['ips'];?></td>
           <td><a class="btn btn-danger" href="?menu=rapot&hapus&bhs_indo=<?php echo $r['bhs_indo'] ?>">HAPUS</a></td>
        </tr>
      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>