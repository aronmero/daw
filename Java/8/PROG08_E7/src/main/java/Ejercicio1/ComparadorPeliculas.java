package Ejercicio1;

import java.util.HashSet;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class ComparadorPeliculas {

    static HashSet<Pelicula> compararPeliculasVistas(Usuario usuario1,Usuario usuario2) {
        HashSet peliculasAmbos = new HashSet<>(usuario1.getPeliculasVistas());
        peliculasAmbos.retainAll(usuario2.getPeliculasVistas());
        return peliculasAmbos;
    }

    static HashSet<Pelicula> compararPeliculasFavoritas(Usuario usuario1,Usuario usuario2) {
        HashSet peliculasAmbos = new HashSet<>(usuario1.getPeliculasFavoritas());
        peliculasAmbos.retainAll(usuario2.getPeliculasFavoritas());
        return peliculasAmbos;
    }

}
