<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['tipo']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" style="background-color: #F0F0F8;">
        <!--<li class="header">INFORMES</li> -->
        <li class=""><a href="home.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        <li class="header">GESTIONAR</li>
        
        <li class="treeview">
          <a href="#" >
            <i class="fa fa-users"></i>
            <span >Trabajadores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="background-color: #fff;">
            <li><a href="employee.php"><i class="fa fa-circle-o"></i> Lista de trabajadores</a></li>
            <li><a href="status.php"><i class="fa fa-circle-o"></i>Tipos de Trabajadores</a></li>
           <li><a href="levels.php"><i class="fa fa-circle-o"></i> Niveles de Instrucción</a></li>
          </ul>
        </li>

        <li class=""><a href="position.php"><i class="fa fa-suitcase"></i> <span>Cargos</span></a></li>

      <li class="treeview">
          <a href="#">
            <i class="fa fa-location-arrow"></i>
            <span>Ubicaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="background-color: #fff;">
            <li><a href="location.php"><i class="fa fa-circle-o"></i>Completa</a></li>
            <li><a href="institution.php"><i class="fa fa-circle-o"></i>Intituciones</a></li>
            <li><a href="district.php"><i class="fa fa-circle-o"></i>Distritos</a></li>
            <li><a href="departament.php"><i class="fa fa-circle-o"></i>Departamentos</a></li>
            <li><a href="area1.php"><i class="fa fa-circle-o"></i>Area laborales 1</a></li>
            <li><a href="area2.php"><i class="fa fa-circle-o"></i>Area laborales 2</a></li>
          </ul>
        </li>
        
        <li class=""><a href="assignment.php"><i class="fa fa-plus-circle"></i> <span>Asignaciones</span></a></li>
        <li class=""><a href="deduction.php"><i class="fa fa-remove"></i> <span>Deducciones</span></a></li>
        <li class=""><a href="payroll.php"><i class="fa fa-files-o"></i> <span>Nómina de sueldos</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>