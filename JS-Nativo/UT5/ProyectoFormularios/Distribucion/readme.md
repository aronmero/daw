# Realizado por Aarón Medina Rodríguez - 2023

# Enunciado

Walter White y Jesse Pinkman tienen que controlar las bolsas de producto azul que cocinan para distribuir en Alburquerque. Para ello tienen que crear un formulario que almacene la información de cada bolsa y validarlo teniendo en cuenta lo siguiente:

- Fecha de creación: obligatorio y con formato dd/mm/aaaa
- Cocinero: será un nombre en clave formado por dos letras en mayúscula, un símbolo y cuatro
  dígitos (ej. WW$1234)
- Destinatario: estará formado por dos o tres letras mayúsculas correspondientes al estado, un guión bajo, el nombre de la ciudad en minúsculas, dos puntos, y el código de distrito de 4 digitos(ej. NM_alburquerque:1234).
- Gramos: será un número del 100 al 5000.
- Composición: estará formado por una cantidad en gramos seguida de dos conjuntos de una o
  dos letras seguidas o no de un número. (ej. 200gC3OH7)
- Número de cuenta de EEUU: supongamos que un número de cuenta estadounidense tiene el
  siguiente formato: 
    - Dos letras: suponemos que el valor de cada letra es del 1 al 26 (no hay ñ ni ll).
    - Dos dígitos: debe corresponderse con la suma de la primera letra y lasegunda: en caso de que sea menor que 10 se pone el 0 delante.
    - Un guión.
    - Doce dígitos de cuenta.
    - Un guión.
    - Dos dígitos de control: los dos primeros deben ser la suma de los 6 primeros dígitos de la cuenta dividido entre 6 y extrayendo solamente su parte entera; y los dos últimos exactamente igual, pero con los 6 siguientes.
    - Si el número está correcto se colocará en un campo de texto al lado del anterior, pero sin guiones: solamente los números y las letras.


# Comentarios
Se realizo una clase bolsa para almacenar todos los datos introducidos. El formulario al enviar valida los datos introducidos como se ha solicitado, si todos estan correctos imprime el objeto bolsa con sus datos.

La estructura de logica.js es simple, una serie de validacion de patrones regex hasta llegar al numero de Cuenta donde se requiere realizar sumas de la cadena de texto para validar datos. Si algun dato esta incorrecto, no pasa el patron regex, no se creara la bolsa y no se imprimira en pantalla.

# Referencias
