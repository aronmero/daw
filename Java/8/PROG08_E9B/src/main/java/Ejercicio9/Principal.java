package Ejercicio9;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.LinkedHashMap;

import java.util.LinkedList;
import java.util.List;
import java.util.Map;
import java.util.TreeMap;

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
       List<Producto> productosLinkeados = new LinkedList<Producto>(productos);

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

        //4. Almacene los datos en un `HashMap` donde la clave sea el ID del producto y el valor sea el objeto `Producto`.
        Map<String, Producto> mapa = new HashMap();

        Producto producto1 = new Producto("1", "Camiseta", 20, "Ropa", 'A');
        Producto producto2 = new Producto("2", "Pantalón", 30, "Ropa", 'B');
        Producto producto3 = new Producto("3", "Calcetines", 5, "Ropa", 'C');
        Producto producto4 = new Producto("4", "Zapatos", 50, "Calzado", 'A');
        Producto producto5 = new Producto("5", "Gorra", 10, "Accesorio", 'B');

        mapa.put(producto1.getId(), producto1);
        mapa.put(producto2.getId(), producto2);
        mapa.put(producto3.getId(), producto3);
        mapa.put(producto4.getId(), producto4);
        mapa.put(producto5.getId(), producto5);

        //5. Convierta el `HashMap` a un `TreeMap` utilizando el nombre del producto como criterio de ordenamiento.
        Map<String, Producto> arbol = new TreeMap<>(new Comparator<String>() {
            @Override
            public int compare(String id1, String id2) {
                Producto p1 = mapa.get(id1);
                Producto p2 = mapa.get(id2);
                return p1.getNombre().compareTo(p2.getNombre());
            }
        });
        arbol.putAll(mapa);

        System.out.println("");
        System.out.println(arbol);
        System.out.println("");

        //6. Convierta el `HashMap` a un `LinkedHashMap` conservando el orden de inserción original.
        Map<String, Producto> mapaLinkeado = new LinkedHashMap<>(mapa);

        System.out.println("Mapa");
        System.out.println(mapa);
        System.out.println("MapaLinkeado");
        System.out.println(mapaLinkeado);
        System.out.println("");

        //7. Almacene los datos en un array estático de objetos `Producto`.
        Producto[] productosArray = new Producto[]{producto1, producto2, producto3, producto4, producto5};

        for (Producto producto : productosArray) {
            System.out.println(producto);
        }

        //8. Ordenar el array estático por cada uno de los atributos utilizando `Arrays.sort()` y un `Comparator` personalizado para cada atributo.
        // Ordenar por ID
        Arrays.sort(productosArray, new Comparator<Producto>() {
            @Override
            public int compare(Producto p1, Producto p2) {
                return p1.getId().compareTo(p2.getId());
            }
        });

        System.out.println("Ordenar por ID");
        for (Producto producto : productosArray) {
            System.out.println(producto);
        }

        // Ordenar por nombre
        Arrays.sort(productosArray, new Comparator<Producto>() {
            @Override
            public int compare(Producto p1, Producto p2) {
                return p1.getNombre().compareTo(p2.getNombre());
            }
        });
        System.out.println("Ordenar por nombre");
        for (Producto producto : productosArray) {
            System.out.println(producto);
        }

        // Ordenar por precio
        Arrays.sort(productosArray, new Comparator<Producto>() {
            @Override
            public int compare(Producto p1, Producto p2) {
                return Double.compare(p1.getPrecio(), p2.getPrecio());
            }
        });

        System.out.println("Ordenar por precio");
        for (Producto producto : productosArray) {
            System.out.println(producto);
        }

        // Ordenar por clasificación
        Arrays.sort(productosArray, new Comparator<Producto>() {
            @Override
            public int compare(Producto p1, Producto p2) {
                return Character.compare(p1.getClasificacion(), p2.getClasificacion());
            }
        });

        System.out.println("Ordenar por clasificación");
        for (Producto producto : productosArray) {
            System.out.println(producto);
        }

        // Ordenar por categoria
        Arrays.sort(productosArray, new Comparator<Producto>() {
            @Override
            public int compare(Producto p1, Producto p2) {
                return p1.getCategoria().compareTo(p2.getCategoria());
            }
        });

        System.out.println("Ordenar por categoria");
        for (Producto producto : productosArray) {
            System.out.println(producto);
        }

        //9. Muestre el contenido de cada colección (la `ArrayList`, el `LinkedList`, el `HashMap`, el `TreeMap`, el `LinkedHashMap` 
        //y el array estático) y verifique que las transformaciones y ordenamientos se hayan realizado correctamente.
        // Mostrar contenido de la ArrayList
        System.out.println("Contenido de la ArrayList:");
        for (Producto producto : productos) {
            System.out.println(producto);
        }
        System.out.println();

        // Mostrar contenido de la LinkedList
        System.out.println("Contenido de la LinkedList:");
        for (Producto producto : productosLinkeados) {
            System.out.println(producto);
        }
        System.out.println();

        // Mostrar contenido del HashMap (ordenado por clave)
        System.out.println("Contenido del HashMap (ordenado por clave):");
        Map<String, Producto> mapaOrdenado = new TreeMap<>(mapa);
        for (Map.Entry<String, Producto> entry : mapaOrdenado.entrySet()) {
            System.out.println(entry.getKey() + " -> " + entry.getValue());
        }
        System.out.println();

        // Mostrar contenido del TreeMap
        System.out.println("Contenido del TreeMap:");
        for (Map.Entry<String, Producto> entry : arbol.entrySet()) {
            System.out.println(entry.getKey() + " -> " + entry.getValue());
        }
        System.out.println();

        // Mostrar contenido del LinkedHashMap
        System.out.println("Contenido del LinkedHashMap:");
        for (Map.Entry<String, Producto> entry : mapaLinkeado.entrySet()) {
            System.out.println(entry.getKey() + " -> " + entry.getValue());
        }
        System.out.println();

        // Mostrar contenido del array estático
        System.out.println("Contenido del array estático:");
        for (Producto producto : productosArray) {
            System.out.println(producto);
        }
        System.out.println();

    }

}
