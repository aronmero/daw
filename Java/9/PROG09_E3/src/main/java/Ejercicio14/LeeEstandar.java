package Ejercicio14;

import java.io.*;

/**
 *
 * @author Aarón Medina Rodríguez
 */
/*
Hacer un programa que lee por teclado hasta pulsar la tecla de retorno, en ese momento el programa acabará imprimiendo por la salida estándar la cadena leída.

Para ir construyendo la cadena con los caracteres leídos podríamos usar la clase StringBuffer o la StringBuilder. 
La clase StringBuffer permite almacenar cadenas que cambiarán en la ejecución del programa. 
StringBuilder es similar, pero no es síncrona. De este modo, para la mayoría de las aplicaciones,
donde se ejecuta un solo hilo, supone una mejora de rendimiento sobre StringBuffer.

El proceso de lectura ha de estar en un bloque try..catch.
 */
public class LeeEstandar {

    public static void main(String[] args) {
        //Cadena para almacenar los caracteres
        StringBuilder cadena = new StringBuilder();
        char caracter;

        try {
            //Mientras que la entrada de teclado no sea Intro
            while ((caracter = (char) System.in.read()) != '\n') {
                //Anadir el caracter leido a la cadena
                cadena.append(caracter);
            }

        } catch (IOException ex) {
            System.out.println(ex);
        }
        System.out.println(cadena);
    }
}
