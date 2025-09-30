function somar() {
    let valor_1 = Number(document.getElementById('valor_1').value);
    let valor_2 = Number(document.getElementById('valor_2').value);

    let soma = valor_1 + valor_2;


    document.getElementById('resultado').innerHTML = 'Resultado da soma: ' + soma;
}

function sub() {
    let valor_1 = Number(document.getElementById('valor_1').value);
    let valor_2 = Number(document.getElementById('valor_2').value);

    let sub = valor_1 - valor_2;


    document.getElementById('resultado').innerHTML = 'Resultado da subtração: ' + sub;
}

function multi() {
    let valor_1 = Number(document.getElementById('valor_1').value);
    let valor_2 = Number(document.getElementById('valor_2').value);

    let multi = valor_1 * valor_2;

    document.getElementById('resultado').innerHTML = 'Resultado da multiplicação: ' + multi;
}

function div() {
    let valor_1 = Number(document.getElementById('valor_1').value);
    let valor_2 = Number(document.getElementById('valor_2').value);

    if (valor_2 === 0) {
        document.getElementById('resultado').innerHTML = 'Erro: Divisão por zero não é permitida.';
    } else {
        let div = valor_1 / valor_2;
        document.getElementById('resultado').innerHTML = 'Resultado da divisão: ' + div;
    }
}
