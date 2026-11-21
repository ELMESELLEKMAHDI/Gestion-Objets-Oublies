<?php
session_start();
require_once __DIR__ . '/../config/db.php';


if (isset($_POST['register'])) {

    if (empty($_SESSION['loggedin']) || ($_SESSION['role'] ?? '') !== 'admin') {
        http_response_code(403);
        die("Non autorisé. Seul un administrateur peut créer un compte.");
    }

    $User_name = trim($_POST['User_name']);
    $role      = $_POST['role'] ?? '';

    if (!in_array($role, ['admin', 'employe'], true)) {
        $_SESSION['register_error'] = "Rôle invalide.";
        header("Location: programe/register.php");
        exit();
    }

    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT id FROM admin WHERE User_name = :User_name");
    $stmt->bindValue(':User_name', $User_name);
    $stmt->execute();

    if ($stmt->fetch()) {

        $_SESSION['register_error'] = "Ce nom d'utilisateur existe déjà.";
        header("Location: programe/register.php");
        exit();

    } else {

        $insert = $conn->prepare('
            INSERT INTO admin(User_name,password,role)
            VALUES(:User_name,:password,:role)
        ');

        $insert->bindValue(':User_name', $User_name);
        $insert->bindValue(':password', $password);
        $insert->bindValue(':role', $role);
        $insert->execute();

        $_SESSION['register_success'] = "Compte créé avec succès.";
        header("Location: login.php");
        exit();
    }
}




if (isset($_POST['login'])) {

    $User_name = trim($_POST['User_name']);
    $password  = $_POST['password'];

    $stmt = $conn->prepare("
        SELECT * FROM admin
        WHERE User_name=:User_name
    ");

    $stmt->bindValue(':User_name',$User_name);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password,$user['password'])){

        session_regenerate_id(true);

        $_SESSION['loggedin']=true;
        $_SESSION['user_id']=$user['id'];
        $_SESSION['User_name']=$user['User_name'];
        $_SESSION['role']=$user['role'];

        if ($user['role'] == "admin") {

    header("Location: ../admin/dashboard.php");
    exit();

} elseif ($user['role'] == "employe") {

    header("Location: programe/index-2.php");
    exit();

}

    }

    $_SESSION['login_error']="Nom d'utilisateur ou mot de passe incorrect.";

    header("Location: login.php");
    exit();
}