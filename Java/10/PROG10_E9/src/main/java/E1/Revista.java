/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package E1;

/**
 *
 * @author Aarón
 */
public class Revista extends Material {

    private int numeroDeEdicion;

    public Revista(String isbn,String titulo, String autor, int anoDePublicacion, int numeroDeEdicion) {
        super(isbn,titulo, autor, anoDePublicacion);
        this.numeroDeEdicion = numeroDeEdicion;
    }

    public int getNumeroDeEdicion() {
        return numeroDeEdicion;
    }

    public void setNumeroDeEdicion(int numeroDeEdicion) {
        this.numeroDeEdicion = numeroDeEdicion;
    }
    
    
}
