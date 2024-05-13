/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prog09_evaluable;

public class NavePasajerosLujo extends NavePasajeros {

    private String serviciosLujo;
    private int numeroSuites;

     public NavePasajerosLujo() {
        super();
    }
    
    public NavePasajerosLujo(String iD3) {
        super(iD3,"Sin descripcion","2020",0,"Lujo");
    }

    public NavePasajerosLujo(String ID, String descripcion, String fechaCreacion, int numeroPasajeros, String serviciosLujo, int numeroSuites) {
        //super(ID, descripcion, fechaCreacion, numeroPasajeros);
        super(ID, descripcion, fechaCreacion, numeroPasajeros, "Pasajeros Lujo");
        this.serviciosLujo = serviciosLujo;
        this.numeroSuites = numeroSuites;
    }

    // Getters y setters para serviciosLujo y numeroSuites

    public String getServiciosLujo() {
        return serviciosLujo;
    }

    public void setServiciosLujo(String serviciosLujo) {
        this.serviciosLujo = serviciosLujo;
    }

    public int getNumeroSuites() {
        return numeroSuites;
    }

    public void setNumeroSuites(int numeroSuites) {
        this.numeroSuites = numeroSuites;
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("NavePasajerosLujo{");
        sb.append(super.toString().replaceAll("NaveEspacial", "").replaceAll("NavePasajeros", ""));
        
        sb.append("serviciosLujo=").append(serviciosLujo);
        sb.append(", numeroSuites=").append(numeroSuites);
        sb.append('}');
        return sb.toString();
    }
    
    
    
}
