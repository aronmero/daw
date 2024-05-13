/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

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
public class PeliculaTest {
    private Pelicula pelicula;
    
    public PeliculaTest() {
        setUp();
    }

    @BeforeAll
    public static void setUpClass() throws Exception {
    }

    @AfterAll
    public static void tearDownClass() throws Exception {
    }

    
    @BeforeEach
    public void setUp() {
        pelicula = new Pelicula("El Padrino", "Drama", 9.2);
    }
    
    @AfterEach
    public void tearDown() {
        
    }

    /**
     * Test of toString method, of class Pelicula.
     */
    @Test
    public void testToString() {
        System.out.println("toString");
        String expResult = "Pelicula{" + "titulo=" + "El Padrino" + ", categoria=" + "Drama" + ", puntuacion=" + 9.2 + '}';
        String result = pelicula.toString();
        assertEquals(expResult, result);
    }

    /**
     * Test of getPuntuacion method, of class Pelicula.
     */
    @Test
    public void testGetPuntuacion() {
        System.out.println("getPuntuacion");
        double expResult = 9.2;
        double result = pelicula.getPuntuacion();
        assertEquals(expResult, result, 0.0);

    }


    /**
     * Test of getTitulo method, of class Pelicula.
     */
    @Test
    public void testGetTitulo() {
        System.out.println("getTitulo");
        String expResult = "El Padrino";
        String result = pelicula.getTitulo();
        assertEquals(expResult, result);

    }


    /**
     * Test of getCategoria method, of class Pelicula.
     */
    @Test
    public void testGetCategoria() {
        System.out.println("getCategoria");
        String expResult = "Drama";
        String result = pelicula.getCategoria();
        assertEquals(expResult, result);

    }

    
}
