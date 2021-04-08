package com.espacex.decouverte.objetsastro;

import com.espacex.decouverte.enginsspatiaux.Vaisseau;
import com.espacex.decouverte.enginsspatiaux.VaisseauDeGuerre;

public class PlaneteTellurique extends Planete implements Habitable {

    public Vaisseau[][] vaisseauxAccostes;
    public int totalVisiteurs = 0;

    public PlaneteTellurique(String nom, int tailleBaie) {
        super(nom);
        this.vaisseauxAccostes = new Vaisseau[2][tailleBaie];
    }

    public boolean restePlaceDisponible(Vaisseau vaisseau) {

        if (vaisseau instanceof VaisseauDeGuerre) {
            for (int i = 0; i < this.vaisseauxAccostes[0].length; i++) {

                if (this.vaisseauxAccostes[0][i] == null) {
                    return true;
                }
            }
            return false;
        } else {
            for (int i = 0; i < this.vaisseauxAccostes[1].length; i++) {

                if (this.vaisseauxAccostes[1][i] == null) {
                    return true;
                }
            }
            return false;
        }
    }

    public void accueillirVaisseaux(Vaisseau... nouveauxVaisseaux) {

        for (int i = 0; i < nouveauxVaisseaux.length; i++) {
            if (nouveauxVaisseaux[i] instanceof VaisseauDeGuerre) {
                ((VaisseauDeGuerre) nouveauxVaisseaux[i]).desactiverArmes();
                for (int j = 0; j < this.vaisseauxAccostes[0].length; j++) {
                    if (vaisseauxAccostes[0][j] == null) {
                        vaisseauxAccostes[0][j] = nouveauxVaisseaux[i];
                        this.totalVisiteurs += nouveauxVaisseaux[i].nbPassagers;
                        break;
                    }
                }
            } else {
                for (int j = 0; j < this.vaisseauxAccostes[1].length; j++) {
                    if (vaisseauxAccostes[1][j] == null) {
                        vaisseauxAccostes[1][j] = nouveauxVaisseaux[i];
                        this.totalVisiteurs += nouveauxVaisseaux[i].nbPassagers;
                        break;
                    }
                }
            }
        }
    }
}
