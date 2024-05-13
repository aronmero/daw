/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prog09_evaluable;

import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.LinkedList;
import java.util.Map;

public class GestionNavesEspaciales {

    private HashMap<String, NaveEspacial> navesEspaciales;

    public GestionNavesEspaciales() {
        navesEspaciales = new HashMap<String, NaveEspacial>();

    }

    /*Desarrolle un sistema que pueda almacenar información. Para gestionar estos elementos,
    use HashMap de Naves, y un TreeSet de tripulantes. Implemente la funcionalidad de
    (1,25 punto) :
    a. agregar y eliminar naves
    b. y tripulantes (TreeSet) No repetidos.
     */
    // Método para insertar una nave espacial
    public boolean insertarNave(NaveEspacial nave) {
        navesEspaciales.put(nave.getID(), nave);
        return true;
    }

    public boolean borrarNave(String idNave) {
        for (Map.Entry<String, NaveEspacial> entry : navesEspaciales.entrySet()) {
            if (idNave.equals(entry.getKey())) {
                navesEspaciales.remove(entry.getKey());
                return true;
            }
        }
        return false;
    }

    public boolean insertarTripulante(String idNave, Tripulante tripulante) {
        for (Map.Entry<String, NaveEspacial> entry : navesEspaciales.entrySet()) {
            if (idNave.equals(entry.getKey())) {
                return entry.getValue().agregarTripulante(tripulante);
            }
        }
        return false;
    }

    public boolean borrarTripulante(String idNave, String idTripulante) {
        for (Map.Entry<String, NaveEspacial> entry : navesEspaciales.entrySet()) {
            if (idNave.equals(entry.getKey())) {
                return entry.getValue().eliminarTripulante(idTripulante);
                
            }
        }

        return false;
    }

    /**
     * Guardar serializadas en un fichero “navesDescripcion.dat” todas las naves
     * ordenadas por descripción (1)
     */
    void guardarFicheroBinarioDescripcion() {

        ArrayList<NaveEspacial> navesTemp = new ArrayList();
        for (Map.Entry<String, NaveEspacial> entry : navesEspaciales.entrySet()) {
            navesTemp.add(entry.getValue());
        }
        Comparator c = new Comparator<NaveEspacial>() {
            @Override
            public int compare(NaveEspacial o1, NaveEspacial o2) {
                return o1.getDescripcion().compareToIgnoreCase(o2.getDescripcion());
            }
        };
        navesTemp.sort(c);

        FileOutputStream stream = null;
        ObjectOutputStream out = null;
        try {
            stream = new FileOutputStream("navesDescripcion.dat");
            out = new ObjectOutputStream(stream);
            for (NaveEspacial naveEspacial : navesTemp) {
                out.writeObject(naveEspacial);
            }
        } catch (FileNotFoundException ex) {
            System.out.println("Ha ocurrido un error: "+ex.getMessage());
        } catch (IOException ex) {
            System.out.println("Ha ocurrido un error: "+ex.getMessage());
        } finally {
            if (stream != null) {
                try {
                    stream.close();
                } catch (IOException ex) {
                    System.out.println("Ha ocurrido un error: "+ex.getMessage());
                }
            }
            if (out != null) {
                try {
                    out.close();
                } catch (IOException ex) {
                    System.out.println("Ha ocurrido un error: "+ex.getMessage());
                }
            }
        }

    }

    /**
     * Leer desde ese fichero de datos serializado “navesDescripcion.dat” todas
     * las naves, guardarlas en el HashMap. (1 punto)
     */
    void leerFicheroBinario() {
        FileInputStream stream = null;
        ObjectInputStream in = null;
        Map<String, NaveEspacial> mapTemp = new HashMap<>();
        try {
            stream = new FileInputStream("navesDescripcion.dat");
            in = new ObjectInputStream(stream);
            NaveEspacial naveTemp;
            while ((naveTemp = (NaveEspacial) in.readObject()) != null) {
                mapTemp.put(naveTemp.getID(), naveTemp);
            }
        } catch (FileNotFoundException ex) {
            System.out.println("Ha ocurrido un error: "+ex.getMessage());
        } catch (IOException | ClassNotFoundException ex) {
            System.out.println("Ha ocurrido un error: "+ex.getMessage()+" "+ex.toString());
        } finally {
            if (stream != null) {
                try {
                    stream.close();
                } catch (IOException ex) {
                    System.out.println("Ha ocurrido un error: "+ex.getMessage());
                }
            }
            if (in != null) {
                try {
                    in.close();
                } catch (IOException ex) {
                    System.out.println("Ha ocurrido un error: "+ex.getMessage());
                }
            }
        }
        navesEspaciales.clear();
        navesEspaciales.putAll(mapTemp);
    }

    /**
     * Desarrolle un método que busque las Naves que tienen un determinado
     * pasajero por id. Si se encuentra el pasajero, el método debe devolver
     * true. (1 puntos)
     */
    boolean buscarPasajero(String idPasajero) {
        for (Map.Entry<String, NaveEspacial> entry : navesEspaciales.entrySet()) {
            if (entry.getValue() instanceof NavePasajeros) {
                NavePasajeros nave = (NavePasajeros) entry.getValue();
                LinkedList<Pasajero> listaTemp = nave.getPasajeros();
                for (Pasajero pasajero : listaTemp) {
                    if (idPasajero.equalsIgnoreCase(pasajero.getID())) {
                        return true;
                    }
                }
            }
            if (entry.getValue() instanceof NavePasajerosLujo) {
                NavePasajerosLujo nave = (NavePasajerosLujo) entry.getValue();
                LinkedList<Pasajero> listaTemp = nave.getPasajeros();
                for (Pasajero pasajero : listaTemp) {
                    if (idPasajero.equalsIgnoreCase(pasajero.getID())) {
                        return true;
                    }
                }
            }

        }

        return false;
    }

    /**
     * (1,75)Añadir una opción al menú que escriba a fichero de texto
     * “navesEspaciales.txt” ordenadas por orden decreciente de id, según el
     * siguiente formato
     */
    void guardarFicheroTexto() {

        ArrayList<NaveEspacial> navesTemp = new ArrayList();
        for (Map.Entry<String, NaveEspacial> entry : navesEspaciales.entrySet()) {
            NaveEspacial temp = entry.getValue();
            navesTemp.add(temp);
        }
        Collections.sort(navesTemp, new Comparator<>() {
            @Override
            public int compare(NaveEspacial o1, NaveEspacial o2) {
                return o1.getID().compareTo(o2.getID());
            }

        });

        FileWriter escritor = null;
        try {
            escritor = new FileWriter("“navesEspaciales.txt");

            String linea = "Num naves: " + navesTemp.size();
            escritor.write(linea + "\n");
            final String SEPARADOR = "%%%";
            for (NaveEspacial naveEspacial : navesTemp) {
                int tipo = 0;
                linea = naveEspacial.getID() + SEPARADOR + "TIPONAVE" + SEPARADOR
                        + naveEspacial.getDescripcion() + SEPARADOR + naveEspacial.getFechaCreacion();
                if (naveEspacial instanceof NaveCarga) {
                    NaveCarga temp = (NaveCarga) naveEspacial;
                    linea = linea + SEPARADOR + temp.getCapacidadCarga();
                    tipo = 1;
                } else if (naveEspacial instanceof NaveCargaPesada) {
                    NaveCargaPesada temp = (NaveCargaPesada) naveEspacial;
                    linea = linea + SEPARADOR + temp.getCapacidadCarga() + SEPARADOR + temp.getSistemaGruas();
                    tipo = 2;
                } else if (naveEspacial instanceof NavePasajeros) {
                    NavePasajeros temp = (NavePasajeros) naveEspacial;
                    linea = linea + SEPARADOR + temp.getNumeroPasajeros() + SEPARADOR + temp.getClaseServicio();
                    tipo = 3;
                } else if (naveEspacial instanceof NavePasajerosLujo) {
                    NavePasajerosLujo temp = (NavePasajerosLujo) naveEspacial;
                    linea = linea + SEPARADOR + temp.getNumeroPasajeros() + SEPARADOR + temp.getClaseServicio() + SEPARADOR
                            + temp.getServiciosLujo()
                            + SEPARADOR + temp.getNumeroSuites();
                    tipo = 4;
                }
                String lineaImprimir = linea.replaceAll("TIPONAVE", String.valueOf(tipo));
                escritor.write(lineaImprimir + "\n");
            }
        } catch (FileNotFoundException ex) {
            System.out.println("Ha ocurrido un error: "+ex.getMessage());
        } catch (IOException ex) {
            System.out.println("Ha ocurrido un error: "+ex.getMessage());
        } finally {
            if (escritor != null) {
                try {
                    escritor.close();
                } catch (IOException ex) {
                    System.out.println("Ha ocurrido un error: "+ex.getMessage());
                }
            }
        }
    }

    /**
     * (1,75) Desarrolle el código que lea del fichero de texto con los
     * separadores las naves sin tripulantes ni pasajeros, según el formato
     * definido por el separador: %%%. Y que los cargue en el HashMap de naves.
     */
    void leerFicheroTexto() {
        Map<String, NaveEspacial> mapTemp = new HashMap<>();
        FileReader escritor = null;
        BufferedReader buff = null;
        try {
            escritor = new FileReader("“navesEspaciales.txt");
            buff = new BufferedReader(escritor);
            final String SEPARADOR = "%%%";
            String linea;
            while ((linea = buff.readLine()) != null) {
                String[] parts = linea.split(SEPARADOR);
                if (parts.length > 1) {
                    String id = parts[0].substring(2);
                    int tipoNave = Integer.parseInt(parts[1]);
                    String descripcion = parts[2];
                    String fechaCreacion = parts[3];
                    NaveEspacial nave = null;
                    switch (tipoNave) {
                        case 1 -> {
                            int carga = Integer.parseInt(parts[4]);
                            nave = new NaveCarga(id, descripcion, fechaCreacion, carga);
                        }
                        case 2 -> {
                            int carga = Integer.parseInt(parts[4]);
                            String sistema = parts[5];
                            nave = new NaveCargaPesada(id, descripcion, fechaCreacion, carga, sistema);
                        }
                        case 3 -> {
                            int pasajeros = Integer.parseInt(parts[4]);
                            String servicio = parts[5];
                            nave = new NavePasajeros(id, descripcion, fechaCreacion, pasajeros, servicio);
                        }
                        case 4 -> {
                            int pasajeros = Integer.parseInt(parts[4]);
                            String servicio = parts[6];
                            int numSuites = Integer.parseInt(parts[7]);
                            nave = new NavePasajerosLujo(id, descripcion, fechaCreacion, pasajeros, servicio, numSuites);
                        }
                    }
                    mapTemp.put(nave.getID(), nave);
                }
            }

        } catch (FileNotFoundException ex) {
            System.out.println("Ha ocurrido un error: "+ex.getMessage());
        } catch (IOException ex) {
            System.out.println("Ha ocurrido un error: "+ex.getMessage());
        } finally {
            if (escritor != null) {
                try {
                    escritor.close();
                } catch (IOException ex) {
                    System.out.println("Ha ocurrido un error: "+ex.getMessage());
                }
            }
        }
        navesEspaciales.putAll(mapTemp);
    }

    // Método para buscar una nave espacial
    public NaveEspacial buscarNave(String ID) {
        return null;
    }

    // Método para listar todas las naves espaciales
    public HashMap<String, NaveEspacial> listarNaves() {

        return navesEspaciales;
    }

    public void listarTripulantes(String idNave) {

    }

    public boolean insertarPasajero(String idNave, Pasajero pasajero) {

        return false;
    }

    public void listarPasajeros(String idNave) {

    }

    public boolean borrarPasajero(String idNave, String idPasajero) {

        return false;
    }

    public void addTripulante(String naveID, Tripulante tripulante) {
        NaveEspacial nave = buscarNave(naveID);
        if (nave != null) {
            nave.agregarTripulante(tripulante);
        }
    }

    public void removeTripulante(String naveID, Tripulante tripulante) {
        NaveEspacial nave = buscarNave(naveID);
        if (nave != null) {
            nave.eliminarTripulante(tripulante.getID());
        }
    }

    public void removePasajero(String naveID, Pasajero pasajero) {
        NaveEspacial nave = buscarNave(naveID);
        if (nave instanceof NavePasajeros) {
            ((NavePasajeros) nave).eliminarPasajero(pasajero.getID());
        }
    }

    public void generarEInsertarAleatoriamente(int numNaves, int numTripulantes, int numPasajeros) {
        for (int i = 0; i < numNaves; i++) {
            NaveEspacial nave = NaveEspacial.generarNaveAleatoria();
            for (int j = 0; j < numTripulantes; j++) {
                Tripulante tripulante = Tripulante.generarTripulanteAleatorio();
                nave.agregarTripulante(tripulante);
            }
            for (int k = 0; k < numPasajeros; k++) {
                Pasajero pasajero = Pasajero.generarPasajeroAleatorio();
                nave.agregarPasajero(pasajero);
            }
            insertarNave(nave);
        }
    }

    public HashMap<String, NaveEspacial> getNavesEspaciales() {
        return navesEspaciales;
    }

    public void setNavesEspaciales(HashMap<String, NaveEspacial> navesEspaciales) {
        this.navesEspaciales = navesEspaciales;
    }

}
