
package biblioteca;

public class Validar {
    public static boolean validarNif(String dni){
        return dni.matches("[0-9]{8}[A-Z]{1}");
    }
}
