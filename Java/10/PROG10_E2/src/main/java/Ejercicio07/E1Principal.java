package Ejercicio07;

import java.awt.*;
import java.awt.event.*;
import java.applet.*;

/**
 *
 * @author Aarón
 */
public class E1Principal extends Applet implements MouseListener {

    private final int radio = 8;

    @Override
    public void init() {
        setBackground(Color.white);
        addMouseListener(this);
    }

    @Override
    public void mousePressed(MouseEvent ev) {
        Graphics g = getGraphics();
        g.setColor(Color.red);
        g.fillOval(ev.getX() - radio, ev.getY() - radio, 2 * radio, 2 * radio);
        g.dispose();
    }

    @Override
    public void mouseExited(MouseEvent event) {
    }

    @Override
    public void mouseReleased(MouseEvent event) {
    }

    @Override
    public void mouseClicked(MouseEvent event) {
    }

    @Override
    public void mouseEntered(MouseEvent event) {
    }
}
