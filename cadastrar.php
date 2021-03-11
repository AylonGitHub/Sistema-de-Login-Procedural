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
    <h1>Cadastrar</h1>
    <form method="Post">
    
     <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
     <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
    <input type="email" name="email"  placeholder="Email" maxlength="40">
    <input type="password" name="senha" placeholder="Senha" maxlength="15">
    <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
    <input type="submit" value="CADASTRAR">
    </form>   
</div>
<?php
   // verificar se clicou no botao
   if(isset($_POST['nome']))
   {
       $nome =addslashes ($_POST['nome']);
       $telefone =addslashes ($_POST['telefone']);
       $email =addslashes ($_POST['email']);
       $senha =addslashes ($_POST['senha']);
       $confirmarSenha =addslashes ($_POST['confSenha']);
       // verificar se esta preenchido
       if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
       {
           $u->conectar("projeto_login", "localhost", "root", "");
           if($u->msgErro == "")// se esta tudo ok
           {

               if($senha == $confirmarSenha)
               {
                   if($u->cadastrar($nome,$telefone,$email,$senha))
                   {
                      ?>
                      <div id="msg-sucesso">
                      <a href="index.php">Cadastrado com Sucesso! Acesse para entrar!</a>
                      </div>
                      <?php
                   }
                   else
                   {
                       ?>
                       <div class="msg-erro">
                       Email já Cadastrado!
                       </div>
                       <?php
                   }
               }
               else
               {
                    ?>
                    <div class="msg-erro">
                    Senha e Confirmar senha não correspondem!
                    </div>
                    <?php
               }
                   
            
            }else
               {  
                   ?>
                   <div>
                     <?php echo "Erro:".$u->msgErro;?>
                   </div>
                   <?php
               }
        }
        else
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