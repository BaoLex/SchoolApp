<?php
session_start();
include "../db_con.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="../assets/style.css">

	<title>School App</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../index.html" class="brand">
			<i class='bx bx-user-circle'></i>
			<span class="text"><?php echo $_SESSION['username'] ?></span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="../index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="./student.php">
					<i class='bx bx-user' ></i>
					<span class="text">Student</span>
				</a>
			</li>
			<li>
				<a href="./teacher.php">
					<i class='bx bx-user' ></i>
					<span class="text">Teacher</span>
				</a>
			</li>
			<li>
				<a href="./staff.php">
					<i class='bx bx-user' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
			<li>
				<a href="./camera.php">
					<i class='bx bx-camera-movie' ></i>
					<span class="text">Camera Tracking</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../Logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
			</a>
			<a href="#" class="profile">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Student</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Student</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../index.php">Home</a>
						</li>
					</ul>
				</div>
			</div>

            <div class="table-data">
				<div class="order">
                    <?php
							include "../db_con.php";
                            if (isset($_GET["id"])){
                                $id = $_GET["id"];
                                $sql="SELECT * from students where student_id = '$id'";
                                $result=$conn-> query($sql);
                                if ($result-> num_rows > 0){
                                    while ($row=$result-> fetch_assoc()) {
						?>
					<div class="head">
						<h3><?=$row['fullname']?></h3>
					</div>
                    <form action="../controller/edit_student_controller.php" method="post">
						<div class="input-box">
							<input type="text" name="section" value="<?=$row['section']?>" required>
						</div>
						<div class="input-box">
							<input type="text" name="class" value="<?=$row['class']?>" required>
						</div>
						<div class="input-box">
							<input type="text" name="gender" value="<?=$row['gender']?>" required>
						</div>
						<div class="input-box">
							<input type="text" name="address" value="<?=$row['address']?>" required>
						</div>
						<div class="input-box">
							<input type="text" name="phone" value="<?=$row['phone']?>" required>
						</div>
						<div class="input-box button">
							<input type="Submit" name="submit" value="Save Changes">
						</div>
						<input type="hidden" name="fname" value="<?=$row['fullname']?>">
					</form>
                    <?php
								}
							}
                       	}
						?>
                </div>
            </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../assets/script.js"></script>
</body>
</html>