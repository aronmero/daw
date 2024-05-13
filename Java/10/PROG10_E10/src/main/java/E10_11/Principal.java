package E10_11;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.Scanner;

/**
 *
 * @author Aarón
 */
public class Principal {

    public static void main(String[] args) {
        final String RUTA_ABSOLUTA = System.getProperty("user.dir") + "\\src\\main\\java\\E10_11\\";
        Scanner teclado = new Scanner(System.in);
        FileReader lector = null;
        BufferedReader buff = null;
        System.out.println("Escribe el nombre del fichero");
        String nombreFichero = teclado.nextLine();

        try {
            if (nombreFichero.isBlank()) {
                nombreFichero = "prueba.txt";
            }
            nombreFichero = RUTA_ABSOLUTA + nombreFichero;

            lector = new FileReader(nombreFichero);
            buff = new BufferedReader(lector);
            String linea;
            while ((linea = buff.readLine()) != null) {
                System.out.println(linea);
            }
        } catch (FileNotFoundException ex) {
            System.out.println(ex.getMessage());
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (lector != null) {
                try {
                    lector.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                } catch (Exception ex) {
                    System.out.println(ex.getMessage());
                }
            }
            if (buff != null) {
                try {
                    buff.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                } catch (Exception ex) {
                    System.out.println(ex.getMessage());
                }
            }
            teclado.close();
        }
    }
}
