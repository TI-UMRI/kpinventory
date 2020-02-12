<?php
include "../koneksi.php";
// nomor otomatis
$query = "SELECT max(kode_supplier) as maxKode FROM tbsupplier";
$hasil = mysqli_query($connecting,$query);
$data = mysqli_fetch_array($hasil);
$kode_supplier = $data['maxKode'];
$noUrut = (int) substr($kode_supplier,3,3);
$noUrut ++ ;
$char = "SUP";
$kode_supplier = $char . sprintf("%03s", $noUrut);
echo $kode_supplier;






if($_SERVER['REQUEST_METHOD']=="POST"){
  include "../koneksi.php";
    $kode_supplier = $_POST['kode_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $ext = $_POST['ext'];
    
    $simpan = mysqli_query($connecting,"INSERT INTO tbsupplier VALUES('$kode_supplier','$nama_supplier','$ext')");

      echo "
        <script>
        window.alert('Data Supplier Berhasil Ditambahkan !!')
        </script>
      ";


      echo "
        <meta http-equiv='refresh' content = '0; url=?hal=dataSupplier'>
      ";
}

?>








<section id="main-content">
  <section class="wrapper">

<h3><i class="fa fa-user"></i> Tambah Supplier</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-user"></i> Tambah Supplier</h4>
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
                    <input type="text" class="form-control" name="nama_supplier" required>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">No. Ext</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="ext" required>
                  </div>
                </div>
                  
                


                <div class="form-group">
                  <div class="col-sm-4">
                    <button class="btn btn-primary" name="">Simpan</button>
                    <a href="?hal=dataSupplier" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>

</section>
</section> 