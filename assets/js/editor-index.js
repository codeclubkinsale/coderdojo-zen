
function badgetypedropdownupdate() {
console.log(document.getElementById("form_parent_badge_type").value);
    jQuery.ajax({

		type: 'POST',

		url: coderdojoajax.ajaxurl,

		data: {
			action: '_ajax_fetch_badge_type_list',
			term_slug: document.getElementById("form_parent_badge_type").value
		},

		success: function(data, textStatus, XMLHttpRequest) {
            // WP_List_Table::ajax_response() returns json
            console.log(data);
            var response = jQuery.parseJSON( data );
            //console.log(response);

            var selectElement = document.getElementById('form_child_badge_type');

            // remove all options from select
            selectElement.options.length = 0;

            // create new option element
            var newOptionElement = document.createElement('option');
            newOptionElement.value = "";
            newOptionElement.innerHTML = "Select...";

            // add the new option into the select
            selectElement.appendChild(newOptionElement);
            
            response.terms.forEach(function(term) {
                var newOptionElement = document.createElement('option');
                newOptionElement.value = term.slug;
                newOptionElement.innerHTML = term.term_name;
                selectElement.appendChild(newOptionElement);
            });
            // Add the requested rows
           /*  if ( response.rows.length )
                jQuery('#the-list').html( response.rows );
            // Update column headers for sorting
            if ( response.column_headers.length )
                jQuery('thead tr, tfoot tr').html( response.column_headers ); */

			/* var id = '#apf-response';
			jQuery(id).html('');
			jQuery(id).append(data); */

			//resetvalues();
		},

		error: function(MLHttpRequest, textStatus, errorThrown) {
			alert(errorThrown);
		}

	});
    

}




