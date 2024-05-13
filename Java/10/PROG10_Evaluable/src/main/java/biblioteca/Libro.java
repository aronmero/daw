/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package biblioteca;

public class Libro extends Publicacion implements Prestable{
    private boolean prestado;
    private String dni;

    public Libro(String isbn, String titulo, int anio, boolean prestado,String dni ) {
        super(isbn, titulo, anio);
        this.prestado = prestado;
        this.dni = dni;
    }

    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }
    
    public boolean isPrestado() {
        return prestado;
    }

    public void setPrestado(boolean prestado) {
        this.prestado = prestado;
    }

    @Override
    public String toString() {
        return super.toString()+" DNI del autor: "+getDni()+ " " + (isPrestado()? "Prestado\n":"No prestado \n");
    }
    
    @Override
    public boolean presta() {
        if(!isPrestado()){
            setPrestado(true);
            return true;
        }else{
            return false;
        }
    }

    @Override
    public boolean devuelve() {
        if(isPrestado()){
            setPrestado(false);
            return true;
        }else{
            return false;
        }
    }

    @Override
    public boolean estaPrestado() {
        return isPrestado();
    }

    
}
