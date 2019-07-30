<div class="clearfix"></div>
<div>
    <div class="container">
        <div class="bksp_form">
            <div class="bksp_form_inner">
                <div class="row">
                    <div class="col-sm-3 fm_log">
                        <img class="logo form_logo" src="<?php echo base_url('assets/front_end/images/bksp_logo.png');?>" alt="BKSP LOGO">
                    </div>
                    <div class="col-sm-9">
                        <h1>Alumni Association of BKSP</h1>
                    </div>
                </div>
                <form class="bksp_member_form" id="cadet_no_form" method="post" action="<?php base_url('en/cadet_no') ?>" >
                    <div class="form-group row">
                        <div class="col-sm-6 offset-md-3">
                            <?php if($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <b><?php echo $this->session->flashdata('success'); ?></b>
                            </div>
                            <?php elseif($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger fade in alert-dismissible show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                    </button>
                                    <b><?php echo $this->session->flashdata('error'); ?></b>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="CadetNo" class="col-sm-3 col-form-label"></label>
                        <label for="CadetNo" class="col-sm-2 col-form-label">Cadet No</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="CadetNo" id="CadetNo" placeholder="Cadet No"  value ="<?php echo (set_value('CadetNo')) ? set_value('CadetNo') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('CadetNo'); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-outline-success btn-lg btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>