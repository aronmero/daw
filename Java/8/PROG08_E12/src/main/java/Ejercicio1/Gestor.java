package Ejercicio1;

import java.util.Comparator;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.TreeMap;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Gestor {

    private Map<String, Hotel> hoteles;

    public Gestor(Map<String, Hotel> hoteles) {
        this.hoteles = new HashMap();
    }

    void anadirHotel(Hotel hotel){
        hoteles.put(hotel.getIdentificador(), hotel);
    }
    
    Habitacion buscarHabitacion(String identificadorHotel, String identificadorHabitacion) {
        return hoteles.get(identificadorHotel).buscarHabitacion(identificadorHabitacion);
    }

    Cliente buscarCliente(String identificadorHotel, String identificadorHabitacion, String identificadorCliente) {
        return hoteles.get(identificadorHotel).buscarCliente(identificadorHabitacion, identificadorCliente);
    }

    Map ordenarNombre() {
        Comparator comparador = new Comparator<Hotel>() {
            @Override
            public int compare(Hotel o1, Hotel o2) {
                return o1.getNombre().compareTo(o2.getNombre());
            }
        };
        Map<String, Hotel> hotelesOrdenados = new TreeMap<String, Hotel>(comparador);
        hotelesOrdenados.putAll(hoteles);
        return hotelesOrdenados;
    }

    Map ordenarUbicacion() {
        Comparator comparador = new Comparator<Hotel>() {
            @Override
            public int compare(Hotel o1, Hotel o2) {
                return o1.getUbicacion().compareTo(o2.getUbicacion());
            }
        };
        Map<String, Hotel> hotelesOrdenados = new TreeMap<String, Hotel>(comparador);
        hotelesOrdenados.putAll(hoteles);
        return hotelesOrdenados;
    }

    Map ordenarNumHabitaciones() {
        Comparator comparador = new Comparator<Hotel>() {
            @Override
            public int compare(Hotel o1, Hotel o2) {
                return Integer.compare(o1.getNumHabitaciones(), o2.getNumHabitaciones());
            }
        };
        Map<String, Hotel> hotelesOrdenados = new TreeMap<String, Hotel>(comparador);
        hotelesOrdenados.putAll(hoteles);
        return hotelesOrdenados;
    }

    List inteseccionClientes(String identificadorHotel, String identificadorHotel2) {
        List<Cliente> clientesHotel1 = hoteles.get(identificadorHotel).clientes();
        List<Cliente> clientesHotel2 = hoteles.get(identificadorHotel2).clientes();
        clientesHotel1.retainAll(clientesHotel2);
        return clientesHotel1;
    }

    @Override
    public String toString() {
        return "Gestor{" + "hoteles=" + hoteles + '}';
    }
    
    
    
}
