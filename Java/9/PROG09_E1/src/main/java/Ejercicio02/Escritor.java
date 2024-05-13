package Ejercicio02;

import java.io.BufferedReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Escritor {

    public static void main(String[] args) throws IOException {
        try {
            PrintWriter out = null;
            out = new PrintWriter(new FileWriter(System.getProperty("user.dir")+"\\src\\main\\java\\Ejercicio02\\datos.dat", true));

            BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
            String cadenaTexto;
            while(!(cadenaTexto= br.readLine()).equals("salir")){
                   out.println(cadenaTexto);
            }
            out.close();
        }catch(IOException ex){
            System.out.println(ex.getMessage());
        }
    }
}
