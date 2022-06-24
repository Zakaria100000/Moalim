<?php

class UsersController {

	public function auth(){
	
		if(isset($_POST['submit'])){
			$data['username'] = $_POST['username'];

			$resultStudent = User::loginStudent($data);

			$resultTeacher =
			User::loginTeacher($data);

			$resultAdmin = 
			User::loginAdmin($data);
	

			if($resultStudent->username === $_POST 
			['username'] && $_POST['password']===$resultStudent->password){
				$_SESSION['logged'] = true;
				$_SESSION['firstname'] = $resultStudent->firstname;
				$_SESSION['lastname'] = $resultStudent->lastname;
				$_SESSION['username'] = $resultStudent->username;
				$_SESSION['password'] = $resultStudent->password;
				$_SESSION['role'] = $resultStudent->role;
			}

			elseif($resultTeacher->username === $_POST['username'] && $_POST['password']===$resultTeacher->password){

				$_SESSION['logged'] = true;
				$_SESSION['firstname'] = $resultTeacher->firstname;
				$_SESSION['lastname'] = $resultTeacher->lastname;
				$_SESSION['username'] = $resultTeacher->username;
				$_SESSION['password'] = $resultTeacher->password;
				$_SESSION['role'] = $resultTeacher->role;
				 
                Redirect::to('home');

            }
			elseif($resultAdmin->username === $_POST['username'] && $_POST['password']===$resultAdmin->password){

				$_SESSION['logged'] = true;
				$_SESSION['firstname'] = $resultAdmin->firstname;
				$_SESSION['lastname'] = $resultAdmin->lastname;
				$_SESSION['username'] = $resultAdmin->username;
				$_SESSION['password'] = $resultAdmin->password;
				$_SESSION['role'] = $resultAdmin->role;
                Redirect::to('home');

            }

		

			else{
				Session::set('error','Le mail ou le mot de passe est incorrect');
				Redirect::to('login');
				}
		}
	}


	static public function logout(){
		session_destroy();
	}


}
?>