function bmi(){
    var weight = document.getElementById("inp1").value;
    var height = document.getElementById("inp2").value;

    let  n = parseFloat(weight)/(parseFloat(height)**2); 
    let bmi = n.toFixed(2);

    let y =19*(parseFloat(height)**2);
    let z =24*(parseFloat(height)**2);
    let y1 = y.toFixed(2);
    let z1 = z.toFixed(2);

    if(weight==""){
        document.getElementById("inp1").style.borderColor="red";
    }
    if(height==""){
        document.getElementById("inp2").style.borderColor="red";
    }

    else{
        document.getElementById("re_in").innerHTML = bmi ;

        if(n>24){
            document.getElementById("re_in2").innerHTML = "Over Weight" ;
            document.getElementById("re_in2 ").style.color = "red" ;
            document.getElementById("re_in3").innerHTML = "Keep your weight between "+y+" kg and "+z+" kg";
            document.getElementById("re_in3").style.color = "red" ;

        }
        else if(n>19){
            document.getElementById("re_in2").innerHTML = "Best Weight" ;
            document.getElementById("re_in2").style.color = "green" ;
            document.getElementById("re_in3").innerHTML = "Keep your weight between "+y1+" kg and "+z1+" kg";
            document.getElementById("re_in3").style.color = "green" ;

        }

        else if(n<19){
            document.getElementById("re_in2").innerHTML = "Lees Weight" ;
            document.getElementById("re_in2").style.color = "red" ;
            document.getElementById("re_in3").innerHTML = "Keep your weight between "+y1+" kg and "+z1+" kg";
            document.getElementById("re_in3").style.color = "red" ;
        }

        document.getElementById("re_in4").innerHTML = "18.5 kg/m2 - 25 kg/m2" ;
        document.getElementById("re_in4").style.color = "green" ;
    }
}

function clearall(){
    document.getElementById("inp1").value = "";
    document.getElementById("inp2").value = "";
    document.getElementById("re_in").innerHTML = "";
    document.getElementById("re_in2").innerHTML = "" ;
    document.getElementById("re_in3").innerHTML = "";
    document.getElementById("re_in4").innerHTML = "";

}