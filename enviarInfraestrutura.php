<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $solicitante = htmlspecialchars($_POST['solicitante']);
    $email = htmlspecialchars($_POST['email']);
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
    
    $to = "apolinario.souza@ufrgs.br";
    $subject = "Reserva $espaco";
    
    $body = "Solicitante: $solicitante\n
    E-mail: $email\n
    Telefone: $telefone\n
    Cartão UFRGS nº: $cartao\n
    Unidade: $unidade\n
    Espaço: $espaco\n
    Data: $periodo1 - $periodo2\n
    Horário: $horario1 - $horario2\n
    Nº Ocupantes: $nocupantes\n
    Responsável pela chave: $resposavel\n
    Nº responsável pela chave: $resposavelcartao\n
    Observações: \n$observacoes\n";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Enviar e-mail para o destinatário principal
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
        
        // Enviar e-mail de confirmação para o solicitante
        $confirmSubject = "Confirmação de Solicitação de Reserva";
        $confirmBody = "Prezado(a) $solicitante,\nAgradecemos pela solicitação do $espaco para o dia $periodo1 ao dia $periodo2.\nSua solicitação está em processamento, e em breve enviaremos um e-mail com a confirmação.\n \n \nAtenciosamente,\nNúcleo de Infraestrutura\nTelefone: (51) 3308-5816\nE-mail: infraestruturaesefid@ufrgs.br";
        $confirmHeaders = "From: apolinario.souza@ufrgs.br\r\n";
        
        mail($email, $confirmSubject, $confirmBody, $confirmHeaders);
    } else {
        echo "Erro ao enviar mensagem. Tente novamente.";
    }
}
?>
