<div class="wrap container">

  <form id="redirectForm" method="post" action="options.php">
      <?php settings_fields( 'PK-redirect-settings-group' ); ?>
      <?php do_settings_sections( 'PK-redirect-settings-group' ); ?>

    <table class="form-table table">

      <thead>
        <tr>
          <th><?php esc_html_e('Type', 'PK-redirect') ?></th>
          <th><?php esc_html_e('Value', 'PK-redirect') ?></th>
          <th><?php esc_html_e('Length', 'PK-redirect') ?></th>
          <th><?php esc_html_e('Add Rule', 'PK-redirect') ?></th>
        </tr>

      </thead>

      <tbody>

        <tr>
          <td><?php esc_html_e('css', 'PK-redirect') ?></td>

          <td>
            <input type="number" min="0" name="_PK_css_value" value="<?php echo esc_attr( get_option('_PK_css_value') ); ?>">
          </td>

          <td>
            <?php
            $CSS_options = get_option( '_PK_css_options' );
            $CSS_selectedOption = $CSS_options['select_field_0'];
            ?>

            <select class="_PK_css_value" name='_PK_css_options[select_field_0]'>
              <option value="second" <?php selected( $CSS_options['select_field_0'], 'second' ); ?>><?php esc_html_e('Second(s)', 'PK-redirect') ?></option>
              <option value="hour" <?php selected( $CSS_options['select_field_0'], 'hour' ); ?>><?php esc_html_e('Hour(s)', 'PK-redirect') ?></option>
              <option value="week" <?php selected( $CSS_options['select_field_0'], 'week' ); ?>><?php esc_html_e('Week(s)', 'PK-redirect') ?></option>
              <option value="month" <?php selected( $CSS_options['select_field_0'], 'month' ); ?>><?php esc_html_e('Month(s)', 'PK-redirect') ?></option>
              <option value="year" <?php selected( $CSS_options['select_field_0'], 'year' ); ?>><?php esc_html_e('Year(s)', 'PK-redirect') ?></option>
            </select>
          </td>

          <td>
            <input name="WriteCSS" type="checkbox" id="myCSSCheck" value="1" <?php checked( '1', get_option( 'WriteCSS' ) ); ?>>
          </td>
        </tr>

        <tr>
          <td><?php esc_html_e('javascript', 'PK-redirect') ?></td>

          <td>
            <input type="number" min="0" name="_PK_js_value" value="<?php echo esc_attr( get_option('_PK_js_value') ); ?>">
          </td>

          <td>
            <?php
            $JS_options = get_option( '_PK_js_options' );
            $JS_selectedOption = $JS_options['select_field_0'];
            ?>

            <select class="_PK_js_value" name='_PK_js_options[select_field_0]'>
              <option value="second" <?php selected( $JS_options['select_field_0'], 'second' ); ?>><?php esc_html_e('Second(s)', 'PK-redirect') ?></option>
              <option value="hour" <?php selected( $JS_options['select_field_0'], 'hour' ); ?>><?php esc_html_e('Hour(s)', 'PK-redirect') ?></option>
              <option value="week" <?php selected( $JS_options['select_field_0'], 'week' ); ?>><?php esc_html_e('Week(s)', 'PK-redirect') ?></option>
              <option value="month" <?php selected( $JS_options['select_field_0'], 'month' ); ?>><?php esc_html_e('Month(s)', 'PK-redirect') ?></option>
              <option value="year" <?php selected( $JS_options['select_field_0'], 'year' ); ?>><?php esc_html_e('Year(s)', 'PK-redirect') ?></option>
            </select>
          </td>

          <td>
            <input name="WriteJS" type="checkbox" id="myJSCheck" value="1" <?php checked( '1', get_option( 'WriteJS' ) ); ?>>
          </td>
        </tr>

        <tr>
          <td><?php esc_html_e('png', 'PK-redirect') ?></td>

          <td>
            <input type="number" min="0" name="_PK_png_value" value="<?php echo esc_attr( get_option('_PK_png_value') ); ?>">
          </td>

          <td>
            <?php
            $PNG_options = get_option( '_PK_png_options' );
            $PNG_selectedOption = $PNG_options['select_field_0'];
            ?>

            <select class="_PK_png_value" name='_PK_png_options[select_field_0]'>
              <option value="second" <?php selected( $PNG_options['select_field_0'], 'second' ); ?>><?php esc_html_e('Second(s)', 'PK-redirect') ?></option>
              <option value="hour" <?php selected( $PNG_options['select_field_0'], 'hour' ); ?>><?php esc_html_e('Hour(s)', 'PK-redirect') ?></option>
              <option value="week" <?php selected( $PNG_options['select_field_0'], 'week' ); ?>><?php esc_html_e('Week(s)', 'PK-redirect') ?></option>
              <option value="month" <?php selected( $PNG_options['select_field_0'], 'month' ); ?>><?php esc_html_e('Month(s)', 'PK-redirect') ?></option>
              <option value="year" <?php selected( $PNG_options['select_field_0'], 'year' ); ?>><?php esc_html_e('Year(s)', 'PK-redirect') ?></option>
            </select>
          </td>

          <td>
            <input name="WritePNG" type="checkbox" id="myPNGCheck" value="1" <?php checked( '1', get_option( 'WritePNG' ) ); ?>>
          </td>
        </tr>

        <tr>
          <td><?php esc_html_e('jpg', 'PK-redirect') ?></td>

          <td>
            <input type="number" min="0" name="_PK_jpg_value" value="<?php echo esc_attr( get_option('_PK_jpg_value') ); ?>">
          </td>

          <td>
            <?php
            $JPG_options = get_option( '_PK_jpg_options' );
            $JPG_selectedOption = $JPG_options['select_field_0'];
            ?>

            <select class="_PK_jpg_value" name='_PK_jpg_options[select_field_0]'>
              <option value="second" <?php selected( $JPG_options['select_field_0'], 'second' ); ?>><?php esc_html_e('Second(s)', 'PK-redirect') ?></option>
              <option value="hour" <?php selected( $JPG_options['select_field_0'], 'hour' ); ?>><?php esc_html_e('Hour(s)', 'PK-redirect') ?></option>
              <option value="week" <?php selected( $JPG_options['select_field_0'], 'week' ); ?>><?php esc_html_e('Week(s)', 'PK-redirect') ?></option>
              <option value="month" <?php selected( $JPG_options['select_field_0'], 'month' ); ?>><?php esc_html_e('Month(s)', 'PK-redirect') ?></option>
              <option value="year" <?php selected( $JPG_options['select_field_0'], 'year' ); ?>><?php esc_html_e('Year(s)', 'PK-redirect') ?></option>
            </select>
          </td>

          <td>
            <input name="WriteJPG" type="checkbox" id="myJPGCheck" value="1" <?php checked( '1', get_option( 'WriteJPG' ) ); ?>>
          </td>
        </tr>


      </tbody>


    </table>

    <input type="hidden" name="_PK_301_new_setting" value="<?php echo esc_attr( get_option('_PK_301_new_setting') ); ?>" />
    <input type="hidden" name="_PK_301_old_setting" value="<?php echo esc_attr( get_option('_PK_301_old_setting') ); ?>" />
    <input type="hidden" name="_PK_302_old_setting" value="<?php echo esc_attr( get_option('_PK_302_old_setting') ); ?>" />
    <input type="hidden" name="_PK_302_new_setting" value="<?php echo esc_attr( get_option('_PK_302_new_setting') ); ?>" />
    <input type="hidden" name="_PK_404_setting" value="<?php echo esc_attr( get_option('_PK_404_setting') ); ?>" />
    <input type="hidden" name="_PK_500_setting" value="<?php echo esc_attr( get_option('_PK_500_setting') ); ?>" />


    <?php submit_button( __( 'Save Changes', 'textdomain' ), 'primary', 'expiredForm', false ); ?>


  </form>

 <!-- png -->
  <?php
    function checkPlural($arg, $string){

      if($arg > 1){
        return $string . "s";
      }else{
        return $string;
      }

    }
   ?>

   <?php if(get_option('WritePNG') == '1' && get_option('WriteJPG') == '1' && get_option('WriteCSS') == "1" && get_option('WriteJS') == "1") {  // png, jpg, css, js?>
     <?php

     $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');


     $contentPNG = PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on"
     . PHP_EOL . "ExpiresByType " . "image/png" . ' "access plus ' . get_option('_PK_png_value') ." " . checkPlural(get_option('_PK_png_value') ,$PNG_selectedOption) .'"'
     . PHP_EOL . "ExpiresByType " . "image/jpg" . ' "access plus ' . get_option('_PK_jpg_value'). " " . checkPlural(get_option('_PK_jpg_value') ,$JPG_selectedOption) . '"'
     . PHP_EOL . "ExpiresByType " . "text/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"'
     . PHP_EOL . "ExpiresByType " . "application/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"'
     . PHP_EOL . "ExpiresByType " . "text/css" . ' "access plus ' . get_option('_PK_css_value'). " " . checkPlural(get_option('_PK_css_value') ,$CSS_selectedOption) . '"'
     . PHP_EOL .  "</IfModule>" . PHP_EOL;
     $content = $content . $contentPNG;

     fwrite($accessfilewrite, $contentPNG);
     update_option( 'WritePNG' , "0" );
     update_option( 'WriteJPG' , "0" );
     update_option( 'WriteJS' , "0" );
     update_option( 'WriteCSS' , "0" );
     fclose($accessfilewrite);

   ?>
   <?php

      ?>

   <?php } else if(get_option('WritePNG') == '1' && get_option('WriteJPG') != '1' && get_option('WriteCSS') != '1' && get_option('WriteJS') != "1"){ //png

    $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

    $contentPNG =
    PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on"
    . PHP_EOL . "ExpiresByType " . "image/png" . ' "access plus ' . get_option('_PK_png_value'). " " . checkPlural(get_option('_PK_png_value') ,$PNG_selectedOption) .'"'
    . PHP_EOL .  "</IfModule>" . PHP_EOL;
    $content = $content . $contentPNG;

    fwrite($accessfilewrite, $contentPNG);
    update_option( 'WritePNG' , "0" );
    fclose($accessfilewrite);

  ?>
  <script type="text/javascript">
     document.getElementById("myPNGCheck").checked = false;
     //window.location.reload();
  </script>
  <?php

} else if(get_option('WritePNG') != '1' && get_option('WriteJPG') != '1' && get_option('WriteCSS') == '1' && get_option('WriteJS') != "1"){ //css

    $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

    $contentJPG =
    PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
    PHP_EOL . "ExpiresByType " . "text/css" .  ' "access plus ' . get_option('_PK_css_value'). " " . checkPlural(get_option('_PK_css_value') ,$CSS_selectedOption) .'"' .
    PHP_EOL . "</IfModule>" . PHP_EOL;
    $content = $content . $contentJPG;

    fwrite($accessfilewrite, $contentJPG);
    update_option( 'WriteCSS' , "0" );
    fclose($accessfilewrite);

  ?>
  <script type="text/javascript">
     document.getElementById("myCSSCheck").checked = false;
     //window.location.reload();
  </script>
  <?php
} else if(get_option('WritePNG') != '1' && get_option('WriteJPG') == '1' && get_option('WriteCSS') != '1' && get_option('WriteJS') != "1"){ //jpg

      $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

      $contentJPG =
      PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
      PHP_EOL . "ExpiresByType " . "image/jpg" .  ' "access plus ' . get_option('_PK_jpg_value'). " " . checkPlural(get_option('_PK_jpg_value') ,$JPG_selectedOption) .'"' .
      PHP_EOL . "</IfModule>" . PHP_EOL;
      $content = $content . $contentJPG;

      fwrite($accessfilewrite, $contentJPG);
      update_option( 'WriteJPG' , "0" );
      fclose($accessfilewrite);

    ?>
    <script type="text/javascript">
       document.getElementById("myJPGCheck").checked = false;
       //window.location.reload();
    </script>
    <?php
  }else if(get_option('WritePNG') != '1' && get_option('WriteJPG') == '1' && get_option('WriteCSS') == '1' && get_option('WriteJS') != "1"){ // css, jpg

        $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

        $contentJPG =
        PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
        PHP_EOL . "ExpiresByType " . "text/css" .  ' "access plus ' . get_option('_PK_css_value'). " " . checkPlural(get_option('_PK_css_value') ,$CSS_selectedOption) .'"' .
        PHP_EOL . "ExpiresByType " . "image/jpg" .  ' "access plus ' . get_option('_PK_jpg_value'). " " . checkPlural(get_option('_PK_jpg_value') ,$JPG_selectedOption) .'"' .
        PHP_EOL . "</IfModule>" . PHP_EOL;
        $content = $content . $contentJPG;

        fwrite($accessfilewrite, $contentJPG);
        update_option( 'WriteJPG' , "0" );
        update_option( 'WriteCSS' , "0" );
        fclose($accessfilewrite);

      ?>
      <script type="text/javascript">
         document.getElementById("myJPGCheck").checked = false;
         //window.location.reload();
      </script>
      <?php
    }else if(get_option('WritePNG') == '1' && get_option('WriteJPG') == '1' && get_option('WriteCSS') != '1' && get_option('WriteJS') != "1"){ // png, jpg

          $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

          $contentJPG =
          PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
          PHP_EOL . "ExpiresByType " . "image/png" .  ' "access plus ' . get_option('_PK_png_value'). " " . checkPlural(get_option('_PK_png_value') ,$PNG_selectedOption) .'"' .
          PHP_EOL . "ExpiresByType " . "image/jpg" .  ' "access plus ' . get_option('_PK_jpg_value'). " " . checkPlural(get_option('_PK_jpg_value') ,$JPG_selectedOption) .'"' .
          PHP_EOL . "</IfModule>" . PHP_EOL;
          $content = $content . $contentJPG;

          fwrite($accessfilewrite, $contentJPG);
          update_option( 'WritePNG' , "0" );
          update_option( 'WriteJPG' , "0" );
          fclose($accessfilewrite);

        ?>
        <script type="text/javascript">
           document.getElementById("myPNGCheck").checked = false;
           document.getElementById("myJPGCheck").checked = false;
           //window.location.reload();
        </script>
        <?php
      }else if(get_option('WritePNG') == '1' && get_option('WriteJPG') != '1' && get_option('WriteCSS') == '1' && get_option('WriteJS') != "1"){ // css, png

            $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

            $contentJPG =
            PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
            PHP_EOL . "ExpiresByType " . "text/css" .  ' "access plus ' . get_option('_PK_css_value'). " " . checkPlural(get_option('_PK_css_value') ,$CSS_selectedOption) .'"' .
            PHP_EOL . "ExpiresByType " . "image/png" .  ' "access plus ' . get_option('_PK_png_value'). " " . checkPlural(get_option('_PK_png_value') ,$PNG_selectedOption) .'"' .
            PHP_EOL . "</IfModule>" . PHP_EOL;
            $content = $content . $contentJPG;

            fwrite($accessfilewrite, $contentJPG);
            update_option( 'WritePNG' , "0" );
            update_option( 'WriteCSS' , "0" );
            fclose($accessfilewrite);

          ?>
          <script type="text/javascript">
             document.getElementById("myPNGCheck").checked = false;
             document.getElementById("myCSSCheck").checked = false;
             //window.location.reload();
          </script>
      <?php
    }else if(get_option('WritePNG') != '1' && get_option('WriteJPG') == '1' && get_option('WriteCSS') != '1' && get_option('WriteJS') == "1"){ // js, jpg

          $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

          $contentJPG =
          PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
          PHP_EOL . "ExpiresByType " . "image/jpg" .  ' "access plus ' . get_option('_PK_jpg_value'). " " . checkPlural(get_option('_PK_jpg_value') ,$JPG_selectedOption) .'"' .
          PHP_EOL . "ExpiresByType " . "text/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
          PHP_EOL . "ExpiresByType " . "application/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
          PHP_EOL . "</IfModule>" . PHP_EOL;
          $content = $content . $contentJPG;

          fwrite($accessfilewrite, $contentJPG);
          update_option( 'WriteJS' , "0" );
          update_option( 'WriteJPG' , "0" );
          fclose($accessfilewrite);

        ?>
        <script type="text/javascript">
           document.getElementById("myJSCheck").checked = false;
           document.getElementById("myJPGCheck").checked = false;
           //window.location.reload();
        </script>
        <?php
  }else if(get_option('WritePNG') != '1' && get_option('WriteJPG') != '1' && get_option('WriteCSS') != '1' && get_option('WriteJS') == "1"){ // js

        $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

        $contentJPG =
        PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
        PHP_EOL . "ExpiresByType " . "text/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "ExpiresByType " . "application/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "</IfModule>" . PHP_EOL;
        $content = $content . $contentJPG;

        fwrite($accessfilewrite, $contentJPG);
        update_option( 'WriteJS' , "0" );
        fclose($accessfilewrite);

      ?>
      <script type="text/javascript">
         document.getElementById("myJSCheck").checked = false;
         //window.location.reload();
      </script>
      <?php
}else if(get_option('WritePNG') == '1' && get_option('WriteJPG') != '1' && get_option('WriteCSS') != '1' && get_option('WriteJS') == "1"){ // js, png

        $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

        $contentJPG =
        PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
        PHP_EOL . "ExpiresByType " . "image/png" .  ' "access plus ' . get_option('_PK_png_value'). " " . checkPlural(get_option('_PK_png_value') ,$PNG_selectedOption) .'"' .
        PHP_EOL . "ExpiresByType " . "text/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "ExpiresByType " . "application/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "</IfModule>" . PHP_EOL;
        $content = $content . $contentJPG;

        fwrite($accessfilewrite, $contentJPG);
        update_option( 'WritePNG' , "0" );
        update_option( 'WriteJS' , "0" );
        fclose($accessfilewrite);

      ?>
      <script type="text/javascript">
         document.getElementById("myJSCheck").checked = false;
         document.getElementById("myPNGCheck").checked = false;
         //window.location.reload();
      </script>
      <?php
  }else if(get_option('WritePNG') != '1' && get_option('WriteJPG') != '1' && get_option('WriteCSS') == '1' && get_option('WriteJS') == "1"){ // js, css

        $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

        $contentJPG =
        PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
        PHP_EOL . "ExpiresByType " . "text/css" .  ' "access plus ' . get_option('_PK_css_value'). " " . checkPlural(get_option('_PK_css_value') ,$CSS_selectedOption) .'"' .
        PHP_EOL . "ExpiresByType " . "text/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "ExpiresByType " . "application/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "</IfModule>" . PHP_EOL;
        $content = $content . $contentJPG;

        fwrite($accessfilewrite, $contentJPG);
        update_option( 'WriteCSS' , "0" );
        update_option( 'WriteJS' , "0" );
        fclose($accessfilewrite);

      ?>
      <script type="text/javascript">
         document.getElementById("myJSCheck").checked = false;
         document.getElementById("myCSSCheck").checked = false;
         //window.location.reload();
      </script>
      <?php
  }else if(get_option('WritePNG') == '1' && get_option('WriteJPG') != '1' && get_option('WriteCSS') == '1' && get_option('WriteJS') == "1"){ // js, css, png

        $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

        $contentJPG =
        PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
        PHP_EOL . "ExpiresByType " . "image/png" .  ' "access plus ' . get_option('_PK_png_value'). " " . checkPlural(get_option('_PK_png_value') ,$PNG_selectedOption) .'"' .
        PHP_EOL . "ExpiresByType " . "text/css" .  ' "access plus ' . get_option('_PK_css_value'). " " . checkPlural(get_option('_PK_css_value') ,$CSS_selectedOption) .'"' .
        PHP_EOL . "ExpiresByType " . "text/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "ExpiresByType " . "application/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "</IfModule>" . PHP_EOL;
        $content = $content . $contentJPG;

        fwrite($accessfilewrite, $contentJPG);
        update_option( 'WriteCSS' , "0" );
        update_option( 'WriteJS' , "0" );
        update_option( 'WritePNG' , "0" );
        fclose($accessfilewrite);

      ?>
      <script type="text/javascript">
         document.getElementById("myJSCheck").checked = false;
         document.getElementById("myPNGCheck").checked = false;
         document.getElementById("myCSSCheck").checked = false;
         //window.location.reload();
      </script>
      <?php
  }else if(get_option('WritePNG') != '1' && get_option('WriteJPG') == '1' && get_option('WriteCSS') == '1' && get_option('WriteJS') == "1"){ // js, css, jpg

        $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

        $contentJPG =
        PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
        PHP_EOL . "ExpiresByType " . "image/jpg" .  ' "access plus ' . get_option('_PK_jpg_value'). " " . checkPlural(get_option('_PK_jpg_value') ,$JPG_selectedOption) .'"' .
        PHP_EOL . "ExpiresByType " . "text/css" .  ' "access plus ' . get_option('_PK_css_value'). " " . checkPlural(get_option('_PK_css_value') ,$CSS_selectedOption) .'"' .
        PHP_EOL . "ExpiresByType " . "text/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "ExpiresByType " . "application/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "</IfModule>" . PHP_EOL;
        $content = $content . $contentJPG;

        fwrite($accessfilewrite, $contentJPG);
        update_option( 'WriteCSS' , "0" );
        update_option( 'WriteJS' , "0" );
        update_option( 'WriteJPG' , "0" );
        fclose($accessfilewrite);

      ?>
      <script type="text/javascript">
         document.getElementById("myJSCheck").checked = false;
         document.getElementById("myJPGCheck").checked = false;
         document.getElementById("myCSSCheck").checked = false;
         //window.location.reload();
      </script>
      <?php
  }else if(get_option('WritePNG') == '1' && get_option('WriteJPG') == '1' && get_option('WriteCSS') != '1' && get_option('WriteJS') == "1"){ // js, png, jpg

        $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');

        $contentJPG =
        PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on" .
        PHP_EOL . "ExpiresByType " . "image/jpg" .  ' "access plus ' . get_option('_PK_jpg_value'). " " . checkPlural(get_option('_PK_jpg_value') ,$JPG_selectedOption) .'"' .
        PHP_EOL . "ExpiresByType " . "image/png" .  ' "access plus ' . get_option('_PK_png_value'). " " . checkPlural(get_option('_PK_png_value') ,$PNG_selectedOption) .'"' .
        PHP_EOL . "ExpiresByType " . "text/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "ExpiresByType " . "application/javascript" . ' "access plus ' . get_option('_PK_js_value'). " " . checkPlural(get_option('_PK_js_value') ,$JS_selectedOption) . '"' .
        PHP_EOL . "</IfModule>" . PHP_EOL;
        $content = $content . $contentJPG;

        fwrite($accessfilewrite, $contentJPG);
        update_option( 'WriteJPG' , "0" );
        update_option( 'WriteJS' , "0" );
        update_option( 'WriteJPG' , "0" );
        fclose($accessfilewrite);

      ?>
      <script type="text/javascript">
         document.getElementById("myJSCheck").checked = false;
         document.getElementById("myJPGCheck").checked = false;
         document.getElementById("myPNGCheck").checked = false;
         //window.location.reload();
      </script>
      <?php
  } else if(get_option('WritePNG') == '1' && get_option('WriteJPG') == '1' && get_option('WriteCSS') == '1' && get_option('WriteJS') != "1"){ //css,png,jpg

    $accessfilewrite = fopen($accessfileurl, 'a') or die('Unable to open the file. Sorry');


    $contentPNG = PHP_EOL . "<IfModule mod_expires.c>". PHP_EOL . "ExpiresActive on"
    . PHP_EOL . "ExpiresByType " . "image/png" . ' "access plus ' . get_option('_PK_png_value'). " " . checkPlural(get_option('_PK_png_value') ,$PNG_selectedOption) .'"'
    . PHP_EOL . "ExpiresByType " . "image/jpg" . ' "access plus ' . get_option('_PK_jpg_value'). " " . checkPlural(get_option('_PK_jpg_value') ,$JPG_selectedOption) . '"'
    . PHP_EOL . "ExpiresByType " . "text/css" . ' "access plus ' . get_option('_PK_css_value'). " " . checkPlural(get_option('_PK_css_value') ,$CSS_selectedOption) . '"'
    . PHP_EOL .  "</IfModule>" . PHP_EOL;
    $content = $content . $contentPNG;

    fwrite($accessfilewrite, $contentPNG);
    update_option( 'WritePNG' , "0" );
    update_option( 'WriteJPG' , "0" );
    update_option( 'WriteCSS' , "0" );
    fclose($accessfilewrite);


}

    if(get_option('WritePNG') != '1' ){
    ?>
    <script type="text/javascript">
       document.getElementById("myPNGCheck").checked = false;
    </script>
    <?php
    } ?>

  <!-- jpg -->
  <?php
 if(get_option('WriteJPG') != '1' ){
  ?>
  <script type="text/javascript">
     document.getElementById("myJPGCheck").checked = false;
  </script>
  <?php
  } ?>

  <?php
 if(get_option('WriteJS') != '1' ){
  ?>
  <script type="text/javascript">
     document.getElementById("myJSCheck").checked = false;
  </script>
  <?php
  } ?>

<!-- css -->
  <?php
 if(get_option('WriteCSS') != '1' ){
  ?>
  <script type="text/javascript">
     document.getElementById("myCSSCheck").checked = false;
  </script>
  <?php
  } ?>



</div>
