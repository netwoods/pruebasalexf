<h2>FAQ</h2>
<div class="accordion">
<h3>How can i add button (or image) to the slider?</h3>
<div>
<ul style='list-style-type: disc;'>
	<li>First of all you need to upload images for buttons into wordpress.</li>
	<li>In "Slider" tab, in field "Apply Classes" describe selectors(example: classes) with background url properties of your buttons.
CSS Example ( .more_btn{ background:url("http://example.com/wordpress/wp-content/uploads/2014/12/more.png") no-repeat; } ).</li>
	<li>Add in "Elements" tab new element's block for your button with text or if you want without it (use "&amp;nbsp;").</li>
	<li>In current text block section in field "Classes" apply described earlier classes.</li>
	<li>Attach this element block to a slide.</li>
</ul>
Same way you can add images to the slider.

</div>
<h3>How can i set background of text item transparent?</h3>
<div>

In field style of text item add : Example - background-color:rgba(55,55,55,0.1);
For full transparent : background-color:transparent;

</div>
<h3>What modes are available?</h3>
<div>
There are fullscreen, full width and default modes available.
</div>

<h3>In admin area i can see only part of slides,images and texts. What am i doing wrong?</h3>
<div>
Probably in slides tab you choose to show only range of slides (links at the bottom). Texts, templates and images depends on slides you choose. Number slides per page you can setup in cfg.php file.
</div>

<h3> Where can i setup my slider?</h3>
<div>
You can setup it in admin area and in cfg/cfg.php file (additional settings).
</div>

<h3>I install this plugin but it is displayed incorrect?</h3>
<div>
Some themes (very small amount from tested) reapply css rules (for all images for example) or doing some js manipulations (with images for example). In this cases slider can be displayed incorrect.
</div>

<h3>Can i add video from youtube?</h3>
<div>
Yes. But there is an important thing. If you add video choose first 3 effects only (opacity, width, height).
You can add html code of video into template file and attach to slide as template element. Don't forget to setup width and height of element in plugin admin panel.
</div>

<h3>How can i made buttons?</h3>
<div>
You can made it through creating text element with apropriate classes or in template element. If you make button in template a div must has class "simple_al_subitem_txt" and unique id.
</div>

<h3>What browsers your plugin support?</h3>
<div>
<ul style='list-style-type: disc;'>
	<li>IE >= 8 - support.</li>
	<li>Google Chrome support.</li>
	<li>Opera support.</li>
	<li>Safari support.</li>
	<li>Mozilla Firefox support.</li>
</ul>
</div>
<h3>What wordpress versions your plugin support?</h3>
<div>
<ul style='list-style-type: disc;'>
	<li>Wordpress >= 3.6</li>
	<li>Wordpress <= 4.1.1</li>
</ul>
</div>
<h3>Is it free?</h3>
<div>

Yes. You can download it from wordpress.org.

</div>

</div>
