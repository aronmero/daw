package Ejercicio4;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.LinkedHashSet;

/**
 *
 * @author Aarón Medina Rodríguez
 */
//Implementar el Concesionario con un LinkedHasSet con lo básico, insertar, borrar, y ordenar por matrícula, y nif
public class Concesionario {

    private LinkedHashSet<Vehiculo> vehiculos;

    public Concesionario() {
        vehiculos = new LinkedHashSet();
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

    LinkedHashSet ordenarMatricula() {
        ArrayList vehiculosOrdenados = new ArrayList(vehiculos);
        Comparator c = Comparator.naturalOrder();
        vehiculosOrdenados.sort(c);
        LinkedHashSet ordenados = new LinkedHashSet(vehiculosOrdenados);
        return ordenados;
    }

}
