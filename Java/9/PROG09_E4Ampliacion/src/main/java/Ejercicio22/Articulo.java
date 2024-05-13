package Ejercicio22;

import java.io.Serializable;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Articulo implements Serializable{
    private int cantidad;
    private String codArticulo;
    private String descripcion;

    public Articulo() {
    }

    public Articulo(int cantidad, String codArticulo, String descripcion) {
        this.cantidad = cantidad;
        this.codArticulo = codArticulo;
        this.descripcion = descripcion;
    }

    public int getCantidad() {
        return cantidad;
    }

    public void setCantidad(int cantidad) {
        this.cantidad = cantidad;
    }

    public String getCodArticulo() {
        return codArticulo;
    }

    public void setCodArticulo(String codArticulo) {
        this.codArticulo = codArticulo;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    @Override
    public String toString() {
        return "Articulo{" + "codArticulo=" + codArticulo + ", descripcion=" + descripcion + ", cantidad=" + cantidad +'}';
    }
    
    
}
