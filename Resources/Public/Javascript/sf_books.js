$(document).ready( function() {
	initAccordion();
	initLetters();
});

function initAccordion() {
	var $allTriggers = $('.trigger'),
		$accordionToOpen = null,
		$keepOpen;

	$allTriggers.click(function() {
		var $trigger = $(this),
			$current = $('.trigger_active').first();

		if (this == $current.get(0)) {
			$trigger
				.removeClass('trigger_active')
				.next('.toggle_container')
					.slideToggle('slow');
		} else {
			$current
				.removeClass('trigger_active')
				.next('.toggle_container')
					.slideToggle('slow');
			$trigger
				.addClass('trigger_active')
				.next('.toggle_container')
					.slideToggle('slow');
		}

		return false;
	});

	if (window.location.hash) {
		$accordionToOpen = $('.trigger' + window.location.hash).first();
	}

	$keepOpen = $accordionToOpen != null && $accordionToOpen.length ? $accordionToOpen : $allTriggers;
	$keepOpen
		.first()
			.addClass('trigger_active');

	$allTriggers
		.not('.trigger_active')
			.next('.toggle_container')
				.hide();
}

function initLetters() {
	$('.tx_sfbooks_author_letters a, .tx_sfbooks_series_letters a').click(function(event) {
		event.preventDefault();

		var $letter = $(this);
		var $trigger = $('.trigger' + $letter.attr('href'));
		$trigger.first().trigger('click');

		$('html,body').animate({
				scrollTop: $trigger.offset().top
			},
			1500,
			function () { window.location.hash = $letter.attr('href'); }
		);
	});
}