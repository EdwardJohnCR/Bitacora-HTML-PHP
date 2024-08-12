<?php

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

    // Redirigir a la página de confirmación
    header("Location: confirmation.html");
    exit();
} else {
    echo "<script>alert('Método de solicitud no válido.'); window.location.href='index.html';</script>";
}
?>
