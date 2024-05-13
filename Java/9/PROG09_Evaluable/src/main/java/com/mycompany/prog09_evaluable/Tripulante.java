/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prog09_evaluable;

import java.io.Serializable;
import java.util.Objects;
import java.util.Random;

public class Tripulante implements Serializable, Comparable<Tripulante> {

    private String ID;
    private String nombre;
    private String cargo;

    public Tripulante(String ID) {
        this.ID = ID;
        this.nombre = "Nombre_" + ID;
        this.cargo = "cargo_" + ID;
    }

    public Tripulante(String ID, String nombre, String cargo) {
        this.ID = ID;
        this.nombre = nombre;
        this.cargo = cargo;
    }

    public Tripulante() {
    }

    // Getters y setters para ID, nombre y cargo
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

    public String getCargo() {
        return cargo;
    }

    public void setCargo(String cargo) {
        this.cargo = cargo;
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 29 * hash + Objects.hashCode(this.ID);
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Tripulante other = (Tripulante) obj;
        return Objects.equals(this.ID, other.ID);
    }

    @Override
    public String toString() {
        return "Tripulante{" + "ID=" + ID + ", nombre=" + nombre + ", cargo=" + cargo + '}';
    }

    @Override
    protected Object clone() throws CloneNotSupportedException {
        return super.clone(); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/OverriddenMethodBody
    }

    

    public static Tripulante generarTripulanteAleatorio() {
        String nombre = "Tripulante" + new Random().nextInt(1000);
        String id = "Id" + new Random().nextInt(100);
        String cargo = "C" + new Random().nextInt(100);
        return new Tripulante(id, nombre,cargo);
    }


    @Override
    public int compareTo(Tripulante o) {
        return ID.compareTo(o.getID());
    }

}
