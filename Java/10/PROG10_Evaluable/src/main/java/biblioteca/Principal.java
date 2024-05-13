package biblioteca;

import java.util.LinkedHashSet;
import java.util.LinkedList;
import java.util.Scanner;

public class Principal {

    public static void menu() {
        System.out.println("Opciones del menu:");
        System.out.println("1. Insertar libros y Investigaciones");
        System.out.println("2. borrar por isbn");
        System.out.println("3. buscar una por isbn");
        System.out.println("4. listar todas");
        System.out.println("5. insertar 10 de forma automatica y mostrarlos");
        System.out.println("6. cargar desde fichero");
        System.out.println("7. guardar en fichero");
        System.out.println("8. Mostrar 20 a 40");
       
        System.out.println("10. Mostrar direcciones que no esten en una lista AUTOMATIZADO ");
        System.out.println("0. salir");
    }

    public static void main(String[] args) {
        Biblioteca biblioteca = new Biblioteca();
        Publicacion publicacion = null;
        Libro libro = null;
        Investigacion investigacion = null;
        String isbn;
        String titulo;
        int anio;
        int numero;
        String mes;
        String tematica;
        String dni;
        boolean revisado = false;
        boolean prestado = false;
        String revisor;
        int opcionMenu = -1;
        Scanner teclado = new Scanner(System.in);
        do {
            menu();
            System.out.println("Seleccione una opcion del menu");
            opcionMenu = teclado.nextInt();
            teclado.nextLine();
            switch (opcionMenu) {
                case 0:
                    System.out.println(" Saliendo, hasta pronto;");
                    break;
                case 1:
                    System.out.println("indique el isbn");
                    isbn = teclado.nextLine();
                    System.out.println("indique el titulo");
                    titulo = teclado.nextLine();
                    System.out.println("indique el anio");
                    anio = teclado.nextInt();
                    teclado.nextLine();
                    System.out.println("Indique el tipo de publicacion que desea insertar(libro - investigacion):");
                    String tipo = teclado.nextLine();
                    switch (tipo) {
                        case "libro":
                            System.out.println("indique el dni del autor:");
                            dni = teclado.nextLine();
                            while (!Validar.validarNif(dni)) {
                                System.out.println("Formato del Dni incorrecto(NNNNNNNNL)");
                                System.out.println("indique el dni del autor:");
                                dni = teclado.nextLine();
                            }
                            System.out.println("indique si el libro esta prestado(si o no):");
                            String prest = teclado.nextLine();
                            if (prest.equalsIgnoreCase("si")) {
                                prestado = true;
                            } else if (prest.equalsIgnoreCase("no")) {
                                prestado = false;
                            }
                            libro = new Libro(isbn, titulo, anio, prestado, dni);
                            if (biblioteca.insertar(libro)) {
                                System.out.println("Se ha insertado correctamente el libro");
                            } else {
                                System.out.println("fallo al insertar el libro");
                            }
                            break;
                        case "investigacion":
                            System.out.println("indique el nombre y appellidos del revisor:");
                            revisor = teclado.nextLine();
                            System.out.println("indique el numero de la investigacion:");
                            numero = teclado.nextInt();
                            teclado.nextLine();
                            System.out.println("indique el mes:");
                            mes = teclado.nextLine();
                            System.out.println("Introduzca la tematica: ");
                            tematica = teclado.nextLine();
                            System.out.println("indique si la investigacion esta revisada(si o no):");
                            prest = teclado.nextLine();
                            if (prest.equalsIgnoreCase("si")) {
                                revisado = true;
                            } else if (prest.equalsIgnoreCase("no")) {
                                revisado = false;
                            }
                            /*String isbn, String titulo, int anio, int numero, String mes, String tematica, boolean revisado, String revisor*/
                            investigacion = new Investigacion(isbn, titulo, anio, numero, mes, tematica, revisado, revisor);
                            if (biblioteca.insertar(investigacion)) {
                                System.out.println("Se ha insertado correctamente la investigacion");
                            } else {
                                System.out.println("fallo al insertar la investigacion");
                            }
                            break;
                    }
                    break;
                case 2:
                    System.out.println("Introduzca el isbn de la publicacion que desea borrar");
                    isbn = teclado.nextLine();
                    if (biblioteca.borrar(isbn)) {
                        System.out.println("Se borro correctamente la publicacion");
                    } else {
                        System.out.println("fallo al borrar la publicacion");
                    }
                    break;
                case 3:
                    System.out.println("introduzca el isbn de la publicacion que desea buscar:");
                    isbn = teclado.nextLine();
                    if ((publicacion = biblioteca.buscarPublicacion(isbn)) != null) {
                        System.out.println(publicacion.toString());
                    }
                    break;
                case 4:
                    biblioteca.listarPublicaciones();
                    break;
                case 5:
                    biblioteca.insertarDiez();
                    break;
                case 6:
                    LinkedHashSet<Publicacion> listaAux = biblioteca.leerFichero();
                    System.out.println(listaAux);
                    for (Publicacion publicacion1 : listaAux) {
                        System.out.println(publicacion1.toString());
                    }
//                    System.out.println("¿desea cargar los datos al sistema?(si/no)");
//                    String respuesta = teclado.nextLine();
//                    if (respuesta.equalsIgnoreCase("si")) {
//                        biblioteca.cargarlistaEnBiblioteca(listaAux);
//                    }
                    break;
                case 7:
                    biblioteca.guardar();
                    break;

                case 8:
                    LinkedList<Magazine> magazinesMediana = biblioteca.buscarMagazinesMedianaEdad();
                    for (Magazine magazine : magazinesMediana) {
                        System.out.println(magazine.toString());
                    }
                    break;
                    
                case 10:
                    LinkedList<Direccion> direccionesPrueba = new LinkedList();
                    System.out.println("Direcciones prueba");
                    for (int i = 0; i < 10; i++) {
                        direccionesPrueba.add(new Direccion("Los llanos", "Pedroche"+((int) (Math.random() * 90 + 1)), ((int) (Math.random() * 9000 + 1))));
                    }
                    LinkedList<Magazine> magazinesDireccionesPrueba = biblioteca.listarAutores(direccionesPrueba);
                    for (Magazine magazinesDireccione : magazinesDireccionesPrueba) {
                        System.out.println(magazinesDireccione.toString());
                    }
                     break;

            }
        } while (opcionMenu != 0);
    }

}
