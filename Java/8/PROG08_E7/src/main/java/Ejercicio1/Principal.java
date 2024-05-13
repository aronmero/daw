package Ejercicio1;

import java.util.HashMap;
import java.util.HashSet;
import java.util.LinkedList;
import java.util.TreeSet;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) {
        Catalogo almacen = new Catalogo();
        Usuario usuario1 = new Usuario("2");
        Usuario usuario2 = new Usuario("2");

        anadirPeliculasFavoritasAutomaticas(usuario1);
        anadirPeliculasVistasAutomaticas(usuario1);
        anadirPeliculasAutomaticas(almacen);
        anadirPeliculasAutomaticas(almacen);

        usuario2.anadirPeliculaFavorita(new Pelicula("El Rey León", "Animación", 8.5));
        usuario2.anadirPeliculaVista(new Pelicula("E.T., el extraterrestre", "Ciencia ficción", 7.8));
        usuario2.anadirPeliculaVista(new Pelicula("Indiana Jones y los cazadores del arca perdida", "Acción", 8.4));
        usuario2.anadirPeliculaVista(new Pelicula("Volver al futuro", "Ciencia ficción", 8.5));

//        System.out.println("");
//        mostrarPeliculas(almacen);
//
//        System.out.println(almacen.getAlmacenPeliculas());
//        System.out.println("");
//        mostrarPeliculasCategoria(almacen);
//
//        System.out.println("");
//        System.out.println("FAVORITAS");
//        mostrarPeliculas(ComparadorPeliculas.compararPeliculasFavoritas(usuario1, usuario2));
//        System.out.println("");
//       System.out.println("VISTAS");
//        mostrarPeliculas(ComparadorPeliculas.compararPeliculasVistas(usuario1, usuario2));
//        System.out.println("");
        mostrarPeliculas(OrdenarPuntuaciones.ordenarPorPuntuacion(almacen));
    }

    private static void mostrarPeliculasCategoria(Catalogo almacen) {
        // Imprimir todas las películas por categoría en orden de inserción
        System.out.println("Películas por categoría:");
        for (HashMap.Entry<String, LinkedList<Pelicula>> almacenCategoria : almacen.getAlmacenCategoria().entrySet()) {
            String categoria = almacenCategoria.getKey();
            LinkedList<Pelicula> peliculasCategoria = almacenCategoria.getValue();
            System.out.println("Categoría: " + categoria);
            for (Pelicula pelicula : peliculasCategoria) {
                System.out.println("    " + pelicula.getTitulo() + " (" + pelicula.getPuntuacion() + ")");
            }
        }
    }

    private static void mostrarPeliculas(Catalogo almacen) {
        for (Pelicula pelicula : almacen.getAlmacenPeliculas()) {
            System.out.println(pelicula.getTitulo() + " (" + pelicula.getCategoria() + "): " + pelicula.getPuntuacion());
        }
    }

    private static void mostrarPeliculas(HashSet<Pelicula> almacen) {
        for (Pelicula pelicula : almacen) {
            System.out.println(pelicula.getTitulo() + " (" + pelicula.getCategoria() + "): " + pelicula.getPuntuacion());
        }
    }
    private static void mostrarPeliculas(TreeSet<Pelicula> almacen) {
        for (Pelicula pelicula : almacen) {
            System.out.println(pelicula.getTitulo() + " (" + pelicula.getCategoria() + "): " + pelicula.getPuntuacion());
        }
    }

    private static void anadirPeliculasFavoritasAutomaticas(Usuario usuario1) {
        Pelicula pelicula1 = new Pelicula("El Padrino", "Drama", 9.2);
        Pelicula pelicula2 = new Pelicula("Forrest Gump", "Drama", 8.8);
        Pelicula pelicula3 = new Pelicula("Toy Story", "Animación", 8.3);
        Pelicula pelicula4 = new Pelicula("El Rey León", "Animación", 8.5);
        Pelicula pelicula5 = new Pelicula("Los anillos", "Fantasia", 7.5);

        usuario1.anadirPeliculaFavorita(pelicula1);
        usuario1.anadirPeliculaFavorita(pelicula2);
        usuario1.anadirPeliculaFavorita(pelicula3);
        usuario1.anadirPeliculaFavorita(pelicula4);
        usuario1.anadirPeliculaFavorita(pelicula5);
    }

    private static void anadirPeliculasVistasAutomaticas(Usuario usuario1) {
        Pelicula pelicula1 = new Pelicula("El Padrino", "Drama", 9.2);
        Pelicula pelicula2 = new Pelicula("Forrest Gump", "Drama", 8.8);
        Pelicula pelicula3 = new Pelicula("Toy Story", "Animación", 8.3);
        Pelicula pelicula4 = new Pelicula("El Rey León", "Animación", 8.5);
        Pelicula pelicula5 = new Pelicula("Los anillos", "Fantasia", 7.5);

        Pelicula pelicula6 = new Pelicula("Jurassic Park", "Ciencia ficción", 8.1);
        Pelicula pelicula7 = new Pelicula("Indiana Jones y los cazadores del arca perdida", "Acción", 8.4);
        Pelicula pelicula8 = new Pelicula("E.T., el extraterrestre", "Ciencia ficción", 7.8);
        Pelicula pelicula9 = new Pelicula("La lista de Schindler", "Drama", 8.9);
        Pelicula pelicula10 = new Pelicula("Volver al futuro", "Ciencia ficción", 8.5);

        usuario1.anadirPeliculaVista(pelicula1);
        usuario1.anadirPeliculaVista(pelicula2);
        usuario1.anadirPeliculaVista(pelicula3);
        usuario1.anadirPeliculaVista(pelicula4);
        usuario1.anadirPeliculaVista(pelicula5);
        usuario1.anadirPeliculaVista(pelicula6);
        usuario1.anadirPeliculaVista(pelicula7);
        usuario1.anadirPeliculaVista(pelicula8);
        usuario1.anadirPeliculaVista(pelicula9);
        usuario1.anadirPeliculaVista(pelicula10);

    }

    private static void anadirPeliculasAutomaticas(Catalogo almacen) {
        Pelicula pelicula1 = new Pelicula("El Padrino", "Drama", 9.2);
        Pelicula pelicula2 = new Pelicula("Forrest Gump", "Drama", 8.8);
        Pelicula pelicula3 = new Pelicula("Toy Story", "Animación", 8.3);
        Pelicula pelicula4 = new Pelicula("El Rey León", "Animación", 8.5);
        Pelicula pelicula5 = new Pelicula("Los anillos", "Fantasia", 7.5);

        almacen.anadirPelicula(pelicula1);
        almacen.anadirPelicula(pelicula2);
        almacen.anadirPelicula(pelicula3);
        almacen.anadirPelicula(pelicula4);
        almacen.anadirPelicula(pelicula5);
    }

}
