<?php
$defaultNumberOfChoices = 4;
$keys = AppletInstance::getValue('keys[]', array('1','2','3','4') );

if (count($keys) == 0) {
	$keys = array('1','2','3','4');
}

$choices = AppletInstance::getValue('choices[]');

error_log($keys);

$options = array(
					"Arts &amp; Entertainment", "College &amp; Education","Food",
					"Home / Work / Other","Nightlife","Parks &amp; Outdoors","Shops","Travel"
				);

	/*
	function options_menu($options,$default = "") {

		error_log("options_menu: default: ${default}");

		foreach ($options as $the_option) {
			$selected = "";
			if ($the_option == $default) { $selected = " selected"; }
			printf('<option value="%s" %s>%s</option>',$the_option,$selected,$the_option);
		}

	}
	*/

	error_log("function defined");

?>


<div class="vbx-applet menu-applet">

		<h2>FourSquare Category Options</h2>
		<p>Choose a category, then choose an action to take if your last checkin matches that category.</p>

		<p>Click <a href="http://foursquare.com/history" target="_new">Here </a>to see your History</p>
		<h3>User Selection</h3>
		<p>Choose which VBX user to use for controlling this Applet with their 4sq checkins</p>

		<?php echo AppletUI::UserGroupPicker('4sq-controller'); ?>

		<table class="vbx-menu-grid options-table">
			<thead>
				<tr>
					<td>Category</td>
					<td>&nbsp;</td>
					<td>Applet</td>
					<td>Add &amp; Remove</td>
				</tr>
			</thead>
			<tfoot>
				<tr class="hide">
					<td>
						<fieldset class="vbx-input-container">
	<select name="new-keys[]">
	<option value="">Select a Category</option>
	</select>
						</fieldset>
					</td>
					<td>then</td>
					<td>
						<?php echo AppletUI::dropZone('new-choices[]', 'Drop item here'); ?>
					</td>
					<td>
						<a href="" class="add action"><span class="replace">Add</span></a> <a href="" class="remove action"><span class="replace">Remove</span></a>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach($keys as $i=>$key) : ?>
				<tr>
					<td>
						<fieldset class="vbx-input-container">
	<select name="keys[]">
	<option value="">Select a Category</option>
	<?php
		foreach ($options as $the_option) {
			$selected = "";
			if ($the_option == $key) { $selected = " selected"; }
			printf('<option value="%s" %s>%s</option>',$the_option,$selected,$the_option);
		}
	?>
	</select>
						</fieldset>
					</td>
					<td>then</td>
					<td>
						<?php echo AppletUI::dropZone('choices['.($i).']', 'Drop item here'); ?>
					</td>
					<td>
						<a href="" class="add action"><span class="replace">Add</span></a> <a href="" class="remove action"><span class="replace">Remove</span></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table><!-- .vbx-menu-grid -->

		<h3>Default Action</h3>
		<p>When your last checkin is not in the list above, then what?</p>
		<?php echo AppletUI::dropZone('default-action'); ?>
    	<br />

</div><!-- .vbx-applet -->
<?php error_log("4square Category Complete"); ?>

