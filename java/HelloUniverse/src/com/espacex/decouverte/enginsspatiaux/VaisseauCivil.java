package com.espacex.decouverte.enginsspatiaux;
import static com.espacex.decouverte.enginsspatiaux.TypeVaisseau.*;

public class VaisseauCivil extends Vaisseau {

    public VaisseauCivil(TypeVaisseau type){
        super(type);
        if(type == CARGO){
            this.tonnageMax = 500;
        }
        else if(type == VAISSEAUMONDE){
            this.tonnageMax = 2000;
        }
    }
    @Override
    public void emporterCargaison(int tonnage) throws DepassementTonnageException {
        int tonnagePotentiel = this.tonnageMax - this.tonnageActuel;
        if(tonnage > tonnagePotentiel){
            int tonnageEnExces = tonnage - tonnagePotentiel;
            throw new DepassementTonnageException(tonnageEnExces);
        }
        else{
            this.tonnageActuel += tonnage;
        }
    }
}
