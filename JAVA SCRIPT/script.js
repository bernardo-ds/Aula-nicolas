function soma(){
    let n1 = Number (document.getElementById("n1").value)
    let n2 = Number (document.getElementById("n2").value)
    alert("Esta soma é igual a: " +n1+n2)
}   
function multiplicacao(){
    let n1 = Number (document.getElementById("n1").value)
    let n2 = Number (document.getElementById("n2").value)
    alert("Esta multiplicação é igual a: " +n1*n2)
}   
function subtrair(){
    let n1 = Number (document.getElementById("n1").value)
    let n2 = Number (document.getElementById("n2").value)
    alert("Esta subtração é igual a: " +  n1-n2)
}   
function divisao(){
    let n1 = Number (document.getElementById("n1").value)
    let n2 = Number (document.getElementById("n2").value)

    if(n1 == 0 || n2 == 0){
    alert("Não é possivel fazer divisao por ZERO")
    }
    else{
        alert("Esta divisao é igual a: " +  n1/n2)
    }
}   