<?php 

	//primeiro parâmetro do PDO é o dsn - data service name
	//segundo é o usuário
	//terceiro é a senha
	if(!empty($_POST['user']) && !empty($_POST['password'])) {

		$dsn = 'mysql:host=localhost;dbname=php_com_pdo';
		$usuario = 'root';
		$senha = '';

		try {

			$conexao = new PDO($dsn, $usuario, $senha);
			
			//query
			
			$query = "
				SELECT * 
				FROM tb_usuarios
				WHERE 
			";
			$query .= " email = :usuario ";
			$query .= " AND senha = :senha ";

			//prepare aguarda a ordem de execução
			$stmt = $conexao->prepare($query);

			//cria variáveis para dar bind à query
			$stmt->bindValue(':usuario', $_POST['user']);
			$stmt->bindValue(':senha', $_POST['password']);

			//executar
			$stmt->execute();

			$usuario = $stmt->fetch();

			echo '<pre>';
			print_r($usuario);
			echo '</pre>';

			/*
			//$stmt = $conexao->query($query);

			foreach($conexao->query($query) as $key => $value){
				print_r($value['nome']);
				echo '<hr>';
			}

			
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
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login</title>
</head>
<body>

	<form method="post" action="index.php">
		<input type="text" placeholder="user" name="user">
		<br>
		<input type="password" placeholder="password" name="password">
		<br>
		<button type="submit">Login</button>

	</form>

</body>
</html>