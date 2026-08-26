<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Criptografia</title>
</head>
<body>  
    <header>
        <nav class="navbar navbar-dark bg-dark d-flex justify-content-center">
            <a class="navbar-brand" href="#">
                <h1 class="d-inline-block" alt="">
                    Pesquisa sobre Criptográfia
                </h1>
            </a>
        </nav>
    </header>
    
    <main class="w-100 p-4">
        
        <h2>O que é criptografia</h2>
        <p>Criptografia é a prática de proteger informações sigilosas por meio de algaritimos que são capazes 
            de trasformar dados legíveis (texto plano) em um formato ilegìvel (texto cifrado). Ou seja, apenas 
            os indivíduos com a chave correta podem reverter esse processo e acessar os dados originais 
            Na prática, a criptografia é amplamente utilizada para proteger comunicações, transações financeiras, 
            senhas, e até mesmo criptomoedas. Ela impede que partes não autorizadas acessem ou modifiquem 
            informações sensíveis, sendo uma ferramenta crucial contra hackers e cibercriminosos.
        </p>

        <div class="mb-4">
            <h2>Na Prática</h2>
             <form method="post">
                <input type text name = "Senha" required>
                <button type= "submit">Cadastrar</button>
             </form>
        </div>

        <?php  
            session_start();
            
            $Senha = "";
    
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $Senha = $_POST['Senha'];
        
                $_SESSION['testes'] = $Senha;
            }   
                 /*Session é um aray que guarda as senhas que eu digitei dentro desse aray. 
                 O empty verifica se esse array está vazio (pode ser um string, int etc). Se estiver vazio
                 significa que é empty. Ou seja, se o array não está vazio
                (já tem alguma senha armazenada), execute o código dentro */ 
          
        ?>
                
        <?php
            if ($Senha != null):
        ?>
        <div class="alert alert-success shadow-lg" role="alert">
            <h4 class="alert-heading">Senha Digitada: <?= $Senha ?></h4>
            <hr>
            <h5 class="alert-heading">Tipos de Criptografia:</h5>
            <br>
            <p> MD5: <?= md5($Senha) ?> </p>
            <p> SHA1: <?= sha1($Senha) ?> </p>
            <p> HASH: <?= password_hash($Senha, PASSWORD_DEFAULT) ?> </p>
        </div>
    <?php endif; ?>

        <section class="row g-4 mt-4">
            <div class="alert alert-secondary mt-4">
                <div>
                    <h3>Qual é a diferença?</h3>
                    <p>
                        MD5 e SHA-1 são funções de hash. Elas transformam uma informação
                        em um código de tamanho definido e não foram desenvolvidas para
                        que o processo seja revertido para recuperar o texto original.
                    </p>

                    <p>
                        Já o <code>password_hash()</code> do PHP também produz um hash,
                        mas foi desenvolvido especificamente para o armazenamento seguro
                        de senhas. Ele utiliza técnicas que tornam muito mais difícil
                        descobrir a senha original por tentativa e erro.
                    </p>

                    <p>
                        Portanto, para uma aplicação PHP que precisa armazenar senhas,
                        a opção recomendada é utilizar <code>password_hash()</code> e,
                        posteriormente, <code>password_verify()</code> para verificar
                        se a senha informada está correta.
                    </p>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="col-md-4 p-2">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h3 class="card-title">Sobre o MD5</h3>

                                <p>
                                    O MD5 é uma função de hash que transforma uma informação
                                    em uma sequência fixa de 32 caracteres. Ele foi muito
                                    utilizado para verificar a integridade de arquivos e
                                    informações.
                                </p>

                                <p>
                                    Atualmente, o MD5 não é considerado seguro para proteger
                                    senhas ou informações sensíveis, pois existem técnicas
                                    capazes de encontrar colisões e ataques que facilitam
                                    a descoberta de senhas.
                                </p>

                                <p>
                                    <strong>Quando usar?</strong><br>
                                    Evite utilizar MD5 para armazenar senhas. Em sistemas
                                    modernos, existem algoritmos mais seguros e apropriados.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-2">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h3 class="card-title">Sobre o SHA-1</h3>

                                <p>
                                    SHA-1 também é uma função de hash. Ela gera uma sequência
                                    de 40 caracteres a partir dos dados recebidos.
                                </p>

                                <p>
                                    Durante muitos anos, o SHA-1 foi utilizado em sistemas
                                    de segurança e para verificar a integridade de arquivos.
                                    Porém, atualmente ele é considerado inseguro para novas
                                    aplicações que precisam de resistência contra colisões.
                                </p>

                                <p>
                                    <strong>Quando usar?</strong><br>
                                    Não é recomendado utilizar SHA-1 para armazenar senhas
                                    ou para aplicações que exigem segurança criptográfica
                                    moderna.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-2">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h3 class="card-title">Sobre o password_hash()</h3>

                                <p>
                                    O <code>password_hash()</code> é uma função do PHP
                                    desenvolvida especificamente para criar hashes seguros
                                    de senhas.
                                </p>

                                <p>
                                    Diferentemente do MD5 e do SHA-1, ele utiliza algoritmos
                                    apropriados para armazenamento de senhas e adiciona
                                    automaticamente um salt, tornando ataques de força bruta
                                    mais difíceis.
                                </p>

                                <p>
                                    <strong>Quando usar?</strong><br>
                                    Deve ser utilizado para armazenar senhas de usuários
                                    em aplicações PHP. Para verificar uma senha posteriormente,
                                    utilize <code>password_verify()</code>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
