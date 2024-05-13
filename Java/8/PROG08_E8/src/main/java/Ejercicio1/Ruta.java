package Ejercicio1;

import java.util.HashSet;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Ruta {
    private String identificador;
    private String descripcion;
    private Vehiculo vehiculoAsignado;
    private HashSet paquetesTransportar;

    public Ruta(String identificador, String descripcion, Vehiculo vehiculoAsignado, HashSet paquetesTransportar) {
        this.identificador = identificador;
        this.descripcion = descripcion;
        this.vehiculoAsignado = vehiculoAsignado;
        this.paquetesTransportar = paquetesTransportar;
    }

    public String getIdentificador() {
        return identificador;
    }

    public void setIdentificador(String identificador) {
        this.identificador = identificador;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public Vehiculo getVehiculoAsignado() {
        return vehiculoAsignado;
    }

    public void setVehiculoAsignado(Vehiculo vehiculoAsignado) {
        this.vehiculoAsignado = vehiculoAsignado;
    }

    public HashSet getPaquetesTransportar() {
        return paquetesTransportar;
    }

    public void setPaquetesTransportar(HashSet paquetesTransportar) {
        this.paquetesTransportar = paquetesTransportar;
    }
    
}
