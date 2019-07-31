 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit applicatin
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Application</li>
      </ol>
    </section>
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
       
        <!-- /.box-header -->
 
          <div class="row">
        <div class="col-md-12 col-xs-12">
        <form class="bksp_member_form" id="bksp_member_form" method="post" action="<?php base_url('Controller_Applications/edit/'.$id) ?>" enctype="multipart/form-data">
            <div class="box-body">
                <div class="row">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="kv-avatar">
                                <div class="file-loading img-fluid">
                                    <input type="file" id="picture_upload" name="picture_upload" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control"  id="Name" name="Name" value="<?php echo (set_value('Name')) ? set_value('Name') : $application_data['name'] ;?>" >
                            <span class="text-danger"><?php echo form_error('Name'); ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="SpouseName">Spouse Name</label>
                            <input type="text" class="form-control" id="SpouseName" name="SpouseName" value="<?php echo (set_value('SpouseName')) ? set_value('SpouseName') : $application_data['spouse_name'] ;?>">
                            <span class="text-danger"><?php echo form_error('SpouseName'); ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="FatherName">Father's Name</label>
                            <input type="text" class="form-control"  id="FatherName" name="FatherName" value="<?php echo (set_value('FatherName')) ? set_value('FatherName') : $application_data['father_name'] ;?>" >
                            <span class="text-danger"><?php echo form_error('FatherName'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="MotherName">Mother's Name</label>
                            <input type="text" class="form-control" id="MotherName" name="MotherName" value="<?php echo (set_value('MotherName')) ? set_value('MotherName') : $application_data['mother_name'] ;?>" >
                            <span class="text-danger"><?php echo form_error('MotherName'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="BKSPAdmissionYear">BKSP Admission Year</label>
                            <input type="text" class="form-control"  name="BKSPAdmissionYear" id="BKSPAdmissionYear" value="<?php echo (set_value('BKSPAdmissionYear')) ? set_value('BKSPAdmissionYear') : $application_data['bksp_admission_year'] ;?>"  >
                            <span class="text-danger"><?php echo form_error('BKSPAdmissionYear'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="CadetNo">Cadet No</label>
                            <input type="text" class="form-control" name="CadetNo" id="CadetNo" value="<?php echo (set_value('CadetNo')) ? set_value('CadetNo') : $application_data['cadet_no'] ;?>">
                            <span class="text-danger"><?php echo form_error('CadetNo'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="YearOfSSC">Year of SSC</label>
                            <input type="text" class="form-control"  name="YearOfSSC" id="YearOfSSC" value="<?php echo (set_value('YearOfSSC')) ? set_value('YearOfSSC') : $application_data['year_of_ssc'] ;?>">
                            <span class="text-danger"><?php echo form_error('YearOfSSC'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="YearOfHSC">Year of HSC</label>
                            <input type="text" class="form-control"  id="YearOfHSC" name="YearOfHSC"  value="<?php echo (set_value('YearOfHSC')) ? set_value('YearOfHSC') : $application_data['year_of_hsc'] ;?>" >
                            <span class="text-danger"><?php echo form_error('YearOfHSC'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="YearOfAdmission">Degree Cadet Admission Year</label>
                            <input type="text" class="form-control" name="YearOfAdmission" id="YearOfAdmission"  value="<?php echo (set_value('YearOfAdmission')) ? set_value('YearOfAdmission') : $application_data['degree_cadet_admission_year'] ;?>" >
                            <span class="text-danger"><?php echo form_error('YearOfAdmission'); ?></span>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="YearOfPass">Degree Cadet Pass Year</label>
                            <input type="text" class="form-control"  id="YearOfPass" name="YearOfPass"  value="<?php echo (set_value('YearOfPass')) ? set_value('YearOfPass') : $application_data['degree_cadet_passing_year'] ;?>">
                            <span class="text-danger"><?php echo form_error('YearOfPass'); ?></span>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <textarea class="form-control"  id="Address" name="Address"  > <?php echo (set_value('Address')) ? set_value('Address') : $application_data['address'] ;?></textarea>
                            <span class="text-danger"><?php echo form_error('Address'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ProfessinalInformation">Professional Information</label>
                            <textarea class="form-control" id="ProfessinalInformation" name="ProfessinalInformation" ><?php echo (set_value('ProfessinalInformation')) ? set_value('ProfessinalInformation') : $application_data['professional_info'] ;?></textarea>
                            <span class="text-danger"><?php echo form_error('ProfessinalInformation'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="BloodGroup">Blood Group</label>
                            <input type="text" class="form-control"  name="BloodGroup" id="BloodGroup"  value="<?php echo (set_value('BloodGroup')) ? set_value('BloodGroup') : $application_data['blood_group'] ;?>" >
                            <span class="text-danger"><?php echo form_error('BloodGroup'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Religion">Religious</label>
                            <input type="text" class="form-control" name="Religion" id="Religion" value="<?php echo (set_value('Religion')) ? set_value('Religion') : $application_data['religious'] ;?>">
                            <span class="text-danger"><?php echo form_error('Religion'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Mobile">Mobile</label>
                            <input type="text" class="form-control"  id="Mobile" name="Mobile" value="<?php echo (set_value('Mobile')) ? set_value('Mobile') : $application_data['mobile'] ;?>">
                            <span class="text-danger"><?php echo form_error('Mobile'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control"  id="Phone" name="Phone" value="<?php echo (set_value('Phone')) ? set_value('Phone') : $application_data['phone'] ;?>">
                            <span class="text-danger"><?php echo form_error('Phone'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="EmailAddress">Email Address</label>
                            <input type="text" class="form-control"  id="EmailAddress" name="EmailAddress" value="<?php echo (set_value('EmailAddress')) ? set_value('EmailAddress') : $application_data['email_address'] ;?>">
                            <span class="text-danger"><?php echo form_error('EmailAddress'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="FacebookId">Facebook ID</label>
                            <input type="text" class="form-control"  name="FacebookId" id="FacebookId" value="<?php echo (set_value('FacebookId')) ? set_value('FacebookId') : $application_data['facebook_id'] ;?>" >
                            <span class="text-danger"><?php echo form_error('FacebookId'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="NID">NID / Passport NO</label>
                            <input type="text" class="form-control"  id="NID" name="NID" value="<?php echo (set_value('NID')) ? set_value('NID') : $application_data['nid'] ;?>">
                            <span class="text-danger"><?php echo form_error('NID'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="DateOfBirth">Date of Birth</label>
                            <input type="text" class="form-control"  id="DateOfBirth" name="DateOfBirth" value="<?php echo (set_value('DateOfBirth')) ? set_value('DateOfBirth') : $application_data['date_of_birth'] ;?>">
                            <span class="text-danger"><?php echo form_error('DateOfBirth'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Male">Gender</label><br/>
                           
                            <label class="radio-inline">
                                <input type="radio" name="Gender" id="Male" value="Male"  <?php echo ($application_data['gender'] == 'Male') ? "checked" : "" ;?>> Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="Gender" id="Female" value="Female"  <?php echo ($application_data['gender'] == 'Female') ? "checked" : "" ;?>> Female
                            </label>
                            <span class="text-danger"><?php echo form_error('Gender'); ?></span>
                        </div>
                    </div>
                    
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update & Close</button>
                    <a href="<?php echo base_url('Controller_Applications/') ?>" class="btn btn-warning">Back</a>
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
    <script>
$(document).ready(function(){
        
        var base_url = '<?php echo base_url();?>';
        var profile_image = '<?php echo $application_data['profile_picture'];?>';
        console.log(profile_image);
        $("#picture_upload").fileinput({
            overwriteInitial: true,
            maxFileSize: 1000,
            // showClose: false,
            showCaption: false,
            browseLabel: '',
            // removeLabel: '',
            browseIcon: '<button type="button" class="btn btn-primary">Select Image</button>',
            // removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            // removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img class="img-fluid" src="'+ base_url + '' + profile_image +'" alt="Your Avatar" width="200">',
            layoutTemplates: {main2: '{preview} {browse}'},
            allowedFileExtensions: ["jpg", "png", "PNG", "JPEG", "jpeg"]
        });
    });

    </script>