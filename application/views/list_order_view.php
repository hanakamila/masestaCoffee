 <!--banner-->
<div class="banner-top">
  <div class="container">
    <h3 >Order History</h3>
    <h4><a href="index.html">Home</a><label>/</label>Order History</h4>
    <div class="clearfix"> </div>
  </div>
</div>

<div class="single">
  <div class="container">
    <div class="spec ">
        <h3>Order History</h3>
          <div class="ser-t">
            <b></b>
            <span><i></i></span>
            <b class="line"></b>
          </div>
      </div>
          <div class="bs-docs-example">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Kode Pembelian</th>
                  <th>Tanggal Pembelian</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list_order as $l) { ?>
                <tr>
                  <td><?= $l->KD_PEMBELIAN; ?></td>
                  <td><?= $l->TGL_PEMBELIAN; ?></td>
                  <td><?= $l->TOTAL; ?></td>
                  <td><?= $l->STATUS; ?></td>
                  <?php if ($l->STATUS == 'BELUM TRANSFER') { ?>
                    <td><button class="btn btn-success" onclick="window.location='<?= base_url(); ?>user/doConfirm/<?= $l->KD_PEMBELIAN; ?>'">CONFIRM</button></td>
                  <?php } ?>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
  </div>
</div>