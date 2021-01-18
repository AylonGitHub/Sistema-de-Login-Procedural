<?php
 require_once 'Classes/usuario.php';
 $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div id="corpo-form">
    <h1>Entrar</h1>
    <form method="Post">

    <input type="email" name="email" placeholder="Email">
    <input type="password" name="senha" placeholder="Senha">
    <input type="submit" value="ACESSAR">
    <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se!</strong></a>
    </form>
</div>
    <?php
    if(isset($_POST['email']))
{
        
        $email =addslashes ($_POST['email']);
        $senha =addslashes ($_POST['senha']);
       
        // verificar se esta preenchido
        if(!empty($email) && !empty($senha))
        {
            $u->conectar("projeto_login", "localhost", "aylon", "123");
            if($u->msgErro == "")
            {
            if($u->logar($email,$senha))
            {
                 header("location:AreaPrivada.php");
            }
            else
            {
                ?>
                <div class="msg-erro">
                Email e/ou senha estão incorretos!
                </div>
                <?php
            }
            
        }
        else
        {
                ?>
                <div class="msg-erro">
                <?php echo "Erro:".$u->msgErro; ?>
                </div>
                <?php
            
        }
            
     }else
     {
                ?>
                <div class="msg-erro">
                Preencha todos os campos!
                </div>
                <?php
            
     }
}

    
    ?>
    

</body>
</html>