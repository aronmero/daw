package Ejercicio18;

import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

/**
 *
 * @author Aarón
 */
public class MoonPhaseViewer extends JFrame {

    private JComboBox<String> phaseSelector;
    private JLabel imageLabel;

    public MoonPhaseViewer() {
        setTitle("Visor de Fases de la Luna");
        setSize(500, 500);
        setDefaultCloseOperation(EXIT_ON_CLOSE);

        phaseSelector = new JComboBox<>(new String[]{"Luna Nueva", "Cuarto Creciente", "Luna Llena", "Cuarto Menguante"});
        imageLabel = new JLabel();

        phaseSelector.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String selectedPhase = (String) phaseSelector.getSelectedItem();
                imageLabel.setIcon(new ImageIcon(selectedPhase + ".jpg")); // Asume que tienes imágenes con estos nombres en tu proyecto
            }
        });

        add(phaseSelector, BorderLayout.NORTH);
        add(imageLabel, BorderLayout.CENTER);
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(new Runnable() {
            @Override
            public void run() {
                new MoonPhaseViewer().setVisible(true);
            }
        });
    }
}
