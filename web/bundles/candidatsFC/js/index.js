$(document).ready(function () {
	// -------------------------------------------------------------------------- traduire datepicker
	/* French initialisation for the jQuery UI date picker plugin. */
	/* Written by Keith Wood (kbwood{at}iinet.com.au),
				  Stéphane Nahmani (sholby@sholby.net),
				  Stéphane Raimbault <stephane.raimbault@gmail.com> */
	(function( factory ) {
		if ( typeof define === "function" && define.amd ) {

			// AMD. Register as an anonymous module.
			define([ "../jquery.ui.datepicker" ], factory );
		} else {

			// Browser globals
			factory( jQuery.datepicker );
		}
	}(function( datepicker ) {
		datepicker.regional['fr'] = {
			closeText: 'Fermer',
			prevText: 'Précédent',
			nextText: 'Suivant',
			currentText: 'Aujourd\'hui',
			monthNames: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin',
				'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'],
			monthNamesShort: ['janv.', 'févr.', 'mars', 'avril', 'mai', 'juin',
				'juil.', 'août', 'sept.', 'oct.', 'nov.', 'déc.'],
			dayNames: ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
			dayNamesShort: ['dim.', 'lun.', 'mar.', 'mer.', 'jeu.', 'ven.', 'sam.'],
			dayNamesMin: ['D','L','M','M','J','V','S'],
			weekHeader: 'Sem.',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''};
		datepicker.setDefaults(datepicker.regional['fr']);

		return datepicker.regional['fr'];

	}));

	$(function() {
	$('.date').datepicker($.datepicker.regional["fr"])
	});
	// -------------------------------------------------------------------------- Confirmer suppressions
	$('.suppr').on("click", function(e) {
	    var link = this;

	    e.preventDefault();

	    $("<div>Supprimer cet enregistrement ?</div>").dialog({
	        buttons: {
	            "Supprimer": function() {
	                window.location = link.href;
	            },
	            "Annuler": function() {
	                $(this).dialog("close");
	            }
	        }
	    });
	});
	// -------------------------------------------------------------------------- Navbar li active
	$('ul.nav a[href="'+ window.location.pathname +'"]').parent().addClass('active');
});