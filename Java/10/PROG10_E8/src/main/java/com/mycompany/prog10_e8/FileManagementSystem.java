
package com.mycompany.prog10_e8;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Arrays;
import java.util.function.Consumer;

/**
 *
 * @author Aarón
 */
public class FileManagementSystem {


    public FileManagementSystem() {

    }

    public void createDirectory(String directoryName) {
        File directory = new File(directoryName);
        if (!directory.exists()) {
            directory.mkdir();
            System.out.println("Directorio creado: " + directory.getAbsolutePath());
        } else {
            System.out.println("El directorio ya existe.");
        }
        
    }

    public void createFile(String fileName) {
        File file = new File(fileName);
        try {
            if (file.createNewFile()) {
                System.out.println("Archivo creado: " + file.getAbsolutePath());
            } else {
                System.out.println("El archivo ya existe.");
            }
        } catch (IOException e) {
            System.out.println("Error al crear el archivo: " + e.getMessage());
        }
    }

    public void listDirectoryContent(String dirName) {
        File directory = new File(dirName);
        if (directory.isDirectory()) {
            File[] files = directory.listFiles();
            if (files != null) {
                Arrays.stream(files).forEach(new Consumer<File>() {
                    @Override
                    public void accept(File file) {
                        System.out.println(file.getName());
                    }
                });
            }
        } else {
            System.out.println("El directorio no existe.");
        }
    }

    public void deleteFileOrDirectory(String name) {
        File file = new File(name);
        if (file.exists()) {
            if (file.isDirectory()) {
                deleteDirectory(file);
            } else {
                if (file.delete()) {
                    System.out.println("Archivo eliminado: " + file.getAbsolutePath());
                } else {
                    System.out.println("No se pudo eliminar el archivo.");
                }
            }
        } else {
            System.out.println("El archivo o directorio no existe.");
        }
    }

    private void deleteDirectory(File directory) {
        File[] files = directory.listFiles();
        if (files != null) {
            for (File file : files) {
                if (file.isDirectory()) {
                    deleteDirectory(file);
                } else {
                    file.delete();
                }
            }
        }
        if (directory.delete()) {
            System.out.println("Directorio eliminado: " + directory.getAbsolutePath());
        } else {
            System.out.println("No se pudo eliminar el directorio.");
        }
    }

    public void readFile(String fileName) {
        File file = new File(fileName);
        if (file.exists() && file.isFile()) {
            try ( BufferedReader reader = new BufferedReader(new FileReader(file))) {
                String line;
                while ((line = reader.readLine()) != null) {
                    System.out.println(line);
                }
            } catch (IOException e) {
                System.out.println("Error al leer el archivo: " + e.getMessage());
            }
        } else {
            System.out.println("El archivo no existe.");
        }
    }

    public void writeFile(String fileName, String content) {
        File file = new File( fileName);
        try ( BufferedWriter writer = new BufferedWriter(new FileWriter(file))) {
            writer.write(content);
            System.out.println("Contenido escrito en el archivo: " + file.getAbsolutePath());
        } catch (IOException e) {
            System.out.println("Error al escribir en el archivo: " + e.getMessage());
        }
    }

    public void filterFilesByExtension(String dirName,String extension) {
        File directory = new File(dirName);
        if (directory.isDirectory()) {
            File[] files = directory.listFiles((dir, name) -> name.endsWith(extension));
            if (files != null) {
                Arrays.stream(files).forEach(file -> System.out.println(file.getName()));
            }
        } else {
            System.out.println("El directorio no existe.");
        }
    }
}
