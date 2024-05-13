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
public class CuentaCorrientePersonal extends CuentaCorriente {

    protected double comisionMantenimiento;

    public CuentaCorrientePersonal(double comisionMantenimiento, String iban, double saldo, Persona titular) {
        super(iban, saldo, titular);
        this.comisionMantenimiento = comisionMantenimiento;
    }

    @Override
    boolean retirarDinero(Double cantidad) {
        if ((cantidad+comisionMantenimiento) < getSaldo()) {
            super.setSaldo(getSaldo() - cantidad - comisionMantenimiento);
            return true;
        } else {
            return false;
        }
    }

    @Override
    public String devolverInfoString() {
        return super.devolverInfoString() + "comisionMantenimiento=" + comisionMantenimiento;
    }

}
