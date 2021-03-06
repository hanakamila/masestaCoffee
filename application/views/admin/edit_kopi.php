<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Kopi
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- /.row -->
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/admin/updateKopi/<?= $kopi->KD_KOPI; ?>">
              <?php
                if (!empty($notif)) {
                  if ($notif=="Update berhasil!") {
                    echo '<div class="alert alert-success">';
                    echo $notif;
                    echo "</div>";
                  }else{
                    echo '<div class="alert alert-danger">';
                    echo $notif;
                    echo "</div>";
                  }
                }
              ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Kopi</label>
                  <input type="text" class="form-control" id="biaya" placeholder="Nama Kopi" name="nama" value="<?= $kopi->NAMA_KOPI; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Berat (kg)</label>
                  <input type="text" class="form-control" id="angkatan" placeholder="Berat Kopi" name="berat" value="<?= $kopi->BERAT; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Asal Kopi</label>
                  <input type="text" class="form-control" id="angkatan" placeholder="Asal Kopi" name="asal" value="<?= $kopi->ASAL_KOPI; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Harga</label>
                  <input type="text" class="form-control" id="angkatan" placeholder="Harga Kopi" name="harga" value="<?= $kopi->HARGA; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Stok</label>
                  <input type="text" class="form-control" id="angkatan" placeholder="Stok Kopi" name="stock" value="<?= $kopi->STOCK; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="foto" name="foto">
              </div>
              </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="submit" value="Update" class="btn btn-primary">
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>