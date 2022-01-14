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
			SELECT * 
			FROM tb_usuarios
		';

		//$stmt = $conexao->query($query);

		foreach($conexao->query($query) as $key => $value){
			print_r($value['nome']);
			echo '<hr>';
		}

		/*
		echo '<pre>';
		print_r($stmt);
		echo '</pre>';
		*/
		//FETCH_ASSOC(apenas itens associativos) OR FETCH_NUM(apenas itens numéricos) OR FETCH_BOTH(para os dois)
		//FETCH_OBJ transforma em um array de objetos
		//$lista_usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		/*echo '<pre>';
		print_r($lista_usuarios);
		echo '</pre>';*/
		/*
		foreach($lista_usuarios as $key => $value) {
			echo ($value['nome']);
			echo '<hr>';
		}
		*/

	} catch(PDOException $e) {
		//recuperar CODE e MESSAGE
		//CODE
		echo 'Erro: '.$e->getCode().' Mensagem:'.$e->getMessage();
		//final public string Exception::getMessage
	}


?>