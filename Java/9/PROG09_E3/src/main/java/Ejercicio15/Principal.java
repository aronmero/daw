package Ejercicio15;

import java.io.*;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) {
        String archivo = System.getProperty("user.dir") + "\\src\\main\\java\\Ejercicio15\\test.bin";
        int tamanoArchivo;
        try {
            //Buffer del FileInput de archivo
            BufferedInputStream entradaBuff = new BufferedInputStream(new FileInputStream(archivo));
           
            //Asignamos el tamano estimado
            tamanoArchivo = entradaBuff.available();
            System.out.println("Bytes disponibles " + tamanoArchivo);
            System.out.println("Leyendo 50 bytes...");
            
            byte byteArray[] = new byte[50];
            if(entradaBuff.read(byteArray)!=50){
                System.out.println("No se pudieron leer 50 bytes");
            }else{
                for (byte b : byteArray) {
                    System.out.print((char)b);
                }
            }
            
        } catch (FileNotFoundException ex) {
            System.out.println(ex);
        } catch (IOException ex) {
            System.out.println(ex);
        } catch (Exception ex) {
            System.out.println(ex);
        }
    }
}
