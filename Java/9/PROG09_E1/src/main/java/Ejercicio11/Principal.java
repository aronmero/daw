package Ejercicio11;

import java.io.File;
import java.io.IOException;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) throws IOException, InterruptedException {
        String archivo = System.getProperty("user.dir") + "\\src\\main\\java\\Ejercicio11\\miFichero.txt";
        try {
            //Creamos el objeto que encapsula el fichero, por ejemplo, 
            //suponiendo que vamos a crear un fichero llamado miFichero.txt
            File fichero = new File(archivo);

            //A partir del objeto File creamos el fichero físicamente, con la siguiente instrucción,
            //que devuelve un boolean con valor true si se creó correctamente, o false si no se pudo crear
            if (fichero.createNewFile()) {
                System.out.println(true);
            } else {
                System.out.println(false);
            }

            //Para borrar un fichero, podemos usar la clase File, comprobando previamente si existe, del siguiente modo:
            //Fijamos el nombre de la carpeta y del fichero
            File fichero2 = new File(archivo);
            if (fichero2.exists()) {
                System.out.println("El fichero se eliminara en 5 segundos");
                Thread.sleep(5000);//Detenemos la ejecucion del programa durante 5 segundos para comprobar que se crea y se elimina
                fichero2.delete();
            }
        } catch (IOException | InterruptedException ex) {
            System.out.println(ex.getMessage());
        }

    }
}
