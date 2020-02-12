<?php
include "../koneksi.php";
// nomor otomatis
$query = "SELECT max(id_login) as maxKode FROM tblogin";
$hasil = mysqli_query($connecting,$query);
$data = mysqli_fetch_array($hasil);
$id_login = $data['maxKode'];
$noUrut = (int) substr($id_login,3,3);
$noUrut ++ ;
$char = "ADM";
$id_login = $char . sprintf("%03s", $noUrut);
echo $id_login;






if($_SERVER['REQUEST_METHOD']=="POST"){
  include "../koneksi.php";
    $id_login = $_POST['id_login'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_admin = $_POST['nama_admin'];
    $status_admin = $_POST['status_admin'];
    
    $simpan = mysqli_query($connecting,"INSERT INTO tblogin VALUES('$id_login','$username','$password','$nama_admin','$status_admin')");

      echo "
        <script>
        window.alert('Data Admin Berhasil Ditambahkan !!')
        </script>
      ";


      echo "
        <meta http-equiv='refresh' content = '0; url=?hal=dataAdmin'>
      ";
}

?>








<section id="main-content">
  <section class="wrapper">

<h3><i class="fa fa-user"></i> Tambah Admin</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-user"></i> Tambah Admin</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Id Login</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="id_login" value="<?php echo $id_login ?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="username" required>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="password" required>
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Admin</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_admin" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Status Admin</label>
                  <div class="col-sm-4">
                    <input type="task" class="form-control" name="status_admin" required="">
                    <span class="Help-block">1 = Admin , 2 = Operator</span>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-4">
                    <button class="btn btn-primary" name="">Simpan</button>
                    <a href="?hal=dataAdmin" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>

</section>
</section> 