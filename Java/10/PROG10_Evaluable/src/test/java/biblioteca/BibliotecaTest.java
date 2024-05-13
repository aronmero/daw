/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package biblioteca;

import java.util.ArrayList;
import java.util.LinkedHashSet;
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
public class BibliotecaTest {
    
    public BibliotecaTest() {
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
     * Test of insertar method, of class Biblioteca.
     */
    @Test
    public void testInsertar_PublicacionLibro() {
        System.out.println("testInsertar_PublicacionLibro");
        Publicacion publicacion = new Libro("12445", "caperucita roja", 1994, true, "42416425D");
        Biblioteca instance = new Biblioteca();
        boolean expResult = true;
        boolean result = instance.insertar(publicacion);
        assertEquals(expResult, result);
    }
    
    /**
     * Test of insertar method, of class Biblioteca.
     */
    @Test
    public void testInsertar_PublicacionInvestigacion() {
        System.out.println("testInsertar_PublicacionInvestigacion");
        Publicacion publicacion = new Investigacion("86532", "publicacion 1", 1995, 1, "julio", "romance", true, "Manuel Lasco");
        Biblioteca instance = new Biblioteca();
        boolean expResult = true;
        boolean result = instance.insertar(publicacion);
        assertEquals(expResult, result);
    }

    /**
     * Test of insertar method, of class Biblioteca.
     */
    @Test
    public void testInsertar_Libro() {
        System.out.println("testInsertar_Libro");
        Libro libro = new Libro("12445", "caperucita roja", 1994, true, "42416425D");
        Biblioteca instance = new Biblioteca();
        boolean expResult = true;
        boolean result = instance.insertar(libro);
        assertEquals(expResult, result);
    }
    
    /**
     * Test of insertar method, of class Biblioteca.
     */
    @Test
    public void testInsertar_LibroNulo() {
        System.out.println("testInsertar_LibroNulo");
        Libro libro = new Libro(null, null, 1994, true, null);
        Biblioteca instance = new Biblioteca();
        boolean expResult = false;
        boolean result = instance.insertar(libro);
        assertEquals(expResult, result);

    }
    
    /**
     * Test of insertar method, of class Biblioteca.
     */
    @Test
    public void testInsertar_LibroVacio() {
        System.out.println("testInsertar_LibroVacio");
        
        Libro libro = new Libro("", "", 0, true, "");
        Biblioteca instance = new Biblioteca();
        boolean expResult = false;
        boolean result = instance.insertar(libro);
        assertEquals(expResult, result);
    }

    /**
     * Test of insertar method, of class Biblioteca.
     */
    @Test
    public void testInsertar_Investigacion() {
        System.out.println("testInsertar_Investigacion");
        Investigacion investigacion = new Investigacion("86532", "publicacion 1", 1995, 1, "julio", "romance", true, "Manuel Lasco");
        Biblioteca instance = new Biblioteca();
        boolean expResult = true;
        boolean result = instance.insertar(investigacion);
        assertEquals(expResult, result);
    }
    
    /**
     * Test of insertar method, of class Biblioteca.
     */
    @Test
    public void testInsertar_InvestigacionNulo() {
        System.out.println("testInsertar_InvestigacionNulo");
        Investigacion investigacion = new Investigacion(null, null, 0, 0, null, null, true, null);
        Biblioteca instance = new Biblioteca();
        boolean expResult = false;
        boolean result = instance.insertar(investigacion);
        assertEquals(expResult, result);
    }
    
    /**
     * Test of insertar method, of class Biblioteca.
     */
    @Test
    public void testInsertar_InvestigacionVacio() {
        System.out.println("testInsertar_InvestigacionVacio");
        Investigacion investigacion = new Investigacion("", "", 0, 0, "", "", true, "");
        Biblioteca instance = new Biblioteca();
        boolean expResult = false;
        boolean result = instance.insertar(investigacion);
        assertEquals(expResult, result);
    }

   
    
}
