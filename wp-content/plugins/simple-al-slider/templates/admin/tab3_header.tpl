  <div id="tabs-3" style="text-align:left;width:97%;" class="welcome-panel">
  <script>
  jQuery(function($) {

    $('input[name="save_all_bgimages_btn"]').click(function(event){

      $('input').each(function(i,v) {
          $(v).attr('value', $(v).val());
      });


    $('form').not('.bulk_bgimages_frm').each(function(i,v){
        $(v).replaceWith($(v).find('.inner_div_bg_frm').html())
      });

        $('.bulk_bgimages_frm_div').append($('.images_output_area').html());

  });
  
  });
</script>