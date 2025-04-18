<?php
include('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];

$password = $_POST['password'];
$password_repet = $_POST['password_repet'];
// si la contraseña esta vacia, se asume que no se va a cambiar el password y se le asigna el valor de la contraseña actual
if ($password == "") {


    $sentencia = $pdo->prepare("UPDATE usuarios 
        SET rol_id = :rol_id, 
        email = :email,
        fyh_actualizacion = :fyh_actualizacion
        WHERE id_usuario=:id_usuario");

    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_usuario', $id_usuario);

    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizo el usuario correctamente";
            $_SESSION['icono'] = "success";
            header('Location:' . APP_URL . "/admin/usuarios");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar el usuario";
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


                // si  la quiera cambiar, se realiza lo siguiente 
            } else {

                if ($password == $password_repet) {
                    //echo "Las contraseñas coinciden";
                    $password = password_hash($password, PASSWORD_DEFAULT); // Forma de encriptar contraseña

                    $sentencia = $pdo->prepare("UPDATE usuarios 
                    SET rol_id = :rol_id, 
                    email = :email,
                    password = :password,
                    fyh_actualizacion = :fyh_actualizacion
                    WHERE id_usuario=:id_usuario");

                    $sentencia->bindParam(':rol_id', $rol_id);
                    $sentencia->bindParam(':email', $email);
                    $sentencia->bindParam(':password', $password);
                    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
                    $sentencia->bindParam('id_usuario', $id_usuario);


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
                    //echo "Las contraseñas no coinciden";
                    session_start();
                    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
                    $_SESSION['icono'] = "error";



                        ?> <script>
            window.history.back();
        </script> <?php
                }
            }
                                     // con Javascript para retornar atras 
