package com.espacex.decouverte.objetsastro;

public abstract class Planete implements Comparable {

    public static String forme = "Sphérique";
    public static int nbPlanetesDecouvertes = 0;
    public float distanceEtoile;

    public String nom;
    public long diametre;
    public Atmosphere atmosphere = new Atmosphere();

    Planete(String nom){
        this.nom = nom;
        nbPlanetesDecouvertes++;
    }

    public static String expansion(double distance){
        if(distance < 14){
            return "Oh la la mais c'est super rapide !";
        }
        else{
            return "Je rêve ou c'est plus rapide que la lumière ?";
        }
    }

    final public int rotation(int angle){
       return angle/360;
    }

    final public int revolution(int angle){
        return angle/360;
    }


    public int compareTo(Object o) {
        Planete autrePlanete = (Planete)o;
       if( this.distanceEtoile == autrePlanete.distanceEtoile )
            return 0;
       if( this.distanceEtoile > autrePlanete.distanceEtoile)
           return 1;
       return -1;
    }
}

