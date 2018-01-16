 <!--banner-->
<div class="banner-top">
  <div class="container">
    <h3 >Confirmation</h3>
    <h4><a href="index.html">Home</a><label>/</label>Confirmation</h4>
    <div class="clearfix"> </div>
  </div>
</div>

<div class="single">
  <div class="container">
    <div class="spec ">
        <h3>Upload Proof of Payment</h3>
          <div class="ser-t">
            <b></b>
            <span><i></i></span>
            <b class="line"></b>
          </div>
      </div>
          <div class="bs-docs-example">
            <?php if (!empty($notif)): ?>
              <div class="alert alert-warning"><?= $notif; ?></div>
            <?php endif ?>
            <form action="<?= base_url('user/doConfirm/').$kd_beli; ?>" method="post" enctype="multipart/form-data">
              <div class="key">
                <div class="clearfix"></div>
                <i class="fa fa-file" aria-hidden="true"></i>
                <input  type="file" value="" name="foto">
                <div class="clearfix"></div>
              </div>
              <div class="add add-2">
                <button type="submit" class="btn btn-danger my-cart-btn my-cart-b" name="submit">Submit</button>
            </div>
            </form>
          </div>
  </div>
</div>