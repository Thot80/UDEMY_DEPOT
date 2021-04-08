package com.espacex.decouverte.enginsspatiaux;

public class DepassementTonnageException extends Exception{

    public int tonnageEnExces;

     DepassementTonnageException(int tonnageEnExces){
         super("La cargaison ne peut être chargée car elle présente un excés de "+tonnageEnExces);
        this.tonnageEnExces = tonnageEnExces;
    }

    public int getTonnageEnExces() {
        return tonnageEnExces;
    }
}
