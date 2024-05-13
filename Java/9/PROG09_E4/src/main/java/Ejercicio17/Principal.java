package Ejercicio17;

import java.util.*;
import java.io.*;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    private final static String UBICACION_MAESTRA = System.getProperty("user.dir") + "\\src\\main\\java\\Ejercicio17\\";
    private final static String NOMBRE_ARCHIVO_LIST = UBICACION_MAESTRA + "datosAlumnos.dat";
    private final static String SEPARADOR = "###";
    private final static String ARCHIVO_LISTADO_ALUMNOS = UBICACION_MAESTRA + "ListadoAlumnos.txt";

    public static void main(String[] args) {
        boolean selectorPrincipal = true;
        int selector;
        Scanner teclado = new Scanner(System.in);
        List<Alumno> alumnos = leerDatosDesdeArchivo(NOMBRE_ARCHIVO_LIST);
        do {
            System.out.println("----- MENU -----");
            System.out.println("1. Crear e insertar automáticamente 10 alumnos");
            System.out.println("2. Mostrar todos los alumnos");
            System.out.println("3. Eliminar un alumno por DNI");
            System.out.println("4. Insertar un alumno");
            System.out.println("5. Listado a fichero de alumnos con \"###\" como separador");
            System.out.println("6. Listado de alumnos DNI - Fecha de matrícula");
            System.out.println("7. Leer desde fichero de separadores \"###\"");
            System.out.println("8. Guardar el listado a un fichero de datos *.dat");
            System.out.println("9. Leer los alumnos desde un fichero de datos *.dat");
            System.out.println("10. Guardar en Listado Alumnos (txt) ordenado por nif");
            System.out.println("11. Guardar en Listado Alumnos (txt) ordenado por edad");
            System.out.println("12. Leer Listado Alumnos");
            System.out.println("0. Salir");
            System.out.println("Ingrese una opción:");

            selector = teclado.nextInt();

            switch (selector) {
                case 1 -> {
                    anadirAlumnosAutomaticamente(alumnos);
                }
                case 2 -> {
                    mostrarDatos(alumnos);
                }
                case 3 -> {
                    if (eliminarAlumnoDni(alumnos)) {
                        System.out.println("Se ha eliminado el alumno");
                    } else {
                        System.out.println("No se ha podido eliminar el alumno");
                    }
                }
                case 4 -> {
                    introducirAlumno(alumnos);
                }
                case 5 -> {
                    escribirDatosAlmoadilla(obtenerNombreArchivo(), alumnos);
                }
                case 6 -> {
                    for (Alumno alumno : alumnos) {
                        System.out.println("DNI:" + alumno.getDni() + ", fecha matricula" + alumno.getFecha());
                    }
                }
                case 7 -> {
                    leerDatosDesdeFichero(obtenerNombreArchivo());
                }
                case 8 -> {
                    escribirDatosEnArchivo(obtenerNombreArchivo(), alumnos);
                }
                case 9 -> {
                    mostrarDatos(leerDatosDesdeArchivo(obtenerNombreArchivo()));
                }
                case 10 -> {
                    escribirDatosAlmoadillaOrdenadosDni(ARCHIVO_LISTADO_ALUMNOS, alumnos);
                }
                case 11 -> {
                    escribirDatosOrdenadosEdad(ARCHIVO_LISTADO_ALUMNOS, alumnos);
                }
                case 12 -> {
                    leerDatosDesdeFichero(ARCHIVO_LISTADO_ALUMNOS);
                    incorporarDatosLista(ARCHIVO_LISTADO_ALUMNOS, alumnos);
                }
                case 0 -> {
                    escribirDatosEnArchivo(NOMBRE_ARCHIVO_LIST, alumnos);
                    System.out.println("Saliendo del programa...");
                    selectorPrincipal = false;
                }
                default -> {
                    System.out.println("Opción inválida. Intente nuevamente.");
                }
            }
        } while (selectorPrincipal);
    }

    /**
     * C.- Leer los alumnos desde el "fichero de texto generado" en el apartado
     * anterior (Listado****.txt ) y dar la opción mediante pregunta al usuario
     * de si se desea incorporar estos alumnos al listado ya existente, solo se
     * incorporarán los que no estén repetidos.
     */
    private static void incorporarDatosLista(String nombreArchivo, List<Alumno> alumnos) {
        Scanner teclado = new Scanner(System.in);
        System.out.println("¿Desea incorporar estos datos al listado?(Si/No)");
        if (teclado.nextLine().equalsIgnoreCase("si")) {
            Set<Alumno> alumnosNuevos = new LinkedHashSet();
            alumnosNuevos.addAll(alumnos);

            try ( BufferedReader lector = new BufferedReader(new FileReader(nombreArchivo))) {
                String linea;
                Pattern patron = Pattern.compile("(\\d{5,9}[a-zA-Z])(\\s*)(\\d{2,4}-\\d{2,4}-\\d{2,4})|(\\d{5,9}[a-zA-Z])(###)([\\w\\háéíóúÁÉÍÓÚ]*)(###)(\\d*)(###)(\\d{2,4}-\\d{2,4}-\\d{2,4})");
                while ((linea = lector.readLine()) != null) {
                    Matcher deteccionPatron = patron.matcher(linea);
                    if (deteccionPatron.matches()) {
                        Alumno alumno = new Alumno();
                        if (deteccionPatron.group(1) != null) {
                            alumno.setDni(deteccionPatron.group(1).trim());
                            alumno.setFecha(deteccionPatron.group(3).trim());
                        } else {
                            alumno.setDni(deteccionPatron.group(4).trim());
                            alumno.setNombre(deteccionPatron.group(6));
                            alumno.setEdad(Integer.parseInt(deteccionPatron.group(8)));
                            alumno.setFecha(deteccionPatron.group(10).trim());
                        }

                        alumnosNuevos.add(alumno);
                    }

                }
            } catch (IOException ex) {
                System.out.println(ex.getMessage());
            }

            alumnos.removeAll(alumnos);

            alumnos.addAll(alumnosNuevos);

        }
    }

    private static void mostrarDatos(List<Alumno> alumnos) {
        for (Alumno alumno : alumnos) {
            System.out.println(alumno.toString());
        }
    }

    private static String obtenerNombreArchivo() {
        Scanner teclado = new Scanner(System.in);
        String nombreArchivo = null;
        do {
            System.out.println("Introduce el nombre del archivo con su extension, debe estar en la ubicacion de este paquete");
            nombreArchivo = teclado.nextLine();
        } while (nombreArchivo == null);
        nombreArchivo = UBICACION_MAESTRA + nombreArchivo;

        return nombreArchivo;
    }

    private static boolean introducirAlumno(List<Alumno> alumnos) {
        Scanner teclado = new Scanner(System.in);
        System.out.println("Introduce el dni del alumno");
        String dni = teclado.nextLine();
        System.out.println("Introduce el nombre del alumno");
        String nombre = teclado.nextLine();
        System.out.println("Introduce la edad del alumno");
        int edad = teclado.nextInt();
        System.out.println("Introduce la fecha de matriculacion del alumno");
        String fechaMatricula = teclado.nextLine();

        Alumno alumno = new Alumno(dni, nombre, edad, fechaMatricula);

        return alumnos.add(alumno);
    }

    private static boolean eliminarAlumnoDni(List<Alumno> alumnos) {
        Scanner teclado = new Scanner(System.in);
        System.out.println("Introduce el dni a eliminar");
        String dni = teclado.nextLine();
        for (Alumno alumno : alumnos) {
            if (dni.equals(alumno.getDni())) {
                alumnos.remove(alumno);
                return true;
            }
        }
        return false;
    }

    private static void anadirAlumnosAutomaticamente(List<Alumno> alumnos) {
        for (int i = 0; i < 10; i++) {
            int dni = (int) (Math.random() * 99999 + 1);
            Alumno alumno = new Alumno(dni + "P", "Carlos", i * 2 + 10, "2020-10-12");
            alumnos.add(alumno);
        }
    }

    /*FICHEROS BINARIOS*/
    private static void escribirDatosEnArchivo(String nombreArchivo, List<Alumno> listaAlumnos) {
        ObjectOutputStream escritor = null;
        FileOutputStream stream = null;
        try {
            stream = new FileOutputStream(nombreArchivo);
            escritor = new ObjectOutputStream(stream);
            for (Alumno alumno : listaAlumnos) {
                escritor.writeObject(alumno);
            }
            System.out.println("Datos escritos en el archivo correctamente.");
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } finally {
            try {
                if (stream != null) {
                    stream.close();
                }
            } catch (IOException ex) {
                System.out.println(ex.getMessage());
            }
            try {
                if (escritor != null) {
                    escritor.close();
                }
            } catch (IOException ex) {
                System.out.println(ex.getMessage());
            }
        }
    }

    private static LinkedList<Alumno> leerDatosDesdeArchivo(String nombreArchivo) {
        LinkedList<Alumno> listaAlumnos = new LinkedList<>();
        ObjectInputStream lector = null;
        FileInputStream stream = null;
        try {
            stream = new FileInputStream(nombreArchivo);
            lector = new ObjectInputStream(stream);
            while (true) {
                Alumno alumno = (Alumno) lector.readObject();
                listaAlumnos.add(alumno);
            }
        } catch (EOFException ex) {
            System.out.println(ex.getMessage());
        } catch (IOException | ClassNotFoundException ex) {
            System.out.println(ex.getMessage());
        } finally {
            try {
                if (lector != null) {
                    lector.close();
                }
                if (stream != null) {
                    stream.close();
                }
            } catch (IOException ex) {
                System.out.println(ex.getMessage());
            }
        }
        return listaAlumnos;
    }

    /*FICHEROS NO BINARIOS*/
    private static void escribirDatosAlmoadilla(String nombreArchivo, List<Alumno> listaAlumnos) {
        PrintWriter escritor = null;
        try {
            escritor = new PrintWriter(new FileWriter(nombreArchivo));
            for (Alumno alumno : listaAlumnos) {
                String linea = alumno.getDni() + SEPARADOR + alumno.getNombre() + SEPARADOR + alumno.getEdad() + SEPARADOR + alumno.getFecha();
                escritor.println(linea);
            }

            System.out.println("Datos escritos en el archivo correctamente.");
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } finally {
            try {
                if (escritor != null) {
                    escritor.close();
                }
            } catch (Exception ex) {
                System.out.println(ex.getMessage());
            }
        }
    }

    private static void leerDatosDesdeFichero(String nombreArchivo) {
        try ( BufferedReader lector = new BufferedReader(new FileReader(nombreArchivo))) {
            String linea;
            while ((linea = lector.readLine()) != null) {
                System.out.println(linea);
            }

        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }
    }

    /**
     * A.- Añade una nueva opción al menú de la aplicación denominado "Listado
     * Alumnos" ordenado por nif decreciente, de modo que al seleccionarla, se
     * genere un fichero de texto denominado ListadoAlumnos.txt que contenga una
     * línea de texto por cada alumno almacenado, donde se visualice DNI,
     * nombre, edad y fecha de matrícula, por cada línea. El oren debe ser por
     * dni ascendente.
     */
    private static void escribirDatosAlmoadillaOrdenadosDni(String nombreArchivo, List<Alumno> listaAlumnos) {
        Comparator comparador = (Comparator<Alumno>) (Alumno o1, Alumno o2) -> o1.getDni().compareTo(o2.getDni());
        listaAlumnos.sort(comparador);
        PrintWriter escritor = null;
        try {
            escritor = new PrintWriter(new FileWriter(nombreArchivo));
            String linea = "DNI###nombre###edad###fechaMatricula";
            escritor.println(linea);
            for (Alumno alumno : listaAlumnos) {
                linea = alumno.getDni() + SEPARADOR + alumno.getNombre() + SEPARADOR + alumno.getEdad() + SEPARADOR + alumno.getFecha();
                escritor.println(linea);
            }
            String alumnosTotales = "Alumnos: " + listaAlumnos.size();
            escritor.println(alumnosTotales);
            System.out.println("Datos escritos en el archivo correctamente.");
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } finally {
            try {
                if (escritor != null) {
                    escritor.close();
                }
            } catch (Exception ex) {
                System.out.println(ex.getMessage());
            }
        }
    }

    /**
     * B.- Añade una nueva opción al menú de la aplicación denominado "Listado
     * Alumnos" de modo que al seleccionarla, se genere un fichero de texto
     * denominado ListadoAlumnos.txt que contenga una línea de texto por cada
     * alumno almacenado, donde se visualice DNI y fecha por cada línea. Este
     * listado debe estar ordenado por edad.
     */
    private static void escribirDatosOrdenadosEdad(String nombreArchivo, List<Alumno> listaAlumnos) {
        List<Alumno> alumnosOrdenadosDni = listaAlumnos;
        Comparator comparador = (Comparator<Alumno>) (Alumno o1, Alumno o2) -> Integer.compare(o1.getEdad(), o2.getEdad());
        alumnosOrdenadosDni.sort(comparador);
        PrintWriter escritor = null;
        try {
            escritor = new PrintWriter(new FileWriter(nombreArchivo));
            for (Alumno alumno : alumnosOrdenadosDni) {
                String linea = alumno.getDni() + " " + alumno.getFecha();
                escritor.println(linea);
            }
            System.out.println("Datos escritos en el archivo correctamente.");
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } finally {
            try {
                if (escritor != null) {
                    escritor.close();
                }
            } catch (Exception ex) {
                System.out.println(ex.getMessage());
            }
        }
    }
}
