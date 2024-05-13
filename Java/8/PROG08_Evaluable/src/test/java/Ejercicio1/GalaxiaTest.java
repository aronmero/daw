/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

import java.util.Set;
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
public class GalaxiaTest {

    public GalaxiaTest() {
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
     * Test of anadirSistemaEstelar method, of class Galaxia.
     */
    @Test
    public void testAnadirSistemaEstelar() {
        System.out.println("anadirSistemaEstelar");
        SistemaEstelar sistemaEstelar = new SistemaEstelar("2", "a");
        Galaxia instance = new Galaxia("50", "2");
        boolean expResult = true;
        boolean result = instance.anadirSistemaEstelar(sistemaEstelar);
        assertEquals(expResult, result);
    }

    /**
     * Test of anadirSistemaEstelar method, of class Galaxia.
     */
    @Test
    public void testAnadirSistemaEstelarVarios() {
        System.out.println("anadirSistemaEstelar");
        SistemaEstelar sistemaEstelar1 = new SistemaEstelar("2", "a");
        SistemaEstelar sistemaEstelar2 = new SistemaEstelar("5", "c");

        Galaxia instance = new Galaxia("50", "2");

        boolean expResult = true;
        boolean result1 = instance.anadirSistemaEstelar(sistemaEstelar1);
        boolean result2 = instance.anadirSistemaEstelar(sistemaEstelar2);
        assertEquals(expResult, result1);
        assertEquals(expResult, result2);
    }

    /**
     * Test of eliminarSistemaEstelar method, of class Galaxia.
     */
    @Test
    public void testEliminarSistemaEstelar() {
        System.out.println("eliminarSistemaEstelar");
        String idSitema = "2";
        Galaxia instance = new Galaxia("50", "2");;

        SistemaEstelar sistemaEstelar = new SistemaEstelar("2", "a");
        instance.anadirSistemaEstelar(sistemaEstelar);

        boolean expResult = true;
        boolean result = instance.eliminarSistemaEstelar(idSitema);
        assertEquals(expResult, result);

    }

    /**
     * Test of bucarSistemaEstelar method, of class Galaxia.
     */
    @Test
    public void testBucarSistemaEstelar() {
        System.out.println("bucarSistemaEstelar");
        String idEstelar = "2";
        Galaxia instance = new Galaxia("50", "2");;
        SistemaEstelar sistemaEstelar = new SistemaEstelar("2", "a");
        instance.anadirSistemaEstelar(sistemaEstelar);

        boolean expResult = true;
        boolean result = instance.bucarSistemaEstelar(idEstelar);
        assertEquals(expResult, result);

    }

    /**
     * Test of bucarSistemaEstelar method, of class Galaxia.
     */
    @Test
    public void testBucarSistemaEstelarInexistente() {
        System.out.println("bucarSistemaEstelar");
        String idEstelar = "3";
        Galaxia instance = new Galaxia("50", "2");;
        SistemaEstelar sistemaEstelar = new SistemaEstelar("2", "a");
        instance.anadirSistemaEstelar(sistemaEstelar);

        boolean expResult = false;
        boolean result = instance.bucarSistemaEstelar(idEstelar);
        assertEquals(expResult, result);

    }

    /**
     * Test of devolverArray method, of class Galaxia.
     */
    @Test
    public void testDevolverArray() {
        System.out.println("devolverArray");
        Galaxia instance = new Galaxia("50", "2");
        SistemaEstelar sistemaEstelar1 = new SistemaEstelar("20", "a");

        instance.anadirSistemaEstelar(sistemaEstelar1);

        SistemaEstelar[] expResult = new SistemaEstelar[]{sistemaEstelar1};
        SistemaEstelar[] result = instance.devolverArray();
        assertArrayEquals(expResult, result);
    }

}
