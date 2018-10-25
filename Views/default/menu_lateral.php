            <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>

                    <!-- Opciones de Menu para Presupuesto-->
                    <li>
                    <a href="#"><i class="fa fa-sitemap"></i>Procesos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="#">Maestros<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo URL;?>Procesos/procesos"">Procesos</a>
                                    </li>
                                </ul>
                            </li>
                            
                           

                        </ul>
                    </li>
                    <!-- FIN Opciones de Menu para Presupuesto-->

                    <li>
                    <a href="#"><i class="fa fa-sitemap"></i>Configuración<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Control de Códigos Automaticos</a>
                            </li>
                            <li>
                                <a href="<?php echo URL;?>User/user">Usuarios</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo URL;?>User/destroySession"><i class="fa fa-edit"></i> Salir... </a>
                    </li>

                    
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->