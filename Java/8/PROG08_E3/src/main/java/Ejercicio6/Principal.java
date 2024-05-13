package Ejercicio6;

import java.util.Scanner;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) {
        Pila<Integer> pila = new Contenedor<>(new Integer[0]);
        Scanner teclado = new Scanner(System.in);
        System.out.println("Introducir entero positivo(-1 para terminar):");
        Integer numero = teclado.nextInt();
        while (numero != -1) {
            pila.apilar(numero);
            System.out.println("Introducir entero positivo(-1 para terminar):");
            numero = teclado.nextInt();
        }

        System.out.println("Desapilamos");
        numero = pila.desapilar();
        while (numero != null) {
            System.out.print(numero + " ");
            numero = pila.desapilar();
        }

    }
}
