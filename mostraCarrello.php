<?php
header('Content-Type: application/json');

include 'auth.php';
if (!$userid = checkAuth()) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Utente non autenticato']);
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
    echo json_encode(['success' => false, 'message' => 'Errore di connessione al database']);
    exit;
}

$query = "
    SELECT c.quantita, a.nome
    FROM carrello c
    JOIN articolo a ON c.id_articolo = a.id_articolo
    WHERE c.id_utente = $userid
";

$result = mysqli_query($conn, $query);

$carrello = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $carrello[] = $row;
    }
}

mysqli_close($conn);

echo json_encode(['success' => true, 'carrello' => $carrello]);
