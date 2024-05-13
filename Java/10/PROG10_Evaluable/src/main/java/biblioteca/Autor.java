package biblioteca;

import java.util.LinkedList;

public class Autor implements Comparable<Autor> {

    private String nombre;
    private int anioNacimiento;
    private String dni;
    private LinkedList<Direccion> direcciones;

    public Autor(String nombre, int anioNacimiento, String dni) {
        this.nombre = nombre;
        this.anioNacimiento = anioNacimiento;
        this.dni = dni;
        direcciones = new LinkedList();
    }

    boolean anadirDireccion(Direccion direccion) {
        return direcciones.add(direccion);
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public int getAnioNacimiento() {
        return anioNacimiento;
    }

    public void setAnioNacimiento(int anioNacimiento) {
        this.anioNacimiento = anioNacimiento;
    }

    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    @Override
    public String toString() {
        return "Autor{" + "nombre=" + nombre + ", anioNacimiento=" + anioNacimiento + ", dni=" + dni + ", direcciones=" + direcciones.toString() + '}';
    } 

    public LinkedList<Direccion> getDirecciones() {
        return direcciones;
    }

    public void setDirecciones(LinkedList<Direccion> direcciones) {
        this.direcciones = direcciones;
    }

    
    @Override
    public int compareTo(Autor o) {
        return this.getDni().compareTo(o.getDni());
    }

}
