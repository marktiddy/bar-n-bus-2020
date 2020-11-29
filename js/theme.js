'use strict';

//Themes Javascript goes in here!
var menuDropdown = document.querySelectorAll('.menu-item-has-children');

if (menuDropdown) {
  menuDropdown.forEach(function (item) {
    item.addEventListener('mouseover', function () {
      item.click();
    });
  });
}

console.log('hello');
$(document).ready(function () {
  $('.dropdown').hover(function () {
    var dropdownMenu = $(this).children('.dropdown-menu');

    if (dropdownMenu.is(':visible')) {
      dropdownMenu.parent().toggleClass('open');
    }
  });
});
