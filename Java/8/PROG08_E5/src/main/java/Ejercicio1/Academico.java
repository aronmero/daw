package Ejercicio1;

import java.util.Map;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Academico implements Comparable<Academico> {

    private String nombre;
    private int fechaIngreso;

    public Academico(String nombre, int fechaIngreso) {
        this.nombre = nombre;
        this.fechaIngreso = fechaIngreso;
    }

    @Override
    public int compareTo(Academico academico) {
        return nombre.compareTo(academico.nombre);
    }

    @Override
    public String toString() {
        return "Academico{" + "nombre=" + nombre + ", fechaIngreso=" + fechaIngreso + '}';
    }

    public String getNombre() {
        return nombre;
    }

    public int getFechaIngreso() {
        return fechaIngreso;
    }

    public static boolean nuevoAcademico(Map<Character, Academico> academia, Academico nuevo, Character letra) {
        if (!Character.isLetter(letra)) {
            return false;
        }
        academia.put(letra, nuevo);
        return true;
    }
}
