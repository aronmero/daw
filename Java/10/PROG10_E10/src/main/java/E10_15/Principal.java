package E10_15;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Comparator;
import java.util.List;

/**
 *
 * @author Aarón
 */
public class Principal {

    public static void main(String[] args) {
        final String RUTA_FICHERO = System.getProperty("user.dir") + "\\src\\main\\java\\E10_15\\" + "numeros.txt";
        FileReader lector = null;
        BufferedReader lectorBuff = null;
        List<Integer> lista = new ArrayList();
        
        try {
            lector = new FileReader(RUTA_FICHERO);
            lectorBuff = new BufferedReader(lector);
            String linea;
            while ((linea = lectorBuff.readLine()) != null) {
                Integer numero = Integer.valueOf(linea);
                lista.add(numero);
            }
            Comparator<Integer> comparador = new Comparator<Integer>() {
                @Override
                public int compare(Integer x, Integer y) {
                    return Integer.compare(x, y);
                }
            };
            lista.sort(comparador);
        } catch (IOException | NumberFormatException ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (lector != null) {
                try {
                    lector.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
            if (lectorBuff != null) {
                try {
                    lectorBuff.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
        }

        System.out.println(lista.toString());
    }
}
