package Ejercicio1;

/**
 *
 * @author Aarón Medina Rodríguez
 */
/**
 *
 * Nivel básico - Crear una clase genérica "Caja": Diseña una clase genérica
 * llamada "Caja" que tenga un único campo privado de tipo genérico "T" llamado
 * "contenido". Crea métodos públicos para obtener y establecer el valor del
 * contenido. La clase debe ser capaz de almacenar cualquier tipo de objeto,
 * imprimirlo por pantalla también.
 */
public class Caja<T> {
    
    private T contenido;

    public T getContenido() {
        return contenido;
    }
    
    public void setContenido(T contenido) {
        this.contenido = contenido;
    }

    @Override
    public String toString() {
        return "Caja{" + "contenido=" + contenido + '}';
    }
    
}

