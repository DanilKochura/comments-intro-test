<?php 
define('DB_HOST',"localhost");
define('DB_USER',"root");
define('DB_PASS',"admin");
define('DB_NAME', "comm_test");
Class DB
	{
		private $conn;
		function __construct()
		{
			$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if($this->conn->connect_error) 
			{
				die("Failed to connect with database");
			}
		}

		public function Query_try($query) //запрос к бд и прерывание в случае ошибки
		{
			if(!($result = mysqli_query($this->conn, $query)))
			{
				die("Query error".$result);
			}
			return $result;
		}
		function __destruct()
		{
			mysqli_close($this->conn);
		}
	}


?>