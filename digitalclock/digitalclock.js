setInterval(showTime, 1000);

function showTime() {
    let time = new Date();
    let hour = time.getHours();
    let minutes = time.getMinutes();
    let secondes = time.getSeconds();

    // ajouter un 0 si l'horloge n'affiche qu'un chiffre
    if(hour < 10) {
        hour = "0" + hour;
    }
    if(minutes < 10) { 
        minutes = "0" + minutes;
    }
    if(secondes < 10) {
        secondes = "0" + secondes;
    }

    document.getElementById("clock").innerHTML = hour + ":" + minutes + ":" + secondes ;
}

showTime();