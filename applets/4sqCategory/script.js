$(document).ready(function() {
	// Disable all the template row inputs
	$('.4sq-cat-applet tr.hide input').attr('disabled', 'disabled');

	var app = $('.flow-instance.standard---menu');
	$('.4sq-cat-applet .menu-prompt .audio-choice', app).live('save', function(event, mode, value) {
		var text = '';
		if(mode == 'say') {
			text = value;
		} else {
			text = 'Play';
		}
		
		var instance = $(event.target).parents('.flow-instance.standard---menu');
		if(text.length > 0) {
			$(instance).trigger('set-name', 'Menu: ' + text.substr(0, 6) + '...');
		}
	});

	$('.4sq-cat-applet input.keypress').live('change', function(event) {
		var row = $(this).parents('tr');
		$('input[name=^choices]', row).attr('name', 'keys['+$(this).val()+']');
	});

	$('.4sq-cat-applet .action.add').live('click', function(event) {
		event.preventDefault();
		var row = $(this).closest('tr');
		var newRow = $('tfoot tr', $(this).parents('.4sq-cat-applet')).html();
		newRow = $('<tr>' + newRow + '</tr>')			
			.show()
			.insertAfter(row);
		$('.flowline-item').droppable(Flows.events.drop.options);
		$('td', newRow).flicker();
		$('.flowline-item input', newRow).attr('name', 'category_options[]');
		$('input.keypress', newRow).attr('name', 'categories[]');
		$('input', newRow).removeAttr('disabled').focus();
		$(event.target).parents('.options-table').trigger('change');
		return false;
	});

	$('.4sq-cat-applet .action.remove').live('click', function() {
		var row = $(this).closest('tr');
		var bgColor = row.css('background-color');
		row.animate(
			{
				backgroundColor : '#FEEEBD'
			}, 
			'fast')
			.fadeOut('fast', function() {
				row.remove();
			});

		return false;
	});

	$('.4sq-cat-applet .options-table').live('change', function() {
		var first = $('tbody tr', this).first();
		$('.action.remove', first).hide();
	});

	$('.4sq-cat-applet .options-table').trigger('change');
});
