/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

import java.util.HashMap;
import java.util.HashSet;
import java.util.LinkedList;
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
public class CatalogoTest {
    private Catalogo catalogo;
    
    public CatalogoTest() {
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
        Pelicula pelicula1 = new Pelicula("El Padrino", "Drama", 9.2);
        Pelicula pelicula2 = new Pelicula("Forrest Gump", "Drama", 8.8);
        catalogo= new Catalogo();
        catalogo.anadirPelicula(pelicula1);
        catalogo.anadirPelicula(pelicula2);
    }
    
    @AfterEach
    public void tearDown() {
    }

    /**
     * Test of anadirPelicula method, of class Catalogo.
     */
    @Test
    public void testAnadirPelicula() {
        System.out.println("anadirPelicula");
        Pelicula pelicula = new Pelicula("El Padrino", "Drama", 9.2);
        Catalogo instance = new Catalogo();
        boolean expResult = true;
        boolean result = instance.anadirPelicula(pelicula);
        assertEquals(expResult, result);
    }

    /**
     * Test of getAlmacenPeliculas method, of class Catalogo.
     */
    @Test
    public void testGetAlmacenPeliculas() {
        System.out.println("getAlmacenPeliculas");
        HashSet<Pelicula> expResult = new HashSet<>();
        expResult.add(new Pelicula("El Padrino", "Drama", 9.2));
        expResult.add(new Pelicula("Forrest Gump", "Drama", 8.8));

        HashSet<Pelicula> result = catalogo.getAlmacenPeliculas();
        assertEquals(expResult, result);
    }


}
