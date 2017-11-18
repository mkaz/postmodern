/**
 * script.js
 *
 * Handles toggling the navigation menu for small screens.
 */

console.log("Javascript loaded!");

( function() {

	var button = document.getElementById( 'menu-toggle' );
	if ( 'undefined' === typeof button )
		return;

    var menu = document.getElementById( 'extended' );

	button.onclick = function() {
        console.log( "Toggle clicked!" )
		if ( menu.className === 'on' ) {
			menu.className = 'off';
		}
		else {
			menu.className = 'on';
		}
	};

} )();