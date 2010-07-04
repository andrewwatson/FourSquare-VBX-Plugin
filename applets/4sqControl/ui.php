<?php
$defaultNumberOfChoices = 4;
$venues = AppletInstance::getValue('venues[]', array('1','2','3','4') );

if (count($venues) == 0) {
	$venues = array('1','2','3','4');
}

$venue_options = AppletInstance::getValue('venue-options[]');

?>

<div class="vbx-applet 4sq-venue-applet">

		<h2>FourSquare Options</h2>
		<p>To get the Venue ID for your favorite checkins, log in to foursquare.com, click on History
			and then click on the venue.  You should see the URL your browser is pointed at looks like 
			http://foursquare.com/venue/100281 and that 100281 is the Venue ID to use</p>

		<p>Click <a href="http://foursquare.com/history" target="_new">Here </a>to see your History</p>
		<h3>User Selection</h3>
		<p>Choose which VBX user to use for controlling this Applet with their 4sq checkins</p>
		<?php echo AppletUI::UserGroupPicker('4sq-venue-controller'); ?>
		

		<table class="vbx-menu-grid options-table">
			<thead>
				<tr>
					<td>Venue ID</td>
					<td>&nbsp;</td>
					<td>Applet</td>
					<td>Add &amp; Remove</td>
				</tr>
			</thead>
			<tfoot>
				<tr class="hide">
					<td>
						<fieldset class="vbx-input-container">
							<input class="keypress small" size="10" type="text" name="new-venues[]" value="" autocomplete="off" />
						</fieldset>
					</td>
					<td>then</td>
					<td>
						<?php echo AppletUI::dropZone('new-venue-options[]', 'Drop item here'); ?>
					</td>
					<td>
						<a href="" class="add action"><span class="replace">Add</span></a> <a href="" class="remove action"><span class="replace">Remove</span></a>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach($venues as $i=>$venue): ?>
				<tr>
					<td>
						<fieldset class="vbx-input-container">
							<input class="keypress small" size="10" type="text" name="venues[]" value="<?php echo $venue ?>" autocomplete="off" />
						</fieldset>
					</td>
					<td>then</td>
					<td>
						<?php echo AppletUI::dropZone('venue-options['.($i).']', 'Drop item here'); ?>
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
		<?php echo AppletUI::dropZone('no-venue-default-action'); ?>
    	<br />

</div><!-- .vbx-applet -->
