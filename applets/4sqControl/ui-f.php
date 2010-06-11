<?php
	$foursquare_storage = PluginStore::get('foursquare_auth',array());
	$venues = AppletInstance::getValue('venues[]',array(1,2,3,4));
	//$venues = array(1,2,3,4);
	$choices = AppletInstance::getValue('choices[]');

	var_dump($venues);
?>
<div class="vbx-applet">
     <h2>Control Your Phone with FourSquare Checkins!</h2>

		<p>Select a User</p>
		<?php echo AppletUI::UserGroupPicker('controller'); ?>

     <p>Choose behavior for each of the following Venues</p>
<fieldset class="openvbx-container">
  <h3 class="settings-title">Options</h3>
  <table class="options-table">
	<?php foreach ($venues as $id => $venue) : ?>
   <tr>
    <td>Venue ID<br />(i.e. http://foursquare.com/venue/<em>1553411</em>) </td>
    <td>Next Action</td>
   </tr>
   <tr>
     <td><input name="venue" value="<?php echo $venue; ?>" size="30"></td>
     <td><?php echo AppletUI::dropZone('choices['.$id.']'); ?></td>
   </tr>
	<?php endforeach; ?>
  </table>
</fieldset>

<fieldset class="openvbx-container">
  <h3 class="settings-title">Default Action</h3>
  <table class="options-table">
    <tr>
      <td><?php echo AppletUI::dropZone('default_action'); ?></td>
    </tr>
  </table>
</fieldset>

</div>
