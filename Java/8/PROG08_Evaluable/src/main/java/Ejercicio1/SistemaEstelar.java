/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Ejercicio1;

import java.util.*;

public class SistemaEstelar implements Comparable<SistemaEstelar>{

    private String id;
    private String descripcion;

    public SistemaEstelar(String id, String descripcion) {
        this.id = id;
        this.descripcion = descripcion;

    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 97 * hash + Objects.hashCode(this.id);
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
        final SistemaEstelar other = (SistemaEstelar) obj;
        if (!Objects.equals(this.id, other.id)) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "SistemaEstelar{" + "id=" + id + ", descripcion=" + descripcion + '}';
    }

    @Override
    public int compareTo(SistemaEstelar o) {
        return this.getDescripcion().compareTo(o.getDescripcion());
    }

}
