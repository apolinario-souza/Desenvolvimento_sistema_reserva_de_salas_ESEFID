<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $solicitante = htmlspecialchars($_POST['solicitante']);
    $email = htmlspecialchars($_POST['email']);
    $vinculo = htmlspecialchars($_POST['vinculo']);
    $outrovinculo = htmlspecialchars($_POST['outrovinculo']);
    $cartao = htmlspecialchars($_POST['cartao']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $unidade = htmlspecialchars($_POST['unidade']);
    
    $espaco = htmlspecialchars($_POST['espaco']);
    $periodo1 = htmlspecialchars($_POST['periodo1']);
    $periodo2 = htmlspecialchars($_POST['periodo2']);
    $horario1 = htmlspecialchars($_POST['horario1']);
    $horario2 = htmlspecialchars($_POST['horario2']);
    
    $nocupantes = htmlspecialchars($_POST['nocupantes']);
    $resposavel = htmlspecialchars($_POST['resposavel']);
    $resposavelcartao = htmlspecialchars($_POST['resposavelcartao']);
    
   
    
    $observacoes = htmlspecialchars($_POST['observacoes']);
    
    
    
    $to = "apolinario.souza@ufrgs.br"; // Insira o endereço de e-mail desejado
    $subject = "Reserva  $espaco";
    
    $body = "Solicitante: $solicitante\n
    E-mail: $email\n
    Vinculo: $vinculo\n
    Outro: $outrovinculo\n
    Telefone: $telefone\n
    Cartão UFRGS nº: $cartao\n
    Unidade: $unidade\n
    Espaço: $espaco\n
    Data:  $periodo1 - $periodo2\n
    Horário:  $horario1 - $horario2\n
    Nº Ocupantes: $nocupantes\n
    Responsável pela chave: $resposavel\n
    Nº pesponsável pela chave: $resposavelcartao\n
    
    
    Observaões: \n$observacoes\n";
    
    // Aqui, use um endereço de e-mail do seu domínio
    $headers = "From: edf.tercio@gmail.com\r\n"; // Altere para um e-mail válido do seu domínio
    $headers .= "Reply-To: $email\r\n"; // Para permitir que as respostas sejam enviadas ao remetente

    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem. Tente novamente.";
    }
}
?>
