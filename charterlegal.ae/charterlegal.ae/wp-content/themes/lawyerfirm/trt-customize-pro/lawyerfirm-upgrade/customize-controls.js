( function( api ) {

	// Extends our custom "lawyerfirm-upgrade" section.
	api.sectionConstructor['lawyerfirm-upgrade'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
