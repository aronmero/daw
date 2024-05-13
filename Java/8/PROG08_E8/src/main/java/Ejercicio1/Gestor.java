package Ejercicio1;

import java.util.Collection;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Iterator;
import java.util.LinkedList;
import java.util.TreeSet;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Gestor<T> {
    private TreeSet vehiculos;
    private HashSet paquetes;
    private LinkedList rutas;
    private HashMap rutasAsignadas;

    public Gestor() {
        this.vehiculos = new TreeSet();
        this.paquetes = new HashSet();
        this.rutas = new LinkedList();
        this.rutasAsignadas = new HashMap();
    }

    //Crear un método genérico para agregar elementos a las colecciones TreeSet, HashSet y LinkedList.
    public <T> boolean agregarElemento(Collection<T> coleccion, T elemento) {
        return coleccion.add(elemento);
    }

    //Crear un método genérico para buscar un elemento en las colecciones TreeSet, HashSet y LinkedList utilizando el identificador único.
    /**
     * @param <T> generico con interfaz para utilizar getIdentificador
     * @param coleccion generico de coleccion
     * @param identificador
     * @return
     */
    public static <T extends Identificable> T buscar(Collection<T> coleccion, String identificador) {
        for (T elemento : coleccion) {
            if (elemento.getIdentificador().equals(identificador)) {
                return elemento;
            }
        }
        return null;
    }

    //Crear un método genérico para eliminar elementos de las colecciones TreeSet, HashSet y LinkedList utilizando el identificador único.
    /**
     * @param <T> generico con interfaz para utilizar getIdentificador
     * @param coleccion generico de coleccion
     * @param identificador
     * @return
     */
    public static <T extends Identificable> boolean eliminar(Collection<T> coleccion, String identificador) {
        for (T elemento : coleccion) {
            if (elemento.getIdentificador().equals(identificador)) {
                coleccion.remove(elemento);
                return true;
            }
        }
        return false;
    }

    void asignarRuta(Vehiculo vehiculo, Ruta ruta) {
        rutasAsignadas.put(vehiculo, ruta);
        ruta.setVehiculoAsignado(vehiculo);
        ruta.setPaquetesTransportar(vehiculo.getPaquetesTransportar());
    }

    String listarRutasAsignadas() {
        return rutasAsignadas.toString();
    }

}
