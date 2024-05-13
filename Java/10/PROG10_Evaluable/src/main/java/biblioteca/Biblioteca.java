package biblioteca;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import static java.lang.Integer.parseInt;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.LinkedHashSet;
import java.util.LinkedList;
import java.util.Map;
import java.util.TreeMap;
import java.util.TreeSet;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Biblioteca {

    private HashMap<String, Publicacion> biblioteca;
    private final String SEPARADOR = "\\*\\*\\*\\*";

    public Biblioteca() {
        biblioteca = new HashMap();
    }

    /**
     * 1. [1,25 punto]Crear la colección dinámicas de datos vistas en la unidad
     * de Colecciones de datos, usar un HashMap<> La biblioteca debe permitir 1.
     * insertar un libro y una Investigación (Solamente, los demás no hay que
     * insertarlos), 1. No se debe permitir insertar ISBN repetidos,. 2. borrar
     * una 3. buscar una y 4. listarlas todas desde un Principal.java utilizando
     * Systemout visualizando todos los campos.
     */
    //metodo de insertar una publicacion
    public boolean insertar(Publicacion publicacion) {
        if (!comprobarIsbn(publicacion.getIsbn())) {
            biblioteca.put(publicacion.getIsbn(), publicacion);
            return true;
        }
        return false;
    }

    public boolean insertar(Libro libro) {
        if (!comprobarIsbn(libro.getIsbn())) {
            biblioteca.put(libro.getIsbn(), libro);
            return true;
        }
        return false;
    }

    public boolean insertar(Investigacion investigacion) {
        if (!comprobarIsbn(investigacion.getIsbn())) {
            biblioteca.put(investigacion.getIsbn(), investigacion);
            return true;
        }
        return false;
    }

    private boolean comprobarIsbn(String isbn) {
        for (Map.Entry<String, Publicacion> entry : biblioteca.entrySet()) {
            if (isbn.equalsIgnoreCase(entry.getValue().getIsbn())) {
                return true;
            }
        }
        return false;
    }

    //metodo de borrar una publicacion 
    public boolean borrar(String isbn) {
        for (Map.Entry<String, Publicacion> entry : biblioteca.entrySet()) {
            if (isbn.equalsIgnoreCase(entry.getValue().getIsbn())) {
                biblioteca.remove(entry.getKey());
                return true;
            }
        }
        return false;
    }

    //metodo para buscar una publicacion
    public Publicacion buscarPublicacion(String isbn) {
        for (Map.Entry<String, Publicacion> entry : biblioteca.entrySet()) {
            if (isbn.equalsIgnoreCase(entry.getValue().getIsbn())) {
                return entry.getValue();
            }
        }
        return null;
    }

    //listar todas desde un sout
    public void listarPublicaciones() {
        for (Map.Entry<String, Publicacion> entry : biblioteca.entrySet()) {
            System.out.println(entry.getValue().toString());
        }
    }

    
    //insertar 10 e forma automatizada
    public void insertarDiez() {
        Libro libro;
        Investigacion investigacion;

        libro = new Libro("123456", "la isla bajo el mar", 2015, true, "42416424P");
        insertar(libro);
        libro = new Libro("23568", "el infierno", 2002, false, "42416423F");
        insertar(libro);
        libro = new Libro("12445", "caperucita roja", 1994, true, "42416425D");
        insertar(libro);
        libro = new Libro("56326", "libro 4", 2008, false, "42416426X");
        insertar(libro);
        libro = new Libro("86532", "libro 5", 1995, true, "42416427B");
        insertar(libro);
        /*String isbn, String titulo, int anio, int numero, String mes, String tematica, boolean revisado, String revisor*/
        investigacion = new Investigacion("86532", "publicacion 1", 1995, 1, "julio", "romance", true, "Manuel Lasco");
        insertar(investigacion);
        investigacion = new Investigacion("86569", "publicacion 2", 2005, 2, "abril", "terror", false, "Manuel Lasco");
        insertar(investigacion);
        investigacion = new Investigacion("86789", "publicacion 3", 2005, 2, "abril", "aventura", true, "Manuel Lasco");
        insertar(investigacion);
        investigacion = new Investigacion("86800", "publicacion 4", 2012, 3, "abril", "terror", false, "Manuel Lasco");
        insertar(investigacion);
        investigacion = new Investigacion("86812", "publicacion 5", 2009, 4, "mayo", "terror", false, "Manuel Lasco");
        insertar(investigacion);
        /**
         * [1]Insertar 10 de forma automatizada y mostrarlos, está ya
         * implementado a medias. 1. Inserte 5 Magazines. 2. Se debe modificar
         * para que inserte por Magazine al menos 5 autores distintos y cada
         * autor con 3 direcciones distintas generadas por random. 3. Todas las
         * clases deben sobre escribir el método toString
         */
        Magazine magazine;
        Autor autor;
        Direccion direccion;
       
        for (int k = 0; k < 5; k++) {
            //Crear magazine
            magazine = new Magazine(((int) (Math.random() * 99999 + 1)) + "" + ((int) (Math.random() * 9999 + 1)), "El viaje EXAMEN", 2023, 10, "Junio", "Horror", 25);
            for (int j = 0; j < 5; j++) {
                //Crear autores
                autor = new Autor("Juan", ((int) (Math.random() * 83 + 1950)), ((int) (Math.random() * 99999 + 1)) + "" + ((int) (Math.random() * 9999 + 1)) + "P");
                for (int i = 0; i < 3; i++) {
                    //Crear direcciones
                    direccion = new Direccion("Los llanos", "Pedroche"+((int) (Math.random() * 90 + 1)), ((int) (Math.random() * 9000 + 1)));
                    autor.anadirDireccion(direccion);
                }
                magazine.anadirAutor(autor);
            }
            insertar(magazine);
        }

        listarPublicaciones();
    }

    /**
     * Escribe el código java para [1,25]: 1. Elabora una consulta que busque
     * los Magazines con autores que tengan una edad mayor que 20 y menor que
     * 40. 2. Listar los Magazines que no tengan ninguna de las calles pasadas
     * en una lista como parte de sus direcciones.
     */
    /*Busca las magazines de personas de 20 a 40*/
    LinkedList<Magazine> buscarMagazinesMedianaEdad() {
        LinkedList<Magazine> direccionesAutores = new LinkedList();
        for (Map.Entry<String, Publicacion> entry : biblioteca.entrySet()) {

            if (entry.getValue() instanceof Magazine) {
                Magazine magazineTemp = (Magazine) entry.getValue();
                TreeSet<Autor> autoresMagazine = magazineTemp.getAutores();

                for (Autor autor : autoresMagazine) {
                    int edadAutor = autor.getAnioNacimiento();
                    if ((2023 - edadAutor) > 20 && (2023 - edadAutor) < 40) {
                        direccionesAutores.add(magazineTemp);
                    }
                }
            }
        }
        return direccionesAutores;
    }
    
    LinkedList<Direccion> buscarMazinesMedianaEdad() {
        LinkedList<Direccion> direccionesAutores = new LinkedList();
        for (Map.Entry<String, Publicacion> entry : biblioteca.entrySet()) {

            if (entry.getValue() instanceof Magazine) {
                Magazine magazineTemp = (Magazine) entry.getValue();
                TreeSet<Autor> autoresMagazine = magazineTemp.getAutores();

                for (Autor autor : autoresMagazine) {
                    int edadAutor = autor.getAnioNacimiento();
                    if ((2023 - edadAutor) > 20 && (2023 - edadAutor) < 40) {
                        direccionesAutores.addAll(autor.getDirecciones());
                    }
                }
            }
        }
        return direccionesAutores;
    }

    /**
     * 2. Listar los Magazines que no tengan ninguna de las calles pasadas en
     * una lista como parte de sus direcciones.
     */
    LinkedList<Magazine> listarAutores(LinkedList<Direccion> direcciones) {
        LinkedList<Autor> autoresValidos = new LinkedList();
        LinkedList<Magazine> magazinesValidas = new LinkedList();
        for (Map.Entry<String, Publicacion> entry : biblioteca.entrySet()) {
            if (entry.getValue() instanceof Magazine) {
                Magazine magazineTemp = (Magazine) entry.getValue();
                TreeSet<Autor> autoresMagazine = magazineTemp.getAutores();
                for (Autor autor : autoresMagazine) {
                    if (compararDireccionesAutor(autor, direcciones, autoresValidos)) {
                        magazinesValidas.add(magazineTemp);
                        break;
                    }
                }
            }
        }
        return magazinesValidas;
    }

    /**
     * 2. Listar los Magazines que no tengan ninguna de las calles pasadas en
     * una lista como parte de sus direcciones.
     */
    //Metodo auxiliar para listarAutores
    private boolean compararDireccionesAutor(Autor autor, LinkedList<Direccion> direcciones, LinkedList<Autor> autoresValidos) {
        LinkedList<Direccion> direccionesAutor = autor.getDirecciones();
        for (Direccion direccion : direcciones) {
            for (Direccion direccionaAutor : direccionesAutor) {
                if (direccion.getCalle().equals(direccionaAutor.getCalle())) {
                    return false;
                }
            }
        }
        return true;
    }

    public LinkedHashSet<Publicacion> leerFichero() {
        LinkedHashSet<Publicacion> lista = new LinkedHashSet();
        FileReader reader = null;
        BufferedReader buff = null;
        try {
            reader = new FileReader("Publicaciones.txt");
            buff = new BufferedReader(reader);
            String linea;
            Publicacion publicacion;
            String[] parts;
            while ((linea = buff.readLine()) != null) {
                parts = linea.split(SEPARADOR);
                String isbn = parts[0];
                String titulo = parts[1];
                int anio = Integer.parseInt(parts[2]);
                int tipo = Integer.parseInt(parts[3]);
                if (parts.length > 7) {
                    int numeroRevista = Integer.parseInt(parts[4]);
                    String mes = parts[5];
                    String tematica = parts[6];
                    boolean revisado = false;
                    if (parts[7].equalsIgnoreCase("true")) {
                        revisado = true;
                    }
                    String revisor = parts[8];
                    publicacion = new Investigacion(isbn, titulo, anio, numeroRevista, mes, tematica, revisado, revisor);

                } else {
                    boolean prestado = false;
                    if (parts[4].equalsIgnoreCase("true")) {
                        prestado = true;
                    }
                    String dniAutor = parts[5];
                    publicacion = new Libro(isbn, titulo, anio, prestado, dniAutor);
                }
                lista.add(publicacion);
            }

        } catch (FileNotFoundException ex) {
            System.out.println(ex.getMessage());
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (reader != null) {
                try {
                    reader.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                } catch (Exception ex) {
                    System.out.println(ex.getMessage());
                }
            }
            if (buff != null) {
                try {
                    buff.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                } catch (Exception ex) {
                    System.out.println(ex.getMessage());
                }
            }
        }

        return lista;
    }

    public void guardar() {

    }

    public HashMap<String, Publicacion> getBiblioteca() {
        return biblioteca;
    }

    public void setBiblioteca(HashMap<String, Publicacion> biblioteca) {
        this.biblioteca = biblioteca;
    }
    

    public void cargarlistaEnBiblioteca(LinkedHashSet<Publicacion> listaAux) {
        for (Publicacion publicacion : listaAux) {
            insertar(publicacion);
        }
    }
}
