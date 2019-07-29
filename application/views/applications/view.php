 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View applicatin details
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Application Details</li>
      </ol>
    </section>
<section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
       
        <!-- /.box-header -->
 
          <div class="row">
        <div class="col-md-12 col-xs-12">
         
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <img src="<?php echo base_url($application_data['profile_picture'] )?>" alt="<?php echo $application_data['name'] ?>" width="100" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fname">Name</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['name'] ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Spouse Name</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['spouse_name'] ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Father's Name</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['father_name'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Mother's Name</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['mother_name'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">BKSP Admission Year</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['bksp_admission_year'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Cadet No</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['cadet_no'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Year of SSC</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['year_of_ssc'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Year of HSC</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['year_of_hsc'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Degree Cadet Admission Year</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['degree_cadet_admission_year'] ?>" readonly>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Degree Cadet Pass Year</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['degree_cadet_passing_year'] ?>" readonly>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Address</label>
                            <textarea class="form-control" readonly><?php echo $application_data['address'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Professional Information</label>
                            <textarea class="form-control" readonly><?php echo $application_data['professional_info'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Blood Group</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['blood_group'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Religious</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['religious'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Mobile</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['mobile'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Phone</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['phone'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Email Address</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['email_address'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Facebook ID</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['facebook_id'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">NID / Passport NO</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['nid'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Date of Birth</label>
                            <input type="text" class="form-control"  value="<?php echo date('d-M-Y', strtotime($application_data['date_of_birth'])) ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Gender</label>
                            <input type="text" class="form-control"  value="<?php echo $application_data['gender'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="username"></label>
                            <a href="<?php echo base_url('Controller_Applications');?>" class="btn btn-success btn-bg">Back</a>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.box-body -->
              
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
        </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->

 

    </section>