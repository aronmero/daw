package Ejercicio05;


import java.io.FileNotFoundException;

import java.io.FileWriter;
import java.io.IOException;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) throws FileNotFoundException, IOException {
        String nombreFichero = System.getProperty("user.dir")+"\\src\\main\\java\\Ejercicio05\\datos.dat";
        String texto = "Hola Mundo!!";
        try {
            FileWriter escritor = new FileWriter(nombreFichero, true);
            escritor.write(texto);
            escritor.close();
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }
    }
}
