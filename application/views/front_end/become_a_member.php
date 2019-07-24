<div>
    <div class="container">
        <div class="bksp_form">
            <div class="bksp_form_inner">
                <div class="row">
                    <div class="col-sm-3">
                        <img class="logo form_logo" src="<?php echo base_url('assets/front_end/images/bksp_logo.png');?>" alt="BKSP LOGO">
                    </div>
                    <div class="col-sm-9">
                        <h1>Alumni Association of BKSP</h1>
                        <select name="language" id="language" class="float-right">
                            <option value="EN">ENGLISH</option>
                            <option value="BN">BANGLA</option>
                        </select>
                    </div>

                </div>
                <form class="bksp_member_form" id="bksp_member_form" method="post" action="<?php base_url('en/become_a_member') ?>" enctype="multipart/form-data">
                    
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <h3 class="membership">Membership Form</h3>
                            <h5>(only valid member can apply)</h5>
                        </div>
                        <div class="col-sm-3">
                            <!-- <div class="picture-box border border-success">Upload your picture</div> -->
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input type="file" id="picture_upload" name="picture_upload" >
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 col-form-label"><span id="NameLabel"></span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Name" name="Name" placeholder=""  value ="<?php echo (set_value('Name')) ? set_value('Name') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('Name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="SpouseName" class="col-sm-3 col-form-label"><span id="SpouseNameLabel"></span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="SpouseName" name="SpouseName" placeholder="" value ="<?php echo (set_value('SpouseName')) ? set_value('SpouseName') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('SpouseName'); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="FatherName" class="col-sm-3 col-form-label"><span id="FatherNameLabel"></span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="FatherName" name="FatherName" placeholder="" value ="<?php echo (set_value('FatherName')) ? set_value('FatherName') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('FatherName'); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="MotherName" class="col-sm-3 col-form-label"><span id="MotherNameLabel"></span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="MotherName" name="MotherName" placeholder="" value ="<?php echo (set_value('MotherName')) ? set_value('MotherName') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('MotherName'); ?></span>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="BKSPAdmissionYear" class="col-sm-2 col-form-label"><span id="BKSPAdmissionYearLabel"></span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="BKSPAdmissionYear" id="BKSPAdmissionYear" placeholder="" value ="<?php echo (set_value('BKSPAdmissionYear')) ? set_value('BKSPAdmissionYear') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('BKSPAdmissionYear'); ?></span>
                        </div>
                        <label for="CadetNo" class="col-sm-2 col-form-label"><span id="CadetNoLabel"></span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="CadetNo" id="CadetNo" placeholder=""  value ="<?php echo (set_value('CadetNo')) ? set_value('CadetNo') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('CadetNo'); ?></span>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="YearOfSSC" class="col-sm-2 col-form-label"><span id="YearOfSSCLabel"></span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="YearOfSSC" id="YearOfSSC" placeholder=""  value ="<?php echo (set_value('YearOfSSC')) ? set_value('YearOfSSC') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('YearOfSSC'); ?></span>
                        </div>
                        <label for="YearOfHSC" class="col-sm-2 col-form-label"><span id="YearOfHSCLabel"></span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="YearOfHSC" name="YearOfHSC" placeholder=""  value ="<?php echo (set_value('YearOfHSC')) ? set_value('YearOfHSC') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('YearOfHSC'); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Address" class="col-sm-2 col-form-label"><span id="AddressLabel"></span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="Address" name="Address" rows="3" placeholder=""><?php echo (set_value('Address')) ? set_value('Address') : "" ;?></textarea>
                            <span class="text-danger"><?php echo form_error('Address'); ?></span>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="BloodGroup" class="col-sm-2 col-form-label"><span id="BloodGroupLabel"></span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="BloodGroup" id="BloodGroup" placeholder=""  value ="<?php echo (set_value('BloodGroup')) ? set_value('BloodGroup') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('BloodGroup'); ?></span>
                        </div>
                        <label for="Religion" class="col-sm-2 col-form-label"><span id="ReligionLabel"></span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="Religion" id="Religion" placeholder="" value ="<?php echo (set_value('Religion')) ? set_value('Religion') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('Religion'); ?></span>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <label for="Mobile" class="col-sm-2 col-form-label"><span id="MobileLabel"></span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="Mobile" name="Mobile" placeholder="" value ="<?php echo (set_value('Mobile')) ? set_value('Mobile') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('Mobile'); ?></span>
                        </div>
                        <label for="Phone" class="col-sm-2 col-form-label"><span id="PhoneLabel"></span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="Phone" name="Phone" placeholder="" value ="<?php echo (set_value('Phone')) ? set_value('Phone') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('Phone'); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EmailAddress" class="col-sm-3 col-form-label"><span id="EmailAddressLabel"></span></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="EmailAddress" name="EmailAddress" placeholder=""  value ="<?php echo (set_value('EmailAddress')) ? set_value('EmailAddress') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('EmailAddress'); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="FacebookId" class="col-sm-3 col-form-label"><span id="FacebookIdLabel"></span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="FacebookId" id="FacebookId" placeholder="" value ="<?php echo (set_value('FacebookId')) ? set_value('FacebookId') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('FacebookId'); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ProfessinalInformation" class="col-sm-3 col-form-label"><span id="ProfessinalInformationLabel"></span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="ProfessinalInformation" name="ProfessinalInformation" rows="3" placeholder=""><?php echo (set_value('ProfessinalInformation')) ? set_value('ProfessinalInformation') : "" ;?></textarea>
                            <span class="text-danger"><?php echo form_error('ProfessinalInformation'); ?></span>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="NID" class="col-sm-3 col-form-label"><span id="NIDLabel"></span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="NID" name="NID" placeholder=""  value ="<?php echo (set_value('NID')) ? set_value('NID') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('NID'); ?></span>
                        </div>
                        <label for="nid_upload" class="col-sm-2 col-form-label"><span id="nid_uploadLabel"></span></label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" id="nid_upload" name="nid_upload" accept="image/jp2,image/png">
                            <span class="text-danger"><?php echo form_error('nid_upload'); ?></span>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="Gender" class="col-sm-3 col-form-label"><span id="GenderLabel"></span></label>
                        <div class="col-sm-4">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="Male" name="Gender" class="custom-control-input"  value="Male" <?php echo (set_value('Gender') == 'Male') ? "checked" : "" ;?>>
                                <label class="custom-control-label" for="Male">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="Female" name="Gender" class="custom-control-input">
                                <label class="custom-control-label" for="Female"  value="Female" <?php echo (set_value('Gender') == 'Female') ? "checked" : "" ;?>>Female</label>
                            </div>
                            <span class="text-danger"><?php echo form_error('Gender'); ?></span>
                        </div>
                        <label for="DateOfBirth" class="col-sm-2 col-form-label"><span id="DateOfBirthLabel"></span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control datepicker" id="DateOfBirth" name="DateOfBirth" placeholder="" value ="<?php echo (set_value('DateOfBirth')) ? set_value('DateOfBirth') : "" ;?>">
                            <span class="text-danger"><?php echo form_error('DateOfBirth'); ?></span>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="MemberNo" class="col-sm-3 col-form-label">সদস্য নম্বর/ Member No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="MemberNo" placeholder="সদস্য নম্বর/ Member No">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="agree" name="agree">
                                <span class="text-danger"><?php echo form_error('agree'); ?></span>
                                <label class="form-check-label" for="agree">
                                <span id="disclaimer">আমি <span id="MemberName">...............</span> স্বজ্ঞানে, Alumni Association of BKSP এর সকল কাজে নিজে স্বেচ্ছায় নিয়োজিত রাখবো এবং গঠনতন্ত্রের সকল শর্ত মেনে চলব<span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>