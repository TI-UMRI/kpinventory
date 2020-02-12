<?php

$kode_kategori = $_GET['kode_kategori'];

if($_SERVER['REQUEST_METHOD']=="POST"){
  include "../koneksi.php";
    $nama_kategori = $_POST['nama_kategori'];

    $simpan = mysqli_query($connecting,"UPDATE tbkategori SET nama_kategori = '$nama_kategori' where kode_kategori='$kode_kategori'");

      echo "
        <script>
        window.alert('Data Kategori Berhasil Diubahkan !!')
        </script>
      ";


      echo "
        <meta http-equiv='refresh' content = '0; url=?hal=dataKategori'>
      ";
}

?>








<section id="main-content">
  <section class="wrapper">

<h3><i class="fa fa-tags"></i>Tambah Kategori</h3>
        <!-- BASIC FORM ELELEMNTS -->

        <?php
          include "../koneksi.php";
          $query = mysqli_query($sambungin,"SELECT * FROM tbkategori where kode_kategori = '$kode_kategori'");

          while($data = mysqli_fetch_array($query)){
        ?>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-tags"></i> Ubah Kategori</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_kategori" value="<?php echo $data['nama_kategori'] ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-4">
                    <button class="btn btn-primary" name="">Simpan</button>
                    <a href="?hal=dataKategori" class="btn btn-warning">Kembali</a>
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