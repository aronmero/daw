/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package E1;

/**
 *
 * @author Aarón
 */
public class Material {

    protected String titulo;
    protected String autor;
    protected int anoDePublicacion;
    protected String isbn;

    public Material(String isbn, String titulo, String autor, int anoDePublicacion) {
        this.titulo = titulo;
        this.autor = autor;
        this.anoDePublicacion = anoDePublicacion;
        this.isbn = isbn;
    }

    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public int getAnoDePublicacion() {
        return anoDePublicacion;
    }

    public void setAnoDePublicacion(int anoDePublicacion) {
        this.anoDePublicacion = anoDePublicacion;
    }

    public String getIsbn() {
        return isbn;
    }

    public void setIsbn(String isbn) {
        this.isbn = isbn;
    }

}
