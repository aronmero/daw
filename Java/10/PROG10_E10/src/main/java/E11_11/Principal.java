package E11_11;

import java.io.DataOutputStream;

import java.io.FileOutputStream;
import java.io.IOException;
import java.util.Scanner;

/**
 *
 * @author Aarón
 */
public class Principal {

    private static final String NOMBRE_FICHERO = System.getProperty("user.dir") + "\\src\\main\\java\\E11_11\\"
            + "datos.bin";

    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        FileOutputStream stream = null;
        DataOutputStream dataO = null;
        System.out.println("Introduce un numero");
        double numero = teclado.nextDouble();

        try {
            stream = new FileOutputStream(NOMBRE_FICHERO);
            dataO = new DataOutputStream(stream);

            dataO.writeDouble(numero);
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } finally {
            teclado.close();
        }

    }
}
