package Ejercicio002;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class LeerArchivoTexto {

    public static void main(String[] args) {
        String rutaArchivo = System.getProperty("user.dir")+"\\src\\main\\java\\Ejercicio002\\datos.dat";
        try {
            FileReader fileReader = new FileReader(rutaArchivo);

            BufferedReader bufferedReader = new BufferedReader(fileReader);

            String linea;
            while ((linea = bufferedReader.readLine()) != null) {
                System.out.println(linea);
            }
            bufferedReader.close();
            fileReader.close();
        } catch (IOException e) {
            System.out.println("Error al leer el archivo: " + e.getMessage());
        }
    }
}
