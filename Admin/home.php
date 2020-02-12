<?php
include "../koneksi.php";

$supplier = mysqli_query($connecting,"SELECT nama_supplier , SUM(jumlah_barang) As total from tbpenerimaan left join tbdetail_penerimaan on tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima left join tbsupplier on tbpenerimaan.kode_supplier = tbsupplier.kode_supplier Group by nama_supplier");

?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>GRAFIK BARANG MASUK</h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
                
              </ul>

              <?php
                while($data = mysqli_fetch_array($supplier)){
              ?>

              <div class="bar">
                <div class="title"><?php echo $data['nama_supplier'] ?></div>
                <div class="value tooltips" data-original-title="<?php echo $data['total'] ?>" data-toggle="tooltip" data-placement="top"><?php echo $data['total'] ?></div>
              </div>
            <?php
            }
            ?>
              
            
        </div>

        <?php
include "../koneksi.php";

$supplier = mysqli_query($connecting,"SELECT nama_supplier , SUM(jumlah_barang) As total from tbpengeluaran left join tbdetail_pengeluaran on tbpengeluaran.kode_keluar = tbdetail_pengeluaran.kode_keluar left join tbsupplier on tbpengeluaran.kode_supplier = tbsupplier.kode_supplier Group by nama_supplier");

        ?>

      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>GRAFIK BARANG KELUAR</h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
                
              </ul>

              <?php
                while($data = mysqli_fetch_array($supplier)){
              ?>

              <div class="bar">
                <div class="title"><?php echo $data['nama_supplier'] ?></div>
                <div class="value tooltips" data-original-title="<?php echo $data['total'] ?>" data-toggle="tooltip" data-placement="top"><?php echo $data['total'] ?></div>
              </div>
            <?php
            }
            ?>
              
            
        </div>
      </section>
    </section>