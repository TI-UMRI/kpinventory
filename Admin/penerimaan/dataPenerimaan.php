<?php
  include "fungsiTanggal.php";
?>

<section id="main-content">
  <section class="wrapper">

<div class="row ">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-bars"></i> Data Penerimaan Barang</h4>
                <hr>
                <br>
                <div class="text-center">
                  <a href="?hal=tambahPenerimaan" class="btn btn-primary"> Tambah Penerimaan</a>
                </div>
                <br>
                <thead>
                  <?php
                      include "../koneksi.php";
                      $query = mysqli_query($connecting,"SELECT * FROM tbpenerimaan left join tblogin on tbpenerimaan.id_login = tblogin.id_login left join tbsupplier on tbpenerimaan.kode_supplier = tbsupplier.kode_supplier");

                    ?>
                  <tr>
                   
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Kode Terima</th>
                    <th class="hidden-phone"><i class="fa fa-calendar"></i> Tanggal terima</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Jumlah Item</th>
                    <th class="hidden-phone"><i class="fa fa-user-circle"></i> Nama Supplier</th>
                    <th class="hidden-phone"><i class="fa fa-user-circle"></i> Nama Admin</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Keterangan</th>
                    
                    <th>Aksi</th>
                  </tr>
                </thead>
                    

                <tbody>
                  <?php
                    while($data = mysqli_fetch_array($query)){
                  ?>
                  <tr>
                    
                    <td class="hidden-phone"><?php echo $data['kode_terima'] ?></td>
                      <td class="hidden-phone"><?php echo tgl_indo ($data['tanggal_terima']) ?></td>
                      <td class="hidden-phone"><?php echo $data['jumlah_item'] ?></td>
                      <td class="hidden-phone"><?php echo $data['nama_supplier'] ?></td>
                      <td class="hidden-phone"><?php echo $data['nama_admin'] ?></td>
                      <td class="hidden-phone"><?php echo $data['keterangan'] ?></td>
                      
                    
                    <td>  
                      <a href="beranda.php?hal=detailPenerimaan&kode_terima=<?php echo $data['kode_terima'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-code-fork" data-toggle="tooltp" title="Detail"></i></a>
                      <a href="penerimaan/hapusPenerimaan.php?kode_terima=<?php echo $data['kode_terima'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Akan dihapus?')" ><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
                    <?php
                }
              ?>
                </tbody>
              </table>
              
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>


</section>
</section>