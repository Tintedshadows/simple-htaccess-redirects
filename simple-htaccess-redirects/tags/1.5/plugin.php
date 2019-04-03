<?php
/**
* Plugin Name: Simple Htaccess Redirects
* Description: Updates your htaccess file with the correct redirect/header code
* Version: 1.5
* Author: PackerlandWebsites
* Author URI: https://www.packerlandwebsites.com
 *
 */


 /*  Copyright 2018-2019  Mike (email : mike@packerlandwebsites.com)

     This program is free software; you can redistribute it and/or modify
     it under the terms of the GNU General Public License as published by
     the Free Software Foundation; either version 2 of the License, or
     (at your option) any later version.

     This program is distributed in the hope that it will be useful,
     but WITHOUT ANY WARRANTY; without even the implied warranty of
     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     GNU General Public License for more details.

		 You should have received a copy of the GNU General Public License
		 along with this program; if not, write to the Free Software
		 Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/*
 * Plugin constants
 */
if(!defined('PK_REDIRECT_URL'))
 define('PK_REDIRECT_URL', plugin_dir_url( __FILE__ ));
if(!defined('PK_REDIRECT_PATH'))
 define('PK_REDIRECT_PATH', plugin_dir_path( __FILE__ ));

/*
 * Main class
 */
/**
 * Class Redirect
 *
 * This class creates the option page and add the web app script
 */
class PKRedirect
{

		/**
		 * Redirect constructor.
		 *
		 * The main plugin actions registered for WordPress
		 */
		public function __construct()
		{
			$plugin = plugin_basename( __FILE__ );

			add_filter( "plugin_action_links_" . $plugin , array( $this,'pk_plugin_add_settings_link') );
			add_action('admin_menu', array( $this, 'PK_plugin_menu'));
			add_action( 'admin_init', array( $this, 'PK_plugin_settings' ));
			add_action( 'wp_head', array( $this, 'PK_headscript' ));
			add_action( 'wp_ajax_PK_reset', array($this, 'PK_reset'));

			//add_action( 'register_deactivation_hook', array($this, 'PK_reset'));
			//add_filter('admin_footer_text', array($this,'remove_footer_admin'));

			register_activation_hook( __FILE__, array( $this , 'PK_activate' ) );
			register_deactivation_hook( __FILE__, array( $this , 'PK_deactivate' ) );
			add_action( 'admin_footer', array($this,'wpse65611_script') );
		}

		function DebugLog( $data ) {
			$output = $data;
			if ( is_array( $output ) )
					$output = implode( ',', $output);

			echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
		}


		static function PK_activate(){

			if(get_option('_PK_created_default') !== 'true' ){

				$accessfileurl = get_home_path(). ".htaccess";
				$defaultHTfileurl = get_home_path() . 'wp-content/plugins/simple-htaccess-redirects/assets/default.txt';

				$accessfileread = fopen($accessfileurl, 'r') or die('Unable to open the file. Sorry');

				$defaultaccessfilewrite = fopen($defaultHTfileurl, 'w+') or die('Unable to open the file. Sorry');

				$data = fread($accessfileread, filesize($accessfileurl));
				fwrite($defaultaccessfilewrite, $data);

				fclose($defaultaccessfilewrite);
				fclose($accessfileread);

				update_option('_PK_created_default', 'true');

			}

		}

		static function wpse65611_script() {
    wp_enqueue_style( 'wp-pointer' );
    wp_enqueue_script( 'wp-pointer' );
    wp_enqueue_script( 'utils' ); // for user settings
		?>
		    <script type="text/javascript">

		    jQuery('a[aria-label="Deactivate Simple Htaccess Redirects"]').click(function(){

					if(confirm("Do you want to reset your htaccess file from before you activated this plugin?") == true){

						var data = {
						'action': 'PK_reset',
					};

					// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
					jQuery.post(ajaxurl, data, function(response) {
						alert("Your File Has been reset.");
						window.location.reload();
					});
				}


			 });

		    </script>
		<?php
		}


		static function PK_deactivate(){


		 update_option('_PK_400_setting', '');

 		 update_option('_PK_500_setting', '');

		 update_option('_PK_301_old_setting', '');
		 update_option('_PK_301_new_setting', '');

		 update_option('_PK_302_old_setting', '');
		 update_option('_PK_302_new_setting', '');

		 update_option('Write404', '');


		}




		function pk_plugin_add_settings_link( $links ) {
	    $settings_link = '<a href="options-general.php?page=PK-redirect-settings">' . __( 'Settings' ) . '</a>';
	    array_push( $links, $settings_link );
	  	return $links;
		}



		function remove_footer_admin ()
		{
		    echo '';
		}



		function PK_reset(){

			  $accessfileurl = get_home_path(). ".htaccess";
			  $defaultHTfileurl = get_home_path() . 'wp-content/plugins/simple-htaccess-redirects/assets/default.txt';

			  $accessfilewrite = fopen($accessfileurl, 'w+') or die('Unable to open the file. Sorry');

			  $defaultaccessfileread = fopen($defaultHTfileurl, 'r') or die('Unable to open the file. Sorry');

			  $data = fread($defaultaccessfileread, filesize($defaultHTfileurl));

				$data =  $data . PHP_EOL;

			  fwrite($accessfilewrite, $data);

			  fclose($defaultaccessfileread);
			  fclose($accessfilewrite);

		}





	 function PK_plugin_menu() {

		 // add_menu_page(
			//  'Redirect Settings',
			//  'Redirect Settings',
			//  'administrator',
			//  'PK-redirect-settings',
			//  array($this, 'PK_redirect_settings_page'),
			//  'dashicons-image-rotate'
		 // );

		 add_submenu_page( 'options-general.php', 'Redirect Settings', 'Redirect Settings', 'administrator', 'PK-redirect-settings',  array($this, 'PK_redirect_settings_page') );


		}

		function PK_headscript(){
			if(is_404() && get_option('_PK_404_setting') && get_option('Write404') == '1'){

				?>
					<script>
					window.location.href = "<?php if(get_option('_PK_404_setting')){	echo esc_attr( get_option('_PK_404_setting') ); }?>";
					</script>
				<?php
			}


		}




	public function PK_getStatus($url){
		$response = wp_remote_get( $url );
		$http_code = wp_remote_retrieve_response_code( $response );
		return $http_code;
	}


	public function PK_addToLog($data){
	 $logfileurl = get_home_path() . 'wp-content/plugins/simple-htaccess-redirects/assets/log.txt';
	 $logfilewrite = fopen($logfileurl, 'a') or die('Unable to open the file. Sorry');

	 $currentuser = wp_get_current_user();

	 $data = PHP_EOL . "=== User: ". $currentuser->user_login . " Date: " . date_i18n("m-d-Y h:i") . " ===" . PHP_EOL . $data;
	 //PK_debug_to_console("Added data to log file");

	 fwrite($logfilewrite, $data);
	 fclose($logfilewrite);
	}

	function PK_redirect_settings_page() {


		?>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

		<style media="screen">
		#wpbody-content{
			position: relative;
			width: 50%;
		}

		.nav-tabs{
			margin-top: 20px;
			margin-bottom: 20px;
		}

		.tab{
			padding: 10px;
			margin: 5px;
		}

		</style>

		<?php date_default_timezone_set('America/Chicago'); ?>

		<ul class="nav nav-tabs">
			 <li class="active">
				 <a class="tab" data-toggle="tab" href="#redirectTab">Redirects</a>
			 </li>

			 <li>
				 <a class="tab" data-toggle="tab" href="#expiredTab">Expired Headers</a>
			 </li>

		 </ul>


		 <div class="tab-content">
	 <div id="redirectTab" class="tab-pane fade in active">
		 <div class="row">
			 <div class="col-lg-12">
			<?php
			include( plugin_dir_path(__FILE__) . "parts/content-redirect.php" );

			if(file_exists(get_home_path(). ".htaccess")){

			 $content = "";


			$accessfileurl = get_home_path(). ".htaccess";


			if(get_option('Write301') == '1' && get_option('_PK_301_old_setting') != "" && get_option('_PK_301_new_setting') != ""){

			 $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');
			 $content301 = PHP_EOL . "Redirect 301 ". esc_attr( esc_url_raw(get_option('_PK_301_old_setting'))). " ". esc_attr( esc_url_raw(get_option('_PK_301_new_setting'))) . PHP_EOL;
			 $content = $content . $content301;
			 fwrite($accessfilewrite, $content301);
			 update_option( 'Write301', "0" );
			 fclose($accessfilewrite);


			 ?>
			 <script type="text/javascript">
					document.getElementById("myCheck").checked = false;
			 </script>
			 <?php
			}else{
			 ?>
			 <script type="text/javascript">
					document.getElementById("myCheck").checked = false;
			 </script>
			 <?php
			}

			if(get_option('ForceHttps') == '1'){

			$accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');
			$contentHttps = PHP_EOL . "RewriteEngine On". PHP_EOL . "RewriteCond %{HTTPS} !=on" . PHP_EOL . "RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]". PHP_EOL;
			$content = $content . $contentHttps;
			fwrite($accessfilewrite, $contentHttps);
			update_option( 'ForceHttps', "0" );
			fclose($accessfilewrite);


			?>
			<script type="text/javascript">
				 document.getElementById("myCheck5").checked = false;
			</script>
			<?php
			}

			if(get_option('Write500') == '1' && get_option('_PK_500_setting') != ""){

			$accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');
			$content500 = PHP_EOL . "ErrorDocument 500 ". esc_attr( esc_url_raw(get_option('_PK_500_setting'))) . PHP_EOL;
			$content = $content . $content500;
			fwrite($accessfilewrite, $content500);
			update_option( 'Write500', "0" );
			fclose($accessfilewrite);

			?>
			<script type="text/javascript">
				 document.getElementById("myCheck3").checked = false;
			</script>
			<?php
			}else{
			?>
			<script type="text/javascript">
				 document.getElementById("myCheck3").checked = false;
			</script>
			<?php
			}

			if(get_option('Write302') == '1' && get_option('_PK_302_old_setting') != "" && get_option('_PK_302_new_setting') != ""){

			$accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');
			$content302 = PHP_EOL . "Redirect 302 ". esc_attr( esc_url_raw(get_option('_PK_302_old_setting'))). " ". esc_attr( esc_url_raw(get_option('_PK_302_new_setting'))) . PHP_EOL;
			$content = $content . $content302;
			fwrite($accessfilewrite, $content302);
			update_option( 'Write302', "0" );
			fclose($accessfilewrite);


			?>
			<script type="text/javascript">
				 document.getElementById("myCheck2").checked = false;
			</script>
			<?php

			}else{
			?>
			<script type="text/javascript">
				 document.getElementById("myCheck2").checked = false;
			</script>
			<?php
			}

			?>


			</div>


				</div>
	 </div>

	 <div id="expiredTab" class="tab-pane fade">
		 <?php include( plugin_dir_path(__FILE__) . "parts/content-expired-headers.php" ); ?>
	 </div>


	  <h3><?php esc_html_e('Make sure you know what you are doing before saving changes to the .htaccess file!!', 'PK-redirect') ?></h3>

	 <p><?php esc_html_e('You will need to make sure to check "Add this Redirect rule" before saving changes or the rule will not be added.', 'PK-redirect') ?></p>

	 <div class="col-lg-12">


		<div id="fileinfo" style="display:none;">
			<h4><?php esc_html_e('This is just showing you what is inside of .htaccess and can\'t be edited here.', 'PK-redirect') ?></h42>

			<!-- <h3>You can always copy and paste the file contents into <a target="_blank" href="http://www.htaccesscheck.com/">this</a> valudator to make sure you have everything correct.</h3> -->

		 <form target="_blank" style="width:600px;" action="http://www.htaccesscheck.com/check.cgi" method="post" enctype="multipart/form-data">
		 <br>
		 <textarea rows="15" cols="50" name="htaccess" style="font-size:15px;"><?php

			 $accessfileread = fopen($accessfileurl, 'r') or die('Unable to open the file. Sorry');
			 echo fread($accessfileread, filesize($accessfileurl));
			 fclose($accessfileread);
			 ?>
		 </textarea>
		 <br>
		 <input type="submit" name="Submit" value="Validate File">
		 </form>

		 </div>
		</div>

	 <button type="button" id="show" ><?php esc_html_e('Show .htaccess file', 'PK-redirect') ?></button>


		<form id="PK_resetForm" action="">
			 <input type="submit" class="PK_reset" name="insert" value="Reset .htaccess file" />
		</form>

		<script>
		jQuery(document).ready(function(){

			document.getElementById("PK_resetForm").addEventListener("click", function(event){
			 event.preventDefault()
		 });

		 jQuery('.PK_reset').click(function(){

			 if(confirm("Are you sure you want to reset your htaccess file? It will be reset to the point before this plugin was activated.") == true){

				 var data = {
				 'action': 'PK_reset',
			 };

			 // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			 jQuery.post(ajaxurl, data, function(response) {
				 alert("Your File Has been reset.");
				 window.location.reload();
			 });

		 }else{

		 }

		});

		jQuery("#show").click(function(){
			 jQuery("#fileinfo").toggle();
		 });



		 });

		</script>

	 </div>



	 <?php
	if($content != ''){
	 	$this->PK_addToLog($content);
	}else{
	}

 	}

	}

	 public function PK_plugin_settings() {

		 // redirect settings
		 register_setting( 'PK-redirect-settings-group', '_PK_404_setting' );
		 register_setting( 'PK-redirect-settings-group', '_PK_500_setting' );

		 register_setting( 'PK-redirect-settings-group', '_PK_301_old_setting' );
		 register_setting( 'PK-redirect-settings-group', '_PK_301_new_setting' );

		 register_setting( 'PK-redirect-settings-group', '_PK_302_old_setting' );
		 register_setting( 'PK-redirect-settings-group', '_PK_302_new_setting' );

		 register_setting( 'PK-redirect-settings-group', 'ForceHttps' );

		 register_setting( 'PK-redirect-settings-group', 'Write301' );
		 register_setting( 'PK-redirect-settings-group', 'Write302' );
		 register_setting( 'PK-redirect-settings-group', 'Write404' );
		 register_setting( 'PK-redirect-settings-group', 'Write500' );

		 register_setting( 'PK-redirect-settings-group', '_PK_created_default' );

		 // expire headers settings
		 register_setting( 'PK-redirect-settings-group', '_PK_png_value' );
		 register_setting( 'PK-redirect-settings-group', '_PK_png_options' );
		 register_setting( 'PK-redirect-settings-group', 'WritePNG' );

		 register_setting( 'PK-redirect-settings-group', '_PK_jpg_value' );
		 register_setting( 'PK-redirect-settings-group', '_PK_jpg_options' );
		 register_setting( 'PK-redirect-settings-group', 'WriteJPG' );

		 register_setting( 'PK-redirect-settings-group', '_PK_css_value' );
		 register_setting( 'PK-redirect-settings-group', '_PK_css_options' );
		 register_setting( 'PK-redirect-settings-group', 'WriteCSS' );

		 register_setting( 'PK-redirect-settings-group', '_PK_js_value' );
		 register_setting( 'PK-redirect-settings-group', '_PK_js_options' );
		 register_setting( 'PK-redirect-settings-group', 'WriteJS' );

	 }




}


/*
 * Starts our plugin class, yay!
 */
new PKRedirect();
