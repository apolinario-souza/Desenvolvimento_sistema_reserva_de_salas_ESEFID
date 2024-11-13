<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $solicitante = htmlspecialchars($_POST['solicitante']);
    $email = htmlspecialchars($_POST['email']);
    $vinculo = htmlspecialchars($_POST['vinculo']);
    
    $cartao = htmlspecialchars($_POST['cartao']);
    $telefone = htmlspecialchars($_POST['telefone']);
    
    
    $espaco = htmlspecialchars($_POST['espaco']);
    $periodo1 = htmlspecialchars($_POST['periodo1']);
    $periodo2 = htmlspecialchars($_POST['periodo2']);
    $horario1 = htmlspecialchars($_POST['horario1']);
    $horario2 = htmlspecialchars($_POST['horario2']);
    $tituloprojeto = htmlspecialchars($_POST['tituloprojeto']);
    $equipamentos = htmlspecialchars($_POST['equipamentos']);
    $resposavel = htmlspecialchars($_POST['resposavel']);
    $resposavelcartao = htmlspecialchars($_POST['resposavelcartao']);
    
   
    
    $observacoes = htmlspecialchars($_POST['observacoes']);
    
    
    
    $to = "receplapex@ufrgs.br"; // Insira o endereço de e-mail desejado
    $subject = "Reserva  $espaco";
    
    $body = "Solicitante: $solicitante\n
    E-mail: $email\n
    Vinculo: $vinculo\n
   
    Telefone: $telefone\n
    Cartao UFRGS n: $cartao\n
    
    Espaco: $espaco\n
    Data:  $periodo1 - $periodo2\n
    Horario:  $horario1 - $horario2\n
    Titulo: $tituloprojeto\n
    Equipamentos: $equipamentos\n
    Responsável pela chave: $resposavel\n
    N pesponsável pela chave: $resposavelcartao\n
    
    
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
