import $ from 'jquery';

document.getElementById("menu").addEventListener("click", (eve)=>{
   let element = document.getElementById("menu");
 let nav = document.getElementById("nav");
 element.classList.toggle("open");
 nav.classList.toggle("mobile-nav");
     eve.preventDefault();
 })