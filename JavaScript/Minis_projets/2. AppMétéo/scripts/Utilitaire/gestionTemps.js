const joursSemaine = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];

// On initialise la date du jour
let ajd = new Date();

// Initialisation d'un objet d'options à passer en argument de la méthode de convertion/formatage de la date
let options = {weekday: 'long'};

let jourActuel = ajd.toLocaleDateString('fr-FR', options);

let jourSemaineEnOrdre = joursSemaine.slice(joursSemaine.indexOf(jourActuel)).concat(joursSemaine.slice(0, joursSemaine.indexOf(jourActuel)));

// On exporte ce résultat et on l'importe dans le main.js
export default jourSemaineEnOrdre;