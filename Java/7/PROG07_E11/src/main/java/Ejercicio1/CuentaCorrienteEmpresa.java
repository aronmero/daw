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
public class CuentaCorrienteEmpresa extends CuentaCorriente {

    private double tipoInteres, maxDescubierto;
    private double comisionDescubierto;

    public CuentaCorrienteEmpresa(double tipoInteres, double maxDescubierto, double comisionDescubierto, String iban, double saldo, Persona titular) {
        super(iban, saldo, titular);
        this.tipoInteres = tipoInteres;
        this.maxDescubierto = maxDescubierto;
        this.comisionDescubierto = comisionDescubierto;
    }

    @Override
    boolean retirarDinero(Double cantidad) {
        if (cantidad < getSaldo()) {
            setSaldo(getSaldo() - cantidad);
            return true;
        } else if ((cantidad + comisionDescubierto) < maxDescubierto && maxDescubierto > Math.abs(getSaldo())) {
            setSaldo(getSaldo() - cantidad - comisionDescubierto);
            return true;
        } else {
            return false;
        }
    }

    @Override
    public String devolverInfoString() {
        return super.devolverInfoString() + ", tipoInteres=" + tipoInteres + ", maxDescubierto=" + maxDescubierto + ", comisionDescubierto=" + comisionDescubierto;
    }

}
