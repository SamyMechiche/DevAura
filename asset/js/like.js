const arrayFav = document.querySelectorAll('.unfav'); // Récuperation de tout les elements qui ont la class unfav | renvoie un tableau


arrayFav.forEach(fav => { // Boucle le tableau de résultat (arrayFav)
    fav.addEventListener('click', function (){ // Au click = function
        const dataId = this.dataset.id; // Création d'une constante qui recupere l'id du post pour chaques Fav cliqués
        const sumFav = document.getElementById('post-' + dataId); // Récupere l'id du span dans lequel on affiche le compteur

        fetch('/DevAura/fav/' + dataId, { // Envoyer la route qui contient l'id du post
            method: 'GET',
            
        })
        .then(response => response.json()) // Demandes à JavaScript de récupérer une réponse du serveur et de la convertir en objet JavaScript à partir du format JSON 
        .then(data => { // Renvoie ça {success: true, countFav: 4, isLike: true}
            let countFav = data.countFav; // Récurere uniquement le countFav qui est dans data
            sumFav.textContent = countFav; // On met sa valeur dans le texte du span (sumFav)
            
            if(data.isLike === true){

                fav.classList.add('red');
                
            } else {
                fav.classList.remove('red');
            }
        })

    })
})