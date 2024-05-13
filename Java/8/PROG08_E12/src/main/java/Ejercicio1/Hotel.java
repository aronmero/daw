package Ejercicio1;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashSet;
import java.util.List;
import java.util.Set;
import java.util.TreeSet;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Hotel implements Comparator<Hotel> {

    private String identificador;
    private String nombre;
    private String ubicacion;
    private Set<Habitacion> habitaciones;

    public Hotel(String identificador, String nombre, String ubicacion) {
        this.identificador = identificador;
        this.nombre = nombre;
        this.ubicacion = ubicacion;
        this.habitaciones = new TreeSet();
    }

    void anadirHabitacion(Habitacion habitacion){
        habitaciones.add(habitacion);
    }
    
    Habitacion buscarHabitacion(String identificadorHabitacion) {
        List<Habitacion> lista = new ArrayList<>(habitaciones);
        Comparator<Habitacion> comparador = new Comparator<Habitacion>() {
            @Override
            public int compare(Habitacion o1, Habitacion o2) {
                return o1.getIdentificador().compareTo(o2.getIdentificador());
            }
        };
        int indice = Collections.binarySearch(lista, new Habitacion(identificadorHabitacion), comparador);
        if (indice >= 0) {
            if(lista.get(indice).isDisponibilidad()){//Comprueba si la habitacion especificada esta
                return lista.get(indice);
            }
            return null;
        }
        return null;
    }

    Cliente buscarCliente(String identificadorHabitacion, String identificadorCliente) {
        List<Habitacion> lista = new ArrayList<>(habitaciones);
        Comparator<Habitacion> comparador = new Comparator<Habitacion>() {
            @Override
            public int compare(Habitacion o1, Habitacion o2) {
                return o1.getIdentificador().compareTo(o2.getIdentificador());
            }
        };

        int indice = Collections.binarySearch(lista, new Habitacion(identificadorHabitacion), comparador);
        if (indice >= 0) {
            return lista.get(indice).buscarCliente(identificadorCliente);
        }
        return null;
    }

    Set ordenarNombre() {
        Comparator comparador = new Comparator<Habitacion>() {
            @Override
            public int compare(Habitacion o1, Habitacion o2) {
                return o1.getIdentificador().compareTo(o2.getIdentificador());
            }
        };
        Set<Habitacion> habitacionesOrdenadas = new TreeSet<>(comparador);
        habitacionesOrdenadas.addAll(habitaciones);
        return habitacionesOrdenadas;
    }

    Set ordenarTipo() {
        Comparator comparador = new Comparator<Habitacion>() {
            @Override
            public int compare(Habitacion o1, Habitacion o2) {
                return o1.getTipo().compareTo(o2.getTipo());
            }
        };
        Set<Habitacion> habitacionesOrdenadas = new TreeSet<>(comparador);
        habitacionesOrdenadas.addAll(habitaciones);
        return habitacionesOrdenadas;
    }

    Set ordenarPrecio() {
        Comparator comparador = new Comparator<Habitacion>() {
            @Override
            public int compare(Habitacion o1, Habitacion o2) {
                return Double.compare(o1.getPrecio(), o2.getPrecio());
            }
        };
        Set<Habitacion> habitacionesOrdenadas = new TreeSet<>(comparador);
        habitacionesOrdenadas.addAll(habitaciones);
        return habitacionesOrdenadas;
    }

    List clientes() {
        List<Cliente> clientes = new ArrayList();
        for (Habitacion habita : habitaciones) {
            clientes.addAll(habita.getClientes());
        }
        return clientes;
    }

    public String getIdentificador() {
        return identificador;
    }

    public String getNombre() {
        return nombre;
    }

    public String getUbicacion() {
        return ubicacion;
    }

    public Set<Habitacion> getHabitaciones() {
        return habitaciones;
    }

    public int getNumHabitaciones() {
        return habitaciones.size();
    }

    @Override
    public int compare(Hotel o1, Hotel o2) {
        return o1.getIdentificador().compareTo(o2.getIdentificador());
    }

    @Override
    public String toString() {
        return "Hotel{" + "identificador=" + identificador + ", nombre=" + nombre + ", ubicacion=" + ubicacion + ", habitaciones=" + habitaciones + '}';
    }

    
    
}
