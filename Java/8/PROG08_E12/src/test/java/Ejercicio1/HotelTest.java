/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit5TestClass.java to edit this template
 */
package Ejercicio1;

import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Set;
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
public class HotelTest {

    public HotelTest() {
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
     * Test of anadirHabitacion method, of class Hotel.
     */
    @Test
    public void testAnadirHabitacion() {
        System.out.println("anadirHabitacion");
        Habitacion habitacion = new Habitacion("50", "", 0.0);
        Hotel instance = new Hotel("", "", "");;
        instance.anadirHabitacion(habitacion);
        instance.getHabitaciones();
    }

    /**
     * Test of buscarHabitacion method, of class Hotel.
     */
    @Test
    public void testBuscarHabitacion() {
        System.out.println("buscarHabitacion");
        String identificadorHabitacion = "50";
        Hotel instance = new Hotel("", "", "");
        instance.anadirHabitacion(new Habitacion("50", "", 0.0));
        Habitacion expResult = new Habitacion("50", "", 0.0);
        Habitacion result = instance.buscarHabitacion(identificadorHabitacion);
        assertEquals(expResult, result);
    }

    /**
     * Test of buscarCliente method, of class Hotel.
     */
    @Test
    public void testBuscarCliente() {
        System.out.println("buscarCliente");

        String identificadorHabitacion = "50";
        String identificadorCliente = "002";

        Cliente cliente1 = new Cliente("001", "Juan");
        Cliente cliente2 = new Cliente("002", "María");
        Cliente cliente3 = new Cliente("003", "Pedro");

        List<Cliente> clientes = new ArrayList<>();
        clientes.add(cliente1);
        clientes.add(cliente2);
        clientes.add(cliente3);

        Habitacion habitacion = new Habitacion("50", clientes);

        Hotel instance = new Hotel("", "", "");

        instance.anadirHabitacion(habitacion);

        Cliente expResult = cliente2;
        Cliente result = instance.buscarCliente(identificadorHabitacion, identificadorCliente);
        assertEquals(expResult, result);
    }

    /**
     * Test of ordenarNombre method, of class Hotel.
     */
    @Test
    public void testOrdenarNombre() {
        System.out.println("ordenarNombre");
        Hotel instance = new Hotel("", "", "");
        instance.anadirHabitacion(new Habitacion("50"));
        instance.anadirHabitacion(new Habitacion("20"));
        instance.anadirHabitacion(new Habitacion("18"));

        Set expResult = new HashSet();
        expResult.add(new Habitacion("18"));
        expResult.add(new Habitacion("20"));
        expResult.add(new Habitacion("50"));

        Set result = instance.ordenarNombre();
        assertEquals(expResult, result);

    }

    /**
     * Test of clientes method, of class Hotel.
     */
    @Test
    public void testClientes() {
        System.out.println("clientes");
        Cliente cliente1 = new Cliente("001", "Juan");
        Cliente cliente2 = new Cliente("002", "María");
        Cliente cliente3 = new Cliente("003", "Pedro");

        Habitacion habitacion1 = new Habitacion("50");
        Habitacion habitacion2 = new Habitacion("20");
        Habitacion habitacion3 = new Habitacion("18");
        habitacion1.anadirCliente(cliente3);
        habitacion2.anadirCliente(cliente2);
        habitacion3.anadirCliente(cliente1);

        Hotel instance = new Hotel("", "", "");
        instance.anadirHabitacion(habitacion1);
        instance.anadirHabitacion(habitacion2);
        instance.anadirHabitacion(habitacion3);

        List expResult = new ArrayList() {
            {
                add(cliente1);
                add(cliente2);
                add(cliente3);
            }
        };
        List result = instance.clientes();
        assertEquals(expResult, result);
    }

    /**
     * Test of getNumHabitaciones method, of class Hotel.
     */
    @Test
    public void testGetNumHabitaciones() {
        System.out.println("getNumHabitaciones");

        Hotel instance = new Hotel("", "", "");
        instance.anadirHabitacion(new Habitacion("50"));
        instance.anadirHabitacion(new Habitacion("20"));
        instance.anadirHabitacion(new Habitacion("18"));

        int expResult = 3;
        int result = instance.getNumHabitaciones();
        assertEquals(expResult, result);
    }
}
