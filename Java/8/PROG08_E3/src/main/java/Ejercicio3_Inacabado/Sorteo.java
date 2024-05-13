package Ejercicio3_Inacabado;

import java.util.Arrays;
import java.util.HashSet;
import java.util.Scanner;
import java.util.Set;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Sorteo<T> {

    T[] tabla;

    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        
       
    }
    
    boolean add(T elemento) {
        if (comprobarExistencia(elemento)) {
            return false;
        }
        tabla = Arrays.copyOf(tabla, tabla.length + 1);
        tabla[tabla.length - 1] = elemento;

        return true;
    }

    boolean comprobarExistencia(T elemento) {
        for (T elementoTabla : tabla) {
            if (elementoTabla == elemento) {
                return true;
            }
        }
        return false;
    }

    Set<T> premiados(int numPremiados) {
        Set<T> premiados = new HashSet<>(numPremiados);
        
        for(int i =0, j=0;i<numPremiados||j<numPremiados*2;j++){
            int azar = (int) (Math.random()*tabla.length);
            
            if(premiados.add(tabla[azar])){
                i++;
            }
        }

        return premiados;
    }
}
