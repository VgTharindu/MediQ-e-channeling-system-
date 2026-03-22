var w =1200;
var st;
var n=100;

function start(){
    clearTimeout(st);
    document.getElementById("su").style.width = w+"px";
    document.getElementById("su").innerHTML = n;
    w=w-1;
    n= Math.round(w/12);
    if(w==0){
        clearTimeout(st);
    }
    else{
        st=setTimeout(start,20);
    }
    document.getElementById("de").style.visibility="visible"
    document.getElementById("re").style.visibility="hidden";


    if(n>66){
        document.getElementById("su").style.color="red";
    }
    else if(n>=31){
        document.getElementById("su").style.color="orange";
    }
    else{
        document.getElementById("su").style.color="green";
    }
}

function stop(){
    clearTimeout(st);
    document.getElementById("de").style.visibility="hidden";

    if(n>66){
        document.getElementById("re").style.visibility="visible";
        document.getElementById("re").innerHTML="Your Lugns are Weak!";
        document.getElementById("re").style.color="red";
    }
    else if(n>=31){
        document.getElementById("re").style.visibility="visible";
        document.getElementById("re").innerHTML="Your Lungs are Ok!";
        document.getElementById("re").style.color="green";
    }
    else{
        document.getElementById("re").style.visibility="visible";
        document.getElementById("re").innerHTML="Your Lungs are Excellant!";
        document.getElementById("re").style.color="green";
    }

    document.getElementById("bu").style.visibility="visible";

}

function reset(){
    w=1200;
    document.getElementById("su").style.width = w+"px";
    document.getElementById("su").innerHTML = "";
    document.getElementById("bu").style.visibility="hidden";
    document.getElementById("de").style.visibility="hidden";
    document.getElementById("re").style.visibility="hidden";

    
    clearTimeout(st);

}