package Ejercicio5;

/**
 *
 * @author Aarón Medina Rodríguez
 */
/**
 * 
 * Nivel avanzado - Crear una clase genérica "Cola": Diseña una clase genérica
 * "Cola" que implemente una cola de elementos de tipo genérico "T" utilizando
 * la clase "ListaEnlazada" creada en el ejercicio anterior. La clase "Cola"
 * debe tener métodos para encolar (agregar) elementos, desencolar (eliminar y
 * devolver) el primer elemento de la cola y comprobar si la cola está vacía.
 * También, crea un método que devuelva el tamaño de la cola.
 */
public class Cola<T> {

    ListaEnlazada<T> lista;

    public Cola(ListaEnlazada<T> cola) {
        this.lista = cola;
    }

    public Cola() {
         lista = new ListaEnlazada<>();
    }
    
    void encolar(T elemento){
        lista.insertarPrincipio(elemento);
    }
    
    public T desencolar() {
        T elemento = lista.eliminar(0);
        return elemento;
    }

    public int tamaño() {
        return lista.getTamanoLista();
    }
}
