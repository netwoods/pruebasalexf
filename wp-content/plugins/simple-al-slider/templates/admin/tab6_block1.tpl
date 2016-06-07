<h2><?php echo $lang[$current_language]['Paste Code']['Paste Code']; ?></h2>
<br>
<h4><?php echo $lang[$current_language]['Paste Code']['Paste into post, page ...']; ?></h4>
<pre>[simple_al_slider id=<?php if (isset($_GET['pid'])&&(!empty($_GET['pid'])))echo $_GET['pid']; else echo $proj_id; ?>]</pre>
<br>
<h4><?php echo $lang[$current_language]['Paste Code']['Paste into template']; ?></h4>
<pre>&#60;&#63;php echo do_shortcode("[simple_al_slider id=<?php if (isset($_GET['pid'])&&(!empty($_GET['pid'])))echo $_GET['pid']; else echo $proj_id; ?>]"); &#63;&#62;</pre>