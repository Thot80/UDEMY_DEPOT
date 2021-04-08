package com.espacex.decouverte.enginsspatiaux;
import static com.espacex.decouverte.enginsspatiaux.TypeVaisseau.*;

public class VaisseauDeGuerre extends Vaisseau{

    private boolean armesDesactivees = false;

    public VaisseauDeGuerre(TypeVaisseau type){
        super(type);
        if(type == CHASSEUR){
            this.tonnageMax = 0;
            this.tonnageActuel = 0;
        }
        else if(type == FREGATE){
            this.tonnageMax = 50;
        }
        else if(type == CROISEUR){
            this.tonnageMax = 100;
        }
    }

    @Override
    public void emporterCargaison(int tonnage) throws DepassementTonnageException {
        int tonnagePotentiel = 0;

            if(this.nbPassagers < 12){
                this.tonnageActuel = 0;
                throw new DepassementTonnageException(tonnage);
            }
            else{
                tonnagePotentiel = (this.nbPassagers * 2 - this.tonnageActuel);
                if(tonnagePotentiel > this.tonnageMax ){
                    tonnagePotentiel = this.tonnageMax - this.tonnageActuel;
                   if(tonnage > tonnagePotentiel){
                       int tonnageEnExces = tonnage - tonnagePotentiel;
                       throw new DepassementTonnageException(tonnageEnExces);
                   }
                   else{
                       this.tonnageActuel += tonnage;
                   }
                }
                else{
                    if(tonnage > tonnagePotentiel ){
                        int tonnageEnExces = tonnage - tonnagePotentiel;
                        throw new DepassementTonnageException(tonnageEnExces);
                    }
                    else{
                        this.tonnageActuel += tonnage;
                    }
                }
            }
        }


    public void attaque(Vaisseau cible, String arme, int duree) {

        if (this.armesDesactivees) {
            System.out.println("Attaque impossible, l'armement est désactivé");
        } else {
            System.out.println("Un vaisseau de type " + this.type.nom + " attaque un vaisseau de type " + cible.type.nom + " en utilisant l'arme " + arme + " pendant " + duree + " minutes");
            cible.resistanceDuBouclier = 0;
            cible.blindage = cible.blindage / 2;
        }
    }

    public void desactiverArmes(){

            this.armesDesactivees = true;
            System.out.println("Désactivation des armes d'un vaisseau de type "+this.type.nom+".");

    }

    public void activerArmes(){

        this.armesDesactivees = false;
        System.out.println("Activation des armes d'un vaisseau de type "+this.type.nom+".");
    }

    public void activerBouclier(){
        this.desactiverArmes();
        System.out.println("Activation du bouclier d'un vaisseau de type " +this.type.nom);
    }
}
