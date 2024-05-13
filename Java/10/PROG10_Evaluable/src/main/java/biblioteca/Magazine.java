/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package biblioteca;


import java.util.TreeSet;

/**
 * @date 10 jun. 2023
 * @autor Manuel Nuno
 * @version 1.0
 Nombre de la Clase : Magazine
 */
public class Magazine extends Revista{
    private int semana;
    private TreeSet<Autor> autores;
    

    public Magazine(String isbn, String titulo, int anio, int numero, String mes, String tematica,int semana ) {
        super(isbn, titulo, anio, numero, mes, tematica);
        this.semana = semana;
        autores=new TreeSet();
    }
    
    boolean anadirAutor(Autor autor){
        return autores.add(autor);
    }
   

    public int getSemana() {
        return semana;
    }

    public void setSemana(int semana) {
        this.semana = semana;
    }

    @Override
    public String toString() {
        return super.toString()+ ", semana:" + getSemana()+"autor: "+autores.toString()+"\n";
    }

    public TreeSet<Autor> getAutores() {
        return autores;
    }

    public void setAutores(TreeSet<Autor> autores) {
        this.autores = autores;
    }
    
    
    
}
