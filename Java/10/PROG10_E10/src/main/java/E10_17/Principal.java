package E10_17;

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

    private static final String NOMBRE_FICHERO = System.getProperty("user.dir") + "\\src\\main\\java\\E10_17\\"
            + "firmas.txt";
    private static Set<String> listaFirmas = new LinkedHashSet();
    private static final int VALOR_ENCRIPTADO = 4;

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
                String lineaDecodificada = decodificador(linea);

                listaTemp.add(lineaDecodificada);
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
            for (String firma : listaFirmas) {
                String firmaCodificada = codificador(firma);
                escritor.write(firmaCodificada + System.lineSeparator());
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
                String nombreCodificado = codificador(nombre);

                escritor = new FileWriter(NOMBRE_FICHERO, true);

                escritor.write(nombreCodificado + System.lineSeparator());
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
                } finally {
                    teclado.close();
                }
            }

        }
    }

    private static String codificador(String nombre) {
        char[] nombreEnCaracter = nombre.toCharArray();
        char[] nombreEnCaracterCodificado = new char[nombreEnCaracter.length];
        int i = 0;
        for (char c : nombreEnCaracter) {
            nombreEnCaracterCodificado[i] = (char) (c + VALOR_ENCRIPTADO);
            i++;
        }
        String nombreCodificado = new String(nombreEnCaracterCodificado);
        return nombreCodificado;
    }

    private static String decodificador(String nombre) {
        char[] nombreEnCaracter = nombre.toCharArray();
        char[] nombreEnCaracterCodificado = new char[nombreEnCaracter.length];
        int i = 0;
        for (char c : nombreEnCaracter) {
            nombreEnCaracterCodificado[i] = (char) (c - VALOR_ENCRIPTADO);
            i++;
        }
        String nombreCodificado = new String(nombreEnCaracterCodificado);
        return nombreCodificado;
    }
}
