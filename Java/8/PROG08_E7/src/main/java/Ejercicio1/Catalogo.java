package Ejercicio1;

import java.util.HashMap;
import java.util.HashSet;
import java.util.LinkedList;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Catalogo {

    private HashSet<Pelicula> almacenPeliculas;
    private HashMap<String, LinkedList<Pelicula>> almacenCategoria;

    /*Constructores*/
    public Catalogo(HashSet<Pelicula> almacen) {
        almacenPeliculas = almacen;
    }

    public Catalogo(HashSet<Pelicula> almacenPeliculas, HashMap<String, LinkedList<Pelicula>> almacenCategoria) {
        this.almacenPeliculas = almacenPeliculas;
        this.almacenCategoria = almacenCategoria;
    }

    public Catalogo() {
        almacenPeliculas = new HashSet<>();
        almacenCategoria = new HashMap<>();
    }

    /*Anadir datos*/
    boolean anadirPelicula(Pelicula pelicula) {
        if (almacenPeliculas.add(pelicula)) {
            LinkedList<Pelicula> peliculasCategoria = almacenCategoria.get(pelicula.getCategoria());
            if (peliculasCategoria == null) {
                peliculasCategoria = new LinkedList<>();
            }
            peliculasCategoria.add(pelicula);
            almacenCategoria.put(pelicula.getCategoria(), peliculasCategoria);
            return true;
        }
        return false;
    }

    /*Obtener datos*/
    public HashSet<Pelicula> getAlmacenPeliculas() {
        return almacenPeliculas;
    }

    public HashMap<String, LinkedList<Pelicula>> getAlmacenCategoria() {
        return almacenCategoria;
    }

}
