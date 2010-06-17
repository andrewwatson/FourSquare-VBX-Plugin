<?php
	$ci = &get_instance();
	$user_id = $ci->session->userdata('user_id');

	$foursquare_username = PluginStore::get("foursquare_username_$user_id", "");
	$foursquare_password = PluginStore::get("foursquare_password_$user_id", "");


if (isset($_REQUEST['savebutton'])) {
	PluginStore::set("foursquare_username_$user_id",$_REQUEST['username']);
	PluginStore::set("foursquare_password_$user_id",$_REQUEST['password']);

	$foursquare_username = $_REQUEST['username'];
	$foursquare_password = $_REQUEST['password'];
}


?>
<div class="vbx-content-main">
    <?php $store = PluginStore::getKeyValues(); ?>
    <div class="vbx-content-menu vbx-content-menu-top">
        <h2 class="vbx-content-heading">FourSquare Account</h2>
    </div>

    <div class="vbx-content-container">
		<div class="vbx-content-section">
        <h3>Store Your Credentials</h3>
			<form action="" class="vbx-form">
			<div class="vbx-input-container">

			<label class="field-label">Username 
				<input name="username" size="30" value="<?php echo $foursquare_username; ?>" class="medium text">
			</label>

			</div>

			<div class="vbx-input-container">
				<label class="field-label">Password
					<input name="password" size="30" value="<?php echo $foursquare_password; ?>" type="password" class="medium text">
				</label>
				<button class="button-normal" name="savebutton"><span>SAVE</span></button>
			</div>
			</form>
		</div>
    </div>
</div>
