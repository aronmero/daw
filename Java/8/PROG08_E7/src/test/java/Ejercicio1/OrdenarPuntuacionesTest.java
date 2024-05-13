/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

import java.util.TreeSet;
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
public class OrdenarPuntuacionesTest {

    public OrdenarPuntuacionesTest() {
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
     * Test of ordenarPorPuntuacion method, of class OrdenarPuntuaciones.
     */
    @Test
    public void testOrdenarPorPuntuacion() {
        System.out.println("ordenarPorPuntuacion");
        
        Pelicula pelicula1 = new Pelicula("El Padrino", "Drama", 9.2);
        Pelicula pelicula2 = new Pelicula("Forrest Gump", "Drama", 8.8);
        Pelicula pelicula4 = new Pelicula("El Rey León", "Animación", 8.5);
        Pelicula pelicula3 = new Pelicula("Toy Story", "Animación", 8.3);
        Pelicula pelicula5 = new Pelicula("Los anillos", "Fantasia", 7.5);
        
        Catalogo catalogo = new Catalogo();
        TreeSet<Pelicula> expResult = new TreeSet();
        
        catalogo.anadirPelicula(pelicula5);
        catalogo.anadirPelicula(pelicula4);
        catalogo.anadirPelicula(pelicula3);
        catalogo.anadirPelicula(pelicula2);
        catalogo.anadirPelicula(pelicula1);
        
        expResult.add(pelicula1);
        expResult.add(pelicula2);
        expResult.add(pelicula3);
        expResult.add(pelicula4);
        expResult.add(pelicula5);
        
        TreeSet<Pelicula> result = OrdenarPuntuaciones.ordenarPorPuntuacion(catalogo);
        assertEquals(expResult, result);
    }

}
