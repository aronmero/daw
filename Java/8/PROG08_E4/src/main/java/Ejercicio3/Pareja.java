package Ejercicio3;

/**
 *
 * @author Aarón Medina Rodríguez
 */
/**
 * 
 * Nivel intermedio - Crear una clase genérica "Pareja": Diseña una clase
 * genérica llamada "Pareja" con dos campos privados de tipo genérico "K" y "V"
 * llamados "clave" y "valor", respectivamente. La clase debe tener métodos para
 * obtener y establecer los valores de ambos campos. Además, crea un método que
 * devuelva una cadena de texto con la representación de la pareja en el formato
 * "clave=valor".
 */
public class Pareja<K, V> {

    private K clave;
    private V valor;

    public Pareja(K clave, V valor) {
        this.clave = clave;
        this.valor = valor;
    }

    public K getClave() {
        return clave;
    }

    public V getValor() {
        return valor;
    }

    public void setClave(K clave) {
        this.clave = clave;
    }

    public void setValor(V valor) {
        this.valor = valor;
    }

    @Override
    public String toString() {
        return clave + "=" + valor;
    }

}
