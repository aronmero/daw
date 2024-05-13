package E10_12;

import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

/**
 *
 * @author Aarón
 */
public class Principal {

    public static void main(String[] args) {
        final String RUTA_FICHERO = System.getProperty("user.dir") + "\\src\\main\\java\\E10_12\\" + "datos.txt";
        Scanner teclado = new Scanner(System.in);
        FileWriter escritor = null;
        System.out.println("Dime tu nombre");
        String nombre = teclado.nextLine();
        System.out.println("Dime tu edad");
        int edad = teclado.nextInt();
        teclado.nextLine();
        try {
            escritor = new FileWriter(RUTA_FICHERO, true);
            escritor.write(nombre + "," + String.valueOf(edad) + System.lineSeparator());

        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (escritor != null) {
                try {
                    escritor.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
            teclado.close();
        }
    }
}
