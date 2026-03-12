## Examen Practico

## Objetivo
Debe existir una clase base Usuario con: 
o Atributos: nombre, correo 
o Validación de correo en el constructor (formato válido) 
o Si el correo no es válido, lanzar una Exception 
o Métodos getNombre() y getCorreo() 
2. Debe existir una clase Admin que extienda Usuario: 
o Método getRol() que retorne "Administrador" 
3. Debe existir una clase Alumno que extienda Usuario: 
o Atributo adicional: matricula 
o Método getMatricula() 
o Método getRol() que retorne "Alumno" 
4. En index.php: 
o Crear al menos: 
§ 1 Admin válido 
§ 1 Alumno válido 
§ 1 Usuario/Alumno con correo inválido para probar la 
excepción 
o Usar try/catch para capturar la excepción y mostrar un 
mensaje controlado 
o Mostrar en pantalla una “tabla” simple (puede ser HTML 
básico) con: 
§ Nombre | Correo | Rol | Matrícula (solo si aplica)

## Tecnologias utilizadas
- PHP 8+

## Instrucciones de ejecucion
Ejecutar el comando php -S localhost:8000 (en el caso de no tener XAMPP)

## Evidencia de funcionamiento
[![Ver video](https://img.youtube.com/vi/DEX8_10yD2c/0.jpg)](https://youtu.be/DEX8_10yD2c)
