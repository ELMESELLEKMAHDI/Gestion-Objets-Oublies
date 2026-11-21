<?php
require_once __DIR__ . '/../includes/auth_check_api.php';
require_once __DIR__ . '/../config/db.php';

function validateObjectDates($date, $date_R) {

    $errors = [];
    $today = date('Y-m-d');
    $minDate = date('Y-m-d', strtotime('-1 month'));

    if (empty($date)) {

        $errors['date_trouve'] = "La date de trouvé est obligatoire.";

    } else {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        if (!$d || $d->format('Y-m-d') !== $date) {
            $errors['date_trouve'] = "La date de trouvé n'est pas valide.";
        } elseif ($date < $minDate) {
            $errors['date_trouve'] = "La date de trouvé ne peut pas être antérieure à un mois.";
        } elseif ($date > $today) {
            $errors['date_trouve'] = "La date de trouvé ne peut pas être dans le futur.";
        }

    }

    //  Date de restitution
    if (!empty($date_R)) {

        $dR = DateTime::createFromFormat('Y-m-d', $date_R);

        if (!$dR || $dR->format('Y-m-d') !== $date_R) {

            $errors['date_rendement'] = "La date de restitution n'est pas valide.";

        } elseif (!isset($errors['date_trouve']) && $date_R < $date) {

            $errors['date_rendement'] = "La date de restitution doit être supérieure ou égale à la date de trouvé.";

        } elseif ($date_R > $today) {

            $errors['date_rendement'] = "La date de restitution ne peut pas être dans le futur.";

        }

    }

    return $errors;
}

if (isset($_POST['name'])) {
    $id = isset($_POST['object_id']) ? $_POST['object_id'] : "";
    $name = $_POST['name'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];
    $chambre = $_POST['chambre'];
    $date = $_POST['date_trouve'];
    $date_R = $_POST['date_rendement'];
    $statut = $_POST['statut'];
    $photo = "";

    $dateErrors = validateObjectDates($date, $date_R);
    if (!empty($dateErrors)) {
        header("Content-Type: application/json");
        http_response_code(422);
        echo json_encode([
            "success" => false,
            "errors" => $dateErrors
        ]);
        exit();
    }

    if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != "" && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $tmp = $_FILES['photo']['tmp_name'];

        // Extensions autorisées
        $allowedExt = ['jpg', 'jpeg', 'jfif', 'jif', 'png', 'webp', 'gif', 'bmp', 'tiff', 'tif', 'heic', 'heif'];
        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

        $allowedMimes = [
            'image/jpeg'    => ['jpg', 'jpeg', 'jfif', 'jif'],
            'image/png'     => ['png'],
            'image/webp'    => ['webp'],
            'image/gif'     => ['gif'],
            'image/bmp'     => ['bmp'],
            'image/x-ms-bmp'=> ['bmp'],
            'image/tiff'    => ['tiff', 'tif'],
            'image/heic'    => ['heic'],
            'image/heif'    => ['heif'],
        ];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $realMime = finfo_file($finfo, $tmp);
        finfo_close($finfo);

        if (!in_array($ext, $allowedExt, true) || !isset($allowedMimes[$realMime]) || !in_array($ext, $allowedMimes[$realMime], true)) {
            header("Content-Type: application/json");
            http_response_code(422);
            echo json_encode(["success" => false, "message" => "Format de photo non autorisé. Utilisez JPG, PNG, WEBP, GIF, BMP, TIFF ou HEIC."]);
            exit();
        }

        $photo = uniqid('img_', true) . '.' . $ext;

        $targetDir = __DIR__ . "/../shared/images/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        move_uploaded_file($tmp, $targetDir . $photo);
    }

    if ($id != "") {
        if ($photo !== "") {
            $stmt = $conn->prepare("UPDATE object SET
                name = :name,
                categorie = :categorie,
                description = :description,
                chambre = :chambre,
                `date` = :date,
                `date_rendement` = :date_rendement,
                `status` = :statut,
                photo = :photo
                WHERE id = :id");
            $stmt->bindValue(':photo', $photo);
        } else {
            $stmt = $conn->prepare("UPDATE object SET
                name = :name,
                categorie = :categorie,
                description = :description,
                chambre = :chambre,
                `date` = :date,
                `date_rendement` = :date_rendement,
                `status` = :statut
                WHERE id = :id");
        }
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':categorie', $categorie);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':chambre', $chambre);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':date_rendement', $date_R);
        $stmt->bindValue(':statut', $statut);
        $stmt->bindValue(':id', $id);

        try {
            $stmt->execute();
            echo "Mis à jour avec succès !";
        } catch (PDOException $e) {
            echo "Erreur de mise à jour: " . $e->getMessage();
        }
    } else {
        $stmt = $conn->prepare("INSERT INTO object (name, categorie, description, chambre, `date`, photo, `status`, date_rendement, created_by)
            VALUES (:name, :categorie, :description, :chambre, :date, :photo, :statut, :date_rendement, :created_by)");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':categorie', $categorie);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':chambre', $chambre);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':photo', $photo);
        $stmt->bindValue(':statut', $statut);
        $stmt->bindValue(':date_rendement', $date_R);
        $stmt->bindValue(':created_by', $_SESSION['user_id'] ?? null);

        try {
            $stmt->execute();
            echo "Inséré avec succès !";
        } catch (PDOException $e) {
            echo "Erreur d'insertion: " . $e->getMessage();
        }
    }
    exit();
}

if (isset($_POST['delete_id'])) {
    if (($_SESSION['role'] ?? '') !== 'admin') {
        header("Content-Type: application/json");
        http_response_code(403);
        echo json_encode(["success" => false, "message" => "Action réservée à l'administrateur."]);
        exit();
    }
    $id = $_POST['delete_id'];

    $photoStmt = $conn->prepare("SELECT photo FROM object WHERE id = :id");
    $photoStmt->bindValue(':id', $id);
    $photoStmt->execute();
    $photo_row = $photoStmt->fetch();
    if ($photo_row && !empty($photo_row['photo'])) {
        $photo_path = __DIR__ . "/../shared/images/" . $photo_row['photo'];
        if (file_exists($photo_path)) {
            unlink($photo_path);
        }
    }

    $stmt = $conn->prepare("DELETE FROM object WHERE id = :id");
    $stmt->bindValue(':id', $id);
    try {
        $stmt->execute();
        echo "Supprimé avec succès !";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    exit();
}

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $stmt = $conn->prepare("SELECT * FROM object WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $row = $stmt->fetch();
    if ($row) {
        echo json_encode($row);
    }
    exit();
}