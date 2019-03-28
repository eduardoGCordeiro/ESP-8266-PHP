function exibeNumeroStep(novoValor) {
    document.getElementById("number-step-configure-motor").innerHTML = novoValor;
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "http://localhost/controlMotor-ESP/controlMotor-ESP.php?config=p."+novoValor , true);
    ajax.send();
}

function exibeNumeroAngle(novoValor) {
    document.getElementById("number-angle-configure-motor").innerHTML = novoValor;
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "http://localhost/controlMotor-ESP/controlMotor-ESP.php?config=a."+novoValor , true);
    ajax.send();
}

function exibeNumeroSpeed(novoValor) {
    document.getElementById("number-speed-configure-motor").innerHTML = novoValor;
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "http://localhost/controlMotor-ESP/controlMotor-ESP.php?config=s."+novoValor , true);
    ajax.send();
}

function sendData(data)
{
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "http://localhost/controlMotor-ESP/controlMotor-ESP.php?move="+data.value , true);
    ajax.send();
}