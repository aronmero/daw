package Ejercicio3;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.Iterator;
import java.util.LinkedList;
import java.util.List;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) {
        List<Producto> productos = new ArrayList<>();

        productos.add(new Producto("1", "Camiseta", 20, "Ropa", 'A'));
        productos.add(new Producto("2", "Pantalón", 30, "Ropa", 'B'));
        productos.add(new Producto("3", "Calcetines", 5, "Ropa", 'C'));
        productos.add(new Producto("4", "Zapatos", 50, "Calzado", 'A'));
        productos.add(new Producto("5", "Gorra", 10, "Accesorio", 'B'));

        //2. Convierta el `ArrayList` a un `LinkedList`.
        LinkedList productosLinkeados = new LinkedList(productos);

        //3. Ordenar la lista por cada uno de los atributos (nombre, precio, categoría y clasificación) utilizando `Collections.sort()` y un `Comparator` personalizado para cada atributo.
        Comparator<Producto> comparadorPrecio = new Comparator<Producto>() {
            @Override
            public int compare(Producto p1, Producto p2) {
                return Double.compare(p1.getPrecio(), p2.getPrecio());
            }
        };
        Collections.sort(productosLinkeados, comparadorPrecio);
        System.out.println("Productos ordenados por precio:");
        System.out.println(productosLinkeados);
        System.out.println();

        Comparator<Producto> comparadorCategoria = new Comparator<Producto>() {
            @Override
            public int compare(Producto p1, Producto p2) {
                return p1.getCategoria().compareTo(p2.getCategoria());
            }
        };
        Collections.sort(productosLinkeados, comparadorCategoria);
        System.out.println("Productos ordenados por categoria:");
        System.out.println(productosLinkeados);
        System.out.println();

        Comparator<Producto> comparadorClasificacion = new Comparator<Producto>() {
            @Override
            public int compare(Producto p1, Producto p2) {
                return Character.compare(p1.getClasificacion(), p2.getClasificacion());
            }
        };

        Collections.sort(productosLinkeados, comparadorClasificacion);
        System.out.println("Productos ordenados por clasificacion:");
        System.out.println(productosLinkeados);
        System.out.println();

        Comparator<Producto> comparadorNombre = new Comparator<Producto>() {
            @Override
            public int compare(Producto p1, Producto p2) {
                return p1.getNombre().compareTo(p2.getNombre());
            }
        };
        Collections.sort(productosLinkeados, comparadorNombre);
        System.out.println("Productos ordenados por nombre:");
        System.out.println(productosLinkeados);
        System.out.println();

    }
}
