/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prog09_evaluable;

import java.io.Serializable;
import java.util.Random;

public class Pasajero implements Serializable{

    private String ID;
    private String nombre;

    public Pasajero() {
    }

    public Pasajero(String ID) {
        this.ID = ID;
        this.nombre = "Nombre_" + ID;
    }

    public Pasajero(String ID, String nombre) {
        this.ID = ID;
        this.nombre = nombre;
    }

    // Getters y setters para ID y nombre
    public String getID() {
        return ID;
    }

    public void setID(String ID) {
        this.ID = ID;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public static Pasajero generarPasajeroAleatorio() {
        String nombre = "Pasajero" + new Random().nextInt(1000);

        String id = "Id" + new Random().nextInt(100);

        return new Pasajero(id, nombre);
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("Pasajero{");
        sb.append("ID=").append(ID);
        sb.append(", nombre=").append(nombre);
        sb.append('}');
        return sb.toString();
    }
    
    
    
}
