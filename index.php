<?php 

	//primeiro parâmetro do PDO é o dsn - data service name
	//segundo é o usuário
	//terceiro é a senha


	$dsn = 'mysql:host=localhost;dbname=php_com_pdo';
	$usuario = 'root';
	$senha = '';

	

	try {
		$conexao = new PDO($dsn, $usuario, $senha);

		$query = '
			CREATE TABLE if not exists tb_usuarios(
				id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nome varchar(50) NOT NULL,
				email varchar(100) NOT NULL,
				senha varchar(32) NOT NULL
			)
		';
		//CRUD - C(create), R(read), U(update), D(delete)
		//retorna a quantidade de linhas modificadas, criadas ou modificadas no bd, resultando geralmente em 0
		$retorno = $conexao->exec($query);
		//0
		echo $retorno;

	} catch(PDOException $e) {
		//recuperar CODE e MESSAGE
		//CODE
		echo 'Erro: '.$e->getCode().' Mensagem:'.$e->getMessage();
		//final public string Exception::getMessage
	}


?>