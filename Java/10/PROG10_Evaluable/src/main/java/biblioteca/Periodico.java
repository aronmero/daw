/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package biblioteca;

public class Periodico {
    private String frecuencia;//semana, diario o quincenal

    public Periodico(String frecuencia) {
        this.frecuencia = frecuencia;
    }

    public String getFrecuencia() {
        return frecuencia;
    }

    public void setFrecuencia(String frecuencia) {
        this.frecuencia = frecuencia;
    }

    @Override
    public String toString() {
        return super.toString()+ " frecuencia: " + getFrecuencia()+"\n";
    }
    
}
