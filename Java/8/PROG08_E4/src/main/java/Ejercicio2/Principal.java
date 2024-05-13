package Ejercicio2;

import java.util.Arrays;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) {
        Integer[] numeros = {1, 2, 3, 4, 5};

        intercambiar<Integer> intercambiador = new intercambiar<>(numeros);

        System.out.println("Arreglo original: " + Arrays.toString(numeros));

        intercambiador.intercambiable(numeros, 1, 3);

        System.out.println("Arreglo intercambiado: " + Arrays.toString(numeros));
    }
}
