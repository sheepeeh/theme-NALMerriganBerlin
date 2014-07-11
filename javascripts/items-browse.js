// if (!Omeka) {
//     var Omeka = {};
// }

// Omeka.ItemsBrowse = {};

// (function ($) {
//     Omeka.ItemsBrowse.setupDetails = function (detailsText, showDetailsText, hideDetailsText) {
//         $('.details').hide();
//         $('.action-links').prepend('<li class="details-link">' + detailsText + '</li> ');

//         $('div.item').each(function() {
//             var itemDetails = $(this).find('.details');
//             if ($.trim(itemDetails.html()) != '') {
//                 $(this).find('.details-link').css({'color': '#4E7181', 'cursor': 'pointer'}).click(function() {
//                     itemDetails.slideToggle('fast');
//                 });
//             }
//         });
//     };
// })(jQuery);

var state = 'none';

function showhide(layer_ref) {

if (state == 'block')
{
state = 'none';
}
else
{
state = 'block';
}
if (document.all)
{ //IS IE 4 or 5 (or 6 beta)
eval( "document.all." + layer_ref + ".style.display = state");
}
if (document.layers)
{ //IS NETSCAPE 4 or below
document.layers[layer_ref].display = state;
}
if (document.getElementById &&!document.all)
{
hza = document.getElementById(layer_ref);
hza.style.display = state;
}


}
