package Ejercicio10;

import java.io.File;
import java.io.FilenameFilter;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Filtro implements FilenameFilter {

    private String extension;

    public Filtro(String extension) {
        this.extension = extension;
    }

    @Override
    public boolean accept(File dir, String name) {
        return name.endsWith(extension);
    }

    public static void main(String[] args) {
        try {
            String ubicacion = System.getProperty("user.dir") + "\\src\\main\\java\\Ejercicio10\\.";
            File fichero = new File(ubicacion);
            String[] listaDeArchivos;
            listaDeArchivos = fichero.list(new Filtro(".odt"));
            int numeroArchivos = listaDeArchivos.length;
            
            if(numeroArchivos<1){
                System.out.println("No hay archivos que listar");
            }else{
                for (String archivo : listaDeArchivos) {
                    System.out.println(archivo);
                }
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
    }

}
