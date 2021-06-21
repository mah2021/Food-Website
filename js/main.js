$(document).ready(function(){

    $('#menu-bar').click(function(){
        $(this).toggleClass('fa-times');
        $('.navbar').toggleClass('nav-toggle');
    });
})


function  myfunction(){
    var x=document.getElementById("myInput");
    var y=document.getElementById("hide1");
    var z=document.getElementById("hide2");

    if(x.type === 'password'){
        x.type = "text";
        y.style.display = "block";
        z.style.display ="none";
    }
    else{
        x.type = "password";
        y.style.display = "none";
        z.style.display ="block";
    }
}


function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
}