package E11_11;

import java.io.*;

/**
 *
 * @author Aarón
 */
public class Lectura {
    private static final String NOMBRE_FICHERO = System.getProperty("user.dir") + "\\src\\main\\java\\E11_11\\"
            + "datos.bin";

    public static void main(String[] args) {
        FileInputStream stream = null;
        DataInputStream dataO = null;
        try {

            stream = new FileInputStream(NOMBRE_FICHERO);
            dataO = new DataInputStream(stream);
            dataO.read();
            System.out.println(dataO.readDouble());
        } catch (IOException ex) {

        }
    }
}
