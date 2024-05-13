/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */
package com.mycompany.prog09_alumnos;

import java.util.LinkedList;
import java.util.Scanner;
import java.io.*;
import java.util.Comparator;

public class MainAlumnosFicheros {

    private static LinkedList<Alumno> alumnos = new LinkedList<>();
    private static Scanner scanner = new Scanner(System.in);
    private static final String SEPARATOR = "###";
    private static final String FILE_NAME = "datosAlumnos.dat";

    public static void main(String[] args) {
        cargarDesdeFichero();
        int opcion;
        do {
            System.out.println("1. Cargar diez alumnos");
            System.out.println("2. Mostrar los diez alumnos de la lista");
            System.out.println("3. Eliminar un alumno por DNI");
            System.out.println("4. Insertar un alumno");
            System.out.println("5. Listado a Fichero de alumnos con '###' como separador");
            System.out.println("6. Listado de alumnos DNI - Fecha de matrícula");
            System.out.println("7. Leer desde fichero de separadores '###'");
            System.out.println("8. Guardar el listado a un fichero de datos *.dat");
            System.out.println("9. Leer los alumnos desde un fichero de datos *.dat");
            System.out.println("0. Salir");
            System.out.print("Elige una opción: ");
            opcion = scanner.nextInt();
            switch (opcion) {
                case 1:
                    cargarDiezAlumnos();
                    break;
                case 2:
                    mostrarDiezAlumnos();
                    break;
                case 3:
                    eliminarAlumnoPorDNI();
                    break;
                case 4:
                    insertarAlumno();
                    break;
                case 5:
                    listadoAFichero();
                    break;
                case 6:
                    listadoDeAlumnosDNIYFechaMatricula();
                    break;
                case 7:
                    leerDesdeFichero();
                    break;
                case 8:
                    guardarListadoAFicheroDat();
                    break;
                case 9:
                    leerAlumnosDesdeFicheroDat();
                    break;
                case 10:
                    guardarListadoAFicheroDat();
                    break;
            }
        } while (opcion != 0);
    }

    private static void mostrarDiezAlumnos() {
        for (Alumno alumno : alumnos) {
            System.out.println("NIF: " + alumno.getNif());
            System.out.println("Nombre: " + alumno.getNombre());
            System.out.println("Edad: " + alumno.getEdad());
            Fecha fechaMatricula = alumno.getFechaMatricula();
            System.out.println("Fecha de matrícula: " + fechaMatricula.getDia() + "-" + fechaMatricula.getMes() + "-" + fechaMatricula.getAño());
            System.out.println("--------------------");
        }
    }

    private static void guardarListadoAFicheroDat() {
        try {
            FileOutputStream fos = new FileOutputStream(FILE_NAME);
            ObjectOutputStream oos = new ObjectOutputStream(fos);
            for (Alumno alumno : alumnos) {
                oos.writeObject(alumno);
            }
            oos.close();
            fos.close();
        } catch (IOException e) {
            System.out.println("Error al guardar los datos: " + e.getMessage());
        }
    }

    private static void cargarDesdeFichero() {
        try {
            FileInputStream fis = new FileInputStream(FILE_NAME);
            ObjectInputStream ois = new ObjectInputStream(fis);
            alumnos.clear();
            while (fis.available() > 0) {
                Alumno alumno = (Alumno) ois.readObject();
                alumnos.add(alumno);
            }
            ois.close();
            fis.close();
        } catch (IOException e) {
            System.out.println("Error al cargar los datos: " + e.getMessage());
        } catch (ClassNotFoundException e) {
            System.out.println("Clase no encontrada: " + e.getMessage());
        }
    }

    private static void listadoAFichero() {
        try {
            // Ordenar la lista de alumnos por NIF ascendente
            alumnos.sort(Comparator.comparing(Alumno::getNif));

            FileWriter writer = new FileWriter("ListadoAlumnos.txt");
            for (Alumno alumno : alumnos) {
                String line = alumno.getNif() + SEPARATOR + alumno.getNombre() + SEPARATOR + alumno.getEdad() + SEPARATOR + alumno.getFechaMatricula().getDia() + "-" + alumno.getFechaMatricula().getMes() + "-" + alumno.getFechaMatricula().getAño();
                writer.write(line + "\n");
            }
            // Escribir el número total de alumnos en la última línea del fichero
            writer.write("Número total de alumnos: " + alumnos.size() + "\n");
            writer.close();
        } catch (IOException e) {
            System.out.println("Error al guardar el listado de alumnos: " + e.getMessage());
        }
    }

    private static void eliminarAlumnoPorDNI() {
        System.out.print("Introduce el DNI del alumno que quieres eliminar: ");
        String dni = scanner.next();
        Alumno alumnoAEliminar = null;
        for (Alumno alumno : alumnos) {
            if (alumno.getNif().equals(dni)) {
                alumnoAEliminar = alumno;
                break;
            }
        }
        if (alumnoAEliminar != null) {
            alumnos.remove(alumnoAEliminar);
            System.out.println("Alumno eliminado.");
        } else {
            System.out.println("No se ha encontrado ningún alumno con ese DNI.");
        }
    }

    private static void insertarAlumno() {
        System.out.println("Introduce los detalles del nuevo alumno:");
        System.out.print("NIF: ");
        String nif = scanner.next();
        System.out.print("Nombre: ");
        String nombre = scanner.next();
        System.out.print("Edad: ");
        int edad = scanner.nextInt();
        System.out.println("Fecha de matrícula (dd-mm-yyyy): ");
        String fechaMatriculaStr = scanner.next();
        String[] fechaParts = fechaMatriculaStr.split("-");
        int dia = Integer.parseInt(fechaParts[0]);
        int mes = Integer.parseInt(fechaParts[1]);
        int año = Integer.parseInt(fechaParts[2]);
        Fecha fechaMatricula = new Fecha(dia, mes, año);
        Alumno alumno = new Alumno(nif, nombre, edad, fechaMatricula);
        alumnos.add(alumno);
    }

    private static void listadoDeAlumnosDNIYFechaMatricula() {
        try {
            // Ordenar la lista de alumnos por edad
            alumnos.sort(Comparator.comparing(Alumno::getEdad));

            FileWriter writer = new FileWriter("ListadoAlumnos.txt");
            for (Alumno alumno : alumnos) {
                String line = alumno.getNif() + " " + alumno.getFechaMatricula().getDia() + "-" + alumno.getFechaMatricula().getMes() + "-" + alumno.getFechaMatricula().getAño();
                writer.write(line + "\n");
            }
            writer.close();
        } catch (IOException e) {
            System.out.println("Error al guardar el listado de alumnos: " + e.getMessage());
        }
    }

    private static void leerDesdeFichero() {
        try {
            File file = new File("ListadoAlumnos.txt");
            Scanner fileScanner = new Scanner(file);
            while (fileScanner.hasNextLine()) {
                String line = fileScanner.nextLine();
                String[] parts = line.split(SEPARATOR);
                if (parts.length <= 1)
                    break;
                String nif = parts[0];
                String nombre = parts[1];
                int edad = Integer.parseInt(parts[2]);
                String[] fechaParts = parts[3].split("-");
                int dia = Integer.parseInt(fechaParts[0]);
                int mes = Integer.parseInt(fechaParts[1]);
                int año = Integer.parseInt(fechaParts[2]);
                Fecha fechaMatricula = new Fecha(dia, mes, año);
                Alumno alumno = new Alumno(nif, nombre, edad, fechaMatricula);
                // Comprobar si el alumno ya está en la lista
                boolean isRepeated = false;
                for (Alumno a : alumnos) {
                    if (a.getNif().equals(alumno.getNif())) {
                        isRepeated = true;
                        break;
                    }
                }
                // Si el alumno no está en la lista, añadirlo
                if (!isRepeated) {
                    alumnos.add(alumno);
                }
            }
            fileScanner.close();
        } catch (FileNotFoundException e) {
            System.out.println("El fichero no se ha encontrado.");
        }
    }

    private static void leerAlumnosDesdeFicheroDat() {
        try {
            FileInputStream fis = new FileInputStream("datosAlumnos.dat");
            ObjectInputStream ois = new ObjectInputStream(fis);
            alumnos.clear();
            while (fis.available() > 0) {
                Alumno alumno = (Alumno) ois.readObject();
                alumnos.add(alumno);
            }
            ois.close();
            fis.close();
        } catch (IOException e) {
            System.out.println("Error al cargar los datos: " + e.getMessage());
        } catch (ClassNotFoundException e) {
            System.out.println("Clase no encontrada: " + e.getMessage());
        }
    }

    private static void cargarDiezAlumnos() {
        for (int i = 0; i < 10; i++) {
            String nif = "NIF" + i;
            String nombre = "Nombré" + i;
            int edad = 20 + i;
            Fecha fechaMatricula = new Fecha(1, 1, 2000 + i);
            Alumno alumno = new Alumno(nif, nombre, edad, fechaMatricula);
            alumnos.add(alumno);
        }
        System.out.println("Diez alumnos cargados.");
    }
}
