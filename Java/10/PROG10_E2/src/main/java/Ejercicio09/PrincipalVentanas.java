/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Ejercicio09;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

import javax.swing.JButton;
import javax.swing.JDialog;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.WindowConstants;

public class PrincipalVentanas {

	private JFrame ventanaPrincipal;
	private JDialog ventanaSecundaria;
	/**
	 * @param args
	 */
	public static void main(String[] args) {
		new PrincipalVentanas();
	}
	
	public PrincipalVentanas()
	{
		// Construcción de ventana principal
		ventanaPrincipal = new JFrame("Ventana principal");
		JButton boton = new JButton("Abre secundaria");
		ventanaPrincipal.getContentPane().add(boton);
		ventanaPrincipal.pack();
		
		// Construcción de ventana secundaria
		ventanaSecundaria = new JDialog(ventanaPrincipal,"Ventana secundaria");
		JLabel etiqueta = new JLabel("Hola");
		ventanaSecundaria.getContentPane().add(etiqueta);
		ventanaSecundaria.pack();

		boton.addActionListener(new ActionListener() {
                        @Override
			public void actionPerformed(ActionEvent e) {
				ventanaPrincipal.setVisible(false);
				ventanaSecundaria.setVisible(true);
			}
		
		});
		

		ventanaSecundaria.addWindowListener(new WindowAdapter() {
                        @Override
			public void windowClosing(WindowEvent e) {
				ventanaPrincipal.setVisible(true);
				ventanaSecundaria.setVisible(false);
			}
		
                        @Override
			public void windowClosed(WindowEvent e) {
				ventanaPrincipal.setVisible(true);
				ventanaSecundaria.setVisible(false);
			}
		});
		
		ventanaPrincipal.setDefaultCloseOperation(WindowConstants.EXIT_ON_CLOSE);
		ventanaPrincipal.setVisible(true);
	}

}