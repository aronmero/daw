package Ejercicio23;

import java.io.*;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.LinkedList;
import java.util.List;
import java.util.Scanner;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        Concesionario concesionario = new Concesionario();
        String nombreArchivoBinario = System.getProperty("user.dir") + "\\src\\main\\java\\Ejercicio23\\vehiculos.dat";
        String nombreArchivoTexto = System.getProperty("user.dir") + "\\src\\main\\java\\Ejercicio23\\vehiculos.txt";

        boolean menuActivo = true;
        while (menuActivo) {
            System.out.println("----------");
            System.out.println("1. Guardar en binario");
            System.out.println("2. Leer de binario");
            System.out.println("3. Guardar en fichero ordenado por marca");
            System.out.println("4. Guardar en fichero ordenado por precio");
            System.out.println("5. Añadir 5 vehiculos");
            System.out.println("6. Leer desde fichero y guardar");
            System.out.println("0. Salir");
            System.out.println("----------");
            int opcionMenu = teclado.nextInt();
            switch (opcionMenu) {
                case 1 -> {
                    guardarFichero(nombreArchivoBinario, concesionario);
                }
                case 2 -> {
                    interceptorLecturaFichero(nombreArchivoBinario, concesionario);
                }
                case 3 -> {
                    guardarFicheroTextoOrdenadoMarca(nombreArchivoTexto, concesionario);
                }
                case 4 -> {
                    guardarFicheroTextoOrdenadoPrecio(nombreArchivoTexto, concesionario);
                }
                case 5 -> {
                    anadirVehiculos(concesionario);
                }
                case 6 -> {
                    leerGuardar(nombreArchivoTexto, concesionario);
                }
                case 0 -> {
                    menuActivo = false;
                }
                default -> {
                    System.out.println("Incorrecto");
                }
            }

        }
    }

    private static void anadirVehiculos(Concesionario concesionario) {
        Vehiculo v1 = new Vehiculo("A" + ((int) (Math.random() * 9999 + 1)), ((int) (Math.random() * 99999 + 1)), "Toyota", new Propietario("Juan"));
        Vehiculo v2 = new Vehiculo("B" + ((int) (Math.random() * 9999 + 1)), ((int) (Math.random() * 99999 + 1)), "BMW", new Propietario("Javi"));
        Vehiculo v3 = new Vehiculo("C" + ((int) (Math.random() * 9999 + 1)), ((int) (Math.random() * 99999 + 1)), "Honda", new Propietario("Olek"));
        Vehiculo v4 = new Vehiculo("D" + ((int) (Math.random() * 9999 + 1)), ((int) (Math.random() * 99999 + 1)), "Ford", new Propietario("Maria"));
        Vehiculo v5 = new Vehiculo("E" + ((int) (Math.random() * 9999 + 1)), ((int) (Math.random() * 99999 + 1)), "Mercedes", new Propietario("Paco"));
        concesionario.anadirVehiculo(v1);
        concesionario.anadirVehiculo(v2);
        concesionario.anadirVehiculo(v3);
        concesionario.anadirVehiculo(v4);
        concesionario.anadirVehiculo(v5);
        System.out.println("Vehiculos añadidos");
    }

    private static void interceptorLecturaFichero(String nombreArchivoBinario, Concesionario concesionario) {
        Scanner teclado = new Scanner(System.in);
        List<Vehiculo> listaTemporal = leerFichero(nombreArchivoBinario);
        for (Vehiculo vehiculo : listaTemporal) {
            System.out.println(vehiculo.toString());
        }
        System.out.println("¿Deseas añadir los elementos?");
        String opcionAnadir = teclado.nextLine();
        if (opcionAnadir.equalsIgnoreCase("si")) {
            concesionario.anadirVariosVehiculo(listaTemporal);
        }
        listaTemporal.removeAll(listaTemporal);
    }

    private static void guardarFichero(String nombreArchivo, Concesionario concesionario) {
        FileOutputStream stream = null;
        ObjectOutputStream salida = null;
        try {
            stream = new FileOutputStream(nombreArchivo);
            salida = new ObjectOutputStream(stream);
            for (Vehiculo vehiculo : concesionario.getListaVehiculo()) {
                salida.writeObject(vehiculo);
            }
            System.out.println("Escrito");
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (stream != null) {
                try {
                    stream.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }

            if (salida != null) {
                try {
                    salida.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
        }
    }

    private static List leerFichero(String nombreArchivo) {
        List<Vehiculo> listaVehiculo = new LinkedList();
        FileInputStream stream = null;
        ObjectInputStream entrada = null;
        try {
            stream = new FileInputStream(nombreArchivo);
            entrada = new ObjectInputStream(stream);
            while (true) {
                Vehiculo vehiculo = (Vehiculo) entrada.readObject();
                listaVehiculo.add(vehiculo);
            }
        } catch (IOException | ClassNotFoundException ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (stream != null) {
                try {
                    stream.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }

            if (entrada != null) {
                try {
                    entrada.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
        }
        return listaVehiculo;
    }

    private static void guardarFicheroTextoOrdenadoMarca(String nombreArchivo, Concesionario concesionario) {
        List<Vehiculo> listaVehiculo = new ArrayList();
        FileWriter escritor = null;
        listaVehiculo.addAll(concesionario.getListaVehiculo());
        try {
            escritor = new FileWriter(nombreArchivo);
            Comparator comparador = new Comparator<Vehiculo>() {
                @Override
                public int compare(Vehiculo o1, Vehiculo o2) {
                    return o2.getMarca().compareTo(o1.getMarca());
                }
            };
            Collections.sort(listaVehiculo, comparador);

            for (Vehiculo vehiculo : listaVehiculo) {
                escritor.write(vehiculo.getMarca() + "-" + vehiculo.getMatricula() + "-" + vehiculo.getPrecio() + "-" + vehiculo.getPropietario().getNombre() + "\n");
            }

            System.out.println("Escrito");
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (escritor != null) {
                try {
                    escritor.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
        }
    }

    private static void guardarFicheroTextoOrdenadoPrecio(String nombreArchivo, Concesionario concesionario) {
        List<Vehiculo> listaVehiculo = new ArrayList();
        FileWriter escritor = null;
        listaVehiculo.addAll(concesionario.getListaVehiculo());
        try {
            escritor = new FileWriter(nombreArchivo);
            Comparator comparador = new Comparator<Vehiculo>() {
                @Override
                public int compare(Vehiculo o1, Vehiculo o2) {
                    return Double.compare(o1.getPrecio(), o2.getPrecio());
                }
            };
            Collections.sort(listaVehiculo, comparador);
            escritor.write("PRECIO-MATRICULA-MARCA-PROPIETARIO");
            for (Vehiculo vehiculo : listaVehiculo) {
                escritor.write("\n" + vehiculo.getPrecio() + "-" + vehiculo.getMatricula() + "-" + vehiculo.getMarca() + "-" + vehiculo.getPropietario().getNombre());
            }

            System.out.println("Escrito");
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (escritor != null) {
                try {
                    escritor.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
        }
    }

    private static void leerGuardar(String nombreArchivo, Concesionario concesionario) {
        try ( BufferedReader lector = new BufferedReader(new FileReader(nombreArchivo))) {
            String linea;
            while ((linea = lector.readLine()) != null) {
                System.out.println(linea);
            }

        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }
        Scanner teclado = new Scanner(System.in);
        System.out.println("¿Desea incorporar estos datos al listado?(Si/No)");
        if (teclado.nextLine().equalsIgnoreCase("si")) {
            try ( BufferedReader lector = new BufferedReader(new FileReader(nombreArchivo))) {
                String linea;
                Pattern patron = Pattern.compile("(\\d{5,9}[a-zA-Z])(\\s*)(\\d{2,4}-\\d{2,4}-\\d{2,4})|(\\d{5,9}[a-zA-Z])(###)([\\w\\háéíóúÁÉÍÓÚ]*)(###)(\\d*)(###)(\\d{2,4}-\\d{2,4}-\\d{2,4})");
                while ((linea = lector.readLine()) != null) {
                    Matcher deteccionPatron = patron.matcher(linea);
                    if (deteccionPatron.matches()) {
                        Vehiculo vehiculo = new Vehiculo();
                        if (deteccionPatron.group(1) != null) {
                            vehiculo.setPrecio(Integer.valueOf(deteccionPatron.group(1)));
                            vehiculo.setMatricula(deteccionPatron.group(2));
                            vehiculo.setMarca(deteccionPatron.group(3));
                            vehiculo.setPropietario(new Propietario(deteccionPatron.group(4)));
                        } else {
                            vehiculo.setPrecio(Integer.valueOf(deteccionPatron.group(7)));
                            vehiculo.setMatricula(deteccionPatron.group(6));
                            vehiculo.setMarca(deteccionPatron.group(5));
                            vehiculo.setPropietario(new Propietario(deteccionPatron.group(8)));
                        }
                        concesionario.anadirVehiculo(vehiculo);
                    }

                }
            } catch (IOException ex) {
                System.out.println(ex.getMessage());
            }
        }
    }

}
