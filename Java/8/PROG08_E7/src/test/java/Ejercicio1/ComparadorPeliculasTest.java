/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

import java.util.HashSet;
import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.AfterAll;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.Test;
import static org.junit.jupiter.api.Assertions.*;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class ComparadorPeliculasTest {

    public ComparadorPeliculasTest() {
        setUp();
    }

    @BeforeAll
    public static void setUpClass() {
    }

    @AfterAll
    public static void tearDownClass() {
    }

    @BeforeEach
    public void setUp() {

    }

    @AfterEach
    public void tearDown() {
    }

    /**
     * Test of compararPeliculasVistas method, of class ComparadorPeliculas.
     */
    @Test
    public void testCompararPeliculasVistas() {
        Usuario usuario1 = new Usuario("1");
        Usuario usuario2 = new Usuario("2");

        System.out.println("compararPeliculasVistas");
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
        usuario2.anadirPeliculaVista(new Pelicula("E.T., el extraterrestre", "Ciencia ficción", 7.8));
        usuario2.anadirPeliculaVista(new Pelicula("Indiana Jones y los cazadores del arca perdida", "Acción", 8.4));
        usuario2.anadirPeliculaVista(new Pelicula("Volver al futuro", "Ciencia ficción", 8.5));

        HashSet<Pelicula> expResult = new HashSet<>();
        expResult.add(new Pelicula("E.T., el extraterrestre", "Ciencia ficción", 7.8));
        expResult.add(new Pelicula("Indiana Jones y los cazadores del arca perdida", "Acción", 8.4));
        expResult.add(new Pelicula("Volver al futuro", "Ciencia ficción", 8.5));
        HashSet<Pelicula> result = ComparadorPeliculas.compararPeliculasVistas(usuario1, usuario2);
        assertEquals(expResult, result);
    }

    /**
     * Test of compararPeliculasFavoritas method, of class ComparadorPeliculas.
     */
    @Test
    public void testCompararPeliculasFavoritas() {
        Usuario usuario1 = new Usuario("1");
        Usuario usuario2 = new Usuario("2");

        System.out.println("compararPeliculasFavoritas");
        usuario1.anadirPeliculaFavorita(new Pelicula("El Padrino", "Drama", 9.2));
        usuario1.anadirPeliculaFavorita(new Pelicula("Forrest Gump", "Drama", 8.8));
        usuario1.anadirPeliculaFavorita(new Pelicula("Toy Story", "Animación", 8.3));
        usuario1.anadirPeliculaFavorita(new Pelicula("El Rey León", "Animación", 8.5));
        usuario1.anadirPeliculaFavorita(new Pelicula("Los anillos", "Fantasia", 7.5));

        usuario2.anadirPeliculaFavorita(new Pelicula("El Rey León", "Animación", 8.5));
        HashSet<Pelicula> expResult = new HashSet<>();
        expResult.add(new Pelicula("El Rey León", "Animación", 8.5));
        HashSet<Pelicula> result = ComparadorPeliculas.compararPeliculasFavoritas(usuario1, usuario2);
        assertEquals(expResult, result);
    }

}
