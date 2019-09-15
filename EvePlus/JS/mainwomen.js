
var welcome= document.querySelector("#submit");
var input= document.querySelector("#inputt");
var welcome= document.querySelector("#h6");



welcome.addEventListener("click",function clic(){

    alert("Welcome");
});


input.addEventListener("change",function(){

       welcome.textContent=input.value;
   


});


