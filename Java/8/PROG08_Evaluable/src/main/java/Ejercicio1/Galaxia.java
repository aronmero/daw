/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Ejercicio1;

import java.util.*;

public class Galaxia implements Comparator<Galaxia>, Comparable<Galaxia> {

    private String id;
    private String descripcion;
    private Set<SistemaEstelar> sistemas;

    public Galaxia() {

    }

    public Galaxia(String id, String descripcion) {
        this.id = id;
        this.descripcion = descripcion;
        this.sistemas = new TreeSet();
    }

    public boolean anadirSistemaEstelar(SistemaEstelar sistemaEstelar) {
        return sistemas.add(sistemaEstelar);
    }

    public boolean eliminarSistemaEstelar(String sistemaEstelar) {
        for (SistemaEstelar sistema : sistemas) {
            if (sistemaEstelar.equals(sistema.getId())) {
                sistemas.remove(sistema);
                return true;
            }
        }

        return false;
    }

    boolean bucarSistemaEstelar(String idEstelar) {
        List<SistemaEstelar> lista = new ArrayList(sistemas);
        Comparator comparador = new Comparator<SistemaEstelar>() {
            @Override
            public int compare(SistemaEstelar o1, SistemaEstelar o2) {
                return o1.getId().compareTo(o2.getId());
            }
        };
        int indice = Collections.binarySearch(lista, new SistemaEstelar(idEstelar, ""), comparador);
        return indice >= 0;
    }

    public Set<SistemaEstelar> getSistemas() {
        return sistemas;
    }

    SistemaEstelar[] devolverArray() {
        sistemas.getClass();
        List<SistemaEstelar> lista = new ArrayList(sistemas);
        SistemaEstelar[] array = lista.toArray(new SistemaEstelar[0]);

        return array;
    }

    public void setSistemas(Set<SistemaEstelar> sistemas) {
        this.sistemas = sistemas;
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
        int hash = 3;
        hash = 59 * hash + Objects.hashCode(this.id);
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
        final Galaxia other = (Galaxia) obj;
        if (!Objects.equals(this.id, other.id)) {
            return false;
        }
        return true;
    }

    @Override
    public int compare(Galaxia o1, Galaxia o2) {
        return o1.getId().compareTo(o2.getId());
    }

    @Override
    public int compareTo(Galaxia o) {
        return this.getId().compareTo(o.getId());
    }

}
