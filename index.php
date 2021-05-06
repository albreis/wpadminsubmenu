<?php global $plugin_name, $component; ?>
<div class="albreis-admin">
<form method="post" action="options.php"> 
    <?php settings_fields( 'sorteio_settings' ); do_settings_sections( 'sorteio_settings' ); ?>
    <label>Instalado</label>
    <input name="<?php echo "{$plugin_name}_{$component}_instalado"; ?>" type="text" value="<?php echo get_option("{$plugin_name}_{$component}_instalado", true); ?>" /><br/><br/>
    <?php submit_button(); ?>
</form>
</div>