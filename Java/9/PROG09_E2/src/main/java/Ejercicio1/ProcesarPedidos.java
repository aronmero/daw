package Ejercicio1;

import java.io.*;
import java.util.*;
import java.util.regex.*;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class ProcesarPedidos {

    static List<Articulo> articulos = new ArrayList<Articulo>();
    static Map<String, String> datosPedido = new LinkedHashMap<String, String>();
    static private Scanner teclado = new Scanner(System.in);

    static private Pattern seccion = Pattern.compile("^##[ ]*(FIN)?[ ]*(PEDIDO|ARTICULOS)[ ]*##$");
    static private Pattern campo = Pattern.compile("^(.+):.*\\{(.*)\\}$");
    static private Pattern articulo = Pattern.compile("^\\{(.*)\\|(.*)\\|[ ]*([0-9]*)[ ]*\\}");

    public ProcesarPedidos() {
    }

    private static BufferedReader cargarArchivo(String nombre) throws FileNotFoundException {
        String nombreArchivo = nombre;
        BufferedReader reader = null;
        if (nombreArchivo == null) {
            System.out.println("Introduce el nombre del archivo: ");
            nombreArchivo = teclado.nextLine();
        } else {
            String linea;
            try {
                reader = new BufferedReader(new FileReader(nombreArchivo));
                linea = reader.readLine();
                while (linea != null) {
                    procesarLinea(linea, datosPedido, articulos);
                    linea = reader.readLine();
                }
            } catch (IOException ex) {
                System.out.println(ex);
            }
        }
        return null;
    }

    static private BufferedReader cargarArchivo() {

        return null;
    }

    static boolean procesarLinea(String linea, Map<String, String> datosPedido, List<Articulo> articulos) {
        Matcher deteccionSeccion = seccion.matcher(linea);
        Matcher deteccionCampo = campo.matcher(linea);
        Matcher deteccionArticulo = articulo.matcher(linea);

        if (deteccionSeccion.matches()) {
            return true;
        } else if (deteccionCampo.matches()) {
            datosPedido.put(deteccionCampo.group(2).trim(), deteccionCampo.group(1).trim());
            return true;
        } else if (deteccionArticulo.matches()) {
            Articulo articulo = new Articulo();
            articulo.setCodArticulo(deteccionArticulo.group(1).trim());
            articulo.setDescripcion(deteccionArticulo.group(2).trim());
            articulo.setCantidad(Integer.parseInt(deteccionArticulo.group(3)));
            articulos.add(articulo);
            return true;
        }

        return false;
    }

    public static void main(String[] args) throws FileNotFoundException {
        BufferedReader lector;
        String archivo = System.getProperty("user.dir") + "\\src\\main\\java\\Ejercicio1\\pedidos.txt";

        lector = cargarArchivo(archivo);
        
        muestraPedido();
    }

    private static void muestraPedido() {
        System.out.println("Pedido");
        for (Map.Entry<String, String> entry : datosPedido.entrySet()) {
            String key = entry.getKey();
            String value = entry.getValue();
            System.out.println(value+": "+key);
        }
        System.out.println("Articulos");
        for (Articulo articulo1 : articulos) {
            System.out.println(articulo1.toString());
        }
    }

}
