package Ejercicio2;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.HashSet;
import java.util.List;

/**
 *
 * @author Aarón Medina Rodríguez
 */
//Implementar el ejercicio del concesionario con un Set. con lo básico, insertar, borrar, y ordenar por matrícula, y nif
public class Concesionario {

    private HashSet<Vehiculo> vehiculos;

    public Concesionario() {
        vehiculos = new HashSet();
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

    HashSet ordenarMatricula() {
        List vehiculosOrdenados = new ArrayList(vehiculos);
        Comparator c = Comparator.naturalOrder();
        vehiculosOrdenados.sort(c);
        HashSet ordenados = new HashSet(vehiculosOrdenados);
        return ordenados;
    }

}
