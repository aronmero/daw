package Ejercicio07;

/**
 *
 * @author Aarón
 */
import java.awt.*;
import java.awt.event.*;
import java.applet.*;

public class E2Principal extends Applet {

    @Override
    public void init() {
        addMouseListener(new RatonRegistra());
        setBackground(Color.white);
    }
}

class RatonRegistra extends MouseAdapter {

    private final int radio = 8;

    @Override
    public void mousePressed(MouseEvent ev) {
        Applet app = (Applet) ev.getSource();
        Graphics g = app.getGraphics();
        g.setColor(Color.blue);
        g.fillOval(ev.getX() - radio, ev.getY() - radio, 2 * radio, 2 * radio);
        g.dispose();
    }
}
