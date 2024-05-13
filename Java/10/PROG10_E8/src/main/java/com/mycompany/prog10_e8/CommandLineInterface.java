
package com.mycompany.prog10_e8;

/**
 *
 * @author Aarón
 */
import java.util.Scanner;

public class CommandLineInterface {
    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        FileManagementSystem fileSystem = new FileManagementSystem();

        while (true) {
            System.out.print("Comando: ");
            String command = teclado.nextLine();

            String[] parts = command.split(" ");
            String action = parts[0];

            switch (action) {
                case "createdir":
                    if (parts.length == 2) {
                        String directoryName = parts[1];
                        fileSystem.createDirectory(directoryName);
                    } else {
                        System.out.println("Comando incorrecto. Uso: createdir <nombre_directorio>");
                    }
                    break;
                case "createfile":
                    if (parts.length == 2) {
                        String fileName = parts[1];
                        fileSystem.createFile(fileName);
                    } else {
                        System.out.println("Comando incorrecto. Uso: createfile <nombre_archivo>");
                    }
                    break;
                case "list":
                    // fileSystem.listDirectoryContent();
                    break;
                case "delete":
                    if (parts.length == 2) {
                        String name = parts[1];
                        fileSystem.deleteFileOrDirectory(name);
                    } else {
                        System.out.println("Comando incorrecto. Uso: delete <nombre_archivo_o_directorio>");
                    }
                    break;
                case "read":
                    if (parts.length == 2) {
                        String fileName = parts[1];
                        fileSystem.readFile(fileName);
                    } else {
                        System.out.println("Comando incorrecto. Uso: read <nombre_archivo>");
                    }
                    break;
                case "write":
                    if (parts.length == 3) {
                        String fileName = parts[1];
                        String content = parts[2];
                        fileSystem.writeFile(fileName, content);
                    } else {
                        System.out.println("Comando incorrecto. Uso: write <nombre_archivo> <contenido>");
                    }
                    break;
                case "filter":
                    if (parts.length == 2) {
                        String extension = parts[1];
                        // fileSystem.filterFilesByExtension(extension);
                    } else {
                        System.out.println("Comando incorrecto. Uso: filter <extension>");
                    }
                    break;
                case "exit":
                    System.out.println("Saliendo del sistema de gestión de archivos...");
                    System.exit(0);
                    teclado.close();
                default:
                    System.out.println("Comando no reconocido.");
                    break;
            }

        }

    }

}
