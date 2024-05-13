/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit5TestClass.java to edit this template
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
 * @author Aarón
 */
public class PersonaTest {
    
    public PersonaTest() {
    }
    
    @BeforeAll
    public static void setUpClass() {
    }
    
    @AfterAll
    public static void tearDownClass() {
    }
    
    @BeforeEach 
    public void setUp() { 
        Persona instance = new Persona("Juan","Mendonza","42");
    }
    
    @AfterEach
    public void tearDown() {
    }

    /**
     * Test of setNombre method, of class Persona.
     */
    @Test
    public void testSetNombre() {
        System.out.println("setNombre");
        String nombre = "Tomas";
        Persona instance = new Persona("Juan","Mendonza","42");
        instance.setNombre(nombre);

    }

    /**
     * Test of devolverInfoString method, of class Persona.
     */
    @Test
    public void testDevolverInfoString() {
        System.out.println("devolverInfoString");
        Persona instance = new Persona("Juan","Mendonza","42");
        String expResult = ", nombre=Juan, apellidos=Mendonza, dni=42";
        String result = instance.devolverInfoString();
        assertEquals(expResult, result);
    }
    
}
