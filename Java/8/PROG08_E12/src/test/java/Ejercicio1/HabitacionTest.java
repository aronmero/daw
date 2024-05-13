/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

import java.util.List;
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
public class HabitacionTest {

    public HabitacionTest() {

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
     * Test of anadirCliente method, of class Habitacion.
     */
    @Test
    public void testAnadirCliente() {
        System.out.println("anadirCliente");
        Cliente cliente = new Cliente("12345", "Juan");
        Habitacion instance = new Habitacion("", "", 0.0);
        instance.anadirCliente(cliente);
    }

    /**
     * Test of buscarCliente method, of class Habitacion.
     */
    @Test
    public void testBuscarCliente() {
        Cliente cliente = new Cliente("12345", "Juan");
        Cliente cliente2 = new Cliente("525", "Paca");
        Cliente cliente3 = new Cliente("1232445", "Jua");
        Cliente cliente4 = new Cliente("123454fd5", "sof");
        Cliente cliente5 = new Cliente("12hdgfh5345", "mai");
        Habitacion habitacion = new Habitacion("", "", 0.0);
        habitacion.anadirCliente(cliente);
        habitacion.anadirCliente(cliente2);
        habitacion.anadirCliente(cliente3);
        habitacion.anadirCliente(cliente4);
        habitacion.anadirCliente(cliente5);
        System.out.println("buscarCliente");
        String identificadorCliente = "12hdgfh5345";
        Cliente expResult = new Cliente("12hdgfh5345", "mai");
        Cliente result = habitacion.buscarCliente(identificadorCliente);
        assertEquals(expResult.toString(), result.toString());

    }

}
