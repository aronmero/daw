package Ejercicio22;

import java.io.*;
import java.util.*;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) {
        List<Articulo> articulos = new ArrayList<>();
        Scanner teclado = new Scanner(System.in);
        String nombreArchivo = System.getProperty("user.dir") + "\\src\\main\\java\\Ejercicio22\\pedidos.dat";
        boolean menuActivo = true;

        while (menuActivo) {
            System.out.println("-----------");
            System.out.println("1. Leer");
            System.out.println("2. Guardar");
            System.out.println("3. Mostrar lista actual");
            System.out.println("4. Añadir 5 articulos automaticos");
            System.out.println("0. Salir");
            System.out.println("-----------");
            int opcionMenu = teclado.nextInt();
            teclado.nextLine();
            switch (opcionMenu) {
                case 1 -> {
                    List<Articulo> listaTemporal = leerFichero(nombreArchivo);
                    for (Articulo articulo : listaTemporal) {
                        System.out.println(articulo.toString());
                    }
                    System.out.println("¿Deseas añadir estos elementos?");
                    String opcionAnadir = teclado.nextLine();
                    if (opcionAnadir.equalsIgnoreCase("si")) {
                        articulos.addAll(listaTemporal);
                    }
                    listaTemporal.removeAll(listaTemporal);
                }
                case 2 -> {
                    escribirFichero(nombreArchivo, articulos);
                }
                case 3 -> {
                    for (Articulo articulo : articulos) {
                        System.out.println(articulo.toString());
                    }
                }
                case 4 -> {
                    for (int i = 0; i < 5; i++) {
                        int auxiliar = (int) (Math.random() * 99999 + 1);
                        Articulo articulo = new Articulo(i * 5, "CO" + auxiliar, "Prueba");
                        articulos.add(articulo);
                    }
                }

                case 0 -> {
                    System.out.println("Saliendo....");
                    menuActivo = false;
                }
                default -> {
                    System.out.println("Opcion incorrecta");
                }
            }
        }
    }

    private static void escribirFichero(String nombreArchivo, List<Articulo> listaArticulos) {
        ObjectOutputStream escritor = null;
        FileOutputStream stream = null;
        try {
            stream = new FileOutputStream(nombreArchivo);
            escritor = new ObjectOutputStream(stream);
            for (Articulo articulo : listaArticulos) {
                escritor.writeObject(articulo);
            }
            System.out.println("Datos escritos en el archivo");
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (escritor != null) {
                try {
                    escritor.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
            if (stream != null) {
                try {
                    stream.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
        }
    }

    private static List leerFichero(String nombreArchivo) {
        List<Articulo> listaArticulos = new LinkedList<>();
        ObjectInputStream lector = null;
        FileInputStream stream = null;
        try {
            stream = new FileInputStream(nombreArchivo);
            lector = new ObjectInputStream(stream);
            while (true) {
                Articulo articulo = (Articulo) lector.readObject();
                listaArticulos.add(articulo);
            }
        } catch (IOException | ClassNotFoundException ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (lector != null) {
                try {
                    lector.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
            if (stream != null) {
                try {
                    stream.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
        }
        return listaArticulos;
    }
}
