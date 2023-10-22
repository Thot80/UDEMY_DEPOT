import jourSemaineEnOrdre from './Utilitaire/gestionTemps.js';

const APIKEY = "";
let resultatsAPI;
// Sélection de nos classes HTML pour y afficher nos données API
const temps = document.querySelector('.temps');
const temperature = document.querySelector('.temperature');
const localisation = document.querySelector('.localisation');
const heureNom = document.querySelectorAll('.heure-nom-prevision');
const heureTemp = document.querySelectorAll('.heure-prevision-valeure');
const jourNom = document.querySelectorAll('.jour-prevision-nom');
const jourTemp = document.querySelectorAll('.jour-prevision-temp');
const imgIcone = document.querySelector('.logo-meteo');
const chargementContainer = document.querySelector('.overlay-icon-chargement');


if(navigator.geolocation){

    navigator.geolocation.getCurrentPosition(position => {

        let long = position.coords.longitude;
        let lat = position.coords.latitude;
        AppelAPI(long, lat);
    }, () => {
        alert('Notre application ne peut pas fonctionner sans géolocalisation, veuillez activer votre géolocalisation')
    })
}


function AppelAPI(long, lat){

    // fetch nous permet de faire des requêtes HTTP pour récupérer des données, retourne une promesse
    fetch(`https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${long}&exclude=minutely&units=metric&lang=fr&appid=${APIKEY}`)
    .then((reponse) => {
        return reponse.json();
    })
    .then((data) => {
        
        // On stock le résultat de notre requête API
        resultatsAPI = data;

        // On affiche la description météo rendue par l'API
        temps.innerText = resultatsAPI.current.weather[0].description;
        // On affiche la température arrondie
        temperature.innerText = Math.round(resultatsAPI.current.temp) + ' °C';
        // On affiche la localisation
        localisation.innerText = resultatsAPI.timezone;

        // Affichage des heures par tranches de 3 heures
        let heureActuelle = new Date().getHours();
        
        for(let i = 0; i < heureNom.length; i++)
        {
            let heureIncr = heureActuelle + i * 3;
            if(heureIncr >= 24)
            {
                heureNom[i].innerText = `${heureIncr - 24} h`;
            }
            else
            {
                heureNom[i].innerText = `${heureIncr} h`;
            }
        }

        // Affichage des températures par tranches de 3h
        for(let i = 0; i < heureTemp.length; i++)
        {
            heureTemp[i].innerText = `${Math.round(resultatsAPI.hourly[i * 3].temp)} °C`;
        }
        // Affichage des jours de la semaine
        for(let i = 0; i < jourNom.length; i++)
        {
            jourNom[i].innerText = jourSemaineEnOrdre[i];
        }

        // Affichage des températures de la semaine
        for(let i = 0; i < jourTemp.length; i++)
        {
            jourTemp[i].innerText = `${Math.round(resultatsAPI.daily[i].temp.day)} °C`;
        }

        
        // Icone dynamique
        if(Date.now()/1000 >= resultatsAPI.current.sunrise && Date.now()/1000 < resultatsAPI.current.sunset)
        {
            imgIcone.src = `ressources/jour/${resultatsAPI.current.weather[0].icon}.svg`;
        }
        else
        {
            imgIcone.src = `ressources/nuit/${resultatsAPI.current.weather[0].icon}.svg`;
        }

        chargementContainer.classList.add('disparition');
    })
}

