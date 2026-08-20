<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criptografia</title>
</head>
<body>
    <h1>Pesquisa sobre Criptográfia</h1>
    <h2>O que é criptografia</h2>

    <p>Criptografia é a prática de proteger informações sigilosas por meio de algaritimos que são capazes 
        de trasformar dados legíveis (texto plano) em um formato ilegìvel (texto cifrado). Ou seja, apenas 
        os indivíduos com a chave correta podem reverter esse processo e acessar os dados originais 
        Na prática, a criptografia é amplamente utilizada para proteger comunicações, transações financeiras, 
        senhas, e até mesmo criptomoedas. Ela impede que partes não autorizadas acessem ou modifiquem 
        informações sensíveis, sendo uma ferramenta crucial contra hackers e cibercriminosos.
    </p>

    <h2>Na Prática</h2>
     <form method="post">
        <input type text name = "Senha" required>
        <button type= "submit">Cadastrar</button>
     </form>

<?php  
session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $Senha = $_POST['Senha'];

        $_SESSION['testes'][] = $Senha;
    }   
         /*Session é um aray que guarda as senhas que eu digitei dentro desse aray. 
         O empty verifica se esse array está vazio (pode ser um string, int etc). Se estiver vazio
         significa que é empty. Ou seja, se o array não está vazio
        (já tem alguma senha armazenada), execute o código dentro */ 

    if(!empty($_SESSION['testes'])){
         foreach ($_SESSION['testes'] as $s) {
            echo "<h1>Senha Digitada: $Senha</h1>";
            echo  "<p> md5: ".md5($Senha)."</p>";
            echo  "<p> sha1: ".sha1($Senha)."</p>";
            echo  "<p> password_hash: ".password_hash($Senha, PASSWORD_BCRYPT)."</p>";
         }
    }
  
?>

</body>
</html>