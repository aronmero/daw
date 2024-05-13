package Ejercicio1;

import java.util.Set;
import java.util.TreeSet;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Facultad {

    private String identificador;
    private String descripcion;
    private Set<Departamento> departamento;

    public Facultad(String identificador, String descripcion, Set departamento) {
        this.identificador = identificador;
        this.descripcion = descripcion;
        this.departamento = new TreeSet<Departamento>();
    }

    void agregarFacultad(Departamento nuevoDepartamento) {
        departamento.add(nuevoDepartamento);
    }

    Departamento buscarDepartamento(String identificador) {
        for (Departamento departamento1 : departamento) {
            if (identificador.equals(departamento1.getIdentificador())) {
                return departamento1;
            }
        }
        return null;
    }

    int devolverNumCreditos(){
        int numCreditos=0;
        for (Departamento departamentos : departamento) {
            numCreditos=numCreditos+departamentos.devolverNumCreditos();
        }
        return numCreditos;
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

    public Set getDepartamento() {
        return departamento;
    }

    public void setDepartamento(Set departamento) {
        this.departamento = departamento;
    }

}
