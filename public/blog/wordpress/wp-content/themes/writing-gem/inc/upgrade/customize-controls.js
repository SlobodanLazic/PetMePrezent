( function( api ) {

	// Extends our custom "writing-gem" section.
	api.sectionConstructor['writing-gem'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
