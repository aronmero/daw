/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class CuentaAhorro extends CuentaBancaria {

    protected double tipoInteres;

    public CuentaAhorro(double tipoInteres, String iban, double saldo, Persona titular) {
        super(iban, saldo, titular);
        this.tipoInteres = tipoInteres;
    }

    @Override
    boolean retirarDinero(Double cantidad) {
        if (cantidad < getSaldo()) {
            super.setSaldo(actualizarSaldo() - cantidad);
            return true;
        } else {
            return false;
        }
    }

    @Override
    public String devolverInfoString() {
        return super.devolverInfoString() + ", tipoInteres=" + tipoInteres;
    }
    
    private double actualizarSaldo(){
        return getSaldo()*(1+tipoInteres/100);
        
    }
    
}
