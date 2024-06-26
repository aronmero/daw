package Ejercicio24;

public class Comprobaciones {
  
  public boolean comprobarCuenta(String cuenta){
    boolean comprueba = false;
    //System.out.println("Validando la cuenta");
    if (cuenta.length() != 20){ // la cuenta no tiene 20 digitos
//        System.out.println("No hay 20 dígitos");
        comprueba = false;
    }else{ // la cuenta si tiene 20 digitos
      // comprobamos si lo introducido son enteros
      comprueba = this.sonEnteros(cuenta);
      if (comprueba == false){ // No son enteros
//        System.out.println("Hay que introducir digitos");
      }else{ // Los dígitos son enteros y comprobamos los digitos de control
        //Calculamos los dígitos de control y los comparamos con lo introducidos
        if(this.obtenerDigitosControl(cuenta).equals(cuenta.substring(8,10))){
          comprueba = true; // Son correctos los dígitos de control
        }else comprueba = false;
      }
    }
    return comprueba;    
  }
  
  public boolean sonEnteros(String cadena){
    // Recorre la cadena entera comprobando si es número entero o no
    for (int x = 0;x < cadena.length();x++){
      try{
         Integer.parseInt(cadena.substring(x, x+1));
      }catch(NumberFormatException e){ //Se ejecuta cuando no es un nº entero
        
//        System.out.println(cadena.substring(x, x+1)+" no es un entero");
        return false;
      } 
        }
    return true;
  }
  
  /**
   * Módulo para el cálculo de los dígitos de control.
   * @param cuenta
   * @return 
   */
  public static String obtenerDigitosControl(String cuenta){
    // Inicializamos las variables para las operaciones
    int d1 = 0;
    int d2 = 0;
    int cont;
    // Guardamos en un array los multiplicadores
    int[] multiplica ={1,2,4,8,5,10,9,7,3,6};
    // Sumamos cada dígito de entidad y oficina (d1), 
    // por la misma posición del array multiplica
    // nos saltamos las 2 primeras posiciones del multiplicador
    
    for (cont = 0;cont < (multiplica.length - 2);cont++){
      d1 += multiplica[cont+2] * Integer.parseInt(cuenta.substring(cont, cont+1));
    }
    // Sumamos cada digito del nº cta. por 
    // la misma posición del array multiplica
    for (cont = 0;cont < multiplica.length;cont++){
      d2 += multiplica[cont] * Integer.parseInt(cuenta.substring((cont+10),(cont+10+1)));
    }
    // Restamos a 11 el resto de la división entre el valor obtenido y el número 11
    d1=11-(d1%11);
    d2=11-(d2%11);
    // Si el resto es 10 el dígito es 1 y si es 11 es 0
    d1 = (d1==11) ? 0 : (d1==10) ? 1 : d1;
    d2 = (d2==11) ? 0 : (d2==10) ? 1 : d2;
    // Convertimos los varloes enteros a String para mandarlo
    String digitos = String.valueOf(d1)+String.valueOf(d2);
    return digitos;
  }
}
