<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Members
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Controller_Applications/') ?>">Application List</a></li>
        <li class="active">Delete</li>
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

                <h1>Do you really want to delete the Member?</h1>

                <form action="<?php echo base_url('Members/delete/'.$id) ?>" method="post">
                    
                    <br/>
                    <input type="hidden" name="confirm" value="confirm"/>
                    <input type="submit" class="btn btn-primary"  value="Delete">
                    <a href="<?php echo base_url('Members') ?>" class="btn btn-warning">Cancel</a>
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
