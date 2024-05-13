/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prog09_alumnos;

//Clase Fecha
import java.io.Serializable;

public class Fecha implements Serializable{

    private int dia;
    private int mes;
    private int año;

    public Fecha(int dia, int mes, int año) {                                                                     
        this.dia = dia;
        this.mes = mes;
        this.año = año;
    }
    public Fecha() {
    }
    public int getAño() {
        return año;
    }

    public void setAño(int año) {
        this.año = año;
    }

    public int getDia() {
        return dia;
    }

    public void setDia(int dia) {
        this.dia = dia;
    }

    public int getMes() {
        return mes;
    }

    public void setMes(int mes) {                                                                                 
        this.mes = mes;
    }
   
}
