<?php 
// template name: Mail
$headers = 'From: '.$_POST['email'] . "\r\n" .
'Reply-To: ' . $_POST['email'] . "\r\n";

$sendto = 'contato@pipeline-digital.com.br';
$subject = $_POST['assunto'] ;
$msg = '   
    <table>
        <tr>
            <td><strong>Nome: </strong></td>
            <td>'.$_POST['nome'].'</td>
        </tr>
        <tr>
            <td><strong>Telefone: </strong></td>
            <td>'.$_POST['telefone'].'</td>
        </tr>
        <tr>
            <td><strong>Email: </strong></td>
            <td>'.$_POST['email'].'</td>
        </tr>
        <tr>
        <td><strong>Assunto: </strong></td>
            <td>'.$_POST['assunto'].'</td>
        </tr>
        <tr>
            <td><strong>Mensagem: </strong></td>
            <td>'.$_POST['mensagem'].'</td>
        </tr>
    </table>';
    $sent = wp_mail($sendto, $subject, $msg, $headers);

    if($sent) {
        header("Location: http://pipeline-digital.com.br/");
        die();
    }
    else  {
        print_var($sent);
    }

//wp_mail($headers, $sendto, $_POST['assunto'], $msg);


?>