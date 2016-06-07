=== Simple Breadcrumb ===
Contributors: sudharmika
Donate link: http://soumabali.com/
Tags: Breadcrumb, post, pages, archives, wordpress, plugin
Requires at least: 3.0.1
Tested up to: 4.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simple Breadcrumb is just another simple wordpress plugin which show breadcrumb

== Description ==

Simple Breadcrumb is an easy simple plugin to let you show breadcrumbs at your page, post, and archive. 
Breadcrumb is a feature which show a link of the position of the content which using parental structure.
Simple Breadcrumb is so easy to use, just install it at plugin directory and call the function at your tempalate wherever you want them to show 

= Features =
* Very easy to install
* CSS Style Customizable
* Support default Post, Page, Parental Pages, Categories, Archive
* Easy to use with php function and shortcode

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/simple-breadcrumb` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

= How to display breadcrumb ? =

Using PHP Function, use this php function to call the breadcrumb  

`sb_view_breadcrumb()`

Using Shortcode, copy and paste this shortcode to view the breadcrumb  

`[sb-view-breadcrumb]`


== Frequently Asked Questions ==

= 1. How to display breadcrumb ? =

Use this php function to call the breadcrumb  

`sb_view_breadcrumb()`

Use this shortcode to call the breadcrumb  

`[sb-view-breadcrumb]`

= 2. Showing error Call to undefined function sb_view_breadcrumb() =

Use this few script before call the function to check if the function exist

`
if (function_exists('sb_view_breadcrumb')) {
      sb_view_breadcrumb();    
    }
`


= 3. Are the style can be customize =

Of course, You can make custom Css of this plugin, simple-breadcrumb using class "sb_breadcrumb" for this plugin.
As for the structure of of this simple-breadcrumb plugin are :

`
  <ul class="sb_breadcrumb">
    <li>
      <a href="#">Parent</a>
    </li>
     ........
    <li>
      <a href="#">Child</a>
    </li>
  </ul>
`




== Screenshots ==

1. This screeenhot show an example of working breadcrumb

== Changelog ==

= 0.1 =
* First Release Version
= 0.2 =
* Rewrite readme.txt
* Adding shortcode to use the breadcrumb

== Upgrade Notice ==

= 0.1 =
* First Release Version
= 0.2 =
* Rewrite readme.txt, 
* Adding shortcode to use the breadcrumb
