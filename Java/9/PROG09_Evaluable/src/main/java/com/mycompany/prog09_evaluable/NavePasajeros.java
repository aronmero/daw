/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prog09_evaluable;

import java.util.LinkedList;

public class NavePasajeros extends NaveEspacial {

    private int numeroPasajeros;
    private String claseServicio;
    private LinkedList<Pasajero> pasajeros = new LinkedList<>();

    public NavePasajeros() {
        super();
    }

    public NavePasajeros(String iD1) {
        super(iD1,"Sin descripcion","2020");
        this.numeroPasajeros = 0;
        this.claseServicio = "Sin clase";
        this.pasajeros = new LinkedList<>();
    }

    public NavePasajeros(String ID, String descripcion, String fechaCreacion, int numeroPasajeros, String claseServicio) {
        super(ID, descripcion, fechaCreacion);
        this.numeroPasajeros = numeroPasajeros;
        this.claseServicio = claseServicio;
        this.pasajeros = new LinkedList<>();
    }

    // Getters y setters para numeroPasajeros, claseServicio y pasajeros
    @Override
    public boolean agregarPasajero(Pasajero pasajero) {
        return this.pasajeros.add(pasajero);
    }

    public void eliminarPasajero(Pasajero pasajero) {
        this.pasajeros.remove(pasajero);
    }

    public int getNumeroPasajeros() {
        return numeroPasajeros;
    }

    public void setNumeroPasajeros(int numeroPasajeros) {
        this.numeroPasajeros = numeroPasajeros;
    }

    public String getClaseServicio() {
        return claseServicio;
    }

    public void setClaseServicio(String claseServicio) {
        this.claseServicio = claseServicio;
    }

    public LinkedList<Pasajero> getPasajeros() {
        return pasajeros;
    }

    public void setPasajeros(LinkedList<Pasajero> pasajeros) {
        this.pasajeros = pasajeros;
    }

    public void listarPasajeros() {
        for (Pasajero pasajero : pasajeros) {
            System.out.println(pasajero);
        }
    }

    public boolean eliminarPasajero(String idPasajero) {
        return pasajeros.removeIf(pasajero -> pasajero.getID().equals(idPasajero));
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("NavePasajeros{");
        sb.append(super.toString().replaceAll("NaveEspacial", ""));
        sb.append("numeroPasajeros=").append(numeroPasajeros);
        sb.append(", claseServicio=").append(claseServicio);
        sb.append(", pasajeros=").append(pasajeros);
        sb.append('}');
        return sb.toString();
    }
    
    

}
