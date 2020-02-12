<section id="main-content">
  <section class="wrapper">

<div class="row ">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-user"></i> Data Supplier</h4>
                <hr>
                <br>
                <div class="text-center">
                  <a href="?hal=tambahSupplier" class="btn btn-primary"> Tambah Supplier</a>
                </div>
                <br>
                <thead>
                  <?php
                      include "../koneksi.php";
                      $query = mysqli_query($connecting,"SELECT * FROM tbsupplier ");

                    ?>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Kode Supplier</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nama Supplier</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Ext</th>
                    
                    
                    <th>Aksi</th>
                  </tr>
                </thead>
                    

                <tbody>
                  <?php
                    while($data = mysqli_fetch_array($query)){
                  ?>
                  <tr>
                    
                    <td class="hidden-phone"><?php echo $data['kode_supplier'] ?></td>
                      <td class="hidden-phone"><?php echo $data['nama_supplier'] ?></td>
                      <td class="hidden-phone"><?php echo $data['ext'] ?></td>
                    
                    <td>  
                      <a href="beranda.php?hal=ubahSupplier&kode_supplier=<?php echo $data['kode_supplier'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="dataSupplier/hapusSupplier.php?kode_supplier=<?php echo $data['kode_supplier'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Akan dihapus?')" ><i class="fa fa-trash-o "></i></a>
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