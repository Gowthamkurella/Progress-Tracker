<?php

include "connect.php";

session_start();

$sid = mysqli_query($con,"select distinct(student_id) as sid from learning_outcomes_credits where subject_id='SUB0104'");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Preskool - Students</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.png">
	
		<!-- Fontfamily -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
		
		<!-- Main Wrapper -->
        <div class="main-wrapper">
					
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Students</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</a></li>
									<li class="breadcrumb-item active">Students</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<style>
						.checked {
							color: orange;
							}
					</style>
				
					<div class="row">
						<div class="col-sm-12">
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Student Name</th>
													<th>Credits</th>
													<th>Rating</th>
													<th>View More details</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach($sid as $id)
													{
														$sid = $id['sid'];
														$query = "select s.student_name as student_name, ROUND(sum(l.credits)/4) as num from student s,learning_outcomes_credits l where l.subject_id='SUB0104' and l.student_id='$sid' and l.student_id=s.student_id";
														$run = mysqli_query($con,$query);
														foreach($run as $r)
														{
															echo '<tr>
																<td>'.$r['student_name'].'</td>
																<td>'.$r['num'].'</td>';
															$cc = (int)$r['num'];
															echo '<td>';
															for($i=1;$i<=$cc;$i++)
															{
																echo '<span class="fa fa-star checked"></span>';
															}
															$k = 6 - $i;
															for($i=0;$i<$k;$i++)
															{
																echo '<span class="fa fa-star"></span>';
															}
															echo '</td>';
															echo '<td><a href="exam-result-view.php?&sid='.$sid.'&suid=SUB0104">View</a></td>';
															echo '</tr>';
														}
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>							
						</div>					
					</div>					
				</div>

				<!-- Footer -->
				<!-- <footer>
					<p>Copyright © 2020 Dreamguys.</p>					
				</footer> -->
				<!-- /Footer -->				
			</div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.6.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
    </body>
</html>