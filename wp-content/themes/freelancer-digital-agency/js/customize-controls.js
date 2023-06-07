( function( api ) {

	// Extends our custom "freelancer-digital-agency" section.
	api.sectionConstructor['freelancer-digital-agency'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );