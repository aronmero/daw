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
public class CuentaAhorroTest {
    
    public CuentaAhorroTest() {
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
     * Test of retirarDinero method, of class CuentaAhorro.
     */
    @Test
    public void testRetirarDinero() {
        System.out.println("retirarDinero");
        Double cantidad = 50d;
        Persona titular = new Persona("Juan","Mendoza","42");
        CuentaAhorro instance= new CuentaAhorro(5, "1", 100,titular);
        
        boolean expResult = true;
        double saldoEsperado = 55;
        boolean result = instance.retirarDinero(cantidad);
        assertEquals(expResult, result);
        assertEquals(saldoEsperado, instance.getSaldo());
    }

    /**
     * Test of devolverInfoString method, of class CuentaAhorro.
     */
    @Test
    public void testDevolverInfoString() {
        System.out.println("devolverInfoString");
        
        Persona titular = new Persona("Juan","Mendoza","42");
        CuentaAhorro instance= new CuentaAhorro(5, "1", 100,titular);
        
        String expResult = "iban=1, saldo=100.0, nombre=Juan, apellidos=Mendoza, dni=42, tipoInteres=5.0";
        String result = instance.devolverInfoString();
        assertEquals(expResult, result);

    }
    
}
