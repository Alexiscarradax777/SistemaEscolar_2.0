<?php
include('../../../app/config.php');


$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repet = $_POST['password_repet'];

if ($password == $password_repet) {
    //echo "Las contraseñas coinciden";
    $password = password_hash($password, PASSWORD_DEFAULT); // Forma de encriptar contraseña

    $sentencia = $pdo->prepare('INSERT INTO usuarios (rol_id,email,password, fyh_creacion, estado)
VALUES (:rol_id,:email,:password,:fyh_creacion,:estado)');

    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_de_registro);

    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se regitro el usuario correctamente";
            $_SESSION['icono'] = "success";
            header('Location:' . APP_URL . "/admin/usuarios");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo registrar el usuario";
            $_SESSION['icono'] = "error";
?><script>
                window.history.back();
            </script> <?php
                    }
                } catch (Exception $exception) {
                    session_start();
                    $_SESSION['mensaje'] = "El email de este usuario ya existe en la base de datos";
                    $_SESSION['icono'] = "error";
                        ?><script>
            window.history.back();
        </script> <?php

                }
            } else {
                echo "Las contraseñas no coinciden";
                session_start();
                $_SESSION['mensaje'] = "Las contraseñas no coinciden";
                $_SESSION['icono'] = "error";



                    ?> <script>
        window.history.back();
    </script> <?php
            }
             // con Javascript para retornar atras 
