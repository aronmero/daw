package Ejercicio1;

import java.util.HashSet;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Usuario extends ComparadorPeliculas {

    private HashSet<Pelicula> peliculasFavoritas;
    private HashSet<Pelicula> peliculasVistas;

    private String id;

    public Usuario(String id) {
        this.id = id;
        peliculasFavoritas = new HashSet<>();
         peliculasVistas = new HashSet<>();
    }

    public HashSet<Pelicula> getPeliculasFavoritas() {
        return peliculasFavoritas;
    }

    boolean anadirPeliculaFavorita(Pelicula pelicula) {
        return peliculasFavoritas.add(pelicula);
    }

    public HashSet<Pelicula> getPeliculasVistas() {
        return peliculasVistas;
    }

    boolean anadirPeliculaVista(Pelicula pelicula) {
        return peliculasVistas.add(pelicula);
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }
   
}
