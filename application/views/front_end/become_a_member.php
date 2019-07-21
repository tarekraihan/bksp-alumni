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
                    </div>
                </div>
                <h3>Membership Form</h3>
            <form class="bksp_member_form" class="bksp_member_form" method="post" action="" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">নাম/ Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="নাম/ Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="SpouseName" class="col-sm-3 col-form-label">স্বামী/ স্ত্রীর নাম/ Spouse's Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="SpouseName" placeholder="স্বামী/স্ত্রীর নাম/Spouse's Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="FatherName" class="col-sm-3 col-form-label">বাবার নাম/ Father's Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="FatherName" placeholder="বাবার নাম/ Father's Name:">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="MotherName" class="col-sm-3 col-form-label">মায়ের নাম/ Mother's Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="MotherName" placeholder="মায়ের নাম/Mother's Name">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label for="BKSPAdmissionYear" class="col-sm-4 col-form-label">বিকেএসপিতে ভর্তি সাল/ BKSP Admission Year</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="BKSPAdmissionYear" placeholder="বিকেএসপিতে ভর্তি সাল/BKSP Admission Year">
                    </div>
                    <label for="CadetNo" class="col-sm-2 col-form-label">ক্যাডেট নং/ Cadet No</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="CadetNo" placeholder="ক্যাডেট নং/Cadet No">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label for="YearOfSSC" class="col-sm-2 col-form-label">এসএসসি সাল/Year of SSC</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="YearOfSSC" placeholder="এসএসসি সাল/Year of SSC">
                    </div>
                    <label for="YearOfHSC" class="col-sm-2 col-form-label">এইচএসসি সাল/ Year of HSC</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="YearOfHSC" placeholder="এইচএসসি সাল/ Year of HSC">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Address" class="col-sm-2 col-form-label">ঠিকানা/ Address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="Address" rows="3" placeholder="ঠিকানা/ Address"></textarea>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label for="BloodGroup" class="col-sm-2 col-form-label">রক্তের গ্রুপ/ Blood Group</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="BloodGroup" placeholder="রক্তের গ্রুপ/ Blood Group">
                    </div>
                    <label for="Religion" class="col-sm-2 col-form-label">ধর্ম/ Religion</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="Religion" placeholder="ধর্ম/ Religion">
                    </div>
                </div>
                <div class="form-row form-group">
                    <label for="Mobile" class="col-sm-2 col-form-label">মোবাইল নং/ Mobile No</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="Mobile" placeholder="মোবাইল/ Mobile">
                    </div>
                    <label for="Phone" class="col-sm-2 col-form-label">ফোন নং/ Phone No</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="Phone" placeholder="ফোন নং/ Phone">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="EmailFacebook" class="col-sm-4 col-form-label">ই-মেইল/ফেসবুক আইডি/ E-mail/ Facebook ID</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="EmailFacebook" placeholder="ই-মেইল/ফেসবুক আইডি/ E-mail/ Facebook ID">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ProfessinalInformation" class="col-sm-3 col-form-label">পেশাদারি তথ্য/ Professinal Information</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="ProfessinalInformation" rows="3" placeholder="পেশাদারি তথ্য/ Professinal Information"></textarea>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label for="NID" class="col-sm-3 col-form-label">জাতীয় পরিচয় পত্র নম্বর/ NID No</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="NID" placeholder="জাতীয় পরিচয় পত্র নম্বর/ NID No">
                    </div>
                    <label for="DateOfBirth" class="col-sm-2 col-form-label">জন্ম তারিখ/ Date of Birth</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="DateOfBirth" placeholder="dd/month/year">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="MemberNo" class="col-sm-3 col-form-label">সদস্য নম্বর/ Member No</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="MemberNo" placeholder="সদস্য নম্বর/ Member No">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="agree">
                            <label class="form-check-label" for="agree">
                            আমি ............... স্বজ্ঞানে, Alumni Association of BKSP এর সকল কাজে নিজে স্বেচ্ছায় নিয়োজিত রাখবো এবং গঠনতন্ত্রের সকল শর্ত মেনে চলব
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