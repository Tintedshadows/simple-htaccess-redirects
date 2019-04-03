<?php
/**
* Plugin Name: Simple Htaccess Redirects
* Description: Creates 301, 302, 404, 500 redirect rules
* Version: 1.2
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
			  fwrite($accessfilewrite, $data);

			  fclose($defaultaccessfileread);
			  fclose($accessfilewrite);

		}




	 function PK_plugin_menu() {
		 add_menu_page(
			 'Redirect Settings',
			 'Redirect Settings',
			 'administrator',
			 'PK-redirect-settings',
			 array($this, 'PK_redirect_settings_page'),
			 'dashicons-image-rotate'
		 );
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


	function PK_debug_to_console( $data ) {
 	    $output = $data;
 	    if ( is_array( $output ) )
 	        $output = implode( ',', $output);

 	    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
 	}

	public function PK_getStatus($url){
		$response = wp_remote_get( $url );
		$http_code = wp_remote_retrieve_response_code( $response );
		return $http_code;
	}

	function PK_redirect_settings_page() {


		?>

		<style media="screen">
		#wpbody-content{
			position: relative;
			width: 50%;
		}
		#fileinfo{
			display:block;
			float:right;
			position: relative;
			padding-top: 60px;
			width: 50%;
		}
</style>
			<?php date_default_timezone_set('America/Chicago'); ?>
		<div class="wrap">
		<h2><?php esc_html_e('Redirect Details', 'PK-redirect') //All text should be wrapped in a esc_html_e() function for translations options?></h2>

		<form id="redirectForm" method="post" action="options.php">
				<?php settings_fields( 'PK-redirect-settings-group' ); ?>
				<?php do_settings_sections( 'PK-redirect-settings-group' ); ?>

				<table class="form-table">

					<!-- 301 -->
					<tr valign="top">
					<th scope="row"><?php esc_html_e('301 Redirect', 'PK-redirect') ?><br>
						<?php esc_html_e('Add this Redirect rule? ', 'PK-redirect') ?> <input name="Write301" type="checkbox" id="myCheck" value="1" <?php checked( '1', get_option( 'Write301' ) ); ?> />
					</th>
					<td><?php esc_html_e('Old url: ', 'PK-redirect') ?><input type="text" name="_PK_301_old_setting" value="<?php echo esc_attr( get_option('_PK_301_old_setting') ); ?>" />
					<?php
					if(get_option('_PK_301_old_setting')){
						echo 'HTTP Status: ';
						echo $this->PK_getStatus(get_option('_PK_301_old_setting'));
					}?><br>
					<?php esc_html_e('New url: ', 'PK-redirect') ?><input type="text" name="_PK_301_new_setting" value="<?php echo esc_attr( get_option('_PK_301_new_setting') ); ?>" />
					<?php
					if(get_option('_PK_301_new_setting')){
						echo 'HTTP Status: ';
						echo $this->PK_getStatus(get_option('_PK_301_new_setting'));
					}?></td>
					</tr>

					<!-- 302 -->
					<tr valign="top">
					<th scope="row"><?php esc_html_e('302 Redirect', 'PK-redirect') ?><br>
						<?php esc_html_e('Add this Redirect rule? ', 'PK-redirect') ?> <input name="Write302" type="checkbox" id="myCheck2" value="1" <?php checked( '1', get_option( 'Write302' ) ); ?> />
					</th>
					<td><?php esc_html_e('Old url: ', 'PK-redirect') ?><input type="text" name="_PK_302_old_setting" value="<?php echo esc_attr( get_option('_PK_302_old_setting') ); ?>" />
					<?php
					if(get_option('_PK_302_old_setting')){
						echo 'HTTP Status: ';
						echo $this->PK_getStatus(get_option('_PK_302_old_setting'));
					}?><br>
					<?php esc_html_e('New url: ', 'PK-redirect') ?><input type="text" name="_PK_302_new_setting" value="<?php echo esc_attr( get_option('_PK_302_new_setting') ); ?>" />
					<?php
					if(get_option('_PK_302_new_setting')){
						echo 'HTTP Status: ';
						echo $this->PK_getStatus(get_option('_PK_302_new_setting'));
					}?></td>
					</tr>

						<!-- 400 -->
						<tr valign="top">
						<th scope="row"><?php esc_html_e('404 Redirect', 'PK-redirect') ?><br>
							<?php esc_html_e('Enable 404 Redirect? ', 'PK-redirect') ?><input name="Write404" type="checkbox" id="myCheck4" value="1" <?php checked( '1', get_option( 'Write404' ) ); ?> /></th>
						<td><input type="text" name="_PK_404_setting" value="<?php echo esc_attr( get_option('_PK_404_setting') ); ?>" />
						<?php
						if(get_option('_PK_404_setting')){
							echo 'HTTP Status: ';
							echo $this->PK_getStatus(get_option('_PK_404_setting'));
						}?></td>
						</tr>

						<!-- 500 -->
						<tr valign="top">
						<th scope="row"><?php esc_html_e('500 Redirect', 'PK-redirect') ?><br>
							 <?php esc_html_e('Add this Redirect rule? ', 'PK-redirect') ?><input name="Write500" type="checkbox" id="myCheck3" value="1" <?php checked( '1', get_option( 'Write500' ) ); ?> />
						</th>
						<td><?php esc_html_e('Url: ', 'PK-redirect') ?><input type="text" name="_PK_500_setting" value="<?php echo esc_attr( get_option('_PK_500_setting') ); ?>" />
						<?php
						if(get_option('_PK_500_setting')){
							echo 'HTTP Status: ';
							echo $this->PK_getStatus(get_option('_PK_500_setting'));
						}?><br>
						</td>
						</tr>

						<tr>

						<?php esc_html_e('Would you like to force https? ', 'PK-redirect') ?><input name="ForceHttps" type="checkbox" id="myCheck5" value="1" <?php checked( '1', get_option( 'ForceHttps' ) ); ?> /></th>
						</tr>


						<?php date_default_timezone_set('America/Chicago'); ?>

				</table>

				<h3><?php esc_html_e('Make sure you know what you are doing before saving changes to the .htaccess file!!', 'PK-redirect') ?></h3>

				<?php submit_button(); ?>



		</form>

		</div>

	 <?php



	 function PK_debug_to_console( $data ) {
			 $output = $data;
			 if ( is_array( $output ) )
					 $output = implode( ',', $output);

			 echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
	 }



	 function PK_addToLog($data){
		$logfileurl = get_home_path() . 'wp-content/plugins/simple-htaccess-redirects/assets/log.txt';
		$logfilewrite = fopen($logfileurl, 'a') or die('Unable to open the file. Sorry');

		$currentuser = wp_get_current_user();

		$data = PHP_EOL . "=== User: ". $currentuser->user_login . " Date: " . date_i18n("m-d-Y h:i") . " ===" . PHP_EOL . $data;
		//PK_debug_to_console("Added data to log file");

 	 	fwrite($logfilewrite, $data);
 		fclose($logfilewrite);
	 }


	 if(file_exists(get_home_path(). ".htaccess")){

		$content;


	 $accessfileurl = get_home_path(). ".htaccess";


	 if(get_option('Write301') == '1' && get_option('_PK_301_old_setting') != "" && get_option('_PK_301_new_setting') != ""){

		$accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');
		$content301 = "Redirect 301 ". esc_attr( esc_url_raw(get_option('_PK_301_old_setting'))). " ". esc_attr( esc_url_raw(get_option('_PK_301_new_setting'))) . PHP_EOL;
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
	 $contentHttps = "RewriteEngine On". PHP_EOL . "RewriteCond %{HTTPS} !=on" . PHP_EOL . "RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]". PHP_EOL;
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
	 $content500 = "ErrorDocument 500 ". esc_attr( esc_url_raw(get_option('_PK_500_setting'))) . PHP_EOL;
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
	 $content302 = "Redirect 302 ". esc_attr( esc_url_raw(get_option('_PK_302_old_setting'))). " ". esc_attr( esc_url_raw(get_option('_PK_302_new_setting'))) . PHP_EOL;
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

	 <button type="button" id="show" ><?php esc_html_e('Show .htaccess file', 'PK-redirect') ?></button>


	 <form id="PK_resetForm" action="">
	    <input type="submit" class="PK_reset" name="insert" value="Reset .htaccess file" />
	</form>


	 </div>

	 <?php


	  ?>


	 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	 <script>
	 jQuery(document).ready(function(){

		 document.getElementById("PK_resetForm").addEventListener("click", function(event){
		  event.preventDefault()
		});

    jQuery('.PK_reset').click(function(){

			if(confirm("Are you sure you want to reset your htaccess file? This will set it back to the default that wordpress first set up for you.") == true){


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

	 <div id="fileinfo" style="display:none;">
		 <h2><?php esc_html_e('This is just showing you what is inside of .htaccess and can\'t be edited here.', 'PK-redirect') ?></h2>

		 <!-- <h3>You can always copy and paste the file contents into <a target="_blank" href="http://www.htaccesscheck.com/">this</a> valudator to make sure you have everything correct.</h3> -->

			<form target="_blank" style="width:600px;" action="http://www.htaccesscheck.com/check.cgi" method="post" enctype="multipart/form-data">
		<br>
		<textarea rows="15" cols="125" name="htaccess"><?php

 	 		$accessfileread = fopen($accessfileurl, 'r') or die('Unable to open the file. Sorry');
			echo fread($accessfileread, filesize($accessfileurl));
			fclose($accessfileread);
			?></textarea>
		<input type="submit" name="Submit" value="Validate File">
		</form>

		</div>




	 <?php
	 if($content != ''){
	 	PK_addToLog($content);
	}else{
	}

 	}

	}

	 public function PK_plugin_settings() {


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

	 }




}


/*
 * Starts our plugin class, yay!
 */
new PKRedirect();
