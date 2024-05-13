package Ejercicio1;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Paquete {
    private String identificador;
    private String descripcion;
    private int peso;
    private enum estado{en_transito,entregado,en_espera};
    private estado estadoActual;

    public Paquete(String identificador, String descripcion, int peso,int estadoInt) {
        this.identificador = identificador;
        this.descripcion = descripcion;
        this.peso = peso;
        
        switch(estadoInt){
            case 1->{
                this.estadoActual=estado.en_transito;
            }case 2->{
                this.estadoActual=estado.entregado;
            }default->{
                this.estadoActual=estado.en_espera;
            }
        }
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

    public int getPeso() {
        return peso;
    }

    public void setPeso(int peso) {
        this.peso = peso;
    }

    public estado getEstadoActual() {
        return estadoActual;
    }

    public void setEstadoActual(int selector) {
        switch(selector){
            case 1->{
                this.estadoActual=estado.en_transito;
            }case 2->{
                this.estadoActual=estado.entregado;
            }default->{
                this.estadoActual=estado.en_espera;
            }
        }
    }
    
    
}
