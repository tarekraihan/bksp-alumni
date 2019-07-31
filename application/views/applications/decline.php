<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Application
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Controller_Applications/') ?>">Application List</a></li>
        <li class="active">Decline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box box-default">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="box-body">
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php elseif($this->session->flashdata('error')): ?>
                    <div class="alert alert-error alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <h1>Do you really want to decline the application?</h1>

                <form action="<?php echo base_url('Controller_Applications/decline/'.$id) ?>" method="post">
                    <label for="comment" >Decline Reason </label>
                    <textarea  class="form-control" id="comment" name="comment" rows="3"></textarea>
                    <span class="text-danger"><?php echo form_error('comment'); ?></span>
                    <br/>
                    <input type="submit" class="btn btn-primary" name="confirm" value="Confirm">
                    <a href="<?php echo base_url('Controller_Applications') ?>" class="btn btn-warning">Cancel</a>
                </form>

            </div>
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
