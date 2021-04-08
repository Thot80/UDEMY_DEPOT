package com.espacex.decouverte.enginsspatiaux;

public abstract class Vaisseau {

    final public TypeVaisseau type;
    public int nbPassagers;
    public int blindage;
    public int resistanceDuBouclier;
    public int tonnageMax;
    protected int tonnageActuel;

    Vaisseau(TypeVaisseau type){
        this.type = type;
    }

    public void activerBouclier(){
        System.out.println("Activation du bouclier d'un vaisseau de type " +this.type.nom);
    }

    public void desactiverBouclier(){
        System.out.println("Désactivation du bouclier d'un vaisseau de type "+this.type.nom);
    }

    public abstract void emporterCargaison(int tonnage) throws DepassementTonnageException;

    public int getTonnageActuel() {
        return tonnageActuel;
    }

    public int getTonnageMax() {
        return tonnageMax;
    }
}
