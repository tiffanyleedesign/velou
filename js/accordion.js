/**
 * File accordion.js.
 *
 * Handles the functionality of accordion menu that shows 
 * and hides content
 */
( function() {
    let header = document.querySelectorAll(".accordion-header");

    console.log('show');

    for( let i = 0; i < header.length; i++) {
        header[i].addEventListener("click", function() {
            this.classList.toggle("active");

            var content = this.nextElementSibling;
            content.classList.toggle("show");
        });
    }

}() );

