	<!-- SIDEBAR -->
<?php
    if($role=="admin"){?>
      
      <?php 
    }else if($role=="Member"){?>
      
      <?php
    }
?>
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx'></i>
			<span class="text">TrashGrab</span>
		</a>
		<?php
			if($role=="Admin"){?>
			<ul class="side-menu top">
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'index.php') !== false) echo 'class="active"'; ?>>
					<a href="index.php">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_member.php') !== false) echo 'class="active"'; ?>>
					<a href="function_member.php">
						<i class='bx bxs-group' ></i>
						<span class="text">User</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_pegawai.php') !== false) echo 'class="active"'; ?>>
					<a href="function_pegawai.php">
						<i class='bx bxs-group' ></i>
						<span class="text">Driver</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_katalog.php') !== false) echo 'class="active"'; ?>>
					<a href="function_katalog.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Katalog Sampah</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_area.php') !== false) echo 'class="active"'; ?>>
					<a href="function_area.php">
						<i class='bx bxs-map' ></i>
						<span class="text">Area</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_jadwal.php') !== false) echo 'class="active"'; ?>>
					<a href="function_jadwal.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Jadwal Penjemputan</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_transaksi.php') !== false) echo 'class="active"'; ?>>
					<a href="function_transaksi.php">
						<i class='bx bxs-shopping-bag-alt' ></i>
						<span class="text">Permintaan Penjemputan</span>
					</a>
				</li>
			</ul>			
			<?php 

			}else if($role=="Member"){?>
			<ul class="side-menu top">
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'index.php') !== false) echo 'class="active"'; ?>>
					<a href="dashboard_member.php">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_katalog.php') !== false) echo 'class="active"'; ?>>
					<a href="function_katalog.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Katalog Sampah</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_area.php') !== false) echo 'class="active"'; ?>>
					<a href="function_area.php">
						<i class='bx bxs-map' ></i>
						<span class="text">Area</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_jadwal.php') !== false) echo 'class="active"'; ?>>
					<a href="function_jadwal.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Jadwal Penjemputan</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'transaksi_tambah.php') !== false) echo 'class="active"'; ?>>
					<a href="transaksi_tambah.php">
						<i class='bx bxs-plus-circle' ></i>
						<span class="text">Tambah Permintaan</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_transaksimember.php') !== false) echo 'class="active"'; ?>>
					<a href="function_transaksimember.php">
						<i class='bx bxs-shopping-bag-alt' ></i>
						<span class="text">Permintaan Penjemputan</span>
					</a>
				</li>
			</ul>	
			<?php
			
			// ini alternatif buat page user, soalnya role dari session gabisa kebaca
			}else {?>
			<ul class="side-menu top">
								<li <?php if(strpos($_SERVER['PHP_SELF'], 'index.php') !== false) echo 'class="active"'; ?>>
					<a href="index.php">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_member.php') !== false) echo 'class="active"'; ?>>
					<a href="function_member.php">
						<i class='bx bxs-group' ></i>
						<span class="text">User</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_pegawai.php') !== false) echo 'class="active"'; ?>>
					<a href="function_pegawai.php">
						<i class='bx bxs-group' ></i>
						<span class="text">Driver</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_katalog.php') !== false) echo 'class="active"'; ?>>
					<a href="function_katalog.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Katalog Sampah</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_area.php') !== false) echo 'class="active"'; ?>>
					<a href="function_area.php">
						<i class='bx bxs-map' ></i>
						<span class="text">Area</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_jadwal.php') !== false) echo 'class="active"'; ?>>
					<a href="function_jadwal.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Jadwal Penjemputan</span>
					</a>
				</li>
				<li <?php if(strpos($_SERVER['PHP_SELF'], 'function_transaksi.php') !== false) echo 'class="active"'; ?>>
					<a href="function_transaksi.php">
						<i class='bx bxs-shopping-bag-alt' ></i>
						<span class="text">Permintaan Penjemputan</span>
					</a>
				</li>
			</ul>			
			<?php
			}
		?>
		<ul class="side-menu">
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->