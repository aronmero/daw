package Ejercicio07;

import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.RandomAccessFile;
import java.util.Scanner;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Random1 {

    static Scanner teclado = new Scanner(System.in);
    static RandomAccessFile fichero = null;

    public static void main(String[] args) throws FileNotFoundException, IOException {
        int numero;
        String archivo = System.getProperty("user.dir") + "\\src\\main\\java\\Ejercicio07\\datos.dat";
        try {
            fichero = new RandomAccessFile(archivo, "rw");
            mostrarFichero();
            System.out.println("Introduce un numero entero para añadir al final del fichero: ");
            numero = teclado.nextInt();
            fichero.seek(fichero.length());
            fichero.writeInt(numero);
            mostrarFichero();
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } finally {
            try {
                if (fichero != null) {
                    fichero.close();
                }
            } catch (IOException ex) {
                System.out.println(ex.getMessage());
            }
        }
    }

    static void mostrarFichero() throws IOException {
        int numero;
        try {
            fichero.seek(0);
            while (true) {
                numero = fichero.readInt();
                System.out.println(numero);
            }
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }
    }
}
