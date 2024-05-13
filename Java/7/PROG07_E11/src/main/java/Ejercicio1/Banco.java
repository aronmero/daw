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
public class Banco {
    
    private static CuentaBancaria cuentas[] = new CuentaBancaria[100];
    private static int numeroCuentas;
    
    public Banco() {
    }
    
    boolean abrirCuenta(CuentaBancaria cuenta) {

        //Comprueba si el banco puede añadir una cuenta nueva
        if (numeroCuentas < cuentas.length - 1) {
            //Comprueba si no existe esa cuenta
            if (!existeCuenta(cuenta.getIban())) {
                cuentas[numeroCuentas] = cuenta;
                numeroCuentas++;
                return true;
            }
        }
        return false;
    }
    
    void listadoCuentas() {
        for (CuentaBancaria cuenta : cuentas) {
            if (cuenta != null) {
                System.out.println(cuenta.devolverInfoString());
            }
        }
    }
    
    String informacionCuenta(String iban) {
        if (existeCuenta(iban)) {
            int posicionCuenta = posicionCuenta(iban);
            
            return cuentas[posicionCuenta].devolverInfoString();
            
        }
        
        return null;
    }
    
    boolean ingresoDineroCuenta(double cantidad, String iban) {
        if (existeCuenta(iban)) {
            int posicionCuenta = posicionCuenta(iban);
            cuentas[posicionCuenta].ingresar(cantidad);
            return true;
            
        }
        return false;
    }
    
    double obtenerSaldo(String iban) {
        if (existeCuenta(iban)) {
            int posicion = posicionCuenta(iban);
            return cuentas[posicion].getSaldo();
        }
        return 0;
    }
    
    boolean retiradaDineroCuenta(double cantidad, String iban) {
        if (existeCuenta(iban)) {
            for (CuentaBancaria cuenta : cuentas) {
                if (cuenta != null && iban.equals(cuenta.getIban())) {
                    return cuenta.retirarDinero(cantidad);
                }
            }
        }
        return false;
    }

    //Busca si existe la cuenta introducida
    boolean existeCuenta(String iban) {
        for (CuentaBancaria cuenta : cuentas) {
            if (cuenta != null && iban.equalsIgnoreCase(cuenta.getIban())) {
                return true;
            }
            
        }
        return false;
    }

    //Busca la posicion de la cuenta introducida en el array cuentas
    private int posicionCuenta(String iban) {
        for (int i = 0; i < cuentas.length; i++) {
            if (cuentas[i] != null && iban.equals(cuentas[i].getIban())) {
                return i;
            }
            
        }
        return -1;
    }
    
    boolean autorizarEntidad(String iban, String entidad) {
        int posicion = posicionCuenta(iban);
        if (cuentas[posicion] instanceof CuentaCorriente) {
            CuentaCorriente cuentaCorriente = (CuentaCorriente) cuentas[posicion];
            return cuentaCorriente.autorizarEntidad(entidad);
        }
        return false;
    }
    
    void listarEntidadesAutorizadas(String iban) {
        int posicion = posicionCuenta(iban);
        if (cuentas[posicion] instanceof CuentaCorriente) {
            CuentaCorriente cuentaCorriente = (CuentaCorriente) cuentas[posicion];
            cuentaCorriente.listarAutorizados();
        }
    }
    
    boolean modificarIban(String iban, String nuevoIban) {
        if (existeCuenta(iban) && !existeCuenta(nuevoIban)) {
            int posicion = posicionCuenta(iban);
            cuentas[posicion].setIban(nuevoIban);
            return true;
        }        
        return false;
    }
    
    boolean modificarNombre(String iban, String nuevoNombre) {
        if (existeCuenta(iban)) {
            int posicion = posicionCuenta(iban);
            cuentas[posicion].modificarNombre(nuevoNombre);
            return true;
        }        
        return false;
    }
    
}
