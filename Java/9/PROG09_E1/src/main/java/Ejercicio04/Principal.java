package Ejercicio04;

import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.InputStreamReader;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {
    public static void main(String[] args) throws FileNotFoundException {
        FileInputStream fichero;
        try{
            fichero = new FileInputStream("C:\\Users\\1daw02\\Documents\\1DAW AARON\\Programacion\\datos.txt");
            InputStreamReader unReader = new InputStreamReader(fichero);
            System.out.println(unReader.getEncoding());
        }catch(Exception ex){
            System.out.println(ex.getMessage());
        }
    }
}
