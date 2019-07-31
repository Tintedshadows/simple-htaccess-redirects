<div class="wrap container">

<form id="redirectForm" method="post" action="options.php">
    <?php settings_fields( 'PK-redirect-settings-group' ); ?>
    <?php do_settings_sections( 'PK-redirect-settings-group' ); ?>

    <table class="form-table table">
      <thead>
        <tr>
          <td>Rule</td>
          <td>Values</td>
          <td>HTTP Status</td>
          <td>Add Rule</td>
        </tr>
      </thead>

      <!-- 301 -->
      <tr>

        <td>
          <?php esc_html_e('301 Redirect', 'PK-redirect') ?>
        </td>

        <td>
          <?php esc_html_e('Old url: ', 'PK-redirect') ?><input type="text" name="_PK_301_old_setting" value="<?php echo esc_attr( get_option('_PK_301_old_setting') ); ?>" /><br>
          <?php esc_html_e('New url: ', 'PK-redirect') ?><input type="text" name="_PK_301_new_setting" value="<?php echo esc_attr( get_option('_PK_301_new_setting') ); ?>" />
        </td>

        <td>
        <?php
        if(get_option('_PK_301_old_setting')){
          echo 'Old HTTP Status: ';
          echo $this->PK_getStatus(get_option('_PK_301_old_setting'));
        }?><br>


        <?php
        if(get_option('_PK_301_new_setting')){
          echo 'New HTTP Status: ';
          echo $this->PK_getStatus(get_option('_PK_301_new_setting'));
        }?>
        </td>

        <td>
          <input name="Write301" type="checkbox" id="myCheck" value="1" <?php checked( '1', get_option( 'Write301' ) ); ?> />
        </td>
      </tr>

      <!-- 302 -->
      <tr>

      <td><?php esc_html_e('302 Redirect', 'PK-redirect') ?>
      </td>

      <td>
        <?php esc_html_e('Old url: ', 'PK-redirect') ?><input type="text" name="_PK_302_old_setting" value="<?php echo esc_attr( get_option('_PK_302_old_setting') ); ?>" /><br>
        <?php esc_html_e('New url: ', 'PK-redirect') ?><input type="text" name="_PK_302_new_setting" value="<?php echo esc_attr( get_option('_PK_302_new_setting') ); ?>" />
      </td>

      <td>
      <?php
      if(get_option('_PK_302_old_setting')){
        echo 'Old HTTP Status: ';
        echo $this->PK_getStatus(get_option('_PK_302_old_setting'));
      }?><br>
      <?php
      if(get_option('_PK_302_new_setting')){
        echo 'New HTTP Status: ';
        echo $this->PK_getStatus(get_option('_PK_302_new_setting'));
      }?></td>

      <td><input name="Write302" type="checkbox" id="myCheck2" value="1" <?php checked( '1', get_option( 'Write302' ) ); ?> /></td>
      </tr>


        <!-- 400 -->
        <tr>

        <td>
          <?php esc_html_e('404 Redirect', 'PK-redirect') ?>
        </td>

        <td>
          <?php esc_html_e('400 Error page url: ', 'PK-redirect') ?><input type="text" name="_PK_404_setting" value="<?php echo esc_attr( get_option('_PK_404_setting') ); ?>" />
        </td>

        <td>
        <?php
        if(get_option('_PK_404_setting')){
          echo '404 HTTP Status: ';
          echo $this->PK_getStatus(get_option('_PK_404_setting'));
        }?>
      </td>

        <td>
          <input name="Write404" type="checkbox" id="myCheck4" value="1" <?php checked( '1', get_option( 'Write404' ) ); ?> />
        </td>

        </tr>

        <!-- 500 -->
        <tr>

        <td>
          <?php esc_html_e('500 Redirect', 'PK-redirect') ?>
        </td>

        <td>
          <?php esc_html_e('500 Error page url: ', 'PK-redirect') ?><input type="text" name="_PK_500_setting" value="<?php echo esc_attr( get_option('_PK_500_setting') ); ?>" />
        </td>

        <td>
        <?php
        if(get_option('_PK_500_setting')){
          echo '500 HTTP Status: ';
          echo $this->PK_getStatus(get_option('_PK_500_setting'));
        }?><br>
        </td>

        <td>
          <input name="Write500" type="checkbox" id="myCheck3" value="1" <?php checked( '1', get_option( 'Write500' ) ); ?> /></td>
        </tr>


        <tr>
          <td>
            <?php esc_html_e('Https Redirect', 'PK-redirect') ?>
          </td>

          <td></td>

          <td></td>

          <td><input name="ForceHttps" type="checkbox" id="myCheck5" value="1" <?php checked( '1', get_option( 'ForceHttps' ) ); ?> /></td>

        </tr>
		

        <?php date_default_timezone_set('America/Chicago'); ?>

    </table>

    <?php submit_button(); ?>

  </form>

  </div>
