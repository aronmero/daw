package Ejercicio2;

import java.util.Comparator;
import java.util.Objects;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Persona implements Comparator<Persona>{
    private String nif;
    private String nombre;

    public Persona(String nif, String nombre) {
        this.nif = nif;
        this.nombre = nombre;
    }

    public String getNif() {
        return nif;
    }

    public void setNif(String nif) {
        this.nif = nif;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 79 * hash + Objects.hashCode(this.nif);
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
        final Persona other = (Persona) obj;
        if (!Objects.equals(this.nif, other.nif)) {
            return false;
        }
        return true;
    }

    @Override
    public int compare(Persona p1, Persona p2) {
        return p1.getNif().compareTo(p2.getNif());
    }
    
    
    
}
