package Ejercicio07;

import java.awt.*;
import java.awt.event.*;
import java.applet.*;

/**
 *
 * @author Aarón
 */
public class E3Principal extends Applet {

    private final int radio = 8;

    @Override
    public void init() {
        setBackground(Color.white);
        this.addMouseListener(new java.awt.event.MouseAdapter() {
            @Override
            public void mousePressed(MouseEvent e) {
                this_mousePressed(e);
            }
        });
    }

    void this_mousePressed(MouseEvent ev) {
        Graphics g = getGraphics();
        g.setColor(Color.green);
        g.fillOval(ev.getX() - radio, ev.getY() - radio, 2 * radio, 2 * radio);
        g.dispose();
    }
}
