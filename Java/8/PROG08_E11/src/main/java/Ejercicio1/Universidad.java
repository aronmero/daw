package Ejercicio1;

import java.util.HashMap;
import java.util.HashSet;
import java.util.Map;
import java.util.TreeMap;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Universidad {

    private String identificador;
    private String descripcion;
    private Map<String, Facultad> facultad;

    public Universidad(String identificador, String descripcion, Map facultad) {
        this.identificador = identificador;
        this.descripcion = descripcion;
        this.facultad = new HashMap<String, Facultad>();
    }

    void agregarFacultad(Facultad nuevaFacultad) {
        facultad.put(nuevaFacultad.getIdentificador(), nuevaFacultad);
    }

    Facultad buscarFacultad(String identificador) {
        return facultad.get(identificador);
    }

    Map devolverCreditos() {
        Map<String, Integer> facultadCreditos = new TreeMap();
        for (Map.Entry<String, Facultad> entrada : facultad.entrySet()) {
            facultadCreditos.put(entrada.getKey(), devolverCreditosFacultad(entrada.getKey()));
        }
        return facultadCreditos;
    }

    int devolverCreditosFacultad(String identificador) {
        Facultad nuevaFacultad = facultad.get(identificador);
        return nuevaFacultad.devolverNumCreditos();
    }

    public String getIdentificador() {
        return identificador;
    }

    public void setIdentificador(String identificador) {
        this.identificador = identificador;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public Map<String, Facultad> getFacultad() {
        return facultad;
    }

    public void setFacultad(Map<String, Facultad> facultad) {
        this.facultad = facultad;
    }

}
