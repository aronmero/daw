package Ejercicio2;


import java.util.ArrayList;
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
    }
}
