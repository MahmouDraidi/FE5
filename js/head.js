
function myFunction(x) {
    x.classList.toggle("change");

    var e = document.getElementById("sss");
    var marLeft = getStyle(e, 'margin-left');

    if(marLeft=="-100px") {
        sss.style.marginLeft = "0px";
        document.getElementById("bar1").style.backgroundColor="red";
        document.getElementById("bar3").style.backgroundColor="red";
        document.getElementById("bar1").style.boxShadow="0px 0px 20px white";
        document.getElementById("bar3").style.boxShadow="0px 0px 20px white";




    }
    else if(marLeft=="0px"){
        sss.style.marginLeft = "-100px";
        document.getElementById("bar1").style.backgroundColor="";
        document.getElementById("bar3").style.backgroundColor="";
        document.getElementById("bar1").style.boxShadow="";
        document.getElementById("bar3").style.boxShadow="";


    }
}


var getStyle = function (e, styleName) {
    var styleValue = "";
    if(document.defaultView && document.defaultView.getComputedStyle) {
        styleValue = document.defaultView.getComputedStyle(e, "").getPropertyValue(styleName);
    }
    else if(e.currentStyle) {
        styleName = styleName.replace(/\-(\w)/g, function (strMatch, p1) {
            return p1.toUpperCase();
        });
        styleValue = e.currentStyle[styleName];
    }
    return styleValue;
}

function showMenu() {
    var x=document.getElementById("imgdiv")
    x.style.display="block";
    sss.style.backgroundColor="black";
}
function hideMenu(x) {
    x.style.display="none"
}