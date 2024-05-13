package Ejercicio1;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.HashSet;
import java.util.Set;
import java.util.TreeSet;

/**
 *
 * @author Aarón Medina Rodríguez
 */
/**
 * *
 * Insertar en una lista 20 enteros aleatorios entre 1 y 10. A partir de ella,
 * crear un conjunto con los elementos de la lista sin repetir, otro con los
 * repetidos y otro con los elementos que aparecen una sola vez en la lista
 * original.
 */
public class Principal {

    public static void main(String[] args) {
        ArrayList<Integer> enteros = new ArrayList<Integer>();

        for (int i = 0; i < 20; i++) {
            int valor = (int) ((Math.random() * 10) + 1);
            enteros.add(valor);
        }

        Comparator<Integer> c = Comparator.naturalOrder();
        enteros.sort(c);

        System.out.println("Enteros:");
        System.out.println(enteros);
        System.out.println("");

        Set<Integer> sinRepeticiones = new TreeSet<>(enteros);

        System.out.println("Sin repetidos:");
        System.out.println(sinRepeticiones);
        System.out.println("");

        Set<Integer> repetidos = new HashSet<>();
        Set<Integer> unaSolaVez = new HashSet<>();

        for (Integer e : enteros) {
            if (!repetidos.add(e)) {
                unaSolaVez.remove(e);
            } else {
                unaSolaVez.add(e);
            }
        }
        repetidos.removeAll(unaSolaVez);

        System.out.println("Repetidos:");
        System.out.println(repetidos);
        System.out.println("");

        System.out.println("Una sola vez:");
        System.out.println(unaSolaVez);
    }
}
