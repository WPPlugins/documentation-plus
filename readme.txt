=== Documentation Plus ===
	Contributors: pickplugins
	Donate link: http://pickplugins.com
	Tags: Documentation Plus, Documentation, Document , Doc,
	Requires at least: 3.8
	Tested up to: 4.7.2
	Stable tag: 1.0.5
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html

	Quick & easy Documentation creator

== Description ==

Documentation Plus is easy to create documentation for your software, bootstrap and font awesome support to create awesome documentation. By this plugin you can create unlimited documentation and display via short-code support pagination, thumbnails, awesome icon for title & list items.




###  Documentation Plus by http://pickplugins.com

* [Live Demo!&raquo;](http://pickplugins.com/docs/)



<strong>Plugin Features</strong><br />

* Fully responsive and mobile ready.
* Unlimited Documentation anywhere.
* Use via short-code.
* Easy input field for Documentation content.
* Archive for Documentation via short-code.
* Bootstrap & font awesome icon.
* Sorting for documentation section.
* WP Editor for section.





== Installation ==

1. Install as regular WordPress plugin.<br />
2. Go your plugin setting via WordPress Dashboard and find "<strong>Documentation Plus</strong>" activate it.<br />

After activate plugin you will see "Documentation" menu at left side on WordPress dashboard click "New Documentation " and use the options field "Documentation Options"<br />

<br />




<strong>Display documentation archive </strong><br />
you can display all documentation via archive with pagination support. use following short-code to display arcive

`[documentation_plus_archive]`

this short-code also has some parameter

* title_icon , use for font awesome icon or html, ex: `<i class="fa fa-file-text-o"></i> `
* list_icon , use for font awesome icon or html, ex: `<i class="fa fa-file-text-o"></i> `
* section_display , yes or no
* posts_per_page , integer value, default 5.


## single documentation page full width issue fixing

Please add following code to fix full width issue on single documentation page, you will need to repalce the class `site-content` bellow code.

add_action('documentation_plus_action_before_single_documentation', 'documentation_plus_action_before_single_documentation', 10);
add_action('documentation_plus_action_after_single_documentation', 'documentation_plus_action_after_single_documentation', 10);

function documentation_plus_action_before_single_documentation() {
  echo '<div id="main" class="site-content">';
}

function documentation_plus_action_after_single_documentation() {
  echo '</div>';
}
	








== Screenshots ==

1. screenshot-1
2. screenshot-2
3. screenshot-3
4. screenshot-4



== Changelog ==

	= 1.0.5 =
    * 02/02/2017 add - single page fixing.

	= 1.0.3 =
    * 29/09/2016 add - documentation version.
    * 29/09/2016 add - is documentation deprecated.	
    * 29/09/2016 add - link to new documentaion if deprecated.
    * 29/09/2016 add - product link.	

	= 1.0.2 =
    * 13/07/2016 single documentation breadcrumb.

	= 1.0.1 =
    * 09/07/2016 single template for documentation.
    * 09/07/2016 removed shortcode documentation_plus.    
    
	= 1.0 =
    * 28/05/2015 Initial release.
