# casino
CONFIGURACIÓN:
1. Descargar el proyecto "casino" y colocarlo en la carpeta de proyectos del gestor de base de datos. 
(Para este caso se utilizó el gestor Xampp y el directorio del proyecto es "htdocs").

2. Iniciar el gestor de base de datos (los módulos Apache y Mysql).

3. Crear la base de datos indicada en el archivo database.sql del proyecto "casino".

4. Si se ha modificado el usuario "root" del gestor de base de datos, modificar el archivo database.php que se encuentra 
en la carpeta config del proyecto "casino" e indicar sus credenciales.

5. En el navegador ir a la url http://localhost/roulette/players/roulette_bet

EJECUCIÓN:
1. En la ruta http://localhost/roulette/players/roulette_bet se jugará una ronda cada vez que se recargue
la página. 

  - Todos los jugadores registrados y que tengan saldo mayor a $0 apostarán un valor entre el 8% y 15% de su saldo.
  - Los jugadores que tengan un saldo menor o igual a $1000 apostarán todo el valor.
  - Cada jugador apostará un color aleatorio entre verde, negro y rojo. Siendo el color verde el de menor
  probabilidad de ser apostado.
  - Se generará un color ganador entre verde, rojo y negro, donde la probabilidad de que sea el verde es del 2%
  y la probabilidad de ser negro o rojo es del 49% cada uno. 
  - Los jugadores que acierten el color ganador recibirán quince veces lo apostado si el color fue el verde, y recibirán
  el doble de lo apostado si el color fue el rojo o el negro. 

2. En la ruta http://localhost/roulette/players/list_players se podrán gestionar los usuarios mediante un CRUD, que
permitirá consultar, crear, modificar y eliminar los usuarios del sistema.
