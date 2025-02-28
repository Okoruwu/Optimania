<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="/admin"> <img style="width: 100%; height: auto; padding:15px;" alt="image" src="/img/logo.png" class="header-logo" /></a>
            </div>
            <div class="sidebar-user">
                <div class="sidebar-user-picture">
                    <img alt="image" src="<?php echo $fPerfil; ?>">
                </div>
                <div class="sidebar-user-details">
                    <div class="user-name"><?php echo ($UserData['nombre']);?></div>
                    <div class="user-role"><?php echo $rol; ?></div>
                    
                </div>
            </div>
          
            <ul class="sidebar-menu">
            <li class="menu-header">Panel de control</li>
            <li class="dropdown"><a href="/admin" class="nav-link"><i data-feather="monitor"></i><span>Resumen</span></a></li>
            <li class="dropdown"><a href="/admin/usuarios" class="nav-link"><i data-feather="users"></i><span>Usuarios</span></a></li>
            
            <li class="menu-header active">Tienda</li>
            <li class="dropdown"><a href="/admin/productos" class="nav-link"><i data-feather="layers"></i><span>Todos los productos</span></a></li>
            <li class="dropdown"><a href="/admin/nuevo/producto" class="nav-link"><i data-feather="plus-square"></i><span>Nuevo producto</span></a></li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="corner-right-down"></i><span>Más</span></a>
                <ul class="dropdown-menu">
                    <li><a href="/admin/nuevo/categoria">Categorias</a></li>
                    <li><a href="/admin/nuevo/tag">Tags</a></li>
                    <li><a href="/admin/nuevo/caracteristica">Característica</a></li>
                </ul>
            </li>
            
            <li class="menu-header active">Blog</li>
            <li class="dropdown"><a href="/admin/blog" class="nav-link"><i data-feather="layers"></i><span>Todas las entradas</span></a></li>
            <li class="dropdown"><a href="/admin/nuevo/blog" class="nav-link"><i data-feather="layers"></i><span>Nuevo</span></a></li>
            <li class="menu-header active">Pedidos</li>
            <li class="dropdown"><a href="/admin/pedidos" class="nav-link"><i data-feather="dollar-sign"></i><span>Todos los pedidos</span></a></li>
            
            <li class="menu-header active">Configuracion</li>
            <li class="dropdown"><a href="/admin/msg-estado" class="nav-link"><i data-feather="layers"></i><span>Mensajes de status</span></a></li>
            <li class="dropdown"><a href="/" class="nav-link"><i data-feather="layers"></i><span>Ver sitio</span></a></li>
            
          </ul>
        </aside>
    </div>