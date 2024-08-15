## Formulario de Bitácora de Seguridad
### Descripción
Este proyecto consiste en un formulario web para la bitácora de seguridad. El formulario permite a los oficiales de seguridad registrar detalles de sus turnos y reportar incidentes. Los datos son enviados por correo electrónico a un destinatario especificado.

## Contenidos del Repositorio
El repositorio contiene los siguientes archivos:

* index.html: El formulario HTML para la bitácora de seguridad.
* process_form.php: Script PHP que procesa los datos del formulario y envía un correo electrónico.
* /images/su_logo.png: Logo de la empresa que se muestra en el formulario.

##Instrucciones de Instalación y Configuración
## Paso 1: Clonar el Repositorio
```bash
Copiar código
git clone https://github.com/usuario/repo-bitacora-seguridad.git
cd repo-bitacora-seguridad
```

Aquí tienes el Paso 2 del README con la especificación exacta de dónde cambiar el logo:

## Paso 2: Configurar la Imagen del Logo
* Ruta de la imagen del logo: Asegúrate de que la imagen del logo esté ubicada en la carpeta images/ y tenga el nombre su_logo.png.

* Cambiar la ruta en el archivo HTML: Abre el archivo index.html y localiza la siguiente línea:

```html
<img src="images/su_logo.png" alt="Logo" class="logo">
```
* Esta línea se encuentra dentro de la sección
   * ``` <div class="header-container">```
*  Si necesitas cambiar la ubicación o el nombre de la imagen, actualiza el atributo src en esta línea.

## Paso 3: Configuración del Archivo process_form.php
* Correo Destinatario:

  * Reemplace 'destino@correo.com' con la dirección de correo electrónico que recibirá las bitácoras.
* Configuración de SMTP:

  * Configure el servidor SMTP en el archivo process_form.php:
  * ini_set('SMTP', 'smtp.suservidor.com');
  * ini_set('smtp_port', '465');
  * ini_set('sendmail_from', 'from@correo.com');
  * ini_set('username', 'user@correo.com');
  * ini_set('password', 'password'); <!-- Reemplaza 'password' con la contraseña SMTP real. -->
## Paso 4: Subir el Proyecto al Hosting
* Suba todos los archivos del proyecto a su hosting web.
## Paso 5: Acceso y Pruebas
* Abra su navegador web y acceda al formulario desde la URL correspondiente.
* Complete los campos del formulario y realice una prueba de envío para asegurarse de que los correos electrónicos se están enviando correctamente.
## Notas Adicionales
Seguridad: Asegúrese de que las credenciales SMTP sean seguras y no las comparta públicamente.
Actualización de Correos: Si necesita cambiar los destinatarios de los correos, edite la variable $to en process_form.php.
## 
