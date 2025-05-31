<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $solicitante = htmlspecialchars($_POST['solicitante']);
    $email = htmlspecialchars($_POST['email']);
    $cartao = htmlspecialchars($_POST['cartao']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $vinculo = htmlspecialchars($_POST['vinculo']);
    
    
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
    
    $to = "receplapex@ufrgs.br";
    $subject = "Reserva $espaco";
    
    $body = "Solicitante: $solicitante\n
    E-mail: $email\n
    Telefone: $telefone\n
    Cartao UFRGS: $cartao\n
    Vinculo: $vinculo\n
    Espaco: $espaco\n
    Data: $periodo1 - $periodo2\n
    Horario: $horario1 - $horario2\n
    Titulo projeto: $tituloprojeto\n
    Responsavel pela chave: $resposavel\n
    Cartao UFRGS pela chave: $resposavelcartao\n
    Observacoes: \n$observacoes\n";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Enviar e-mail para o destinatário principal
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
        
        // Enviar e-mail de confirmação para o solicitante
        $confirmSubject = "Confirmação de Solicitação de Reserva";
        $confirmBody = "Prezado(a) $solicitante,\nAgradecemos pela solicitação do $espaco para o dia $periodo1 ao dia $periodo2.\nSua solicitação está em processamento, e em breve enviaremos um e-mail com a confirmação.\n \n \nAtenciosamente,\nSecretaria Lapex\nTelefone: (51) 3308-5817\nE-mail: receplapex@ufrgs.br";
        $confirmHeaders = "From: receplapex@ufrgs.br\r\n";
        
        mail($email, $confirmSubject, $confirmBody, $confirmHeaders);
    } else {
        echo "Erro ao enviar mensagem. Tente novamente.";
    }
}
?>
