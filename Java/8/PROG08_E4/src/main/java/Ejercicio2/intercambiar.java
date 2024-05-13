package Ejercicio2;

import java.util.Arrays;

/**
 *
 * @author Aarón Medina Rodríguez
 */
/**
 *
 * Nivel intermedio - Crear un método genérico "intercambiar": Diseña un método
 * genérico llamado "intercambiar" que acepte un arreglo genérico y dos índices.
 * El método debe intercambiar los elementos en las posiciones dadas por los
 * índices en el arreglo. El método debe ser aplicable a cualquier tipo de
 * arreglo.
 */
public class intercambiar<T> {

    private T[] tabla;

    public intercambiar(T[] tabla) {
        this.tabla = tabla;
    }


    void intercambiable(T[] arreglo, int indice1, int indice2) {
        T auxiliar = arreglo[indice1];
        arreglo[indice1] = arreglo[indice2];
        arreglo[indice2] = auxiliar;
    }

}
