package E10_16;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.LinkedHashSet;
import java.util.Scanner;
import java.util.Set;

/**
 *
 * @author Aarón
 */
public class Principal {

    private static final String NOMBRE_FICHERO = System.getProperty("user.dir") + "\\src\\main\\java\\E10_16\\"
            + "firmas.txt";
    private static Set<String> listaFirmas = new LinkedHashSet();

    public static void main(String[] args) {
        listaFirmas.addAll(leerNombre());

        boolean menuPrincipal = true;

        while (menuPrincipal) {
            System.out.println("1. Leer datos");
            System.out.println("2. Escribir datos");
            System.out.println("3. Volver a cargar los datos del fichero");
            System.out.println("4. Cargar firmas al fichero(Eliminar datos fichero)");
            System.out.println("0. Salir");

            int selectorMenu;
            Scanner teclado = new Scanner(System.in);
            selectorMenu = teclado.nextInt();

            switch (selectorMenu) {
                case 1 -> {
                    System.out.println("Mostrando firmas...");
                    for (String firma : listaFirmas) {
                        System.out.println(firma);
                    }
                }
                case 2 -> {
                    insertarNombre();
                }
                case 3 -> {
                    listaFirmas.clear();
                    listaFirmas.addAll(leerNombre());
                }
                case 4 -> {
                    reescribirFichero();
                }
                case 0 -> {
                    System.out.println("Saliendo...");
                    menuPrincipal = false;
                    teclado.close();
                }
                default -> {
                    System.out.println("Incorrecto");
                }
            }
        }
    }

    private static Set<String> leerNombre() {
        FileReader lector = null;
        BufferedReader buffLector = null;
        Set<String> listaTemp = new LinkedHashSet();

        try {
            lector = new FileReader(NOMBRE_FICHERO);
            buffLector = new BufferedReader(lector);
            String linea;
            while ((linea = buffLector.readLine()) != null) {
                listaTemp.add(linea);
            }
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        } finally {
            if (lector != null) {
                try {
                    lector.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
            if (buffLector != null) {
                try {
                    buffLector.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
        }
        return listaTemp;

    }

    private static void reescribirFichero() {
        FileWriter escritor = null;

        try {
            escritor = new FileWriter(NOMBRE_FICHERO);
            for (String listaFirma : listaFirmas) {
                escritor.write(listaFirma + System.lineSeparator());
            }
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        if (escritor != null) {
            try {
                escritor.close();
            } catch (IOException ex) {
                System.out.println(ex.getMessage());
            }
        }

    }

    private static void insertarNombre() {
        FileWriter escritor = null;
        String nombre;
        Scanner teclado = new Scanner(System.in);
        System.out.println("Escribe el nombre del que firma");
        nombre = teclado.nextLine();

        if (listaFirmas.add(nombre)) {
            try {
                escritor = new FileWriter(NOMBRE_FICHERO, true);
                escritor.write(nombre + System.lineSeparator());
            } catch (IOException ex) {
                System.out.println(ex.getMessage());
            } catch (Exception ex) {
                System.out.println(ex.getMessage());
            }
            if (escritor != null) {
                try {
                    escritor.close();
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }

        }
        teclado.close();
    }
}
