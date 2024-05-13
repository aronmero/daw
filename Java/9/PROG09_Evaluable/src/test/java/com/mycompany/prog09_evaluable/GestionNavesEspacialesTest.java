/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.prog09_evaluable;

import java.util.HashMap;
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
public class GestionNavesEspacialesTest {
    
    public GestionNavesEspacialesTest() {
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
     * Test of insertarNave method, of class GestionNavesEspaciales.
     */
    @Test
    public void testInsertarNaveCarga() {
        System.out.println("insertarNave");
        NaveCarga nave = new NaveCarga("","","",0);
        GestionNavesEspaciales instance = new GestionNavesEspaciales();
        boolean expResult = true;
        boolean result = instance.insertarNave(nave);
        assertEquals(expResult, result);
    }
    
    /**
     * Test of insertarNave method, of class GestionNavesEspaciales.
     */
    @Test
    public void testInsertarNaveCargaPesada() {
        System.out.println("insertarNave");
        NaveCargaPesada nave = new NaveCargaPesada("","","",0,"");
        GestionNavesEspaciales instance = new GestionNavesEspaciales();
        boolean expResult = true;
        boolean result = instance.insertarNave(nave);
        assertEquals(expResult, result);
    }
    
    /**
     * Test of insertarNave method, of class GestionNavesEspaciales.
     */
    @Test
    public void testInsertarNavePasajeros() {
        System.out.println("insertarNave");
        NavePasajeros nave = new NavePasajeros("","","",0,"");
        GestionNavesEspaciales instance = new GestionNavesEspaciales();
        boolean expResult = true;
        boolean result = instance.insertarNave(nave);
        assertEquals(expResult, result);
    }
    
    /**
     * Test of insertarNave method, of class GestionNavesEspaciales.
     */
    @Test
    public void testInsertarNavePasajerosLujo() {
        System.out.println("insertarNave");
        NavePasajerosLujo nave = new NavePasajerosLujo("","","",0,"",0);
        GestionNavesEspaciales instance = new GestionNavesEspaciales();
        boolean expResult = true;
        boolean result = instance.insertarNave(nave);
        assertEquals(expResult, result);
    }

    
}
