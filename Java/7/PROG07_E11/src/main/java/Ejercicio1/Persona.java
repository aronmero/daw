/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Persona implements Imprimible{
    private String nombre, apellidos, dni;

    public Persona(String nombre, String apellidos, String dni) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.dni = dni;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }


    @Override
    public String devolverInfoString() {
        return ", nombre=" + nombre + ", apellidos=" + apellidos + ", dni=" + dni ;
    }
    
}
