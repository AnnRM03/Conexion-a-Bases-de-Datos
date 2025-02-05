<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ADMINISTRADOR.php";

ejecutaServicio(function () {

    $lista = select(pdo: Bd::pdo(), from: ADMINISTRADOR, orderBy: ADMIN_NOMBRE);

    $render = "";
    foreach ($lista as $modelo) {
        $encodeId = urlencode($modelo[ADMIN_ID]);
        $id = htmlentities($encodeId);
        $nombre = htmlentities($modelo[ADMIN_NOMBRE]);
        $usuario = htmlentities($modelo[ADMIN_USUARIO]);
        
        $render .=
            "<li>
                <dt><a href='modifica.html?id=$id'>$nombre</a></dt>
                <dd>Usuario: $usuario</dd>
                <button onclick=\"location.href='modifica.html?id=$id'\">Modificar</button>
                <button onclick=\"eliminarAdministrador('$id')\">Eliminar</button>
            </li>";
    }

    devuelveJson(["lista" => ["innerHTML" => $render]]);
});
