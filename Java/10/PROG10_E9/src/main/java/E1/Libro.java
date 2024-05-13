/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package E1;

/**
 *
 * @author Aarón
 */
public class Libro extends Material {

    private String editorial;

    public Libro(String isbn,String titulo, String autor, int anoDePublicacion, String editorial) {
        super(isbn,titulo, autor, anoDePublicacion);
        this.editorial = editorial;
    }

    public String getEditorial() {
        return editorial;
    }

    public void setEditorial(String editorial) {
        this.editorial = editorial;
    }
    
    
}
