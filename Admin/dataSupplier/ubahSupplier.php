<?php
include "../koneksi.php";

$kode_supplier = $_GET['kode_supplier'];






if($_SERVER['REQUEST_METHOD']=="POST"){
  include "../koneksi.php";
    $kode_supplier = $_POST['kode_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $ext = $_POST['ext'];

    $ubah = mysqli_query($connecting,"UPDATE tbsupplier SET nama_supplier = '$nama_supplier', ext ='$ext' where kode_supplier = '$kode_supplier'");

      echo "
        <script>
        window.alert('Data Supplier Berhasil Diubah !!')
        </script>
      ";


      echo "
        <meta http-equiv='refresh' content = '0; url=?hal=dataSupplier'>
      ";
}

?>








<section id="main-content">
  <section class="wrapper">

<h3><i class="fa fa-user"></i> Ubah Supplier</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <?php
        $query = mysqli_query($connecting,"SELECT * FROM tbsupplier where kode_supplier = '$kode_supplier'");
        while ($data = mysqli_fetch_array($query)){

        ?>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-user"></i> Ubah Supplier</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Supplier</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kode_supplier" value="<?php echo $kode_supplier ?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Supplier</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_supplier" value="<?php echo $data['nama_supplier'] ?>">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">No. Ext</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="ext" value="<?php echo $data['ext'] ?>">
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-4">
                    <button class="btn btn-primary" name="">Ubah</button>
                    <a href="?hal=dataSupplier" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
                
              </form>
              <?php
            }
            ?>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>

</section>
</section> 