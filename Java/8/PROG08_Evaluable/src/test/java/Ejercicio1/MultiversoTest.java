/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

import java.util.ArrayList;
import java.util.List;
import java.util.Map;
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
public class MultiversoTest {

    public MultiversoTest() {
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
     * Test of agregarGalaxia method, of class Multiverso.
     */
    @Test
    public void testAgregarGalaxia_String_Galaxia() {
        System.out.println("agregarGalaxia");
        String id = "1";
        Galaxia galaxia = new Galaxia("1", "");
        Multiverso instance = new Multiverso("1", "prueba");
        Galaxia expResult = galaxia;
        Galaxia result = instance.agregarGalaxia(id, galaxia);
        assertEquals(expResult, result);
    }

    /**
     * Test of agregarGalaxia method, of class Multiverso.
     */
    @Test
    public void testAgregarGalaxia_String_GalaxiaIncorrectaString() {
        System.out.println("agregarGalaxia");
        String id = "0";
        Galaxia galaxia = new Galaxia("1", "");
        Multiverso instance = new Multiverso("1", "prueba");
        Galaxia expResult = null;
        Galaxia result = instance.agregarGalaxia(id, galaxia);
        assertEquals(expResult, result);
    }

    /**
     * Test of agregarGalaxia method, of class Multiverso.
     */
    @Test
    public void testAgregarGalaxia_Galaxia() {
        System.out.println("agregarGalaxia");
        Galaxia galaxia = new Galaxia("1", "");
        Multiverso instance = new Multiverso("1", "prueba");
        Galaxia expResult = galaxia;
        Galaxia result = instance.agregarGalaxia(galaxia);
        assertEquals(expResult, result);
    }

    /**
     * Test of eliminarGalaxia method, of class Multiverso.
     */
    @Test
    public void testEliminarGalaxia() {
        System.out.println("eliminarGalaxia");
        String idGalaxia = "1";
        Galaxia galaxia = new Galaxia("1", "");
        Multiverso instance = new Multiverso("50", "");
        instance.agregarGalaxia(galaxia);
        boolean expResult = true;
        boolean result = instance.eliminarGalaxia(idGalaxia);
        assertEquals(expResult, result);
    }

    /**
     * Test of eliminarGalaxia method, of class Multiverso.
     */
    @Test
    public void testEliminarGalaxiaInexistente() {
        System.out.println("eliminarGalaxia");
        String idGalaxia = "2";
        Galaxia galaxia = new Galaxia("1", "");
        Multiverso instance = new Multiverso("50", "");
        instance.agregarGalaxia(galaxia);
        boolean expResult = false;
        boolean result = instance.eliminarGalaxia(idGalaxia);
        assertEquals(expResult, result);
    }

    /**
     * Test of anadirSistemaEstelar method, of class Multiverso.
     */
    @Test
    public void testAnadirSistemaEstelar() {
        System.out.println("anadirSistemaEstelar");
        String idGalaxia = "1";
        Galaxia galaxia = new Galaxia("1", "");
        SistemaEstelar sistemaEstelar = new SistemaEstelar("2", "a");
        Multiverso instance = new Multiverso("50", "");
        instance.agregarGalaxia(galaxia);
        
        boolean expResult = true;
        boolean result = instance.anadirSistemaEstelar(idGalaxia, sistemaEstelar);
        assertEquals(expResult, result);
    }

    /**
     * Test of eliminarSistemaEstelar method, of class Multiverso.
     */
    @Test
    public void testEliminarSistemaEstelar() {
        System.out.println("eliminarSistemaEstelar");
        String idGalaxia = "1";
        String idSistemaEstelar = "2";
        Galaxia galaxia = new Galaxia("1", "");
        SistemaEstelar sistemaEstelar = new SistemaEstelar("2", "a");
        Multiverso instance = new Multiverso("50", "");
        galaxia.anadirSistemaEstelar(sistemaEstelar);
        instance.agregarGalaxia(galaxia);
        boolean expResult = true;
        boolean result = instance.eliminarSistemaEstelar(idGalaxia, idSistemaEstelar);
        assertEquals(expResult, result);
    }
    
    /**
     * Test of eliminarSistemaEstelar method, of class Multiverso.
     */
    @Test
    public void testEliminarSistemaEstelarInexistente() {
        System.out.println("eliminarSistemaEstelar");
        String idGalaxia = "1";
        String idSistemaEstelar = "0";
        Galaxia galaxia = new Galaxia("1", "");
        SistemaEstelar sistemaEstelar = new SistemaEstelar("2", "a");
        Multiverso instance = new Multiverso("50", "");
        galaxia.anadirSistemaEstelar(sistemaEstelar);
        instance.agregarGalaxia(galaxia);
        boolean expResult = false;
        boolean result = instance.eliminarSistemaEstelar(idGalaxia, idSistemaEstelar);
        assertEquals(expResult, result);
    }

    /**
     * Test of buscarGalaxia method, of class Multiverso.
     */
    @Test
    public void testBuscarGalaxia() {
        System.out.println("buscarGalaxia");
        String idGalaxia = "1";
        Galaxia galaxia = new Galaxia("1", "");
        Multiverso instance = new Multiverso("50", "");
        instance.agregarGalaxia(galaxia);
        
        Galaxia expResult = galaxia;
        Galaxia result = instance.buscarGalaxia(idGalaxia);
        assertEquals(expResult, result);
    }
    
    /**
     * Test of buscarGalaxia method, of class Multiverso.
     */
    @Test
    public void testBuscarGalaxiaInexistente() {
        System.out.println("buscarGalaxia");
        String idGalaxia = "0";
        Galaxia galaxia = new Galaxia("1", "");
        Multiverso instance = new Multiverso("50", "");
        instance.agregarGalaxia(galaxia);
        
        Galaxia expResult = null;
        Galaxia result = instance.buscarGalaxia(idGalaxia);
        assertEquals(expResult, result);
    }

    /**
     * Test of listarGalaxiasDescripcion method, of class Multiverso.
     */
    @Test
    public void testListarGalaxiasDescripcion() {
        System.out.println("listarGalaxiasDescripcion");
        Multiverso instance = new Multiverso("50", "");
        
        Galaxia galaxia1 = new Galaxia("200", "Zrueba");
        Galaxia galaxia2 = new Galaxia("100", "hola");
        
        SistemaEstelar sistemaEstelar1 = new SistemaEstelar("58X", "a");
        SistemaEstelar sistemaEstelar2 = new SistemaEstelar("BD7", "a");
        
        galaxia1.anadirSistemaEstelar(sistemaEstelar1);
        galaxia2.anadirSistemaEstelar(sistemaEstelar2);
        
        instance.agregarGalaxia(galaxia2);
        instance.agregarGalaxia(galaxia1);
        
        List<Galaxia> expResult = new ArrayList(){{
            add(galaxia2);
            add(galaxia1);
        }};
        List<Galaxia> result = instance.listarGalaxiasDescripcion();
        for (int i = 0; i < result.size(); i++) {
            assertEquals(expResult.get(i).getDescripcion(), result.get(i).getDescripcion());
        }

        
    }

}
