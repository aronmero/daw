package Ejercicio01;

import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class CopiaFicheros {

    static void copia(String origen, String destino) throws IOException {
        OutputStream fsalida;
        try {
            InputStream fentrada = new FileInputStream(origen);
            fsalida = new FileOutputStream(destino);
            byte[] buffer = new byte[256];

            while (true) {
                int n = fentrada.read(buffer);
                if (n < 0) {
                    break;
                }
                fsalida.write(buffer, 0, n);
            }
            fsalida.close();
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }

    }
    public static void main(String[] args) throws IOException {
        copia(System.getProperty("user.dir")+"\\src\\main\\java\\Ejercicio01\\datos.dat",System.getProperty("user.dir")+"\\src\\main\\java\\Ejercicio01\\datosCopiados.dat");
    }
}
