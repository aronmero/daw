package Ejercicio5;


/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {
    public static void main(String[] args) {
        Cola cola = new Cola();
        for (int i = 0; i < 10; i++) {
            cola.encolar(i);
        }
        
        System.out.println(cola.desencolar());
    }
}
