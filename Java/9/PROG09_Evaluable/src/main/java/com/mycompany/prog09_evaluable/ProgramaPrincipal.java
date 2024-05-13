/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prog09_evaluable;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Scanner;

public class ProgramaPrincipal {

    public static void main(String[] args) {

        GestionNavesEspaciales gestionNaves = new GestionNavesEspaciales();
        Scanner scanner = new Scanner(System.in);
        int opcion = 0;
        do {
            System.out.println("1. AÃ±adir nave");
            System.out.println("2. Listar naves");
            System.out.println("3. Borrar nave");
            System.out.println("4. AÃ±adir tripulante");
            System.out.println("5. Listar tripulantes");
            System.out.println("6. Borrar tripulante");
            System.out.println("7. AÃ±adir pasajero");
            System.out.println("8. Listar pasajeros");
            System.out.println("9. Borrar pasajero");
            System.out.println("10. Generar e insertar naves, tripulantes y pasajeros de forma automÃ¡tica");
            System.out.println("11. Listar naves ordenadas por ID");
            System.out.println("12. Listar naves ordenadas por descripcion");
            System.out.println("13. Guardar ficheroBinario");
            System.out.println("14. Leer ficheroBinario");
            System.out.println("15. Buscar nave");
            System.out.println("16. Guardar fichero texto plano");
            System.out.println("17. Leer fichero texto plano");

            System.out.println("0. Salir");
            System.out.println("Introduce una opciÃ³n:");
            opcion = scanner.nextInt();
            scanner.nextLine();
            switch (opcion) {
                case 1:
                    // Crear un Scanner para leer la entrada del usuario

                    // Pedir al usuario los detalles de la nave
                    System.out.println("Introduce el tipo de nave (1: NaveCarga, 2: NavePasajeros, 3: NaveCargaPesada, 4: NavePasajerosLujo):");
                    int tipoNave = scanner.nextInt();
                    scanner.nextLine();
                    System.out.println("Introduce el ID de la nave:");
                    String idNave = scanner.nextLine();
                    String fechaCreacion = "2023";

                    // Dependiendo del tipo de nave, pedir mÃ¡s detalles y crear la nave correspondiente
                    System.out.println("Introduce la descripciÃ³n de carga de la nave:");
                    String descripcion = scanner.nextLine();
                    switch (tipoNave) {
                        case 1: // NaveCarga
                            System.out.println("Introduce la capacidad de carga de la nave:");
                            int capacidadCarga = scanner.nextInt();
                            scanner.nextLine();

                            NaveCarga naveCarga = new NaveCarga(idNave, descripcion, fechaCreacion, capacidadCarga);
                            gestionNaves.insertarNave(naveCarga);
                            break;
                        case 2: // NavePasajeros
                            System.out.println("Introduce el nÃºmero de pasajeros de la nave:");
                            int numPasajeros = scanner.nextInt();
                            scanner.nextLine();
                            System.out.println("Introduce la calse de servico de la nave:");
                            String clase = scanner.nextLine();
                            NavePasajeros navePasajeros = new NavePasajeros(idNave, descripcion, fechaCreacion, numPasajeros, clase);
                            System.out.println(gestionNaves.insertarNave(navePasajeros) ? "Insertada Correctamente" : "No Insertada");
                            break;
                        case 3: // NaveCargaPesada
                            System.out.println("Introduce la capacidad de carga de la nave:");
                            int capacidadCargaPesada = scanner.nextInt();
                            scanner.nextLine();
                            System.out.println("Introduce el sistema de grÃºas de la nave:");
                            String sistemaGruas = scanner.nextLine();
                            NaveCargaPesada naveCargaPesada = new NaveCargaPesada(idNave, descripcion, fechaCreacion, capacidadCargaPesada, sistemaGruas);
                            System.out.println(gestionNaves.insertarNave(naveCargaPesada) ? "Insertada Correctamente" : "No Insertada");
                            break;
                        case 4: // NavePasajerosLujo
                            System.out.println("Introduce el nÃºmero de pasajeros de la nave:");
                            int numPasajerosLujo = scanner.nextInt();
                            scanner.nextLine();
                            System.out.println("Introduce el nÃºmero de suits de la nave:");
                            int numSuits = scanner.nextInt();
                            scanner.nextLine();
                            System.out.println("Introduce los servicios de lujo de la nave:");
                            String serviciosLujo = scanner.nextLine();
                            NavePasajerosLujo navePasajerosLujo = new NavePasajerosLujo(idNave, descripcion, fechaCreacion, numPasajerosLujo, serviciosLujo, numSuits);

                            System.out.println(gestionNaves.insertarNave(navePasajerosLujo) ? "Insertada Correctamente" : "No Insertada");

                            break;
                        default:
                            System.out.println("Tipo de nave no vÃ¡lido.");
                    }
                    break;

                case 2:
//                     AquÃ­ llamarÃ­as al mÃ©todo para listar las naves
                    HashMap<String, NaveEspacial> naves = gestionNaves.listarNaves();

                    for (Map.Entry<String, NaveEspacial> entry : naves.entrySet()) {
                        System.out.println(entry.getValue().toString());

                    }

                    break;

                case 3:
//                     AquÃ­ llamarÃ­as al mÃ©todo para borrar una nave
                    System.out.println("Introduce el ID de la nave:");
                    idNave = scanner.nextLine();

                    System.out.println(gestionNaves.borrarNave(idNave) ? "Borrado Correctamente" : "No se borrÃ³");
                    break;

                case 4: // AÃ±adir tripulante
                    System.out.println("Introduce el ID del tripulante:");
                    String idTripulante = scanner.nextLine();
                    System.out.println("Introduce el nombre del tripulante:");
                    String nombreTripulante = scanner.nextLine();
                    System.out.println("Introduce el ID de la nave del tripulante:");
                    idNave = scanner.nextLine();
                    Tripulante tripulante = new Tripulante(idTripulante, nombreTripulante, "Cargo1");

                    System.out.println(gestionNaves.insertarTripulante(idNave, tripulante) ? "Insertado Correctamente" : "No se insertÃ³");

                    break;
                case 5:
                    // AquÃ­ llamarÃ­as al mÃ©todo para listar los tripulantes
                    System.out.println("Introduce el ID de la nave de los tripulantes a listar:");
                    idNave = scanner.nextLine();
                    gestionNaves.listarTripulantes(idNave);
                    break;
                case 6:
                    // AquÃ­ llamarÃ­as al mÃ©todo para borrar un tripulante
                    System.out.println("Introduce el ID de la nave:");
                    idNave = scanner.nextLine();
                    System.out.println("Introduce el ID del tripulante:");
                    String idTriPulante = scanner.nextLine();
                    System.out.println(gestionNaves.borrarTripulante(idNave, idTriPulante) ? "Borrado Correctamente" : "No se borrÃ³");
                    break;
                case 7:
                    // AquÃ­ llamarÃ­as al mÃ©todo para aÃ±adir un pasajero

                    System.out.println("Introduce el ID de la nave:");
                    idNave = scanner.nextLine();
                    System.out.println("Introduce el ID del pasajero:");
                    String idPasajero = scanner.nextLine();
                    System.out.println("Introduce el nombre del pasajero:");
                    String nombrePasajero = scanner.nextLine();

                    Pasajero pasajero = new Pasajero(idNave, nombrePasajero);
                    System.out.println(gestionNaves.insertarPasajero(idNave, pasajero) ? "Insertado Correctamente" : "No se insertÃ³");

                    break;
                case 8:
                    // AquÃ­ llamarÃ­as al mÃ©todo para listar los pasajeros
                    System.out.println("Introduce el ID de la nave:");
                    idNave = scanner.nextLine();
                    gestionNaves.listarPasajeros(idNave);
                    break;
                case 9:
                    // AquÃ­ llamarÃ­as al mÃ©todo para borrar un pasajero
                    System.out.println("Introduce el ID de la nave:");
                    idNave = scanner.nextLine();
                    System.out.println("Introduce el ID del pasajero a borrar:");
                    idPasajero = scanner.nextLine();
                    System.out.println(gestionNaves.borrarPasajero(idNave, idPasajero) ? "Borrado Correctamente" : "No se borrÃ³");

                    break;
                case 10:
                    gestionNaves.generarEInsertarAleatoriamente(5, 2, 2);
                    break;
                case 11:

                    break;
                case 12:

                    break;
                case 13:
                    gestionNaves.guardarFicheroBinarioDescripcion();
                    break;

                case 14:
                    gestionNaves.leerFicheroBinario();
                    break;
                case 15:
                    System.out.println("Introduce el ID del pasajero:");
                    idPasajero = scanner.nextLine();
                    if(gestionNaves.buscarPasajero(idPasajero)){
                        System.out.println("Se ha encontrado el pasajero");
                    }else{
                        System.out.println("No s eha encontrado el pasajero");
                    }
                    break;
                case 16:
                    gestionNaves.guardarFicheroTexto();
                    break;
                case 17:
                    gestionNaves.leerFicheroTexto();
                    break;
                case 0:
                    System.out.println("Saliendo...");
                    break;
                default:
                    System.out.println("OpciÃ³n no vÃ¡lida. Por favor, introduce una opciÃ³n vÃ¡lida.");
            }
        } while (opcion != 0);
    }
    // MenÃº principal

}
