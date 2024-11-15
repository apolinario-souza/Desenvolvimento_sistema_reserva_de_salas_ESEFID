<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os campos solicitante e email foram enviados
    if (empty($_POST['solicitante']) || empty($_POST['email'])) {
        echo "Erro: Os campos solicitante e email são obrigatórios.";
        exit;
    }

    // Processamento dos dados apenas para solicitante e email
    $solicitante = htmlspecialchars($_POST['solicitante']);
    $email = htmlspecialchars($_POST['email']);

    // Configuração do e-mail
    $to = "apolinario.souza@ufrgs.br";
    $subject = "Reserva SALA DE SEMINÁRIOS";
    $body = "Solicitante: $solicitante\nE-mail: $email\n";
    $headers = "From: apolinario.souza@ufrgs.br\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";

    // Tentativa de envio de e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem. Verifique as configurações do servidor de e-mail.";
    }
}
?>
