<?php
	require 'model/comment.php';
	$comm = new Comment();
	$num = $comm->countAll();
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$start = 5*($page-1);
	$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5; 
	$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 1;;
	$pages = ceil($num / $limit);
	$comments = array();
	$comms = $comm->read($start, $limit, $sort);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="row new">
			<form class="form" method="post">
				<h3>Новый комментарий</h3>
				<label for="name">Введите имя</label>
				<input type="text" class="form-control" placeholder="ФИО" id="name" name="name">
				<label for="name">Введите телефон</label>
				<input type="phone" class="form-control" placeholder="Телефон" id="phone" name="phone">
				<label for="name">Введите email</label>
				<input type="email" class="form-control" placeholder="Еmail" id="email" name="email">
				<div class="rating-area">
					<input type="radio" id="star-5" name="rating" value="5">
					<label for="star-5" title="Оценка «5»"></label>	
					<input type="radio" id="star-4" name="rating" value="4">
					<label for="star-4" title="Оценка «4»"></label>    
					<input type="radio" id="star-3" name="rating" value="3">
					<label for="star-3" title="Оценка «3»"></label>  
					<input type="radio" id="star-2" name="rating" value="2">
					<label for="star-2" title="Оценка «2»"></label>    
					<input type="radio" id="star-1" name="rating" value="1">
					<label for="star-1" title="Оценка «1»"></label>
				</div>
				<input type="hidden" class="hidden" placeholder="ФИО" name="name">
				<label for=""></label>
				<button class="btn btn-lg w-100 btn-warning" type="submit" id="button-form">Отправить</button>
			</form>

		</div>
	</div>
	<div class="container-fluid comments">
		<div class="row">
			<div class="col-sm-7">
				<h2>Архив комментариев</h2>
			</div>
			<div class="col-sm-5">
				<form action="?page=1" method="GET">
					<div class="form-row">
						<select  name="limit" class="form-control">
							<option  value="5">5</option>
							<option  value="10">10</option>
						</select>
					</div>
					<div class="form-row">
						<select name="sort" class="form-control">
						<option  value="-1">По убыванию</option>
						<option  value="1">По возрастанию</option>
					</select>
					</div>
					<input type="hidden" name="page" value="1">
					
					<div class="form-row"><input type="submit" class="form-control"></div>
				</form>
			</div>
			<div class="col-sm-2"></div>
		</div>
		<?php while($row = mysqli_fetch_assoc($comms)): ?>
		<div class="row comment">
			<div class="col-sm-3 a"><?=$row['name_c']?></div>
			<div class="col-sm-2 a"><?=$row['phone_c']?></div>
			<div class="col-sm-2 a"><?=$row['email_c']?></div>
			<div class="col-sm-3 a date"><?=$row['date_c']?></div>
			<div class="col-sm-2 a rating-result">
				<?php for($i = 0; $i<$row['rate_c']; ++$i): ?>
	           		<span class="active"></span>
	           	<?php  endfor; while($i<5): ?>	
	           		<span></span>
	           	<?php ++$i; endwhile; ?>   
            </div>
			
		</div>
		<?php endwhile; ?>
		<div class="row">
			<div class="pagination text-center">
			<?php for($i = 1; $i<=$pages; ++$i): ?>
				<a href="?page=<?=$i?>"><button class="btn btn-warning btn-pag"><?=$i?></button></a>
			<?php endfor; ?>
			</div>	
		</div>

	</div>
	



		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
</body>
</html>