<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php if ($this->session->flashdata('notif')) { ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('notif'); ?></div>
      <?php } ?>
      <h1>
        Dashboard
        <small>Kopi</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kopi</span>
              <span class="info-box-number"><?php echo $jml_kopi ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa ion-android-close"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User</span>
              <span class="info-box-number"><?php echo $user ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-android-done"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pembelian</span>
              <span class="info-box-number"><?php echo $beli ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <!-- /.row -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Kopi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Kode Kopi</th>
                    <th>Nama Kopi</th>
                    <th>Berat</th>
                    <th>Stok</th>
                    <th>Foto</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($kopi as $data_kopi) { ?>
                      <tr>
                        <td>#<?php echo $data_kopi->KD_KOPI ?></td>
                        <td><?php echo $data_kopi->NAMA_KOPI ?></td>
                        <td><?php echo $data_kopi->BERAT; ?></td>
                        <td><?php echo $data_kopi->STOCK; ?></td>
                        <td><img style="width: 50px" src="<?php echo base_url() ?>upload/<?php echo $data_kopi->FOTO; ?>" alt=""></td>
                        <td>
                          <a href="<?= base_url('admin/updateKopi/').$data_kopi->KD_KOPI; ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-search"></i> Lihat</a>
                          <a href="<?= base_url('admin/deleteKopi/').$data_kopi->KD_KOPI; ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        </td>
                      </tr> <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?= base_url('admin/tambahkopi/'); ?>" class="btn btn-sm btn-info btn-flat pull-left">Tambah Kopi</a>
            </div>
            <!-- /.box-footer -->
          </div>

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Rekap Pembelian</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Kode Pembelian</th>
                    <th>Nama Pembeli</th>
                    <th>Total Pembelian</th>
                    <th>Tanggal Beli</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pembelian as $databeli) { ?>
                      <tr>
                        <td><?php echo $databeli->KD_PEMBELIAN ?></td>
                        <td><?php echo $databeli->NAMA_USER; ?></td>
                        <td><?php echo $databeli->TOTAL; ?></td>
                        <td><?php echo $databeli->TGL_PEMBELIAN; ?></td>
                        <td><?php echo $databeli->STATUS; ?></td>
                        <td>
                          <?php if ($databeli->STATUS == 'SUDAH TRANSFER'): ?>
                            <button class="btn btn-success" data-toggle="modal" data-target="#confirmImg" data-image="<?= base_url().$databeli->BUKTI; ?>" aria-index="<?= $databeli->KD_PEMBELIAN; ?>" onclick="setModalImg(this)"><i class="fa fa-check"></i> Konfirmasi</button><br>
                          <?php endif ?>
                          <a href="<?= base_url('index.php/admin/deleteOrder/'.$databeli->KD_PEMBELIAN)?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        </td>
                      </tr> <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="modal fade" id="confirmImg" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">Bukti Pembayaran</div>
                  <div class="modal-body">
                    <img src="" alt="" width="100%">
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-success" href=""><i class="fa fa-check"></i> Konfirmasi</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </section>
    <!-- /.content -->
  </div>
  <script>
    function setModalImg(e) {
      $('#confirmImg').find('img').attr('src', $(e).attr('data-image'));
      $('#confirmImg').find('.modal-footer a').attr('href', "<?= base_url('admin/confirmOrder/'); ?>" + $(e).attr('aria-index'));
    }
  </script>