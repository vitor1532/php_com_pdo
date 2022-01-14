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
			SELECT * FROM tb_usuarios WHERE id = 7
		';

		$stmt = $conexao->query($query);
		/*
		echo '<pre>';
		print_r($stmt);
		echo '</pre>';
		*/
		//FETCH_ASSOC(apenas itens associativos) OR FETCH_NUM(apenas itens numéricos) OR FETCH_BOTH(para os dois)
		//FETCH_OBJ transforma em um array de objetos
		$lista = $stmt->fetch(PDO::FETCH_OBJ);
		echo '<pre>';
		print_r($lista);
		echo '</pre>';

		echo $lista->nome;

	} catch(PDOException $e) {
		//recuperar CODE e MESSAGE
		//CODE
		echo 'Erro: '.$e->getCode().' Mensagem:'.$e->getMessage();
		//final public string Exception::getMessage
	}


?>