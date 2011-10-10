<?php
/*
Plugin Name: Login-Logut Bubble
* Author: Mahibul Hasan Sohag 
* Description: This creates a nice bubble for login and logout .
* Author URI: http://sohag07hasan.elance.com
* Plugin URI: http://www.healerswiki.org
*/

//creating object
$healerswiki_cubepoints = new healerswiki_cubepoints_login();
class healerswiki_cubepoints_login{
	
	//constructor and every hooks calling
	function __construct(){
		add_action('custom_header_hook',array($this,'headersbutton'),5);
		add_action('wp_print_styles',array($this,'css_adition'),3);
		add_action('wp_print_scripts',array($this,'javascript_adition'));
	}
	
	//login and logout button setting with cube points shown, if logged in
	function headersbutton(){
		$image1 = plugins_url('./',__FILE__).'images/login_on.gif';
		$image2 = plugins_url('./',__FILE__).'images/login_off.gif';
		$arrow_down = plugins_url('./',__FILE__).'images/arrow-down.png';
		$arrow_up = plugins_url('./',__FILE__).'images/arrow-up.png';
		
		include dirname(__FILE__).'/includes/headers-extending.php';
		
				
	}
	
	//css for previous function
	function css_adition(){
		wp_register_style('wiki-headers-extending',plugins_url('/',__FILE__).'css/headers-extending.css');
		wp_enqueue_style('wiki-headers-extending');		
		
	}
	
	//javascript addition
	function javascript_adition(){
		wp_enqueue_script('jquery');
		wp_enqueue_script('wiki-log-script',plugins_url('/',__FILE__).'js/logbutton.js',array('jquery'));
		/*
		wp_enqueue_script('us_doctors-admin',plugins_url('/',__FILE__).'js/admindoc.js',array('jquery'));
		$nonce = wp_create_nonce('wp-psychologists');
		wp_localize_script( 'us_doctors','PsyAjax', array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce' => $nonce	
			
		));	*/				
	}
}


?>
