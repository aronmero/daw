package Ejercicio1;

import java.util.Comparator;

import java.util.TreeSet;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class OrdenarPuntuaciones {

    public static TreeSet<Pelicula> ordenarPorPuntuacion(Catalogo catalogo) {
        TreeSet<Pelicula> peliculasOrdenadasPorPuntuacion = new TreeSet<>(new Comparator<Pelicula>() {
            @Override
            public int compare(Pelicula p1, Pelicula p2) {
                return Double.compare(p1.getPuntuacion(), p2.getPuntuacion());
            }
        });
        peliculasOrdenadasPorPuntuacion.addAll(catalogo.getAlmacenPeliculas());
       
        return peliculasOrdenadasPorPuntuacion;
    }

}
