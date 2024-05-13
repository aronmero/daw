/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prog09_evaluable;

import java.io.Serializable;
import java.util.Random;
import java.util.TreeSet;

/**
 *
 * @author Usuario
 */
public abstract class NaveEspacial implements Serializable {

    private String ID;
    private String descripcion;
    private String fechaCreacion;
    private TreeSet<Tripulante> tripulantes;

    public NaveEspacial() {
        this.tripulantes= new TreeSet();
    }

    public NaveEspacial(String ID) {
        this.tripulantes= new TreeSet();
        this.ID = ID;
        this.descripcion = "Sin descripcion";
        this.fechaCreacion = "2023";
        this.tripulantes= new TreeSet();
    }

    public NaveEspacial(String ID, String descripcion, String fechaCreacion) {
        this.ID = ID;
        this.descripcion = descripcion;
        this.fechaCreacion = fechaCreacion;
        this.tripulantes= new TreeSet();

    }

    @Override
    public String toString() {
        return "NaveEspacial{" + "ID=" + ID + ", descripcion=" + descripcion
                + ", fechaCreacion=" + fechaCreacion + ", tripulantes=" + tripulantes + '}';
    }

    // Getters y setters para ID, descripcion, fechaCreacion y tripulantes
    public boolean agregarPasajero(Pasajero pasajero) {
        return false;
    }

    public boolean agregarTripulante(Tripulante tripulante) {
        return tripulantes.add(tripulante);
    }

    public void eliminarTripulante(Tripulante tripulante) {
        tripulantes.remove(tripulante);
    }

    public String getID() {
        return ID;
    }

    public void setID(String ID) {
        this.ID = ID;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getFechaCreacion() {
        return fechaCreacion;
    }

    public void setFechaCreacion(String fechaCreacion) {
        this.fechaCreacion = fechaCreacion;
    }

    public TreeSet<Tripulante> getTripulantes() {
        return tripulantes;
    }

    public void setTripulantes(TreeSet<Tripulante> tripulantes) {

    }

    public void listarTripulantes() {
        for (Tripulante tripulante : tripulantes) {
            System.out.println(tripulante);
        }
    }

    public boolean eliminarTripulante(String idTripulante) {
        return true;
    }

    public static NaveEspacial generarNaveAleatoria() {
        int tipoNave = new Random().nextInt(4); // Suponiendo que hay 4 tipos de naves
        String id = "Id" + new Random().nextInt(100);
        switch (tipoNave) {
            case 0:
                return new NaveCarga(id);
            case 1:
                return new NavePasajeros(id);
            case 2:
                return new NaveCargaPesada(id);
            case 3:
                return new NavePasajerosLujo(id);
            default:
                return null;
        }
    }

}
