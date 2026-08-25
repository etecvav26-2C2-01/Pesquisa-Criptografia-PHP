<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Criptografia</title>
</head>
<body class="w-100 shadow-lg rounded-4 p-4">
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

        $_SESSION['testes'] = $Senha;
    }   
         /*Session é um aray que guarda as senhas que eu digitei dentro desse aray. 
         O empty verifica se esse array está vazio (pode ser um string, int etc). Se estiver vazio
         significa que é empty. Ou seja, se o array não está vazio
        (já tem alguma senha armazenada), execute o código dentro */ 
  
?>

    <h1>Senha Digitada: <?= $Senha ?></h1>
    <p> MD5: <?= md5($Senha) ?> </p>
    <p> SHA1: <?= sha1($Senha) ?> </p>
    <p> HASH: <?= password_hash($Senha, PASSWORD_DEFAULT) ?> </p>

</body>
</html>
