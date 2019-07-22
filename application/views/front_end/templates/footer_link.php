 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/front_end/js/jquery-3.4.1.min.js');?>" ></script>
    <script src="<?php echo base_url('assets/front_end/js/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/front_end/js/bootstrap.min.js');?>" ></script>
    <script>
      $(document).ready(function(){
       
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
              $('#SpouseNameLabel').text(response.NameLabel);
              $('#SpouseName').attr('placeholder',response.NamePlaceholder);
              $('#FatherNameLabel').text(response.FatherNameLabel);
              $('#FatherName').attr('placeholder',response.FatherNamePlaceholder);
              $('#MotherNameLabel').text(response.MotherNameLabel);
              $('#MotherName').attr('placeholder',response.MotherNamePlaceholder);
            }
          });
        }).trigger('change');
        
        

      });

    </script>
  </body>
</html>