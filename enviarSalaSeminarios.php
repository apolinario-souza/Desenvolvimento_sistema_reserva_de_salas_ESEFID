<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $solicitante = htmlspecialchars($_POST['solicitante']);
    $email = htmlspecialchars($_POST['email']);
    $vinculo = htmlspecialchars($_POST['vinculo']);
    
    $finalidade = htmlspecialchars($_POST['finalidade']);
    $telefone = htmlspecialchars($_POST['telefone']);
    
    
    
    $periodo1 = htmlspecialchars($_POST['periodo1']);
    $periodo2 = htmlspecialchars($_POST['periodo2']);
    $horario1 = htmlspecialchars($_POST['horario1']);
    $horario2 = htmlspecialchars($_POST['horario2']);
    
    $nocupantes = htmlspecialchars($_POST['nocupantes']);
    
   
    
    $observacoes = htmlspecialchars($_POST['observacoes']);
    
    
    
    $to = "receplapex@ufrgs.br"; // Insira o endereço de e-mail desejado
    $subject = "Reserva  SALA DE SEMINÁRIOS";
    
    $body = "Solicitante: $solicitante\n
    E-mail: $email\n
    Vinculo: $vinculo\n
   
    Telefone: $telefone\n
    Finalidade: $finalidade\n
    
    
    Data:  $periodo1 - $periodo2\n
    Horario:  $horario1 - $horario2\n
    N ocupantes:  $nocupantes\n
    
    
    
    
    Observaões: \n$observacoes\n";
    
    // Aqui, use um endereço de e-mail do seu domínio
    $headers = "From:receplapex@ufrgs.br\r\n"; // Altere para um e-mail válido do seu domínio
    $headers .= "Reply-To: $email\r\n"; // Para permitir que as respostas sejam enviadas ao remetente

    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem. Tente novamente.";
    }
}
?>
