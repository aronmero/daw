package Ejercicio3;

import java.util.ArrayList;
import java.util.Comparator;

/**
 *
 * @author Aarón Medina Rodríguez
 */
//Implementar el Concesionario con un ArrayList. con lo básico, insertar, borrar, y ordenar por matrícula, y nif
public class Concesionario {

    private ArrayList<Vehiculo> vehiculos;

    public Concesionario() {
        vehiculos = new ArrayList();
    }

    void anadirVehiculo(Vehiculo vehiculo) {
        vehiculos.add(vehiculo);
    }

    boolean eliminarVehiculo(String matricula) {
        for (Vehiculo vehiculo : vehiculos) {
            if (matricula.equalsIgnoreCase(vehiculo.getMatricula())) {
                vehiculos.remove(vehiculo);
                return true;
            }
        }
        return false;
    }

    ArrayList ordenarMatricula() {
        ArrayList vehiculosOrdenados = new ArrayList(vehiculos);
        Comparator c = Comparator.naturalOrder();
        vehiculosOrdenados.sort(c);
        return vehiculosOrdenados;
    }

}
