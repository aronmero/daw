/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio5;

import java.util.Arrays;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Contenedor<T> {

    private T[] tabla;

    public Contenedor(T[] tabla) {
        this.tabla = tabla;
    }

    void insertarFinal(T elem) {
        tabla = Arrays.copyOf(tabla, tabla.length + 1);
        tabla[tabla.length - 1] = elem;
    }

    void insertarAlPrincipio(T elem) {
        tabla = Arrays.copyOf(tabla, tabla.length + 1);
        System.arraycopy(tabla, 0, tabla, 1, tabla.length - 1);
        tabla[0] = elem;
    }

    T extraerFinal() {
        T exraido = null;
        if (tabla.length > 0) {
            exraido = tabla[tabla.length - 1];
            tabla = Arrays.copyOf(tabla, tabla.length - 1);
            return exraido;//Devuelve el elemento eliminado
        }
        return exraido;
    }

    T extraerAlPrincipio() {
        T exraido = null;
        if (tabla.length > 0) {
            exraido = tabla[0];
            tabla = Arrays.copyOf(tabla, tabla.length - 1);
        }
        return exraido;
    }
    
    void ordenar() {
        Arrays.sort(tabla);
    }

    @Override
    public String toString() {
        return "Contenedor{" + "tabla=" + tabla + '}';
    }
    
    
}
