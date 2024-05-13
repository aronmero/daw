package Ejercicio03;

import java.io.File;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    static String substFileSeparator(String ruta) {
        String separador = "\\";
        try {
            if (File.separator.equals(separador)) {
                separador = "/";
            }
            return ruta.replaceAll(separador, File.separator);
        } catch (Exception ex) {
            return ruta.replaceAll(separador + separador, File.separator);
        }
    }

    public static void main(String[] args) {
        System.out.println(substFileSeparator(System.getProperty("user.dir")));
    }
}
