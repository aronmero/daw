
package biblioteca;

public class Investigacion extends Revista{
    private boolean revisado;
    private String revisor; // nombre y apellidos de la persona que lo reviso

    public Investigacion( String isbn, String titulo, int anio, int numero, String mes, String tematica, boolean revisado, String revisor) {
        super(isbn, titulo, anio, numero, mes, tematica);
        this.revisado = revisado;
        this.revisor = revisor;
    }

   

    public boolean isRevisado() {
        return revisado;
    }

    public void setRevisado(boolean revisado) {
        this.revisado = revisado;
    }

    public String getRevisor() {
        return revisor;
    }

    public void setRevisor(String revisor) {
        this.revisor = revisor;
    }

    @Override
    public String toString() {
        return super.toString()+ " " + (isRevisado()? "Revisado":"Sin revisar") + ", revisor:" + getRevisor()+"\n";
    }
    
    
    
}
