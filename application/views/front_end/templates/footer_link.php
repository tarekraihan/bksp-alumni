 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/front_end/js/jquery-3.4.1.min.js');?>" ></script>
    <script src="<?php echo base_url('assets/front_end/js/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/front_end/js/bootstrap.min.js');?>" ></script>
    <script src="<?php echo base_url('assets/plugins/fileinput/fileinput.min.js') ?>"></script>
    <script>
      $(document).ready(function(){
        
        var base_url = '<?php echo base_url();?>';
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
            defaultPreviewContent: '<img src="'+ base_url+'assets/images/avater.png" alt="Your Avatar" width="200">',
            layoutTemplates: {main2: '{preview} {browse}'},
            allowedFileExtensions: ["jpg", "png", "PNG", "JPEG", "jpeg"]
        });

        $('#language').on('change', function() {
          var language = $(this).val();
          $.ajax({
            type: 'post',
            url: "<?php echo base_url('en/ajax_change_language'); ?>",
            data: {language: language},
            dataType: 'json',
            success: function( response ) {
              //var obj = jQuery.parseJSON(response);
              $('#NameLabel').text(response.NameLabel);
              $('#Name').attr('placeholder',response.NamePlaceholder);
              $('#SpouseNameLabel').text(response.SpouseNameLabel);
              $('#SpouseName').attr('placeholder',response.SpouseName);
              $('#FatherNameLabel').text(response.FatherNameLabel);
              $('#FatherName').attr('placeholder',response.FatherNamePlaceholder);
              $('#MotherNameLabel').text(response.MotherNameLabel);
              $('#MotherName').attr('placeholder',response.MotherNamePlaceholder);
              $('#BKSPAdmissionYearLabel').text(response.BKSPAdmissionYearLabel);
              $('#BKSPAdmissionYear').attr('placeholder',response.BKSPAdmissionYear);
              $('#CadetNoLabel').text(response.CadetNoLabel);
              $('#CadetNo').attr('placeholder',response.CadetNo);
              $('#YearOfSSCLabel').text(response.YearOfSSCLabel);
              $('#YearOfSSC').attr('placeholder',response.YearOfSSC);
              $('#YearOfHSCLabel').text(response.YearOfHSCLabel);
              $('#YearOfHSC').attr('placeholder',response.YearOfHSC);
              $('#AddressLabel').text(response.AddressLabel);
              $('#Address').attr('placeholder',response.Address);
              $('#BloodGroupLabel').text(response.BloodGroupLabel);
              $('#BloodGroup').attr('placeholder',response.BloodGroup);
              $('#ReligionLabel').text(response.ReligionLabel);
              $('#Religion').attr('placeholder',response.Religion);
              $('#MobileLabel').text(response.MobileLabel);
              $('#Mobile').attr('placeholder',response.Mobile);
              $('#PhoneLabel').text(response.PhoneLabel);
              $('#Phone').attr('placeholder',response.Phone);
              $('#EmailAddressLabel').text(response.EmailAddressLabel);
              $('#EmailAddress').attr('placeholder',response.EmailAddress);
              $('#FacebookIdLabel').text(response.FacebookIdLabel);
              $('#FacebookId').attr('placeholder',response.FacebookId);
              $('#ProfessinalInformationLabel').text(response.ProfessinalInformationLabel);
              $('#ProfessinalInformation').attr('placeholder',response.ProfessinalInformation);
              $('#NIDLabel').text(response.NIDLabel);
              $('#NID').attr('placeholder',response.NID);
              $('#DateOfBirthLabel').text(response.DateOfBirthLabel);
              $('#DateOfBirth').attr('placeholder',response.DateOfBirth);
            }
          });
        }).trigger('change');
        
        $('#Name').on('blur', function(){
          var name = $(this).val();
          $('#MemberName').text(name);
        })

      });

    </script>
  </body>
</html>