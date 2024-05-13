/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prog09_evaluable;

public class NaveCarga extends NaveEspacial {

    private int capacidadCarga;

    public NaveCarga() {
        super();
    }

    public NaveCarga(String iD1) {
        super(iD1,"Sin descripcion","2020");
        this.capacidadCarga=0;
    }

    public NaveCarga(String ID, String descripcion, String fechaCreacion, int capacidadCarga) {
        super(ID, descripcion, fechaCreacion);
        this.capacidadCarga = capacidadCarga;
    }

    // Getters y setters para capacidadCarga
    public int getCapacidadCarga() {
        return capacidadCarga;
    }

    public void setCapacidadCarga(int capacidadCarga) {
        this.capacidadCarga = capacidadCarga;
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("NaveCarga{");
        sb.append(super.toString().replaceAll("NaveEspacial", ""));
        sb.append("capacidadCarga=").append(capacidadCarga);
        sb.append('}');
        return sb.toString();
    }

}
