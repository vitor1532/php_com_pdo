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
			create table if not exists tb_usuarios(
				id int not null primay key auto_increment,
				nome varchar(50) not null,
				email varchar(100) not null,
				senha varchar(32) not null
			)
		';
		//CRUD - C(create), R(read), U(update), D(delete)
		//retorna a quantidade de linhas modificadas, criadas ou modificadas no bd, resultando geralmente em 0
		$conexao->exec($query);
		//0

	} catch(PDOException $e) {
		//recuperar CODE e MESSAGE
		//CODE
		echo 'Erro: '.$e->getCode().' Mensagem:'.$e->getMessage();
		//final public string Exception::getMessage
	}


?>