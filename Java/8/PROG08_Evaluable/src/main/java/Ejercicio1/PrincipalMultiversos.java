/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */
package Ejercicio1;

import java.util.Scanner;

public class PrincipalMultiversos {

    private static Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        int option;
        Multiverso multiverso = new Multiverso();

        do {
            System.out.println("\n---- Menú Principal ----");
            System.out.println("\nBienvenido al sistema de gestión de multiversos");
            System.out.println("Por favor, elija una opción:");
            System.out.println("1. Añadir Galaxia");
            System.out.println("2. Eliminar Galaxia");
            System.out.println("3. Añadir Sistema Estelar");
            System.out.println("4. Eliminar Sistema Estelar");
            System.out.println("5. Listar Galaxias");

            System.out.println("7. Insertar de forma automatizada 4");

            System.out.println("0. Salir");
            option = scanner.nextInt();
            scanner.nextLine();

            switch (option) {
                case 1:
                    System.out.println("Añadir Galaxia");
                    System.out.print("Ingrese el ID de la Galaxia: ");
                    String id = scanner.nextLine();
                    System.out.print("Ingrese la descripción de la Galaxia: ");
                    String description = scanner.nextLine();
                    Galaxia galaxia = new Galaxia(id, description);
                    if (multiverso.agregarGalaxia(id, galaxia) == null) {
                        System.out.println("Nueva Galaxia añadida correctamente.");
                    } else {
                        System.out.println("La Galaxia ha sobreescrito una anterior");
                    }
                    break;
                case 2:
                    System.out.println("Ingrese el identificador de la galaxia que desea eliminar:");
                    
                    String idGalaxia = scanner.nextLine();
                    boolean result = multiverso.eliminarGalaxia(idGalaxia);
                    if (result) {
                        System.out.println("La galaxia se ha eliminado con éxito.");
                    } else {
                        System.out.println("No se ha encontrado ninguna galaxia con el identificador proporcionado.");
                    }
                    break;
                case 3:
                    System.out.println("Ingrese el identificador de la galaxia a la que desea añadir un sistema estelar:");
                   
                    String idGalaxiaParaAnadir = scanner.nextLine();
                    System.out.println("Ingrese el identificador del sistema estelar que desea añadir:");
                    String idSistemaEstelar = scanner.nextLine();
                    System.out.println("Ingrese la descripción del sistema estelar:");
                    String descSistemaEstelar = scanner.nextLine();
                    boolean resultAdd = multiverso.anadirSistemaEstelar(idGalaxiaParaAnadir, new SistemaEstelar(idSistemaEstelar, descSistemaEstelar));
                    if (resultAdd) {
                        System.out.println("El sistema estelar se ha añadido con éxito.");
                    } else {
                        System.out.println("No se ha encontrado ninguna galaxia con el identificador proporcionado.");
                    }
                    break;
                case 4:
                    System.out.println("Ingrese el identificador de la galaxia de la que desea eliminar un sistema estelar:");
                   
                    String idGalaxiaParaEliminar = scanner.nextLine();
                    System.out.println("Ingrese el identificador del sistema estelar que desea eliminar:");
                    String idSistemaEstelarEliminar = scanner.nextLine();
                    boolean resultRemove = multiverso.eliminarSistemaEstelar(idGalaxiaParaEliminar, idSistemaEstelarEliminar);
                    if (resultRemove) {
                        System.out.println("El sistema estelar se ha eliminado con éxito.");
                    } else {
                        System.out.println("No se ha encontrado ninguna galaxia con el identificador proporcionado o el sistema estelar no existe.");
                    }
                    break;
                    
                case 7:
                    for (int i = 1; i <= 4; i++) {
                         galaxia = new Galaxia("Galaxia" + i, "Descripcion de Galaxia" + i);

                        for (int j = 1; j <= 2; j++) {
                            SistemaEstelar sistemaEstelar = new SistemaEstelar("SistemaEstelar" + j, "Descripcion de SistemaEstelar" + j);
                            galaxia.anadirSistemaEstelar(sistemaEstelar);
                        }

                        multiverso.agregarGalaxia(galaxia);
                    }
                    System.out.println("Se han agregado 4 galaxias con 2 sistemas estelares cada una al multiverso.");
                    break;

                case 0:
                    System.out.println("Saliendo...");
                    break;
                default:
                    System.out.println("Opción no válida. Por favor, elija una opción del menú.");
                    break;
            }
        } while (option != 0);
    }
}
