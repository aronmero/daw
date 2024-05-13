/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Ejercicio08;

/**
 *
 * @author Aarón
 */
public class Principal {

    public static void main(String[] args) {
        modificarArchivo("enteros.dat");
    }

    static void modificarArchivo(String nombreArchivo) {
        String archivo = System.getProperty("user.dir") + "\\src\\main\\java\\Ejercicio08\\" + nombreArchivo;

    }
}
