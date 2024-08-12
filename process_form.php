<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $officerName = htmlspecialchars($_POST['officerName']);
    $shift = htmlspecialchars($_POST['shift']);
    $site = htmlspecialchars($_POST['site']);
    $incidentReport = htmlspecialchars($_POST['incidentReport']);
    $confirmSubmission = isset($_POST['confirmSubmission']);

    // Validar que el usuario ha confirmado el envío
    if (!$confirmSubmission) {
        echo "<script>alert('Por favor, confirme el envío del formulario.'); window.location.href='index.html';</script>";
        exit();
    }

    // Configurar el correo
    $to = 'tu_correo@ejemplo.com'; // Cambia esto por tu dirección de correo electrónico
    $subject = 'Bitácora de Seguridad - Nuevo Reporte';
    $message = "Nombre del Oficial: $officerName\n";
    $message .= "Turno: $shift\n";
    $message .= "Sitio: $site\n";
    $message .= "Reporte de Incidentes:\n$incidentReport\n";
    $headers = 'From: no-reply@tudominio.com' . "\r\n" .
               'Reply-To: no-reply@tudominio.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        // Mostrar la bitácora enviada
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Bitácora Enviada</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
            <style>
                body {
                    background-color: #2c3e50;
                    color: #ecf0f1;
                }
                .container {
                    max-width: 600px;
                    margin: 50px auto;
                    padding: 20px;
                    background-color: #34495e;
                    border-radius: 8px;
                }
                .btn-primary {
                    background-color: #2980b9;
                    border-color: #2980b9;
                }
                .btn-primary:hover {
                    background-color: #3498db;
                    border-color: #3498db;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2 class='mt-4'>Bitácora Enviada</h2>
                <p><strong>Nombre del Oficial:</strong> $officerName</p>
                <p><strong>Turno:</strong> $shift</p>
                <p><strong>Sitio:</strong> $site</p>
                <p><strong>Reporte de Incidentes:</strong></p>
                <pre>$incidentReport</pre>
                <a href='index.html' class='btn btn-primary mt-4'>Regresar al Formulario</a>
            </div>
        </body>
        </html>";
    } else {
        echo "<script>alert('Hubo un problema al enviar el formulario. Por favor, inténtelo de nuevo.'); window.location.href='index.html';</script>";
    }
} else {
    echo "<script>alert('Método de solicitud no válido.'); window.location.href='index.html';</script>";
}
?>
