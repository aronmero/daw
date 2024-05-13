package Ejercicio1;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Map;
import java.util.TreeMap;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static void main(String[] args) {
        Map<Character, Academico> academia = new TreeMap<>();

        Academico academico1 = new Academico("Juan Carlos", 1990);
        Academico academico2 = new Academico("Juan Manuel", 1983);
        Academico academico3 = new Academico("Miha Oca", 1943);
        Academico academico4 = new Academico("Mateo Marante", 1926);
        Academico academico5 = new Academico("Pedro Pascal", 1995);

        Academico.nuevoAcademico(academia, academico1, 'a');
        Academico.nuevoAcademico(academia, academico2, 'b');
        Academico.nuevoAcademico(academia, academico3, 'c');
        Academico.nuevoAcademico(academia, academico4, 'd');
        Academico.nuevoAcademico(academia, academico5, 'e');

        List<Academico> academicos = new ArrayList<>(academia.values());
        System.out.println("por nombre");
        Collections.sort(academicos);
        for (Academico academico : academicos) {
            System.out.println(academico);
        }
        System.out.println("");

    }

}
