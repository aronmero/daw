package Ejercicio06;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {
    
    public static void main(String[] args) throws FileNotFoundException, IOException {
        DataOutputStream archivo = null;
        DataInputStream fichero = null;
        String nombre = null;
        int edad = 0;
        try {
            archivo = new DataOutputStream(new FileOutputStream(System.getProperty("user.dir")+"\\src\\main\\java\\Ejercicio06\\secuencial.dat", true));
            archivo.writeUTF("Antonio");
            archivo.writeInt(33);
            archivo.writeUTF("Pedro");
            archivo.writeInt(45);
            archivo.writeUTF("Jose");
            archivo.writeInt(51);
            
            archivo.close();
            fichero = new DataInputStream(new FileInputStream(System.getProperty("user.dir")+"\\src\\main\\java\\Ejercicio06\\secuencial.dat"));
            
            for (int i = 0; i <10; i++) {
                nombre = fichero.readUTF();
                System.out.println(nombre);
                edad = fichero.readInt();
                System.out.println(edad);
                System.out.println("");
            }
            
        } catch (FileNotFoundException ex) {
            System.out.println(ex.getMessage());
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }
    }
}
