<?php
	include("foursquare_api.php");

	$user = AppletInstance::getUserGroupPickerValue('4sq-controller');
	$user_id = $user->values["id"];

   $foursquare_username = PluginStore::get("foursquare_username_$user_id", "");
   $foursquare_password = PluginStore::get("foursquare_password_$user_id", "");

	$default = AppletInstance::getDropZoneUrl('default-action');


	$response = new Response();

	if (!empty($foursquare_username)) {

		$lastVenue = getLastVenue($foursquare_username,$foursquare_password);

		$keys = AppletInstance::getValue('keys[]');
		$choices = AppletInstance::getDropZoneUrl('choices[]');

		$found = false;
		if (is_array($keys)) {

			foreach ($keys as $id => $value) {
				if ($value == $lastVenue) {
					$response->addRedirect($choices[$id]);
					$found = true;
				}
			}
		}

		if (!$found) {
			$response->addRedirect($default);
		}

	} else {
		$response->addRedirect($default);
	}

$response->Respond();
?>
