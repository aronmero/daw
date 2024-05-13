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
public abstract class CuentaBancaria implements Imprimible {

    protected String iban;
    protected double saldo;
    protected int posicionArray;

    protected Persona titular;
    protected static int numPersonas;

    public CuentaBancaria(String iban, double saldo, Persona titular) {
        this.iban = iban;
        this.saldo = saldo;
        this.posicionArray = numPersonas;

        this.titular = titular;
        numPersonas++;
    }

    abstract boolean retirarDinero(Double cantidad);
    
    public String getIban() {
        return iban;
    }
    
    public void setIban(String iban) {
        this.iban = iban;
    }
    
    public double getSaldo() {
        return saldo;
    }

    public void setSaldo(double saldo) {
        this.saldo = saldo;
    }

    public void ingresar(double saldo) {
        this.saldo = this.saldo+saldo;
    }

    @Override
    public String devolverInfoString() {
        return "iban=" + iban + ", saldo=" + saldo + titular.devolverInfoString();
    }

    public void modificarNombre(String nombre){
        titular.setNombre(nombre);
    }
}
