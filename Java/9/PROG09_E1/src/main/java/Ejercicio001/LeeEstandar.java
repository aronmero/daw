package Ejercicio001;

import java.io.IOException;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class LeeEstandar {

    public static void main(String[] args) {
        StringBuilder str = new StringBuilder();
        char c;
        try {
            while ((c = (char) System.in.read()) != '\n') {
                str.append(c);
            }
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }
        System.out.println("Cadena introducida: " + str);
    }
}
