package Ejercicio7;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collection;
import java.util.Comparator;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) {
        Collection<Integer> lista = new ArrayList<>();
        for (int i = 0; i < 20; i++) {
            lista.add((int) (Math.random() * 10 + 1));
        }
        System.out.println(lista);
        Integer[] tabla = lista.toArray(new Integer[0]);
        Arrays.sort(tabla);
        Collection<Integer> listaCreciente = new ArrayList<>();
        listaCreciente.addAll(Arrays.asList(tabla));
        System.out.println(listaCreciente);

//        Comparator<Integer> ordenDecreciente = new Comparator<>() {
//            @Override
//            public int compare(Integer e1, Integer e2) {
//                return e1 - e2;
//            }
//        };
//        Comparator<Integer> ordenEnteros = Comparator.naturalOrder();
//        ordenDecreciente = ordenEnteros;
//
//        Arrays.sort(tabla,ordenDecreciente);
//        Collection<Integer> listaDecreciente = new ArrayList<>();
//        listaDecreciente.addAll(Arrays.asList(tabla));
//        System.out.println(listaDecreciente);
     }
}
