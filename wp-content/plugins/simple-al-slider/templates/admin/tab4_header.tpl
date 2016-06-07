 <div id="tabs-4" style="text-align:left;width:97%;" class="welcome-panel">

  <div class="new_text_item" title="New element creation" style="background-color:#fff;width:350px;padding-left:20px;">

<div class="panel panel-primary">
<div class="panel-heading">

  <h3 class="panel-title"><?php echo $lang[$current_language]['Elements']['new element']['Create new element']; ?><h3>
      </div>
<div class="panel-body">

    <?php echo $lang[$current_language]['Elements']['new element']['Text']; ?> <input type="text" name="new_text_item" value="" id="new_text_item"><br>
    <?php echo $lang[$current_language]['Elements']['new element']['Slide']; ?>
    <select name="slide_text">
    <?php
    if (isset($slider['slides_info'])&&(!empty($slider['slides_info'])))
      foreach ($slider['slides_info'] as $slide)
      {
      $swp_slide_caption = (empty($slide['sldsname'])) ? "id:".$slide['sldsid'] : $slide['sldsname'];
      echo "<option value='".$slide['sldsid']."'>".$swp_slide_caption."</option>";
      }
    ?>
    </select>
    <input type="submit" class="create_new_element_btn" value="<?php echo $lang[$current_language]['Elements']['new element']['Create']; ?>">
    <input type="submit" class="close_new_element_btn" value="<?php echo $lang[$current_language]['Elements']['new element']['Close']; ?>">
  </div>
        </div>
              </div>
  <script>
  jQuery(function($) {

<?php
global $jquery_minicolors;
if ($jquery_minicolors)
{
?>
function set_color_pickers()
  {
  $.minicolors = {
    defaults: {
        animationSpeed: 50,
        animationEasing: 'swing',
        change: null,
        changeDelay: 0,
        control: 'hue',
        dataUris: true,
        defaultValue: '',
        hide: null,
        hideSpeed: 100,
        inline: false,
        letterCase: 'lowercase',
        opacity: false,
        position: 'bottom left',
        show: null,
        showSpeed: 100,
        theme: 'default'
    }
};
    $('input[name="color[]"]').not('.hdn_color').minicolors('create', $.minicolors.defaults);
    $('input[name="bgcolor[]"]').not('.hdn_color').minicolors('create', $.minicolors.defaults);
  }
  
  set_color_pickers();
<?php
  }
?>

    $('#element_mass_effect').click( function() {
      var input = $("input[name='elements_chk_now[]']").clone();
      $(".hidden_chk_2").append(input);
    });
  
    $("button[name='create_new_text']").click(function(){
      $( ".new_text_item" ).show('slow');
                  event.preventDefault();
    });
    
    $('.create_new_element_btn').bind('click', function(event){
       if ($('#new_text_item').val() == '')
            {
            event.preventDefault();
              window.alert_show(window.simpleal_info_alert_wrong_item_text, 'danger');
            }
            else
            {
            send_text_data($('#new_text_item').val(), $('select[name="slide_text"]').val());
              $('#new_text_item').val('');
                $( ".new_text_item" ).hide('slow');
                            event.preventDefault();
            }
    });
    $('.close_new_element_btn').unbind('click').bind('click', function(event){
              $('#new_text_item').val('');
                $( ".new_text_item" ).hide('slow');
                            event.preventDefault();
    });
    
    var send_text_data = function(text_data, slide_id)
    {
     var text_frm = $('.text_hidden_form').html();

     var url = ajaxurl;
      var nonce = $('#text_nonce').html();
      var info = $('.text_hidden_form').html();

    $.post( url, { action:"simple_al_saveTextData_ajax", slide_id: slide_id, url: "", text: text_data, width: 0, height: 0, offsetleft: 0, offsettop: 0, style:'', txt_save_ajax: true, nonce: nonce })
    .done(function( nfo ) {
    var data = nfo.split("::");
      id = data[0];
      text_name = data[1];

          text_frm = text_frm.replace(/\[TEXT\]/g, text_data);
          text_frm = text_frm.replace(/\[TEXT_NAME\]/g, text_name);
          text_frm = text_frm.replace(/\[TEXT_ID\]/g, id);

     $(text_frm).appendTo('.texts_output_area');
     $('.texts_output_area').find('#slide_id_'+id).val(slide_id);
      $('.texts_output_area').find('.hdn_color').removeClass('hdn_color');
      
<?php
global $jquery_minicolors;
if ($jquery_minicolors)
{
?>
        set_color_pickers();
<?php
}
?>

     $( "input[type='submit']" ).not(".hdn").addClass('button');
                 $('.set_image').addClass('button');
                 window.set_simple_al_image();
                     select_refresh();

    });
    }
    
      jQuery(function($) {
        $('.element_image_src').each(function(i,v){
          $(v).attr('src', $(v).prev().children().first().attr('src'));
          });
      });

    
  $('.apply_for_all_show').click(function(event){
    event.preventDefault();
    $('.apply_for_all_elements').show('slow');
  });
  
  $('.close_apply_for_all_btn').click(function(event){
    event.preventDefault();
    $('.apply_for_all_elements').hide('slow');
  });

  $('input[name="apply_for_checked_btn"]').click(function(event){
    event.preventDefault();
    $('input:checkbox[name="elements_chk_now[]"]:checked').each(function(i,v){
    ($('input[name="aname"]').val() != '*') ? $('input[name="name[]"].'+$(v).attr('class')).val($('input[name="aname"]').val()) : '';
    ($('input[name="aurl"]').val() != '*') ? $('input[name="url[]"].'+$(v).attr('class')).val($('input[name="aurl"]').val()) : '';
    ($('input[name="atext"]').val() != '*') ? $('input[name="text[]"].'+$(v).attr('class')).val($('input[name="atext"]').val()) : '';
    if ($('select[name="aelement_type"]').val() != -1) { $('select[name="element_type[]"].'+$(v).attr('class')).val($('select[name="aelement_type"]').val()).change(); $('select[name="element_type[]"].'+$(v).attr('class')).trigger('change'); }
    ($('input[name="aelement_image"]').val() != '*') ? $('input[name="element_image[]"].'+$(v).attr('class')).val($('input[name="aelement_image"]').val()) : '';
    if ($('select[name="aelement_template"]').val() != -1) { $('select[name="element_template[]"].'+$(v).attr('class')).val($('select[name="aelement_template"]').val()).change(); $('select[name="element_template[]"].'+$(v).attr('class')).trigger('change'); }
    ($('input[name="awidth"]').val() != '*') ? $('input[name="width[]"].'+$(v).attr('class')).val($('input[name="awidth"]').val()) : '';
    ($('input[name="aheight"]').val() != '*') ? $('input[name="height[]"].'+$(v).attr('class')).val($('input[name="aheight"]').val()) : '';
    ($('input[name="aclasses"]').val() != '*') ? $('input[name="classes[]"].'+$(v).attr('class')).val($('input[name="aclasses"]').val()) : '';
    ($('input[name="aoffsetleft"]').val() != '*') ? $('input[name="offsetleft[]"].'+$(v).attr('class')).val($('input[name="aoffsetleft"]').val()) : '';
    ($('input[name="aoffsettop"]').val() != '*') ? $('input[name="offsettop[]"].'+$(v).attr('class')).val($('input[name="aoffsettop"]').val()) : '';
    ($('input[name="acolor"]').val() != '*') ? $('input[name="color[]"].'+$(v).attr('class')).val($('input[name="acolor"]').val()) : '';
    ($('input[name="abgcolor"]').val() != '*') ? $('input[name="bgcolor[]"].'+$(v).attr('class')).val($('input[name="abgcolor"]').val()) : '';
    ($('input[name="astyle"]').val() != '*') ? $('input[name="style[]"].'+$(v).attr('class')).val($('input[name="astyle"]').val()) : '';
    ($('input[name="asize"]').val() != '*') ? $('input[name="size[]"].'+$(v).attr('class')).val($('input[name="asize"]').val()) : '';
    });
  });
  
  $('input[name="apply_for_all_btn"]').click(function(event){
    event.preventDefault();
    ($('input[name="aname"]').val() != '*') ? $('input[name="name[]"]').val($('input[name="aname"]').val()) : '';
    ($('input[name="aurl"]').val() != '*') ? $('input[name="url[]"]').val($('input[name="aurl"]').val()) : '';
    ($('input[name="atext"]').val() != '*') ? $('input[name="text[]"]').val($('input[name="atext"]').val()) : '';
    if ($('select[name="aelement_type"]').val() != -1) { $('select[name="element_type[]"]').val($('select[name="aelement_type"]').val()).change(); $('select[name="element_type[]"]').trigger('change'); }
    ($('input[name="aelement_image"]').val() != '*') ? $('input[name="element_image[]"]').val($('input[name="aelement_image"]').val()) : '';
    if ($('select[name="aelement_template"]').val() != -1) { $('select[name="element_template[]"]').val($('select[name="aelement_template"]').val()).change(); $('select[name="element_template[]"]').trigger('change'); }
    ($('input[name="awidth"]').val() != '*') ? $('input[name="width[]"]').val($('input[name="awidth"]').val()) : '';
    ($('input[name="aheight"]').val() != '*') ? $('input[name="height[]"]').val($('input[name="aheight"]').val()) : '';
    ($('input[name="aclasses"]').val() != '*') ? $('input[name="classes[]"]').val($('input[name="aclasses"]').val()) : '';
    ($('input[name="aoffsetleft"]').val() != '*') ? $('input[name="offsetleft[]"]').val($('input[name="aoffsetleft"]').val()) : '';
    ($('input[name="aoffsettop"]').val() != '*') ? $('input[name="offsettop[]"]').val($('input[name="aoffsettop"]').val()) : '';
    ($('input[name="acolor"]').val() != '*') ? $('input[name="color[]"]').val($('input[name="acolor"]').val()) : '';
    ($('input[name="abgcolor"]').val() != '*') ? $('input[name="bgcolor[]"]').val($('input[name="abgcolor"]').val()) : '';
    ($('input[name="astyle"]').val() != '*') ? $('input[name="style[]"]').val($('input[name="astyle"]').val()) : '';
    ($('input[name="asize"]').val() != '*') ? $('input[name="size[]"]').val($('input[name="asize"]').val()) : '';
  });

var select_change = function(select)
  {
  }
  
var select_refresh =  function()
  {
  $('select').not('#langs').not('#projects').unbind('change').bind('change', function() {
  var select = this;
  var value = select.value;
    $(select).children().removeAttr("selected");
    $(this).children().filter(function() { return $(this).attr('value') == value; }).attr('selected', 'selected');//
  });
  }
  select_refresh();

  $('input[name="save_all_elements_btn"]').click(function(event){

      $('input').each(function(i,v) {
          $(v).attr('value', $(v).val());
      });

      $('select').each(function(i,v) {
        $(this).replaceWith("<input type='hidden' name='"+$(this).attr('name')+"' value='"+$(this).attr('value')+"'>");
      });

    $('form').not('.bulk_elements_frm').each(function(i,v){
        $(v).replaceWith($(v).find('.inner_div_frm').html())
      });

        $('.bulk_elements_frm_div').append($('.texts_output_area').html());

  });
  
  var replace_select_to_input = function()
    {
    
    }
  
  });
  </script>