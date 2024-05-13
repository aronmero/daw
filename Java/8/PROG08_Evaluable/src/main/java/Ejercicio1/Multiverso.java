/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Ejercicio1;

import java.util.*;

public class Multiverso {

    private String id;
    private String descripcion;
    private Map<String, Galaxia> galaxias;

    public Multiverso() {

    }

    public Multiverso(String id, String descripcion) {
        this.id = id;
        this.descripcion = descripcion;
        this.galaxias = new HashMap();
    }

    Galaxia agregarGalaxia(String id, Galaxia galaxia) {
        if (id.equals(galaxia.getId())) {
            galaxias.put(id, galaxia);
            return galaxias.get(id);
        }
        return null;
    }

    Galaxia agregarGalaxia(Galaxia galaxia) {
        galaxias.put(galaxia.getId(), galaxia);
        return galaxias.get(galaxia.getId());
    }

    public boolean eliminarGalaxia(String idGalaxia) {
        for (Map.Entry<String, Galaxia> galaxia : galaxias.entrySet()) {
            if (idGalaxia.equals(galaxia.getKey())) {
                galaxias.remove(galaxia.getKey());
                return true;
            }
        }
        return false;

    }

    public boolean anadirSistemaEstelar(String idGalaxia, SistemaEstelar sistemaEstelar) {
        return galaxias.get(idGalaxia).anadirSistemaEstelar(sistemaEstelar);

    }

    public boolean eliminarSistemaEstelar(String idGalaxia, String idSistemaEstelar) {
        return galaxias.get(idGalaxia).eliminarSistemaEstelar(idSistemaEstelar);

    }

    public Galaxia buscarGalaxia(String idGalaxia) {
        for (Map.Entry<String, Galaxia> galaxia : galaxias.entrySet()) {
            if (idGalaxia.equals(galaxia.getKey())) {
                return galaxia.getValue();
            }
        }
        return null;
    }

    List listarGalaxiasDescripcion() {
        Comparator<Galaxia> comparador = new Comparator<Galaxia>() {
            @Override
            public int compare(Galaxia o1, Galaxia o2) {
                return o2.getDescripcion().compareTo(o1.getDescripcion());
            }
        };
        List<Galaxia> lista = new ArrayList(galaxias.values());
        
        Collections.sort(lista, comparador);
        for (Galaxia galaxia : lista) {
            System.out.println(galaxia.getDescripcion());
            
        }
        return lista;
    }

    //Listar todos los elementos galaxias con sus sistemas estelares
    void listarTodosElementos() {
        for (Map.Entry<String, Galaxia> galaxia : galaxias.entrySet()) {
            System.out.println("Galaxia: " + galaxia.getValue().toString());
            Set<SistemaEstelar> listaSistema = new TreeSet(galaxia.getValue().getSistemas());
            for (SistemaEstelar sistemaEstelar : listaSistema) {
                System.out.println(sistemaEstelar.toString());
            }
        }
    }

    public String getId() {
        return id;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public Map<String, Galaxia> getGalaxias() {
        return galaxias;
    }

    public void setId(String id) {
        this.id = id;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public void setGalaxias(Map<String, Galaxia> galaxias) {
        this.galaxias = galaxias;
    }

}
