<?php
// Token bot Telegram yang diberikan oleh BotFather
$botToken = "7407664764:AAELOQ9EI7sxGcKO48ca758Nm9-pgbhK9cQ";  // Ganti dengan token bot Anda
$apiURL = "https://api.telegram.org/bot$botToken/";

// Mendapatkan input dari webhook
$content = file_get_contents("php://input");
$update = json_decode($content, true);

// Jika pesan diterima
if(isset($update['message'])) {
    $chat_id = $update['message']['chat']['id'];
    $message = $update['message']['text'];

    // Cek perintah
    if ($message == "/start") {
        $response = "Selamat datang di bot saya!";
    } else {
        $response = "Anda berkata: " . $message;
    }

    // Kirim balasan
    file_get_contents($apiURL . "sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($response));
}
?>
