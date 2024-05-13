package Ejercicio23;

import java.io.Serializable;
import java.util.Comparator;
import java.util.Objects;


/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Vehiculo implements Comparator<Vehiculo>, Serializable{
    private String matricula;
    private double precio;
    private String marca;
    private Propietario propietario;

    public Vehiculo(String matricula, double precio, String marca,Propietario propietario) {
        this.matricula = matricula;
        this.precio = precio;
        this.marca = marca;
        this.propietario =propietario;
    }

    public Vehiculo() {
    }

    public Propietario getPropietario() {
        return propietario;
    }

    public void setPropietario(Propietario propietario) {
        this.propietario = propietario;
    }

    public String getMatricula() {
        return matricula;
    }

    public void setMatricula(String matricula) {
        this.matricula = matricula;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }


    public String getMarca() {
        return marca;
    }

    public void setMarca(String marca) {
        this.marca = marca;
    }

    @Override
    public String toString() {
        return "Vehiculo{" + "matricula=" + matricula + ", precio=" + precio + ", marca=" + marca + ", propietario=" + propietario.getNombre() + '}';
    }




    @Override
    public int hashCode() {
        int hash = 5;
        hash = 29 * hash + Objects.hashCode(this.matricula);
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
        final Vehiculo other = (Vehiculo) obj;
        if (!Objects.equals(this.matricula, other.matricula)) {
            return false;
        }
        return true;
    }

    @Override
    public int compare(Vehiculo o1, Vehiculo o2) {
        return o1.getMatricula().compareTo(o2.getMatricula());
    }


}