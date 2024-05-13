/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Ejercicio19;

import javax.swing.JList;

/**
 *
 * @author Aarón
 */
public class NewClass {

    public static void main(String[] args) {
        String[] info = {"Pato", "Loro", "Perro", "Cuervo"};

        JList listaDatos = new JList(info);

        /* El valor de la propiedad model de JList es un objeto que proporciona una visión de sólo lectura del vector info[].

El método getModel() permite recoger ese modelo en forma de Vector de objetos, y utilizar con los métodos de la clase

Vector, como getElementAt(i), que proporciona el elemento de la posición i del Vector.  */
        for (int i = 0; i < listaDatos.getModel().getSize(); i++) {

            System.out.println(listaDatos.getModel().getElementAt(i));

        }
    }
}
