
  <script>
  jQuery(function($) {
  
    
    $('#mass_effect').click( function() {
    
    var input = $("input[name='chk_now[]']").clone();
    $(".hidden_chk").append(input);
    
    });
    

  
/*
Remove hdn class
*/
window.remove_class_hdn = function(source)
  {
    $(source).find(".hdn").each(function(key, item){
    var oldi = item.outerHTML;
    var newi = $(item).removeClass("hdn")[0].outerHTML;
      source = source.replace(oldi, newi);
    });
    return source;
  }
/*
Validation form
*/

function validate_big_form(event, defselector, elem)
{
$('.container_frm__errors').html("");
var big_frm_errors = [];
  var id_arr = elem.attr("id").split("frm_");
  var selector = "#"+defselector.substr(1)+"_"+id_arr[1];
  $(selector).find(".notempty_fld").each(function (key,item) {
    if ((empty(item))||($(item).val() == ''))
      big_frm_errors.push("Validation Error (not empty check): Field - '"+$(item).parent().prev().html()+"'");
  });
  $(selector).find(".digits_fld").each(function (key,item) {
    if ((empty(item))||(!$.isNumeric($(item).val())))
      big_frm_errors.push("Validation Error (digit check): Field - '"+$(item).parent().prev().html()+"'");
  });

  if (big_frm_errors.length === 0)
              {
              //$(selector)[0].submit();
              }
              else
              {
              event.preventDefault();
              var newsel = selector+"_errors";
                $(newsel).html("<br>"+big_frm_errors.join("<br>"));
              }
}  

    var effect_close_event = function(){
        $('.effect_element img').unbind("click").bind("click", function(event){
            event.preventDefault();
          $(this).parent().remove();
        });
    }
    
    $('button[name="apply_effect_name"]').click(function(event){
    event.preventDefault();
    
    var check_name_possibility = true;

    $('input[name="effects_names[]"]').each(function(i,v){
      if ($(v).val() == $("select[name='effect']").val())check_name_possibility = false;
    });

    if (check_name_possibility)
      $('.applied_effects').append("<div class='effect_element' style='line-height:30px;'><img src='<?php echo plugins_url("../../images/close.png", __FILE__); ?>' class='close_effect_elem' style='cursor:pointer;'>&nbsp;&nbsp;&nbsp;"+$("select[name='effect']").val()+"<input type='hidden' name='effects_names[]' value='"+$("select[name='effect']").val()+"'></div>");

        effect_close_event();

    });

    effect_close_event();

    
  });
  </script>


<!-- ********************************************* Tab Page 1 ****************************************************** -->

<br>
  <div id="tabs-1" style="text-align:left;width:97%;" class="welcome-panel">

