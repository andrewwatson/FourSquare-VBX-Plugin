<?php

	function category_menu($default) {

		$options = array("Arts &amp; Entertainment","College &amp; Education","Food","Home / Work / Other", "Nightlife","Parks &amp; Outdoors","Shops","Travel");

		foreach ($options as $the_option) {
			if ($default == $the_option) {
				$selected = " selected";
			} else { $selected = ""; }

			printf('<option value="%s">%s</option>',$the_option,$the_option);

		}
	}

  function getLastVenue($user,$pass) {

	$ch = curl_init("http://api.foursquare.com/v1/user.json");
	curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
	curl_setopt($ch,CURLOPT_USERPWD,"$user:$pass");
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$result = curl_exec($ch);
	$result = json_decode($result);
	//print_r($result);

	$last_id = $result->user->checkin->venue->id;

	return $last_id;
  }

  function checkLocation($user,$pass, $venue_id) {
	return ($venue_id == getLastVenue($user,$pass));
  }

	function getTopCategories($user,$pass) {
		$ch = curl_init("http://api.foursquare.com/v1/categories.json");
		curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
		curl_setopt($ch,CURLOPT_USERPWD,"$user:$pass");
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$result = curl_exec($ch);
		$result = json_decode($result);

		foreach ($result->categories as $id => $category) {
			print_r($category);
			//printf("%s %d\n",$category->nodename,$category->id);
		}

	}

	function getAllCategories($user,$pass) {
		$ch = curl_init("http://api.foursquare.com/v1/categories.json");
		curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
		curl_setopt($ch,CURLOPT_USERPWD,"$user:$pass");
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$result = curl_exec($ch);
		$result = json_decode($result);

		//print_r($result);

		//printf("%s\n",$result->categories[0]->categories[0]->nodename);

		$categories = array();
		foreach ($result->categories as $id => $category) {
			$catname = $category->nodename;

			//printf("%s\n",$catname);
			$categories[$catname] = array();

			foreach ($category->categories as $id => $subcategory) {

				//var_dump($subcategory);
				$subcatname = $subcategory->fullpathname;
				printf("%s %d\n",$subcatname,$subcategory->id);
				if (isset($subcategory->categories) && is_array($subcategory->categories)) {
					foreach ($subcategory->categories as $subid => $subsubcat) {
						printf("%s %d\n",$subsubcat->fullpathname,$subsubcat->id);
					}
				}
			}
		}

	//print_r($categories);


	}
?>
