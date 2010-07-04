<?php
	include("foursquare_api.php");

	$user = AppletInstance::getUserGroupPickerValue('4sq-venue-controller');
	$user_id = $user->values["id"];

   $foursquare_username = PluginStore::get("foursquare_username_$user_id", "");
   $foursquare_password = PluginStore::get("foursquare_password_$user_id", "");

	$default = AppletInstance::getDropZoneUrl('no-venue-default-action');


	$response = new Response();

	if (!empty($foursquare_username)) {

		$lastVenue = getLastVenue($foursquare_username,$foursquare_password);

		$venues = AppletInstance::getValue('venues[]');
		$venue_options = AppletInstance::getDropZoneUrl('venue-options[]');

		$found = false;
		if (is_array($keys)) {

			foreach ($venues as $id => $value) {
				if ($value == $lastVenue) {
					$response->addRedirect($venue_options[$id]);
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
