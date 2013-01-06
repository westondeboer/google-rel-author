<?php
/*
Plugin Name: Google rel author Plugin
Plugin URI: http://www.passiveincomefordads.com/
Description: Ability to add google's rel author link to header for multiple authors.
Version: 1.0
Author: Weston Deboer
Author URI: http://westondeboer.com
License: GPLv3
*/


function wd_add_google_profile( $contactmethods ) {

// Adds Google+ Form field into the edit Author Profile Screen
$contactmethods['google_profile'] = 'Google Profile URL';
	
return $contactmethods;

}

add_filter( 'user_contactmethods', 'wd_add_google_profile', 10, 1);



function add_google_rel_author() {
// prevent this from working on the homepage
if (!is_home())

// Gets Google+ Metadata for the author

$author_gplus = get_the_author_meta('google_profile');
// If Author has entered in there Google+ User Number, Echo it into the header

if ($author_gplus)

echo '<link rel="author" href="https://plus.google.com/' .$author_gplus. '/posts"/>';

}

add_action('wp_head', 'add_google_rel_author');