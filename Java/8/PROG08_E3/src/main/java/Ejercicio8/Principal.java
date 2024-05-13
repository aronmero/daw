package Ejercicio8;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.List;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) {
        List<Integer> lista = new ArrayList<>();

        for (int i = 0; i < 20; i++) {
            lista.add((int) ((Math.random() * 10) + 1));
        }
        
        Comparator<Integer> comparador = Comparator.naturalOrder();
        lista.sort(comparador);
        System.out.println(lista);
    }
}
