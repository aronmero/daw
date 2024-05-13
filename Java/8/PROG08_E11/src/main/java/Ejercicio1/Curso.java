package Ejercicio1;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Curso {
    private String identificador;
    private String descripcion;
    private int numCreditos;

    public Curso(String identificador, String descripcion, int numCreditos) {
        this.identificador = identificador;
        this.descripcion = descripcion;
        this.numCreditos = numCreditos;
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

    public int getNumCreditos() {
        return numCreditos;
    }

    public void setNumCreditos(int numCreditos) {
        this.numCreditos = numCreditos;
    }
    
}
