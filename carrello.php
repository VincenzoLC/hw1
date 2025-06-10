<?php
header('Content-Type: application/json');

include 'auth.php';
if (!$userid = checkAuth()) {
    header('Location: login.php');
    exit;
}

$conn = mysqli_connect(
    $dbconfig['host'],
    $dbconfig['user'],
    $dbconfig['password'],
    $dbconfig['name']
);

if (!$conn) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Errore di connessione']);
    exit;
}

$input = file_get_contents("php://input");
$data = json_decode($input, true);

if (!isset($data['nome'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Nome articolo mancante']);
    exit;
}

$nome = mysqli_real_escape_string($conn, $data['nome']);

$query_articolo = "SELECT id_articolo FROM articolo WHERE nome = '$nome' LIMIT 1";
$result = mysqli_query($conn, $query_articolo);

if ($result && mysqli_num_rows($result) > 0) {
    $articolo = mysqli_fetch_assoc($result);
    $id_articolo = $articolo['id_articolo'];

    $query_check = "SELECT quantita FROM carrello WHERE id_utente = $userid AND id_articolo = $id_articolo LIMIT 1";
    $result_check = mysqli_query($conn, $query_check);

    if ($result_check && mysqli_num_rows($result_check) > 0) {
        $row = mysqli_fetch_assoc($result_check);
        $quantita = $row['quantita'] + 1;

        $query_update = "UPDATE carrello SET quantita = $quantita WHERE id_utente = $userid AND id_articolo = $id_articolo";
        if (mysqli_query($conn, $query_update)) {
            echo json_encode([
                'success' => true,
                'message' => "Quantità aggiornata a $quantita"
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Errore aggiornamento quantità: ' . mysqli_error($conn)
            ]);
        }
    } else {
        $quantita = 1;
        $query_insert = "INSERT INTO carrello (id_utente, id_articolo, quantita) VALUES ($userid, $id_articolo, $quantita)";
        if (mysqli_query($conn, $query_insert)) {
            echo json_encode([
                'success' => true,
                'message' => "Articolo aggiunto al carrello con quantità 1"
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Errore inserimento nel carrello: ' . mysqli_error($conn)
            ]);
        }
    }
} else {
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'message' => 'Articolo non trovato'
    ]);
}

mysqli_close($conn);
?>
