//DOM
// [...blablabla] pour transformer cela en liste et simplifier le travail
const touches = [...document.querySelectorAll('.bouton')];

// map() sert à prendre l'ancien tableau, lui appliquer une fonction et renvoyer un nouveau tableau contenant les nouveaux éléments
const listeKeycode = touches.map(touche => touche.dataset.key);

const ecran = document.querySelector('.ecran');

// quand on clique un clavier numérique
document.addEventListener('keydown', (e) => {
    const valeur = e.keyboardEvent.code.toString();
    calculer(valeur);
})

//quand on clique avec la souris
document.addEventListener('click', (e) => {
    const valeur = e.target.closest('.bouton').dataset.key;
    calculer(valeur);
})

let calculer = (valeur) => {
    // on élimine les touches du clavier qui ne correspondent pas à ceux de la calculatrice
    if (listeKeycode.includes(valeur)) {
        switch (valeur){
            case '8':
                ecran.textContent = "";
                break;
            case '13':
                const calcul = eval(ecran.textContent);
                ecran.textContent = calcul;
                break;
            default:
                const indexKeycode = listeKeycode.indexOf(valeur);
                const touche = touches[indexKeycode];
                ecran.textContent += touche.innerHTML;
                break;
        }
    }
}

/*window.addEventListener('error', (e) => {
    alert('Une erreur est survenue dans votre calcul, veuillez entrer un calcul valide!')
})*/