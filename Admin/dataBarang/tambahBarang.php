<?php
include "../koneksi.php";
// nomor otomatis
$query = "SELECT max(kode_barang) as maxKode FROM tbbarang";
$hasil = mysqli_query($connecting,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['maxKode'];
$noUrut = (int) substr($kodeBarang,3,3);
$noUrut ++ ;
$char = "BRG";
$kodeBarang = $char . sprintf("%03s", $noUrut);
echo $kodeBarang;






if($_SERVER['REQUEST_METHOD']=="POST"){
  include "../koneksi.php";
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kode_kategori = $_POST['kode_kategori'];
    $satuan = $_POST['satuan'];
    $stok = $_POST['stok'];
    $spesifikasi = $_POST['spesifikasi'];

    $simpan = mysqli_query($connecting,"INSERT INTO tbbarang VALUES('$kode_barang','$nama_barang','$kode_kategori','$satuan','$stok','$spesifikasi')");

      echo "
        <script>
        window.alert('Data Barang Berhasil Ditambahkan !!')
        </script>
      ";


      echo "
        <meta http-equiv='refresh' content = '0; url=?hal=dataBarang'>
      ";
}

?>








<section id="main-content">
  <section class="wrapper">

<h3><i class="fa fa-bars"></i> Tambah Barang</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-bars"></i> Tambah Barang</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Barang</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kode_barang" value="<?php echo $kodeBarang ?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_barang" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-4">
                      <?php
                        include "../koneksi.php";
                        echo "<select class='form-control' name='kode_kategori'>";
                        $tampil = mysqli_query($connecting,"SELECT * FROM tbkategori");
                        while($data = mysqli_fetch_array($tampil)){
                          echo "<option value=$data[kode_kategori]>$data[nama_kategori]</option>";
                        }
                          echo "</select>";
                      ?>
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Satuan</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="satuan" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Stok</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="stok" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Spesifikasi</label>
                  <div class="col-sm-4">
                    <input type="task" class="form-control" name="spesifikasi" required="">
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-4">
                    <button class="btn btn-primary" name="">Simpan</button>
                    <a href="?hal=dataBarang" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>

</section>
</section> 