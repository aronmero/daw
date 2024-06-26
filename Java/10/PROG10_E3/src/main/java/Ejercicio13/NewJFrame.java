/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JFrame.java to edit this template
 */
package Ejercicio13;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.FlowLayout;
import java.awt.Font;
import static java.awt.Font.PLAIN;
import java.awt.GridLayout;
import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.SwingConstants;
import javax.swing.border.LineBorder;

/**
 *
 * @author Aarón
 */
public class NewJFrame extends javax.swing.JFrame {

    JButton boton[], botonResultado; //array de botones y botón de resultado

    JLabel display; //display de operaciones

    JPanel panelBotones; //panel para los botones (salvo el de resultado)

    int ancho = 50, alto = 50; //para posicionar botones

    FlowLayout miFlowLayout;

    GridLayout miGridLayout;

    /**
     * Creates new form NewJFrame
     */
    public NewJFrame() {
        initComponents();

        initDisplay();

        initBotones();

        initBotonResultado();

        initPantalla();

    }

    private void initDisplay() {

        display = new JLabel("0");

        display.setPreferredSize(new Dimension(230, 60));

        display.setOpaque(true);

        display.setBackground(Color.black);

        display.setForeground(Color.green);

        display.setBorder(new LineBorder(Color.DARK_GRAY));

        display.setFont(new Font("MONOSPACED", PLAIN, 24));

        display.setHorizontalAlignment(SwingConstants.RIGHT);

        add(display);

    }

    private void initBotones() {

        //Inicializo panel de botones y su gridlayout de 4 columnas y 4 filas
        panelBotones = new JPanel();

        panelBotones.setBackground(Color.black);

        miGridLayout = new GridLayout(4, 4, 10, 10);

        panelBotones.setLayout(miGridLayout);

        add(panelBotones);

        //Array de textos de los botones
        String[] texto_boton = new String[]{"0", ".", "C", "+", "1", "2", "3", "-", "4", "5", "6", "*", "7", "8", "9", "/"};

        //Inicializo array de botones
        boton = new JButton[16];

        for (int i = 0; i <= 15; i++) {

            //Inicializo botón con su texto
            boton[i] = new JButton(texto_boton[i]);

            boton[i].setPreferredSize(new Dimension(ancho, alto));

            boton[i].setFont(new Font("MONOSPACED", PLAIN, 16));

            boton[i].setOpaque(true);

            boton[i].setFocusPainted(false);

            boton[i].setBackground(Color.DARK_GRAY);

            boton[i].setBorder(new LineBorder(Color.DARK_GRAY));

            boton[i].setForeground(Color.WHITE);

            //añado botón al panel de botones
            panelBotones.add(boton[i]);

        }

    }

    private void initBotonResultado() {

        botonResultado = new JButton("RESULTADO");

        botonResultado.setPreferredSize(new Dimension(230, alto));

        botonResultado.setFont(new Font("MONOSPACED", PLAIN, 16));

        botonResultado.setOpaque(true);

        botonResultado.setFocusPainted(false);

        botonResultado.setBackground(Color.DARK_GRAY);

        botonResultado.setBorder(new LineBorder(Color.DARK_GRAY));

        botonResultado.setForeground(Color.WHITE);

        add(botonResultado);

    }

    private void initPantalla() {

        miFlowLayout = new FlowLayout(FlowLayout.CENTER, 10, 10);

        setLayout(miFlowLayout);

        setTitle("Ejemplo 18");

        setMinimumSize(new Dimension(255, 415));

        setResizable(false);

        getContentPane().setBackground(Color.black);

        setDefaultCloseOperation(EXIT_ON_CLOSE);

        setVisible(true);

    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 400, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 300, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(NewJFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(NewJFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(NewJFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(NewJFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new NewJFrame().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    // End of variables declaration//GEN-END:variables
}
