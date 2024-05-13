package Ejercicio4;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {
    public static void main(String[] args) {
        ListaEnlazada lista = new ListaEnlazada();
        for (int i = 0; i < 10; i++) {
            lista.insertarFinal(i);
        }
        
        System.out.println(lista.obtenerElemento(5));
        System.out.println(lista.getTamanoLista());
    }
}
