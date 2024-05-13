package Ejercicio1;

import java.util.Objects;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Pelicula implements Comparable<Pelicula> {

    private String titulo;
    private String categoria;
    private double puntuacion;

    public Pelicula(String nombre, String categoria, double puntuacion) {
        this.titulo = nombre;
        this.categoria = categoria;
        this.puntuacion = puntuacion;
    }

    public double getPuntuacion() {
        return puntuacion;
    }

    public void setPuntuacion(double puntuacion) {
        this.puntuacion = puntuacion;
    }

    public String getTitulo() {
        return titulo;
    }

    public void setNombre(String nombre) {
        this.titulo = nombre;
    }

    public String getCategoria() {
        return categoria;
    }

    public void setCategoria(String categoria) {
        this.categoria = categoria;
    }

    @Override
    public int compareTo(Pelicula pelicula) {
        return titulo.compareToIgnoreCase(pelicula.getTitulo());
    }

    @Override
    public String toString() {
        return "Pelicula{" + "titulo=" + titulo + ", categoria=" + categoria + ", puntuacion=" + puntuacion + '}';
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 13 * hash + Objects.hashCode(this.titulo);
        hash = 13 * hash + Objects.hashCode(this.categoria);
        hash = 13 * hash + (int) (Double.doubleToLongBits(this.puntuacion) ^ (Double.doubleToLongBits(this.puntuacion) >>> 32));
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Pelicula other = (Pelicula) obj;
        if (Double.doubleToLongBits(this.puntuacion) != Double.doubleToLongBits(other.puntuacion)) {
            return false;
        }
        if (!Objects.equals(this.titulo, other.titulo)) {
            return false;
        }
        if (!Objects.equals(this.categoria, other.categoria)) {
            return false;
        }
        return true;
    }

}
