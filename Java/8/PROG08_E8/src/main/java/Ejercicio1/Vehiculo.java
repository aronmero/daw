package Ejercicio1;

import java.util.HashSet;
import java.util.Objects;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Vehiculo {
    private String identificador;
    private String tipo;
    private int capacidadCarga;
    private HashSet paquetesTransportar;

    public Vehiculo(String identificador, String tipo, int capacidadCarga, HashSet paquetesTransportar) {
        this.identificador = identificador;
        this.tipo = tipo;
        this.capacidadCarga = capacidadCarga;
        this.paquetesTransportar = paquetesTransportar;
    }
    
    public HashSet getPaquetesTransportar() {
        return paquetesTransportar;
    }

    public void setPaquetesTransportar(HashSet paquetesTransportar) {
        this.paquetesTransportar = paquetesTransportar;
    }
    
    public void anadirPaquete(Paquete paquete){
        paquetesTransportar.add(paquete);
    }

    public String getIdentificador() {
        return identificador;
    }

    public void setIdentificador(String identificador) {
        this.identificador = identificador;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public int getCapacidadCarga() {
        return capacidadCarga;
    }

    public void setCapacidadCarga(int capacidadCarga) {
        this.capacidadCarga = capacidadCarga;
    }
    
    @Override
    public int hashCode() {
        int hash = 7;
        hash = 53 * hash + this.capacidadCarga;
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
        if (this.identificador != other.identificador) {
            return false;
        }
        if (this.capacidadCarga != other.capacidadCarga) {
            return false;
        }
        if (!Objects.equals(this.tipo, other.tipo)) {
            return false;
        }
        return true;
    }


    
}
