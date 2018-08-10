( function( api ) {

	// Extends our custom "vision-lite" section.
	api.sectionConstructor['vision-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );