jQuery(document).ready(function($) {
window.set_simple_al_image = function(){
$('.set_image').unbind('click').bind('click', function(event)
{

  event.preventDefault();
  var current_element = this;

  var uploader = wp.media(
  {
    title : 'Add image for element',
    button : {
      text : 'Add',
    },
    multiple : false
  })

  .on('select', function()
  {
    var selection = uploader.state().get('selection');

    var attachements = [];

    selection.map(function(attachement)
    {
      attachement = attachement.toJSON();

      attachements.push([attachement.id, attachement.url, attachement.caption]);

      set_element_image_data(attachement.id, attachement.url, current_element, attachement.width);
      
    })

  })
  .open();

});
function set_element_image_data(attach_id, url, current_element, width)
  {
    $(current_element).parent().find('.element_image_src').attr('src', url).css('width', ((width<200)?width:200)+"px");

    $(current_element).parent().find('.element_image').val(url);
    
    $(current_element).parent().find('.for_attachment_id').html("<input type='hidden' name='image_elem_wp_id[]' value='"+attach_id+"'>");
  }
}
window.set_simple_al_image();
});