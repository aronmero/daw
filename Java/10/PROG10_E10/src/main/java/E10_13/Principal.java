package E10_13;

import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Comparator;
import java.util.LinkedList;
import java.util.List;

/**
 *
 * @author Aarón
 */
public class Principal {

    public static void main(String[] args) {
        final String RUTA_FICHERO = System.getProperty("user.dir") + "\\src\\main\\java\\E10_13\\" + "datos.txt";

        // Creacion listas de prueba con datos
        List<Integer> numeroPrueba1 = new LinkedList<Integer>() {
            {
                add(8);
                add(6);
                add(15);
            }
        };

        List<Integer> numeroPrueba2 = new LinkedList<Integer>() {
            {
                add(12);
                add(50);
                add(2);
            }
        };

        List<Integer> listaOrdenada = ordenarListas(numeroPrueba1, numeroPrueba2);

        System.out.println(listaOrdenada);
        FileWriter escritor = null;

        try {
            escritor = new FileWriter(RUTA_FICHERO);
            escritor.write(listaOrdenada.toString());
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (escritor != null) {
                try {
                    escritor.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
        }

    }

    private static List ordenarListas(List<Integer> numeroPrueba1, List<Integer> numeroPrueba2) {
        List<Integer> listaOrdenada = new ArrayList();
        listaOrdenada.addAll(numeroPrueba1);
        listaOrdenada.addAll(numeroPrueba2);

        Comparator comparador = new Comparator<Integer>() {
            @Override
            public int compare(Integer o1, Integer o2) {
                return Integer.compare(o1, o2);
            }
        };

        listaOrdenada.sort(comparador);
        return listaOrdenada;
    }
}
