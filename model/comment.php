<?php 
	require 'config/bd.php';

	class Comment extends DB 
	{

		function __construct()
		{
			parent::__construct();
		}
		public function countAll()
		{
			$query = "SELECT COUNT(*) from comments";
			$num =$this->Query_try($query);
			$num = mysqli_fetch_assoc($num);
			return $num['COUNT(*)'];
		}

		public function read($start, $limit, $sort)
		{
			if($sort == -1)
			{
				$ord = "DESC";
			} else
			{
				$ord = "ASC";
			}
			$query = "SELECT * FROM `comments` ORDER BY `date_c`". $ord ." LIMIT ".$limit." OFFSET ".$start;
			$res = $this->Query_try($query);
			return $res;

		}

		public function create($name, $phone, $email, $rate)
		{
			$query_test = "SELECT COUNT(*)FROM `comments` WHERE `phone_c` = '$phone' OR `email_c` = '$email'";
			$test = $this->Query_try($query_test);
			$test = mysqli_fetch_assoc($test);
			if($test['COUNT(*)']>0)
			{
				return 'Вы уже оставляли комментарий!';
			} 
			else
			{
				$query = "INSERT INTO `comments`(`id_c`, `name_c`, `phone_c`, `email_c`, `rate_c`, `date_c`) values(NULL, '$name', '$phone', '$email', '$rate', CURRENT_TIMESTAMP())";
				$this->Query_try($query);
				return 'Комментарий оставлен успешно!';
			}
		}

		function __destruct()
		{
			parent::__destruct();
		}
	}	