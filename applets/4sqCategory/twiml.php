<?php
	include("foursquare_api.php");

	$user = AppletInstance::getUserGroupPickerValue('4sq-cat-controller');
	$user_id = $user->values["id"];

   $foursquare_username = PluginStore::get("foursquare_username_$user_id", "");
   $foursquare_password = PluginStore::get("foursquare_password_$user_id", "");

	$default = AppletInstance::getDropZoneUrl('4sq-cat-default-action');

	$response = new Response();

	if (!empty($foursquare_username)) {

		$lastVenue = getLastVenue($foursquare_username,$foursquare_password);
		$category = getCategory($lastVenue);

		$categories = AppletInstance::getValue('categories[]');
		$category_options = AppletInstance::getDropZoneUrl('category_options[]');

		$found = false;
		if (is_array($categories)) {

			foreach ($categories as $id => $value) {
				if ($value == $category) {
					$response->addRedirect($category_options[$id]);
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
