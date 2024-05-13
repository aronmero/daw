package Ejercicio1;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.LinkedList;
import java.util.List;
import java.util.Objects;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Habitacion implements Comparator<Habitacion>, Comparable<Habitacion> {

    private String identificador;
    private String tipo;
    private Double precio;
    private List<Cliente> clientes;
    private boolean disponibilidad;

    public Habitacion(String identificador, String tipo, Double precio) {
        this.identificador = identificador;
        this.tipo = tipo;
        this.precio = precio;
        this.clientes = new LinkedList();
        this.disponibilidad=true;
    }

    public Habitacion(String identificador) {
        this.identificador = identificador;
        this.clientes = new LinkedList();
        this.disponibilidad=true;
    }

    public Habitacion(String identificador, List<Cliente> clientes) {
        this.identificador = identificador;
        this.clientes = clientes;
        this.disponibilidad=true;
    }

    
    
    void anadirCliente(Cliente cliente) {
        clientes.add(cliente);
    }

    Cliente buscarCliente(String identificadorCliente) {
        List<Cliente> lista = new ArrayList<>(clientes);
        Comparator<Cliente> comparador = new Comparator<Cliente>() {
            @Override
            public int compare(Cliente o1, Cliente o2) {
                return o1.getIdentificador().compareTo(o2.getIdentificador());
            }
        };

        int indice = Collections.binarySearch(lista, new Cliente(identificadorCliente), comparador);
        if (indice >= 0) {
            return lista.get(indice);
        }
        return null;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 97 * hash + Objects.hashCode(this.identificador);
        hash = 97 * hash + Objects.hashCode(this.tipo);
        hash = 97 * hash + Objects.hashCode(this.precio);
        hash = 97 * hash + Objects.hashCode(this.clientes);
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
        final Habitacion other = (Habitacion) obj;
        if (!Objects.equals(this.identificador, other.identificador)) {
            return false;
        }
        return true;
    }

    public String getIdentificador() {
        return identificador;
    }

    public String getTipo() {
        return tipo;
    }

    public Double getPrecio() {
        return precio;
    }

    public List<Cliente> getClientes() {
        return clientes;
    }

    @Override
    public int compare(Habitacion o1, Habitacion o2) {
        return o1.getIdentificador().compareTo(o2.getIdentificador());
    }

    @Override
    public String toString() {
        return "Habitacion{" + "identificador=" + identificador + ", tipo=" + tipo + ", precio=" + precio + ", clientes=" + clientes + '}';
    }

    @Override
    public int compareTo(Habitacion o) {
            return this.getIdentificador().compareTo(o.getIdentificador());
    }

    public boolean isDisponibilidad() {
        return disponibilidad;
    }

    public void setDisponibilidad(boolean disponibilidad) {
        this.disponibilidad = disponibilidad;
    }

    
    
}
