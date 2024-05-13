package Ejercicio0;

import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.io.StreamTokenizer;
import java.util.Scanner;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Token {

    public static void contarPalabrasyNumeros(String nombre_fichero) throws IOException {
        StreamTokenizer sTokenizer = null;
        int contapal = 0, numNumeros = 0;

        try {
            sTokenizer = new StreamTokenizer(new FileReader(nombre_fichero));
            Scanner teclado = new Scanner(System.in);
            while (sTokenizer.nextToken() != StreamTokenizer.TT_EOF) {
                if (sTokenizer.ttype == StreamTokenizer.TT_WORD) {
                    contapal++;
                    System.out.println(sTokenizer.toString());
                    teclado.next();
                } else if (sTokenizer.ttype == StreamTokenizer.TT_NUMBER) {
                    numNumeros++;
                    System.out.println(sTokenizer.toString());
                    teclado.next();
                }
            }
            System.out.println("Número de palabras en el fichero: " + contapal);
            System.out.println("Número de números en el fichero: " + numNumeros);
        } catch (FileNotFoundException ex) {
            System.out.println(ex.getMessage());
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }
    }
    public static void main(String[] args) throws IOException {
     contarPalabrasyNumeros(System.getProperty("user.dir")+"\\src\\main\\java\\Ejercicio0\\datos.dat");
    }
}
