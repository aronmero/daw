/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prog09_evaluable;

public class NaveCargaPesada extends NaveCarga {

    private String sistemaGruas;

    public NaveCargaPesada() {
        super();
    }

    public NaveCargaPesada(String ID) {
       super(ID,"Sin descripcion","2020",0);
       this.sistemaGruas = "gruas";

    }

    public NaveCargaPesada(String ID, String descripcion, String fechaCreacion, int capacidadCarga, String sistemaGruas) {
        super(ID, descripcion, fechaCreacion, capacidadCarga);
        this.sistemaGruas = sistemaGruas;
    }

    // Getters y setters para sistemaGruas
    public String getSistemaGruas() {
        return sistemaGruas;
    }

    public void setSistemaGruas(String sistemaGruas) {
        this.sistemaGruas = sistemaGruas;
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("NaveCargaPesada{");
        sb.append(super.toString().replaceAll("NaveEspacial", "").replaceAll("NaveCarga", ""));
        sb.append("sistemaGruas=").append(sistemaGruas);
        sb.append('}');
        return sb.toString();
    }

}
