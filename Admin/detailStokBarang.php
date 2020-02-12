<?php
include "../koneksi.php";
$kode_barang = $_GET['kode_barang'];

$a = mysqli_query($connecting,"SELECT * FROM tbbarang left join tbkategori on tbkategori.kode_kategori = tbbarang.kode_kategori where kode_barang = $'kode_barang'");
$x = mysqli_fetch_array($a);
?>


<section id="main-content">
  <section class="wrapper">
    <div class="col-lg-12 mt">
      <div class="row content-panel">
        <div class="col-lg-10 col-lg-offset-1">
          <div class="pull-left">
            <h2><?php echo $x['nama_barang']?></h2>
          </div>
        <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-5">
              
              <div>
                <div class="pull-left">KATEGORI :</div>
                <div class="pull-right"><?php echo $x['kode_kategori'] ?> </div>
                <div class="clearfix"></div>
              </div>
                <div>
                <div class="pull-left">SATUAN :</div>
                <div class="pull-right"><?php echo $x['satuan'] ?> </div>
                <div class="clearfix"></div>
              </div>
                <div>
                <div class="pull-left">SPESIFIKASI :</div>
                <div class="pull-right"><?php echo $x['spesifikasi'] ?> </div>
                <div class="clearfix"></div>
              </div>
                <div>
                <div class="pull-left">STOK AWAL :</div>
                <div class="pull-right"><?php echo $x['stok'] ?> </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br>
              <table class="table">
                <thead>
                  <?php
                      include "../koneksi.php";
                      $tampil = mysqli_query($connecting,"SELECT distinct tanggal FROM tbgabung_transaksi where kode_barang = '$kode_barang'");

                      $totalmasuk = 0;
                      $totalkeluar = 0;
                    
                  ?>
                  <tr>
                    <th>Tanggal</th>
                    <th>Barang Masuk</th>
                    <th>Barang Keluar</th>
                    <th>Stok</th>
                  </tr>
                </thead>
              <tbody>
                <?php
                while($data = mysqli_fetch_array($tampil)){

                $sqlMasuk = "SELECT SUM(jumlah_barang) as total FROM tbgabung_transaksi where ket = 'MASUK' AND tanggal = '$data[tanggal]' AND kode_barang='$kode_barang'";
                $hasilMasuk = mysqli_query($connecting,$sqlmasuk);
                $a = mysqli_fetch_array($hasilMasuk);

                $sqlKeluar = "SELECT SUM(jumlah_barang) as total FROM tbgabung_transaksi where ket = 'KELUAR' AND tanggal = '$data[tanggal]' AND kode_barang='$kode_barang'";
                $hasilKeluar = mysqli_query($connecting,$sqlKeluar);
                $b = mysqli_fetch_array($hasilKeluar);


                $totalmasuk += $a['total'];
                $totalkeluar += $b['total'];

                $stokAkhir = $x['stok'] + $totalmasuk - $totalkeluar;
                ?>
                <tr>
                  <td><?php echo tgl_indo($data['tanggal']) ?></td>
                  <td><?php echo $a['total'] ?></td>
                  <td><?php echo $b['total'] ?></td>
                  <td><?php echo $stokAkhir ?></td>
                </tr>
                <?php
              }
                ?>
              </tbody>
                
              </table>
              <div class="form-group">
                <div class="col-sm-4">
                  <a href="beranda.php?hal=stokBarang" class="btn btn-info">Kembali</a>             
                </div>

              </div>

        </div>

      </div>

    </div>
  </section>
</section>