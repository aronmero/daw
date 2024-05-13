package E10_14;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;

/**
 *
 * @author Aarón
 */
public class Principal {

    public static void main(String[] args) {
        final String RUTA_FICHERO = System.getProperty("user.dir") + "\\src\\main\\java\\E10_14\\" + "carta.txt";
        int caracteres = 0;
        int lineas = 0;
        int palabras = 0;
        FileReader lector = null;
        BufferedReader lectorBuff = null;

        try {
            lector = new FileReader(RUTA_FICHERO);
            lectorBuff = new BufferedReader(lector);
            String linea;
            while ((linea = lectorBuff.readLine()) != null) {
                lineas++;
                caracteres += linea.length();
               
                String[] palabrasArray = linea.split("[\\s]+");
                palabras += palabrasArray.length;
            }

        } catch (FileNotFoundException ex) {
            System.out.println(ex.getMessage());
        } catch (IOException ex) {
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
        
        System.out.println("Número de caracteres: " + caracteres);
        System.out.println("Número de líneas: " + lineas);
        System.out.println("Número de palabras: " + palabras);
    }
}
