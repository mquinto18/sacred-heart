"use strict";

let nav = document.querySelector("#navbar");

document.addEventListener("DOMContentLoaded", ()=>{
	window.addEventListener("scroll", ()=>{
		if (window.scrollY > 50) {
			nav.classList.add("fixed-top");

			// add padding top to show content behind navbar
			let navbar_height = document.querySelector(".navbar").offsetHieght;
			document.body.style.paddingTop = navbar_height + "px";
		}else{
			nav.classList.remove("fixed-top");

			//remove padding from the body
			document.body.style.paddingTop = "0";
		}
	});	
});