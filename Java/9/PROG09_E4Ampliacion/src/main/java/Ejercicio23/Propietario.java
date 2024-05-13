package Ejercicio23;

import java.io.Serializable;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Propietario implements Serializable{

    private String nombre;

    public Propietario(String nombre) {
        this.nombre = nombre;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

}
