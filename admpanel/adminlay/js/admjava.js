//Astrisk Beside Require Input
$(function () {
	'use strict';
	//Add Asterisk
	$('input').each(function () {
		if ($(this).attr('required') === 'required'){
			$(this).after('<span class="asterisk">*</span>');
		}

	});

//Show PAssword
var passField = $('.password');
$('.show-password').hover(function () {
	passField.attr('type','text');
	}, function () {
		passField.attr('type','password');


		});
//Confirm Delete Member Button
$('.confirm').click(function () {
	return confirm('Are You Sure To Delete Thi\'s Member ?');

});
// Confirm Activate Thi's Member
$('.confirm-a').click(function () {
	return confirm('Are You Sure To Activate Thi\'s Member ?');

});
//Confirm Delete Categories
$('.confirm-cate').click(function () {
	return confirm('Are You Sure To Delete Thi\'s Category ?');

});
//Confirm Delete Items
$('.confirm-item').click(function () {

	return confirm('Are You Sure To Delete This\'s Item ?');
});
//Confirm Approve Items
$('.approve-item').click(function () {

	return confirm('Are You Sure To Approve Post thi\'s Item ?');
});
});

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.drop-cont')) {

    var dropdowns = document.getElementsByClassName("dropbutt");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
};
