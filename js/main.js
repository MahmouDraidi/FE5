function Prof_editProf() {

document.getElementById("BD").style.boxShadow="0px 0px 20px red";

    document.getElementById("userSex").style.boxShadow="0px 0px 20px red";

    document.getElementById("job").style.boxShadow="0px 0px 20px green";
    document.getElementById("job").disabled=false;
    document.getElementById("email").style.boxShadow="0px 0px 20px green";
    document.getElementById("email").disabled=false;
    document.getElementById("mobile").style.boxShadow="0px 0px 20px green";
    document.getElementById("FB").style.boxShadow="0px 0px 20px green";
    document.getElementById("FB").disabled=false
    document.getElementById("mobile").style.boxShadow="0px 0px 20px green";
    document.getElementById("mobile").disabled=false;
    document.getElementById("PW1").style.boxShadow="0px 0px 20px green";
    document.getElementById("PW1").disabled=false;
    document.getElementById("PW2").style.boxShadow="0px 0px 20px green";
    document.getElementById("PW2").disabled=false;
    document.getElementById("hell").disabled=false;
    bnom.style.boxShadow="0px 0px 20px green";
    city.style.boxShadow="0px 0px 20px green";
    hell.style.boxShadow="0px 0px 20px green";
    bnom.disabled=false;
    city.disabled=false;
    PW1_div.style.display="block";
    PW2_div.style.display="block";
    UpImage.style.display="block";


    editButton.style.display="block";
    cancel.style.display="block";





}



var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}

function fun(num){
    var x=document.getElementById("regSpan");
    if(num==0){
        x.style.display="none";
    }
    else {x.style.display="block";}
}
window.onclick = function(event) {
    if (event.target == regSpan) {
        regSpan.style.display = "none";

    }
}


var prevScrollpos = window.pageYOffset;
var e = document.getElementById("hhh");
var height = getStyle(e, 'height');
window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("hhh").style.top = "0";
        } else {
            document.getElementById("hhh").style.top ="-"+height;
        }
        prevScrollpos = currentScrollPos;
    }


 function theme() {
    var html = document.getElementsByTagName('html')[0];
    html.style.cssText = "--main-site-col: tomato";
}



