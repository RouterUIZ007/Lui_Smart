<aside class="main-sidebar">

	<section class="sidebar">
		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller" || $_SESSION["perfil"] == "Secretaria" || $_SESSION["perfil"] == "Cajero"){
		    
			

			echo '<!-- Inicio -->
			<li class="treeview-active">
				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>';
		}

		if($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller"){
			
			echo'<!-- Presupuesto y ver presupuesto -->
			<li class="treeview">
				<a href="">
					<i class="fa fa-calculator"></i>
					<span>Presupuestos</span>
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				
				<ul class="treeview-menu">
				
					<li>
						<a href="presupuesto">
						<i class="fa fa-circle-o"></i>
						<span>Presupuestos</span>
						</a>
					</li>
					<li>
						<a href="ver-presupuestos">
						<i class="fa fa-circle-o"></i>
						<span>Ver Presupuestos</span>
						</a>
					</li>
				
				
				
				</ul>
			</li>';
		}

		if($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller" || $_SESSION["perfil"] == "Secretaria"){
			
			echo'<!-- Clientes -->
			<li class="treeview-active">
				<a href="clientes">
					<i class="fa fa-users"></i>
					<span>Clientes</span>
				</a>
			</li>


			<!-- Vehiculos -->
			<li class="treeview-active">
				<a href="vehiculos">
					<i class="fa fa-car"></i>
					<span>Vehiculos</span>
				</a>
			</li>';
		}

		if($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Cajero"){
		
			echo'<!-- Ventas -->
			<li class="treeview-active">
				<a href="venta">
					<i class="fa fa-shopping-basket"></i>
					<span>Ventas</span>
				</a>
			</li>';
		}

		if($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller" || $_SESSION["perfil"] == "Secretaria"){


			echo'<!-- Reportes -->
			<li class="treeview-active">
				<a href="reportes">
					<i class="fa fa-bar-chart"></i>
					<span>Reportes</span>
				</a>
			</li>';
		}

		if($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller"){

			echo'<!-- Usuarios -->
			<li class="treeview-active">
				<a href="usuarios">
					<i class="fa fa-user"></i>
					<span>Usuarios</span>
				</a>
			</li>';
		}
			
		
		echo'</ul>';
		?>
	</section>
	
</aside>