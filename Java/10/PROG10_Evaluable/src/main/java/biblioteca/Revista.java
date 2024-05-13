
package biblioteca;

public abstract class Revista extends Publicacion {
    private int numero;
    private String mes;
    private String tematica;

    public Revista( String isbn, String titulo, int anio,int numero, String mes, String tematica) {
        super(isbn, titulo, anio);
        this.numero = numero;
        this.mes = mes;
        this.tematica = tematica;
    }

    
    public int getNumero() {
        return numero;
    }

    public void setNumero(int numero) {
        this.numero = numero;
    }

    public String getMes() {
        return mes;
    }

    public void setMes(String mes) {
        this.mes = mes;
    }

    public String getTematica() {
        return tematica;
    }

    public void setTematica(String tematica) {
        this.tematica = tematica;
    }

    @Override
    public String toString() {
        return super.toString() + " numero: " +getNumero() + ", mes: " + getMes() + ", tematica: " + getTitulo()+"" ;
    }

    
    
    
    
}
