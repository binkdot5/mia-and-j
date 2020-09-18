(function() {
	"use strict";
// console.log("the self executing annonymous function says hi.");

var cookieTitles = document.querySelectorAll(".wc-title");
var searchBtn = document.querySelector(".searchbtnMob");
var searchModal = document.querySelector(".searchModal");
var closeBtn = document.querySelector(".closeBtn");
var maBtn = document.querySelector(".ma-menuBtn");
var maNav = document.querySelector(".woocommerce-MyAccount-navigation.position-fixed");
var maExit = document.querySelector("html");

function alterHeadings () {
    for (var i=0; i < cookieTitles.length; i++) {
        var text = cookieTitles[i].innerHTML;
        var digits = text.slice(3, 175);
        cookieTitles[i].innerHTML = digits;
    }
}

function mobSearch() {
    searchModal.classList.toggle('modalActive');
    searchModal.classList.toggle('fade-in');
}

function closeSearch() {
    searchModal.classList.remove("modalActive");
}

function openMenu() {
    maNav.classList.toggle("modalActive");
    event.stopPropagation();
}

function closeMenu() {
    maNav.classList.remove("modalActive");
}


window.addEventListener("DOMContentLoaded", alterHeadings, false);
searchBtn.addEventListener("click", mobSearch, false);
closeBtn.addEventListener("click", closeSearch, false);
maBtn.addEventListener("click", openMenu, false);
maExit.addEventListener("click", closeMenu, false);


})();