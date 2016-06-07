<?php
if (!isset($lang))$lang = array();

function lang_init_en_en($current_lang, $lang)
{
switch ($current_lang)
 {
case 'en-en':
//Localization for English language
$lang['en-en']['language'] = 'English';

$lang['en-en']['Projects'] = 'Projects';
$lang['en-en']['Create new project'] = 'Create new project';
$lang['en-en']['Delete project'] = 'Delete';

$lang['en-en']['new project']['New project'] = 'New project';
$lang['en-en']['new project']['Create'] = 'Create';
$lang['en-en']['new project']['Close'] = 'Close';

$lang['en-en']['menu']['Slider'] = 'Slider';
$lang['en-en']['menu']['Slides'] = 'Slides';
$lang['en-en']['menu']['Background Images'] = 'Bg Images';
$lang['en-en']['menu']['Elements'] = 'Elements';
$lang['en-en']['menu']['Settings'] = 'Settings';
$lang['en-en']['menu']['Paste Code'] = 'Paste Code';

$lang['en-en']['Main Info']['Language'] = 'Language';

$lang['en-en']['Main Info']['Main Info'] = 'Main Info';
$lang['en-en']['Main Info']['Background Images'] = 'Background Images';
$lang['en-en']['Main Info']['Upload'] = 'Upload';
$lang['en-en']['Main Info']['Name'] = 'Name';
$lang['en-en']['Main Info']['Width'] = 'Width';
$lang['en-en']['Main Info']['Height'] = 'Height';
$lang['en-en']['Main Info']['Duration'] = 'Duration';
$lang['en-en']['Main Info']['Effect Duration'] = 'Effect Duration';
$lang['en-en']['Main Info']['Elements Effect Duration'] = 'Elements Effect Duration';
$lang['en-en']['Main Info']['Effect Direction'] = 'Effect Direction';
$lang['en-en']['Main Info']['Effect'] = 'Effect';
$lang['en-en']['Main Info']['apply effect'] = 'apply effect';
$lang['en-en']['Main Info']['Default'] = 'Default';
$lang['en-en']['Main Info']['Full Screen'] = 'Full Screen';
$lang['en-en']['Main Info']['Full Width'] = 'Full Width';
$lang['en-en']['Main Info']['Mask'] = 'Mask';
$lang['en-en']['Main Info']['Apply CSS'] = 'Apply CSS';
$lang['en-en']['Main Info']['Autoplay'] = 'Autoplay';
$lang['en-en']['Main Info']['Save main info'] = ' Save main info ';

$lang['en-en']['Slides']['Slides'] = 'Slides';
$lang['en-en']['Slides']['All Slides'] = 'All Slides';
$lang['en-en']['Slides']['Select All'] = 'Select All';
$lang['en-en']['Slides']['Select None'] = 'Select None';
$lang['en-en']['Slides']['Slide'] = 'Slide';
$lang['en-en']['Slides']['Name'] = 'Name';
$lang['en-en']['Slides']['Actions'] = 'Actions';
$lang['en-en']['Slides'][' Save Slide '] = ' Save Slide ';
$lang['en-en']['Slides'][' Delete Slide '] = ' Delete Slide ';
$lang['en-en']['Slides']['None'] = 'None';
$lang['en-en']['Slides']['Delete'] = 'Delete';
$lang['en-en']['Slides']['Execute'] = 'Execute';
$lang['en-en']['Slides']['Show All'] = 'Show All';
$lang['en-en']['Slides']['First'] = 'First';
$lang['en-en']['Slides']['Last'] = 'Last';
$lang['en-en']['Slides']['Prev'] = 'Prev';
$lang['en-en']['Slides']['Next'] = 'Next';
$lang['en-en']['Slides'][' Save All Slides '] = ' Save All Slides ';

$lang['en-en']['Background Images']['Background Images'] = 'Background Images';
$lang['en-en']['Background Images']['Background Images Alt Notice'] = 'Background image names will be used in alt attributtes on front side';
$lang['en-en']['Background Images']['Name'] = 'Name';
$lang['en-en']['Background Images']['URL'] = 'URL';
$lang['en-en']['Background Images']['Image File'] = 'Image File';
$lang['en-en']['Background Images']['Actions'] = 'Actions';
$lang['en-en']['Background Images'][' Save Image '] = ' Save Image ';
$lang['en-en']['Background Images'][' Delete Image '] = ' Delete Image ';
$lang['en-en']['Background Images']['Image'] = 'Image';
$lang['en-en']['Background Images'][' Save All BG Images '] = ' Save All BG Images ';
$lang['en-en']['Background Images']['BG Image for'] = 'BG Image for';
$lang['en-en']['Background Images']['for'] = 'for';

$lang['en-en']['Elements']['Elements'] = 'Elements';
$lang['en-en']['Elements']['Create New Element'] = 'Create New Element';
$lang['en-en']['Elements']['Images Alt Notice'] = 'Image texts will be used in alt attributtes on front side';

$lang['en-en']['Elements']['Bulk Apply To Elements'] = 'Bulk Apply To Elements';
$lang['en-en']['Elements']['Bulk Name'] = 'Name';
$lang['en-en']['Elements']['Bulk URL'] = 'URL';
$lang['en-en']['Elements']['Bulk Text'] = 'Text';
$lang['en-en']['Elements']['Bulk Type'] = 'Type';

$lang['en-en']['Elements']['Text Element'] = 'Text Element';
$lang['en-en']['Elements']['Image Element'] = 'Image Element';
$lang['en-en']['Elements']['Template Element'] = 'Template Element';

$lang['en-en']['Elements']['Bulk Image'] = 'Image';
$lang['en-en']['Elements']['Bulk Template'] = 'Template';
$lang['en-en']['Elements']['Bulk Width'] = 'Width';
$lang['en-en']['Elements']['Bulk Height'] = 'Height';
$lang['en-en']['Elements']['Bulk Classes'] = 'Classes';
$lang['en-en']['Elements']['Bulk Offset Left'] = 'Offset Left';
$lang['en-en']['Elements']['Bulk Offset Top'] = 'Offset Top';
$lang['en-en']['Elements']['Bulk Color'] = 'Color';
$lang['en-en']['Elements']['Bulk Background Color'] = 'Background Color';
$lang['en-en']['Elements']['Bulk Style'] = 'Style';
$lang['en-en']['Elements']['Bulk Size'] = 'Size';
$lang['en-en']['Elements']['Bulk Actions'] = 'Actions';
$lang['en-en']['Elements']['Bulk Apply For ALL Elements '] = ' Apply For ALL Elements ';
$lang['en-en']['Elements']['Bulk Apply For Checked Elements '] = ' Apply For Checked Elements ';
$lang['en-en']['Elements']['Bulk Close'] = 'Close';
$lang['en-en']['Elements']['Bulk left old value'] = '* - left old value (will not be replaced)';

$lang['en-en']['Elements']['Element'] = 'Element';
$lang['en-en']['Elements']['Name'] = 'Name';
$lang['en-en']['Elements']['URL'] = 'URL';
$lang['en-en']['Elements']['Text'] = 'Text';
$lang['en-en']['Elements']['Type'] = 'Type';
$lang['en-en']['Elements']['Image'] = 'Image';
$lang['en-en']['Elements']['Add Image'] = 'Add Image';
$lang['en-en']['Elements']['Template'] = 'Template';
$lang['en-en']['Elements']['Width'] = 'Width';
$lang['en-en']['Elements']['Height'] = 'Height';
$lang['en-en']['Elements']['Classes'] = 'Classes';
$lang['en-en']['Elements']['Offset Left'] = 'Offset Left';
$lang['en-en']['Elements']['Offset Top'] = 'Offset Top';
$lang['en-en']['Elements']['Color'] = 'Color';
$lang['en-en']['Elements']['Background Color'] = 'Background Color';
$lang['en-en']['Elements']['Style'] = 'Style';
$lang['en-en']['Elements']['Size'] = 'Size';
$lang['en-en']['Elements']['Slide'] = 'Slide';
$lang['en-en']['Elements']['Actions'] = 'Actions';
$lang['en-en']['Elements'][' Save Element '] = ' Save Element ';
$lang['en-en']['Elements'][' Delete Element '] = ' Delete Element ';

$lang['en-en']['Elements'][' Save All Elements '] = ' Save All Elements ';
$lang['en-en']['Elements']['None'] = 'None';
$lang['en-en']['Elements']['Delete'] = 'Delete';
$lang['en-en']['Elements']['Execute'] = 'Execute';

$lang['en-en']['Elements']['new element']['Create new element'] = 'Create new element';
$lang['en-en']['Elements']['new element']['Text'] = 'Text';
$lang['en-en']['Elements']['new element']['Slide'] = 'Slide';
$lang['en-en']['Elements']['new element']['Create'] = 'Create';
$lang['en-en']['Elements']['new element']['Close'] = 'Close';

$lang['en-en']['Settings']['Slider Settings'] = 'Slider Settings';
$lang['en-en']['Settings']['Buttons'] = 'Buttons';
$lang['en-en']['Settings']['Don\'t show buttons'] = 'Don\'t show buttons';
$lang['en-en']['Settings']['Buttons Offset Top'] = 'Buttons Offset Top';
$lang['en-en']['Settings']['Offset'] = 'Offset';
$lang['en-en']['Settings']['If 0 - "Default top offset"'] = 'If 0 - "Default top offset"';
$lang['en-en']['Settings']['Buttons Transparency'] = 'Buttons Transparency';
$lang['en-en']['Settings']['Transparency'] = 'Transparency';
$lang['en-en']['Settings']['Buttons Width'] = 'Buttons Width';
$lang['en-en']['Settings']['Width (buttons width = container width * this parameter / 1600)'] = 'Width (buttons width = container width * this parameter / 1600)';
$lang['en-en']['Settings']['Save'] = 'Save';
$lang['en-en']['Settings']['Slide Bullets'] = 'Slide Bullets';
$lang['en-en']['Settings']['Bullets'] = 'Bullets';
$lang['en-en']['Settings']['Don\'t show bullets'] = 'Don\'t show bullets';
$lang['en-en']['Settings']['Bullets parameters'] = 'Bullets parameters';
$lang['en-en']['Settings']['Top Offset'] = 'Top Offset';
$lang['en-en']['Settings']['If 0 - "Default bullets top offset"'] = 'If 0 - "Default bullets top offset"';
$lang['en-en']['Settings']['Width'] = 'Width';
$lang['en-en']['Settings']['If 0 - "Default width"'] = 'If 0 - "Default width"';
$lang['en-en']['Settings']['Front number of bullets by one side'] = 'Front number of bullets by one side';

$lang['en-en']['Paste Code']['Paste Code'] = 'Paste Code';
$lang['en-en']['Paste Code']['Paste into post, page ...'] = 'Paste into post, page ...';
$lang['en-en']['Paste Code']['Paste into template'] = 'Paste into template';

$lang['en-en']['alert message']['wrong project name'] = 'Need project name!';
$lang['en-en']['alert message']['save width and height'] = 'Save "Main Info" now to apply width and height settings';
$lang['en-en']['alert message']['updated successfully'] = 'Updated Successfully';
$lang['en-en']['alert message']['wrong item text'] = 'Wrong element\'s text';

break;
default : 
  $lang['en-en']['language'] = 'English';
break;
 }
 return $lang;
}

?>