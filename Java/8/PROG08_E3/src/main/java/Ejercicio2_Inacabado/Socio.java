package Ejercicio2_Inacabado;

import java.util.Date;
import java.util.Objects;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Socio {
    private String dni;
    private String nombre;
    private Date fechaAlta;

    public Socio(String dni, String nombre, Date fechaAlta) {
        this.dni = dni;
        this.nombre = nombre;
        this.fechaAlta = fechaAlta;
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
        final Socio other = (Socio) obj;
        if (!Objects.equals(this.dni, other.dni)) {
            return false;
        }
        return true;
    }
}
