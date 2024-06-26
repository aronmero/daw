/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JPanel.java to edit this template
 */
package E1;

/**
 *
 * @author Aarón
 */
public class PanelEditar extends javax.swing.JPanel {

    private final LibreriaVisual padre;
    private Material material;
    private int indice;

    /**
     * Creates new form NewJPanel
     *
     * @param pad
     */
    public PanelEditar(LibreriaVisual pad) {
        initComponents();
        this.padre = pad;
    }

    public PanelEditar(LibreriaVisual pad, int valor, Material material, int indice) {
        initComponents();
        this.padre = pad;
        this.material = material;
        this.indice = indice;
        if (valor == 0) {
            panelRevista.setVisible(false);
            panelLibro.setVisible(true);
        } else {
            panelRevista.setVisible(true);
            panelLibro.setVisible(false);
        }
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        panelComun = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        txtAnio = new javax.swing.JTextField();
        txtTitulo = new javax.swing.JTextField();
        txtAutor = new javax.swing.JTextField();
        panelLibro = new javax.swing.JPanel();
        jLabel4 = new javax.swing.JLabel();
        txtEditorial = new javax.swing.JTextField();
        panelRevista = new javax.swing.JPanel();
        jLabel5 = new javax.swing.JLabel();
        txtNumero = new javax.swing.JTextField();
        btnGrabar = new javax.swing.JButton();
        btnVolver = new javax.swing.JButton();

        panelComun.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jLabel1.setText("Autor");
        panelComun.add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(95, 26, -1, -1));

        jLabel2.setText("Titulo");
        panelComun.add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(330, 20, -1, -1));

        jLabel3.setText("Año Publicacion");
        panelComun.add(jLabel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(520, 20, -1, -1));
        panelComun.add(txtAnio, new org.netbeans.lib.awtextra.AbsoluteConstraints(480, 50, 160, 30));
        panelComun.add(txtTitulo, new org.netbeans.lib.awtextra.AbsoluteConstraints(250, 50, 180, 30));
        panelComun.add(txtAutor, new org.netbeans.lib.awtextra.AbsoluteConstraints(30, 50, 178, 30));

        jLabel4.setText("Editorial");

        javax.swing.GroupLayout panelLibroLayout = new javax.swing.GroupLayout(panelLibro);
        panelLibro.setLayout(panelLibroLayout);
        panelLibroLayout.setHorizontalGroup(
            panelLibroLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(panelLibroLayout.createSequentialGroup()
                .addGap(23, 23, 23)
                .addComponent(jLabel4)
                .addGap(34, 34, 34)
                .addComponent(txtEditorial, javax.swing.GroupLayout.DEFAULT_SIZE, 139, Short.MAX_VALUE)
                .addContainerGap())
        );
        panelLibroLayout.setVerticalGroup(
            panelLibroLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(panelLibroLayout.createSequentialGroup()
                .addGap(16, 16, 16)
                .addGroup(panelLibroLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel4)
                    .addComponent(txtEditorial, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(15, Short.MAX_VALUE))
        );

        jLabel5.setText("Numero");

        javax.swing.GroupLayout panelRevistaLayout = new javax.swing.GroupLayout(panelRevista);
        panelRevista.setLayout(panelRevistaLayout);
        panelRevistaLayout.setHorizontalGroup(
            panelRevistaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(panelRevistaLayout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jLabel5)
                .addGap(18, 18, 18)
                .addComponent(txtNumero, javax.swing.GroupLayout.PREFERRED_SIZE, 137, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );
        panelRevistaLayout.setVerticalGroup(
            panelRevistaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(panelRevistaLayout.createSequentialGroup()
                .addGap(15, 15, 15)
                .addGroup(panelRevistaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txtNumero, javax.swing.GroupLayout.PREFERRED_SIZE, 32, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel5))
                .addContainerGap(14, Short.MAX_VALUE))
        );

        btnGrabar.setText("Grabar");
        btnGrabar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnGrabarActionPerformed(evt);
            }
        });

        btnVolver.setText("Volver");
        btnVolver.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnVolverActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(this);
        this.setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(25, 25, 25)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(panelComun, javax.swing.GroupLayout.PREFERRED_SIZE, 667, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addContainerGap(41, Short.MAX_VALUE))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addComponent(btnVolver)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(panelLibro, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(panelRevista, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                        .addGap(132, 132, 132)
                        .addComponent(btnGrabar, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(27, 27, 27))))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addGap(26, 26, 26)
                .addComponent(panelComun, javax.swing.GroupLayout.PREFERRED_SIZE, 88, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 110, Short.MAX_VALUE)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(btnVolver)
                            .addComponent(btnGrabar))
                        .addGap(54, 54, 54))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(18, 18, 18)
                        .addComponent(panelLibro, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(panelRevista, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
        );
    }// </editor-fold>//GEN-END:initComponents

    private void btnVolverActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnVolverActionPerformed
        padre.setContentPane(padre.panelPrincipal);
        padre.pack();
    }//GEN-LAST:event_btnVolverActionPerformed

    private void btnGrabarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnGrabarActionPerformed
        String titulo = material.getTitulo();
        String autor = material.getAutor();
        int anio = material.getAnoDePublicacion();
        if (!txtTitulo.getText().isBlank()) {
            titulo = txtTitulo.getText();
        }
        if (!txtAutor.getText().isBlank()) {
            autor = txtAutor.getText();
        }
        if (!txtAnio.getText().isBlank()) {
            anio = Integer.parseInt(txtAnio.getText());
        }

        Material materialNuevo;
        if (panelLibro.isVisible()) {
            String editorial = ((Libro) material).getEditorial();
            if (!txtEditorial.getText().isBlank()) {
                editorial = txtEditorial.getText();
            }

            materialNuevo = new Libro(material.getIsbn(), titulo, autor, anio, editorial);
        } else {
            int numero = ((Revista) material).getNumeroDeEdicion();
            if (!txtNumero.getText().isBlank()) {
                numero = Integer.parseInt(txtNumero.getText());
            }
            materialNuevo = new Revista(material.getIsbn(), titulo, autor, anio, numero);
        }
        padre.materiales.set(indice, materialNuevo);

        padre.recargarTabla();
        padre.setContentPane(padre.panelPrincipal);
        padre.pack();

    }//GEN-LAST:event_btnGrabarActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnGrabar;
    private javax.swing.JButton btnVolver;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JPanel panelComun;
    private javax.swing.JPanel panelLibro;
    private javax.swing.JPanel panelRevista;
    private javax.swing.JTextField txtAnio;
    private javax.swing.JTextField txtAutor;
    private javax.swing.JTextField txtEditorial;
    private javax.swing.JTextField txtNumero;
    private javax.swing.JTextField txtTitulo;
    // End of variables declaration//GEN-END:variables
}
