/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit5TestClass.java to edit this template
 */
package Ejercicio1;

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
 * @author Aarón
 */
public class GestorTest {
    
    public GestorTest() {
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
     * Test of buscarHabitacion method, of class Gestor.
     */
    @Test
    public void testBuscarHabitacion() {
        System.out.println("buscarHabitacion");
        String identificadorHotel = "";
        String identificadorHabitacion = "";
        Gestor instance = null;
        Habitacion expResult = null;
        Habitacion result = instance.buscarHabitacion(identificadorHotel, identificadorHabitacion);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of buscarCliente method, of class Gestor.
     */
    @Test
    public void testBuscarCliente() {
        System.out.println("buscarCliente");
        String identificadorHotel = "";
        String identificadorHabitacion = "";
        String identificadorCliente = "";
        Gestor instance = null;
        Cliente expResult = null;
        Cliente result = instance.buscarCliente(identificadorHotel, identificadorHabitacion, identificadorCliente);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of ordenarNumHabitaciones method, of class Gestor.
     */
    @Test
    public void testOrdenarNumHabitaciones() {
        System.out.println("ordenarNumHabitaciones");
        Gestor instance = null;
        Map expResult = null;
        Map result = instance.ordenarNumHabitaciones();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of inteseccionClientes method, of class Gestor.
     */
    @Test
    public void testInteseccionClientes() {
        System.out.println("inteseccionClientes");
        String identificadorHotel = "";
        String identificadorHotel2 = "";
        Gestor instance = null;
        List expResult = null;
        List result = instance.inteseccionClientes(identificadorHotel, identificadorHotel2);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }


    
}
