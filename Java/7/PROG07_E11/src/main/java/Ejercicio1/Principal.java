/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Ejercicio1;

import java.util.Scanner;

/**
 *
 * @author Aarón Medina Rodríguez
 */
public class Principal {

    public static Persona anadirPersona() {
        Scanner teclado = new Scanner(System.in);

        System.out.println("Introduce el nombre");
        String nombre = teclado.nextLine();

        System.out.println("Introduce el apellidos");
        String apellidos = teclado.nextLine();

        System.out.println("Introduce el dni");
        String dni = teclado.nextLine();

        Persona persona = new Persona(nombre, apellidos, dni);

        return persona;
    }

    public static String anadirIban() {
        Scanner teclado = new Scanner(System.in);
        System.out.println("Introduce el iban");
        String iban = teclado.nextLine();
        return iban;
    }

    public static double anadirSaldoInicial() {
        Scanner teclado = new Scanner(System.in);
        System.out.println("Introduce el saldo de la cuenta");
        double saldoInicial = teclado.nextDouble();
        return saldoInicial;
    }

    public static CuentaAhorro anadirCuentaAhorro() {
        Scanner teclado = new Scanner(System.in);

        Persona titular = anadirPersona();

        String iban = anadirIban();
        double saldoInicial = anadirSaldoInicial();

        System.out.println("Introduce el tipo de interes");
        double interes = teclado.nextDouble();

        CuentaAhorro cuenta = new CuentaAhorro(interes, iban, saldoInicial, titular);
        return cuenta;
    }

    public static CuentaCorrientePersonal anadirCuentaCorriente() {
        Scanner teclado = new Scanner(System.in);

        Persona titular = anadirPersona();

        String iban = anadirIban();
        double saldoInicial = anadirSaldoInicial();

        System.out.println("Introduce el la comision de mantenimiento");
        double comisionMantenimiento = teclado.nextDouble();

        CuentaCorrientePersonal cuenta = new CuentaCorrientePersonal(comisionMantenimiento, iban, saldoInicial, titular);
        return cuenta;
    }

    public static CuentaCorrienteEmpresa anadirCuentaCorrienteEmpresa() {
        Scanner teclado = new Scanner(System.in);

        Persona titular = anadirPersona();

        String iban = anadirIban();
        double saldoInicial = anadirSaldoInicial();

        System.out.println("Introduce el la comision de mantenimiento");
        double tipoInteres = teclado.nextDouble();
        System.out.println("Introduce el maximo descubierto");
        double maxDescubierto = teclado.nextDouble();
        System.out.println("Introduce la comision por descubierto");
        double comisionDescubierto = teclado.nextDouble();

        CuentaCorrienteEmpresa cuenta = new CuentaCorrienteEmpresa(tipoInteres, maxDescubierto, comisionDescubierto, iban, saldoInicial, titular);
        return cuenta;
    }

    //Añade una cuenta de manera automatica
    public static CuentaAhorro anadirCuentaAhorroAutomatica() {
        Persona titular = new Persona("juan", "Mendazo", "00000000X");
        int ibanNum = (int) (Math.random() * 99999);
        String iban = "ES" + ibanNum;
        double saldoInicial = Math.random() * 100000;
        double interes = Math.random() * 10;
        CuentaAhorro cuenta = new CuentaAhorro(interes, iban, saldoInicial, titular);
        return cuenta;
    }

    //Añade una cuenta de manera automatica
    public static CuentaCorrientePersonal anadirCuentaCorrientePersonalAutomatica() {
        Persona titular = new Persona("juan", "Mendazo", "00000000X");
        int ibanNum = (int) (Math.random() * 99999);
        String iban = "ES" + ibanNum;
        double saldoInicial = Math.random() * 100000;
        double comisionMantenimiento = Math.random() * 10;
        CuentaCorrientePersonal cuenta = new CuentaCorrientePersonal(comisionMantenimiento, iban, saldoInicial, titular);
        return cuenta;
    }

    //Añade una cuenta de manera automatica
    public static CuentaCorrienteEmpresa anadirCuentaCorrienteEmpresaAutomatica() {
        Persona titular = new Persona("juan", "Mendazo", "00000000X");
        int ibanNum = (int) (Math.random() * 99999);
        String iban = "ES" + ibanNum;
        double saldoInicial = Math.random() * 100000;
        double tipoInteres = Math.random() * 10;
        double maxDescubierto = Math.random() * 100000;
        double comisionDescubierto = Math.random() * 10;

        CuentaCorrienteEmpresa cuenta = new CuentaCorrienteEmpresa(tipoInteres, maxDescubierto, comisionDescubierto, iban, saldoInicial, titular);
        return cuenta;
    }

    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        Banco banco = new Banco();
        int salir = 0;
        while (salir == 0) {
            System.out.println("------------------------");
            System.out.println("1.Abrir cuenta");
            System.out.println("2.Listar cuentas");
            System.out.println("3.Información cuenta");
            System.out.println("4.Ingresar saldo");
            System.out.println("5.Retirar saldo");
            System.out.println("6.Info saldo cuenta");
            System.out.println("7.Añadir cuentas automaticas");
            System.out.println("8.Autorizar entidad (Cuentas corriente)");
            System.out.println("9.Mostrar entidades autorizadas (Cuentas corriente)");
            System.out.println("0.Salir");
            System.out.println("------------------------");
            int selectorMenuPrincipal = teclado.nextInt();
            switch (selectorMenuPrincipal) {
                case 1 -> {
                    int salirMenuOpcionUno = 0;
                    while (salirMenuOpcionUno == 0) {
                        System.out.println("------------------------");
                        System.out.println("Seleciona el tipo de cuenta desea añadir");
                        System.out.println("1.Cuenta ahorro");
                        System.out.println("2.Cuenta corriente");
                        System.out.println("0.Salir");
                        System.out.println("------------------------");
                        int selectoMenuUno = teclado.nextInt();
                        switch (selectoMenuUno) {
                            case 1 -> {
                                banco.abrirCuenta(anadirCuentaAhorro());
                            }
                            case 2 -> {
                                int salirMenuOpcionUnoDos = 0;
                                while (salirMenuOpcionUnoDos == 0) {
                                    System.out.println("------------------------");
                                    System.out.println("Seleciona el tipo de propietario");
                                    System.out.println("1.Cuenta personal");
                                    System.out.println("2.Cuenta empresa");
                                    System.out.println("0.Salir");
                                    System.out.println("------------------------");
                                    int selectorMenuUnoDos = teclado.nextInt();
                                    switch (selectorMenuUnoDos) {
                                        case 1 -> {
                                            banco.abrirCuenta(anadirCuentaCorriente());
                                        }
                                        case 2 -> {
                                            banco.abrirCuenta(anadirCuentaCorrienteEmpresa());
                                        }
                                        case 0 -> {
                                            salirMenuOpcionUnoDos++;
                                        }
                                        default -> {

                                        }
                                    }
                                }

                            }
                            case 0 -> {
                                salirMenuOpcionUno++;
                            }
                            default -> {

                            }
                        }
                    }

                }
                case 2 -> {
                    banco.listadoCuentas();
                }
                case 3 -> {
                    System.out.println("Introduce el iban de la cuenta que quieras saber la información");
                    teclado.nextLine();
                    String ibanCuentaInfo = teclado.nextLine();
                    String infoCuentaBanco = banco.informacionCuenta(ibanCuentaInfo);

                    if (infoCuentaBanco == null) {
                        System.out.println("No se ha podido obtener información de la cuenta");
                    } else {
                        System.out.println(infoCuentaBanco);
                    }
                }
                case 4 -> {
                    System.out.println("Introduce el iban de la cuenta que quieras ingresar");
                    teclado.nextLine();
                    String ibanCuentaIngresar = teclado.nextLine();

                    System.out.println("Introduce la cantidad a ingresar");
                    double saldoIngresar = teclado.nextDouble();
                    if (banco.ingresoDineroCuenta(saldoIngresar, ibanCuentaIngresar)) {
                        System.out.println("Se ha realizado el ingreso");
                    } else {
                        System.out.println("No se ha podido realizar el ingreso");
                    }
                }
                case 5 -> {
                    System.out.println("Introduce el iban de la cuenta que quieras retirar");
                    teclado.nextLine();
                    String ibanCuentaRetirar = teclado.nextLine();

                    System.out.println("Introduce la cantidad a retirar");
                    double saldoRetirar = teclado.nextDouble();

                    if (banco.retiradaDineroCuenta(saldoRetirar, ibanCuentaRetirar)) {
                        System.out.println("Se ha realizado el retiro");
                    } else {
                        System.out.println("No se ha podido realizar el retiro");
                    }
                }
                case 6 -> {
                    System.out.println("Introduce el iban de la cuenta que quieras saber el saldo");
                    teclado.nextLine();
                    String ibanCuentaSaldo = teclado.nextLine();
                    System.out.println(banco.obtenerSaldo(ibanCuentaSaldo));
                }
                case 7 -> {
                    int cuentasAutomaticas = 0;
                    for (int i = 0; i < 1; i++) {
                        if (banco.abrirCuenta(anadirCuentaAhorroAutomatica())) {
                            cuentasAutomaticas++;
                        }
                        if (banco.abrirCuenta(anadirCuentaCorrientePersonalAutomatica())) {
                            cuentasAutomaticas++;
                        }
                        if (banco.abrirCuenta(anadirCuentaCorrienteEmpresaAutomatica())) {
                            cuentasAutomaticas++;
                        }
                    }
                    System.out.println("Se han añadido " + cuentasAutomaticas + " cuentas de prueba");
                }
                case 8 -> {
                    System.out.println("Introduce el iban de la cuenta");
                    teclado.nextLine();
                    String ibanCuentaAutorizar = teclado.nextLine();

                    if (banco.existeCuenta(ibanCuentaAutorizar)) {
                        System.out.println("Introduce la entidad a autorizar");
                        String entidadAutorizar = teclado.nextLine();
                        banco.autorizarEntidad(ibanCuentaAutorizar, entidadAutorizar);
                    } else {
                        System.out.println("La cuenta no permite autorizaciones");
                    }
                }
                case 9 -> {
                    System.out.println("Introduce el iban de la cuenta");
                    teclado.nextLine();
                    String ibanCuentaListarAutorizados = teclado.nextLine();
                    if (banco.existeCuenta(ibanCuentaListarAutorizados)) {
                        System.out.println("Entidades autorizadas:");
                        banco.listarEntidadesAutorizadas(ibanCuentaListarAutorizados);
                    }
                }
                case 10 -> {
                    //Modificar datos de la cuenta
                    System.out.println("Introduce el iban de la cuenta");
                    String ibanCuentaModificar = teclado.nextLine();
                    ibanCuentaModificar = teclado.nextLine();
                    if (banco.existeCuenta(ibanCuentaModificar)) {
                        System.out.println("-----------------");
                        System.out.println("1.Nombre titular");
                        System.out.println("2.Iban");
                        System.out.println("0.Salir");
                        System.out.println("-----------------");
                        int selectorOpcionModificar = teclado.nextInt();
                        switch (selectorOpcionModificar) {
                            case 1 -> {
                                System.out.println("Introduce el nuevo nombre");
                                teclado.nextLine();
                                String nuevoNombre = teclado.nextLine();
                                if (banco.modificarNombre(ibanCuentaModificar, nuevoNombre)) {
                                    System.out.println("Se ha realizado la modificación");
                                } else {
                                    System.out.println("No se ha podido modificar");
                                }

                            }
                            case 2 -> {
                                System.out.println("Introduce el nuevo iban");
                                teclado.nextLine();
                                String nuevoIban = teclado.nextLine();
                                if (banco.modificarIban(ibanCuentaModificar, nuevoIban)) {
                                    System.out.println("Se ha realizado la modificación");
                                } else {
                                    System.out.println("No se ha podido modificar");
                                }
                            }
                            default -> {

                            }
                        }
                    }

                }
                case 0 -> {
                    salir++;
                }
                default -> {

                }
            }
        }
    }
}
