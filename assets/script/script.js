document.body.onload = function() {
    nbr = 3;
    p = 0;
    container = document.getElementById("container");
    left = document.getElementById("left");
    right = document.getElementById("right");
    container.style.width = (1200 * nbr) + "px";
    for (i = 1; i <= nbr; i++) {
        div = document.createElement("div");
        div.className = "photo";
        div.style.backgroundImage = "url('../assets/image/im" + i + ".jpg')";
        container.appendChild(div);
    }
    afficherMasquer();

    // Ajoutez le code pour le défilement automatique ici
    var autoSlideInterval = setInterval(function() {
        if (p > -nbr + 1) {
            p--;
            container.style.transform = "translate(" + p * 1200 + "px)";
            container.style.transition = "all 1s ease";
            afficherMasquer();
        }
    }, 5000); // Changez 3000 selon l'intervalle souhaité (en millisecondes)

    right.onclick = function() {
        clearInterval(autoSlideInterval); // Arrêtez le défilement automatique lorsque vous cliquez sur le bouton droit

        if (p > -nbr + 1) {
            p--;
            container.style.transform = "translate(" + p * 1200 + "px)";
            container.style.transition = "all 1s ease";
            afficherMasquer();
        }
    }

    left.onclick = function() {
        clearInterval(autoSlideInterval); // Arrêtez le défilement automatique lorsque vous cliquez sur le bouton gauche
        
        if (p < 0) {
            p++;
            container.style.transform = "translate(" + p * 1200 + "px)";
            container.style.transition = "all 1s ease";
            afficherMasquer();
        }
    }

    function afficherMasquer() {
        if (p == -nbr + 1) {
            right.style.visibility = "hidden";
        } else {
            right.style.visibility = "visible";
        }
        if (p == 0) {
            left.style.visibility = "hidden";
        } else {
            left.style.visibility = "visible";
        }
    }
}

