 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/front_end/js/jquery-3.4.1.min.js');?>" ></script>
    <script src="<?php echo base_url('assets/front_end/js/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/front_end/js/bootstrap.min.js');?>" ></script>
    <script src="<?php echo base_url('assets/front_end/js/jssor.slider-27.5.0.min.js');?>" ></script>
    <script src="<?php echo base_url('assets/plugins/fileinput/fileinput.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-validator/jquery.validate.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugins/jquery-validator/additional-methods.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugins/datepicker/js/bootstrap-datepicker.js') ?>"></script>
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
            defaultPreviewContent: '<img class="img-fluid" src="'+ base_url+'assets/images/avater.png" alt="Your Avatar" width="200">',
            layoutTemplates: {main2: '{preview} {browse}'},
            allowedFileExtensions: ["jpg", "png", "PNG", "JPEG", "jpeg"]
        });
        // $("#nid_upload").fileinput({
        //     overwriteInitial: true,
        //     maxFileSize: 1000,
        //     // showClose: false,
        //     showCaption: false,
        //     browseLabel: '',
        //     // removeLabel: '',
        //     browseIcon: '<button type="button" class="btn btn-outline-dark btn-block">Select NID</button>',
        //     // removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        //     // removeTitle: 'Cancel or reset changes',
        //     elErrorContainer: '#kv-avatar-errors-1',
        //     msgErrorClass: 'alert alert-block alert-danger',
        //     // defaultPreviewContent: '<img src="'+ base_url+'assets/images/avater.png" alt="Your Avatar" width="200">',
        //     layoutTemplates: {main2: '{browse}'},
        //     allowedFileExtensions: ["jpg", "png", "PNG", "JPEG", "jpeg", "pdf", "PDF"]
        // });

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
              $('#SpouseName').attr('placeholder',response.SpouseNamePlaceholder);
              $('#FatherNameLabel').text(response.FatherNameLabel);
              $('#FatherName').attr('placeholder',response.FatherNamePlaceholder);
              $('#MotherNameLabel').text(response.MotherNameLabel);
              $('#MotherName').attr('placeholder',response.MotherNamePlaceholder);
              $('#BKSPAdmissionYearLabel').text(response.BKSPAdmissionYearLabel);
              $('#BKSPAdmissionYear').attr('placeholder',response.BKSPAdmissionYearPlaceholder);
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
              // $('#nid_uploadLabel').text(response.nid_uploadLabel);
              $('#DateOfBirthLabel').text(response.DateOfBirthLabel);
              $('#GenderLabel').text(response.GenderLabel);
              $('#DateOfBirth').attr('placeholder',response.DateOfBirth);
              $('#DegreeYearOfAdmissionLabel').text(response.DegreeYearOfAdmissionLabel);
              $('#YearOfAdmission').attr('placeholder',response.YearOfAdmission);
              $('#YearOfPassLabel').text(response.YearOfPassLabel);
              $('#YearOfPass').attr('placeholder',response.YearOfPass);
              $('#onlyForDegreeLabel').text(response.onlyForDegreeLabel);
            }
          });
        }).trigger('change');
        
        $('#Name').on('blur', function(){
          var name = $(this).val();
          $('#MemberName').text(name);
        });

        $("#bksp_member_form").validate({
          rules: {
            picture_upload: "required",
            Name: "required",
            FatherName: "required",
            MotherName: "required",
            // BKSPAdmissionYear: "required",
            CadetNo: "required",
            YearOfSSC: "required",
            YearOfHSC: "required",
            // YearOfAdmission: "required",
            // YearOfPass: "required",
            Address: "required",
            BloodGroup: "required",
            Religion: "required",
            Mobile: "required",
            EmailAddress: {
              required: true,
              email: true
            },
            NID: "required",
            DateOfBirth: "required",
            // nid_upload: "required",
            Gender: "required",
            // agree: "required",
          }
        });
        $('#DateOfBirth').datepicker({
				format: 'yyyy-mm-dd'
			});
      });






      let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

    </script>
  </body>
</html>