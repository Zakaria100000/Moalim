<?php

class User{
	static public function loginAdmin($data){
		$username = $data['username'];
		try{
			$query = 'SELECT * FROM admin
			WHERE username=:username';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":username" => $username));
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			return $user;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}	
	static public function loginStudent($data){
		$username = $data['username'];
		try{
			$query = 'SELECT * FROM student
			WHERE username=:username';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":username" => $username));
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			return $user;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}	
	static public function loginTeacher($data){
		$username = $data['username'];
		try{
			$query = 'SELECT * FROM teacher
			WHERE username=:username';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":username" => $username));
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			return $user;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}	 
}

 ?>