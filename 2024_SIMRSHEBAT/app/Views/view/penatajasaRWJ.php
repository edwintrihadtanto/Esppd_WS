<div class="col-md-12" style="margin-top: 15px;">
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Pendaftaran Rawat Jalan</a></li>
        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Pendaftaran Rawat Inap</a></li>        
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active" id="activity">
          <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger border-bottom-dangerottom-danger">
              <i class="fa fa-exclamation-circle"></i>
              <?php echo session()->getFlashdata('error'); ?>
            </div>
          <?php endif; ?>
          <form method="POST" action="<?= base_url(); ?>/login/process5">
          <?= csrf_field(); ?>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Input 1</label>              
              <input type="text" name="file1" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Input 2</label>
              <input type="text" name="file2" class="form-control">
            </div>
            
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>          
        </form>

        </div>

        <div class="tab-pane" id="timeline">

          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Input 1</label>              
              <input type="text" name="file3" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Input 2</label>
              <input type="text" name="file4" class="form-control">
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

        </div>        

      </div>
      <!-- /.tab-content -->
    </div><!-- /.card-body -->
  </div>
  <!-- /.nav-tabs-custom -->
</div>

<script type="text/javascript">  
$(".preloader").fadeOut();

if (localStorage.getItem("sts_tutor") == "1") {
  localStorage.setItem("sts_tutor", "1");
  $('#sts_tutor').html('1');
}else{
  localStorage.setItem("sts_tutor", "0");        
  $('#sts_tutor').html('0');
}

</script>