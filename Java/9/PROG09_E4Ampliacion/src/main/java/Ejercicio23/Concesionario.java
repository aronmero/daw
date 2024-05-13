package Ejercicio23;

import java.util.LinkedList;
import java.util.List;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Concesionario {

    private List<Vehiculo> listaVehiculo;

    public Concesionario(List<Vehiculo> listaVehiculo) {
        this.listaVehiculo = listaVehiculo;
    }

    public Concesionario() {
     listaVehiculo = new LinkedList();
    }
    
    public void anadirVehiculo(Vehiculo vehiculo){
        listaVehiculo.add(vehiculo);
    }

    public List<Vehiculo> getListaVehiculo() {
        return listaVehiculo;
    }

    public void setListaVehiculo(List<Vehiculo> listaVehiculo) {
        this.listaVehiculo = listaVehiculo;
    }
    public void anadirVariosVehiculo(List<Vehiculo> listaVehiculo){
        listaVehiculo.addAll(listaVehiculo);
    }
    
}
