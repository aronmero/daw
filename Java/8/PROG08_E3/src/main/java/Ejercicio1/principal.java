package Ejercicio1;

import java.util.Arrays;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class principal {

    
    static <E> E[] guardar(E elem, E[] tabla) {
        E[] nuevaTabla = Arrays.copyOf(tabla, tabla.length + 1);//Copiamos el array, mas un espacio vacio, en un nuevo array
        nuevaTabla[nuevaTabla.length - 1] = elem; //añadimos el elemento al ultimo espacio del nuevo array
        return nuevaTabla; //devolvemos el nuevo array
    }

    public static void main(String[] args) {
        String cadenas[] = {};//Creacion array vacio
        System.out.println(Arrays.toString(cadenas));//imprimimos el array
        cadenas = guardar("coche", cadenas); //almacenamos el resultado del metodo guardar en cadenas
        cadenas = guardar("avion", cadenas); //almacenamos el resultado del metodo guardar en cadenas
        System.out.println(Arrays.toString(cadenas)); //imprimimos el array
    }
}
