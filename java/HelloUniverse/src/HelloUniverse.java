import com.espacex.decouverte.enginsspatiaux.*;
import com.espacex.decouverte.objetsastro.Galaxie;
import com.espacex.decouverte.objetsastro.Planete;
import com.espacex.decouverte.objetsastro.PlaneteGazeuse;
import com.espacex.decouverte.objetsastro.PlaneteTellurique;
import com.espacex.decouverte.enginsspatiaux.DepassementTonnageException;

import java.util.InputMismatchException;
import java.util.Map;
import java.util.Scanner;

import static com.espacex.decouverte.enginsspatiaux.TypeVaisseau.*;

public class HelloUniverse {

    public static void main(String... args) {

        PlaneteTellurique mercure = new PlaneteTellurique("Mercure", 4);
        mercure.diametre = 4880;
        mercure.distanceEtoile = 57.9f;
        mercure.atmosphere.constituants.put("O2", 42f);
        mercure.atmosphere.constituants.put("Na", 29f);
        mercure.atmosphere.constituants.put("H2", 22f);

        PlaneteTellurique venus = new PlaneteTellurique("Venus", 5);
        venus.diametre = 12100;
        venus.distanceEtoile = 108.2f;
        venus.atmosphere.constituants.put("CO2", 96f);
        venus.atmosphere.constituants.put("N2", 3f);

        PlaneteTellurique terre = new PlaneteTellurique("Terre", 50);
        terre.diametre = 12756;
        terre.distanceEtoile = 149.6f;
        terre.atmosphere.constituants.put("N2", 78f);
        terre.atmosphere.constituants.put("O2", 21f);
        terre.atmosphere.constituants.put("Ar", 1f);

        PlaneteTellurique mars = new PlaneteTellurique("Mars", 20);
        mars.diametre = 6792;
        mars.distanceEtoile = 227.9f;
        mars.atmosphere.constituants.put("CO2", 95f);
        mars.atmosphere.constituants.put("N2", 3f);
        mars.atmosphere.constituants.put("Ar", 1.5f);

        PlaneteGazeuse jupiter = new PlaneteGazeuse("Jupiter");
        jupiter.diametre = 142984;
        jupiter.distanceEtoile = 778.3f;
        jupiter.atmosphere.constituants.put("H2", 90f);
        jupiter.atmosphere.constituants.put("He", 10f);

        PlaneteGazeuse saturne = new PlaneteGazeuse("Saturne");
        saturne.diametre = 120536;
        saturne.distanceEtoile = 1427.0f;
        saturne.atmosphere.constituants.put("H2", 96f);
        saturne.atmosphere.constituants.put("He", 3f);

        PlaneteGazeuse uranus = new PlaneteGazeuse("Uranus");
        uranus.diametre = 51118;
        uranus.distanceEtoile = 2877.38f;
        uranus.atmosphere.constituants.put("H2", 83f);
        uranus.atmosphere.constituants.put("He", 15f);
        uranus.atmosphere.constituants.put("CH4", 2.5f);

        PlaneteGazeuse neptune = new PlaneteGazeuse("Neptune");
        neptune.diametre = 49532;
        neptune.distanceEtoile = 4497.07f;
        neptune.atmosphere.constituants.put("H2", 80f);
        neptune.atmosphere.constituants.put("He", 19f);
        neptune.atmosphere.constituants.put("CH4", 1f);

        Galaxie systemeSolaire = new Galaxie();
        systemeSolaire.nom = "Système Solaire";
        systemeSolaire.planetes.add(mercure);
        systemeSolaire.planetes.add(neptune);
        systemeSolaire.planetes.add(venus);
        systemeSolaire.planetes.add(terre);
        systemeSolaire.planetes.add(jupiter);
        systemeSolaire.planetes.add(saturne);
        systemeSolaire.planetes.add(mars);
        systemeSolaire.planetes.add(uranus);

        System.out.println("Les planètes du système solaire (ordonnées selon leur distance au soleil) sont : ");
        for(Planete planete : systemeSolaire.planetes){
            System.out.println(planete.nom + " : " + planete.distanceEtoile +" million de km");
        }

        System.out.println("L'atmosphère de Mars est constituée de :");
        for(Map.Entry<String, Float> element : mars.atmosphere.constituants.entrySet()){
            System.out.println(element.getValue() + "% de " + element.getKey());
        }

        VaisseauDeGuerre chasseur = new VaisseauDeGuerre(CHASSEUR);
        chasseur.nbPassagers = 40;

        VaisseauDeGuerre fregate = new VaisseauDeGuerre(FREGATE);
        fregate.nbPassagers = 120;

        VaisseauDeGuerre croiseur = new VaisseauDeGuerre(CROISEUR);
        croiseur.nbPassagers = 720;

        VaisseauCivil cargo = new VaisseauCivil(CARGO);
        cargo.nbPassagers = 340;

        VaisseauCivil vaisseauMonde = new VaisseauCivil(VAISSEAUMONDE);
        vaisseauMonde.nbPassagers = 1700;

        Scanner sc = new Scanner(System.in);

        terre.accueillirVaisseaux(chasseur, chasseur, cargo);


        Vaisseau vaisseauChoisi = null;
        TypeVaisseau typeVaisseau = null;

        boolean continuer = true;
        while (continuer) {
            System.out.println("Choisissez votre vaisseau parmi : CHASSEUR / FREGATE / CROISEUR / CARGO / VAISSEAU-MONDE");
            String choixVaisseauUtilisateur = sc.nextLine();

            typeVaisseau = TypeVaisseau.valueOf(choixVaisseauUtilisateur);

            switch (typeVaisseau) {

                case CHASSEUR:
                    vaisseauChoisi = chasseur;
                    break;
                case FREGATE:
                    vaisseauChoisi = fregate;
                    break;
                case CROISEUR:
                    vaisseauChoisi = croiseur;
                    break;
                case CARGO:
                    vaisseauChoisi = cargo;
                    break;
                case VAISSEAUMONDE:
                    vaisseauChoisi = vaisseauMonde;
                    break;
                default:
                    System.out.println("Ce type de vaisseau n'existe pas");
            }
            System.out.println("Veuillez choisir une planète du système solaire (STOP pour arréter): ");
            String choixPlaneteUtilisateur = sc.nextLine();

            if (choixPlaneteUtilisateur.equalsIgnoreCase("stop")) {
                continuer = false;
                continue;
            }

            for (Planete planete : systemeSolaire.planetes) {

                if (planete.nom.equalsIgnoreCase(choixPlaneteUtilisateur)) {
                    if (planete instanceof PlaneteGazeuse) {
                        System.out.println("Cette planète est une géante gazeuse, notre technologie ne nous permet pas de nous y rendre");
                    }
                    else {
                        PlaneteTellurique planeteChoisie = (PlaneteTellurique) planete;
                        if (planeteChoisie.restePlaceDisponible(vaisseauChoisi)) {

                            planeteChoisie.accueillirVaisseaux(vaisseauChoisi);
                            boolean saisieIncorrecte = true;
                            int tonnage = 0;
                            do{
                                System.out.println("Quelle quantité de marchandise souhaitez vous embarquer");
                                try{
                                    tonnage = sc.nextInt();
                                    saisieIncorrecte = false;
                                }
                                catch (InputMismatchException ex){
                                    System.out.println("Veuillez saisir une valeur numérique");
                                }
                                finally {
                                    sc.nextLine();
                                }
                            }while (saisieIncorrecte);


                            try{
                                vaisseauChoisi.emporterCargaison(tonnage);
                            } catch (DepassementTonnageException depassementTonnageException) {
                                System.out.println(depassementTonnageException.getMessage());
                                int tonnagePotentiel =  vaisseauChoisi.getTonnageMax() - vaisseauChoisi.getTonnageActuel();
                                System.out.println("Souhaitez vous emporter une cargaison partielle à hauteur de " + tonnagePotentiel+" (oui) ou annuler l'opération (non) ?");
                                String choix = sc.nextLine();
                                if (choix.equalsIgnoreCase("oui")){
                                    try {
                                        vaisseauChoisi.emporterCargaison(tonnagePotentiel);
                                    } catch (DepassementTonnageException tonnageException) {
                                        tonnageException.printStackTrace();
                                    }
                                }
                                else{
                                    System.out.println("Opération annulée");
                                    break;
                                }
                            }

                        }
                        else {
                            System.out.println("Le vaisseau ne peut pas se poser dans la baie par manque de place disponnible");
                        }
                    }
                }
            }
        }
    }
}
