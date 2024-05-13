/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

import java.util.Arrays;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public abstract class CuentaCorriente extends CuentaBancaria{
    protected String[] entidadesAutorizadas;
    
    public CuentaCorriente(String iban, double saldo, Persona titular) {
        super(iban, saldo, titular);
        entidadesAutorizadas  = new String[0];
    }

    
    public boolean autorizarEntidad(String entidad){
        if(!isAutorizado(entidad)){
            entidadesAutorizadas = Arrays.copyOf(entidadesAutorizadas, entidadesAutorizadas.length+1);
            entidadesAutorizadas[entidadesAutorizadas.length-1]=entidad;
        }
        return false;    
    }
    
    private boolean isAutorizado(String entidad){
        for (String entidadAutorizada : entidadesAutorizadas) {
            if(entidad.equals(entidadAutorizada)){
                 return true;
            } 
        }
        return false;
    }
    
    void listarAutorizados(){
        for (String entidadAutorizada : entidadesAutorizadas) {
            System.out.println(entidadAutorizada);
        }
    }
}
