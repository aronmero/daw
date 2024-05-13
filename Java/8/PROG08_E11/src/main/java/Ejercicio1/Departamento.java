package Ejercicio1;

import java.util.HashSet;
import java.util.Set;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Departamento {

    private String identificador;
    private String descripcion;
    private Set<Curso> curso;

    public Departamento(String identificador, String descripcion, Set curso) {
        this.identificador = identificador;
        this.descripcion = descripcion;
        this.curso = new HashSet<Curso>();
    }

    void agregarFacultad(Curso nuevoCurso) {
        curso.add(nuevoCurso);
    }

    Curso buscarDepartamento(String identificador) {
        for (Curso curso : curso) {
            if (identificador.equals(curso.getIdentificador())) {
                return curso;
            }
        }
        return null;
    }

    int devolverNumCreditos() {
        int numCreditos = 0;
        for (Curso cursos : curso) {
            numCreditos = numCreditos + cursos.getNumCreditos();
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

    public Set<Curso> getCurso() {
        return curso;
    }

    public void setCurso(Set<Curso> curso) {
        this.curso = curso;
    }

}
