<?php

// Configuración para mostrar errores (opcional)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $officerName = htmlspecialchars($_POST['officerName'], ENT_QUOTES, 'UTF-8');
    $shift = htmlspecialchars($_POST['shift'], ENT_QUOTES, 'UTF-8');
    $site = htmlspecialchars($_POST['site'], ENT_QUOTES, 'UTF-8');
    $incidentReport = htmlspecialchars($_POST['incidentReport'], ENT_QUOTES, 'UTF-8');
    $confirmSubmission = isset($_POST['confirmSubmission']);

    // Validar que el usuario ha confirmado el envío
    if (!$confirmSubmission) {
        echo "<script>alert('Por favor, confirme el envío del formulario.'); window.location.href='index.html';</script>";
        exit();
    }

    // Configurar los detalles del correo
    $to = 'edwardjohncr@gmail.com';
    $subject = 'Bitácora de Seguridad';
    $message = "
    <html>
    <head>
        <title>Bitácora de Seguridad</title>
    </head>
    <body>
        <h2>Detalles del Reporte</h2>
        <p><strong>Oficial en Turno:</strong> $officerName</p>
        <p><strong>Turno:</strong> $shift</p>
        <p><strong>Sitio:</strong> $site</p>
        <p><strong>Reporte de Incidentes:</strong></p>
        <p>$incidentReport</p>
    </body>
    </html>
    ";

    // Cabeceras para enviar un correo en formato HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Bitácora TTS <bitacora@ttscr.com>" . "\r\n";

    // Configuración de servidor SMTP de Hostinger
    ini_set('SMTP', 'smtp.hostinger.com');
    ini_set('smtp_port', '465');
    ini_set('sendmail_from', 'bitacora@ttscr.com');
    ini_set('username', 'bitacora@ttscr.com');
    ini_set('password', 'Logtoptier2024$');  // Reemplaza 'your_smtp_password' con tu contraseña SMTP

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        // Redirigir a la página de confirmación si el correo se envía correctamente
        header("Location: confirmation.html");
        exit();
    } else {
        // Mostrar un error si el correo no se envía
        echo "<script>alert('Error al enviar el correo. Por favor, inténtelo de nuevo.'); window.location.href='index.html';</script>";
    }
} else {
    echo "<script>alert('Método de solicitud no válido.'); window.location.href='index.html';</script>";
}
?>
