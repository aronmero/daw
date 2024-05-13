package Ejercicio5;

import Ejercicio4.*;
import java.util.LinkedList;

/**
 *
 * @author Aarón Medina Rodríguez
 */
/**
 *
 * Nivel avanzado - Crear una clase genérica "ListaEnlazada": Diseña una clase
 * genérica "ListaEnlazada" que implemente una lista enlazada simple de
 * elementos de tipo genérico "T". La clase debe tener métodos para agregar
 * elementos al principio y al final de la lista, eliminar elementos por su
 * índice y obtener elementos por su índice. Además, crea un método que devuelva
 * el tamaño de la lista.
 */
public class ListaEnlazada<T> {

    private LinkedList<T> lista;

    public ListaEnlazada(LinkedList<T> lista) {
        this.lista = lista;
    }

    public ListaEnlazada() {
        this.lista = new LinkedList<T>();
    }

    void insertarPrincipio(T elemento) {
        lista.addFirst(elemento);
    }

    void insertarFinal(T elemento) {
        lista.addLast(elemento);
    }

    T eliminar(int indice) {
        return lista.remove(indice);
    }

    T obtenerElemento(int indice) {
        return lista.get(indice);
    }
    
    int getTamanoLista(){
        return lista.size();
    }

}
