package Ejercicio17;

import java.io.Serializable;
import java.util.Comparator;
import java.util.Objects;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Alumno implements Serializable, Comparator<Alumno> {

    private String dni;
    private String nombre;
    private int edad;
    private String fecha;

    public Alumno(String dni, String nombre, int edad, String fecha) {
        this.dni = dni;
        this.nombre = nombre;
        this.edad = edad;
        this.fecha = fecha;
    }

    public Alumno() {
    }

    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public int getEdad() {
        return edad;
    }

    public void setEdad(int edad) {
        this.edad = edad;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    @Override
    public String toString() {
        return "Alumno{" + "dni=" + dni + ", nombre=" + nombre + ", edad=" + edad + ", fecha=" + fecha + '}';
    }

    @Override
    public int compare(Alumno o1, Alumno o2) {
        return o1.getDni().compareTo(o2.getDni());
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 67 * hash + Objects.hashCode(this.dni);
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Alumno other = (Alumno) obj;
        return Objects.equals(this.dni, other.dni);
    }
    

}
