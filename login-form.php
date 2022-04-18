<?php
/*
Plugin Name: WordPress Login Form
Plugin URI: https://github.com/sazzadmahmud85
Description: Friendly Description
Version: 1.0
Author: Sazzad Mahmud
Author URI: https://github.com/sazzadmahmud85
License: GPLv2 or later
Text Domain: login-form
*/

function lfp_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo plugin_dir_url(__FILE__).'assets/images/wplogo.png'; ?>);
		height:100px;
		width:100px;
		background-size: 100px;
		background-repeat: no-repeat;
        padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'lfp_login_logo' );

add_action('login_head', function(){
    add_filter('gettext', function($translated_text, $text_to_translate, $text_domain){
        if('Username or Email Address' == $text_to_translate){
            $translated_text = __('Your Login Key', 'login-form');
        }elseif('Password' == $text_to_translate){
            $translated_text = __('Pass key', 'login-form');
        }

        return $translated_text;

    }, 10, 3);
});

function lfp_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'lfp_login_logo_url' );

function lfp_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertext', 'lfp_login_logo_url_title' );

function lfp_login_stylesheet() {
    wp_enqueue_style( 'custom-login', plugin_dir_url(__FILE__) . 'assets/css/style-login.css' );
    wp_enqueue_script( 'custom-login', plugin_dir_url(__FILE__) . 'assets/js/style-login.js', ['jquery'], true );
}
add_action( 'login_enqueue_scripts', 'lfp_login_stylesheet' );













