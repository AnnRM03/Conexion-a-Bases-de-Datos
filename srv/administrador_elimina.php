<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/delete.php";
require_once __DIR__ . "/../lib/php/devuelveNoContent.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ADMINISTRADOR.php";

ejecutaServicio(function () {
    $id = recuperaIdEntero("id");
    $pdo = Bd::pdo();

    // Preparar y ejecutar la sentencia de eliminación
    $stmt = $pdo->prepare("DELETE FROM " . ADMINISTRADOR . " WHERE " . ADMIN_ID . " = :id");
    $stmt->execute(['id' => $id]);

    devuelveNoContent();
});
