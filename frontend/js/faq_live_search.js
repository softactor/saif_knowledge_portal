/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var search = document.getElementById( 'faq_search_bar' ),
    var accordions = document.querySelectorAll( '.AccordionContainer' );

// Show content on click
Array.prototype.forEach.call( accordions, function( accordion ) {
    accordion.querySelector( 'button' ).addEventListener( 'click', function() {
        this.nextElementSibling.classList.add( 'active' );
    } );
} );

// Apply search
search.addEventListener( 'input', function() {
    var searchText = search.value.toLowerCase();
    Array.prototype.forEach.call( accordions, function( accordion ) {
        if ( accordion.innerText.toLowerCase().indexOf( searchText ) >= 0 ) {
            accordion.style.display = 'block';
        }
        else {
            accordion.style.display = 'none';
        }
    } );
} );