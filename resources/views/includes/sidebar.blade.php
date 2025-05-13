<div class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        <span class="logo-text">PetPedia</span>
    </div>
    <div class="sidebar-menu">
        <a href="#" class="menu-item">
            <i class="fas fa-home"></i>
            <span>Inicio</span>
        </a>
        <a href="#" class="menu-item">
            <i class="fas fa-shopping-cart"></i>
            <span>Compra</span>
        </a>
        <a href="#" class="menu-item">
            <i class="fas fa-clinic-medical"></i>
            <span>Veterinaria</span>
        </a>
        <a href="#" class="menu-item">
            <i class="fas fa-paw"></i>
            <span>Adopciones</span>
        </a>
        <a href="#" class="menu-item">
            <i class="fas fa-comments"></i>
            <span>Foro</span>
        </a>
        <a href="#" class="menu-item">
            <i class="fas fa-user"></i>
            <span>Perfil</span>
        </a>
        <a href="#" class="menu-item">
            <i class="fas fa-cog"></i>
            <span>Configuración</span>
        </a>
    </div>
</div>

<style>
:root {
    --dark-color: #2c3e50;
    --light-color: #ecf0f1;
    --accent-color: #3498db;
    --transition-normal: all 0.3s ease;
}

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 80px;
    height: 100%;
    background: var(--dark-color);
    transition: width 0.3s ease;
    overflow-x: hidden;
    z-index: 1000;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
}

.sidebar:hover {
    width: 240px;
}

.sidebar-header {
    padding: 20px 15px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.logo {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
}

.logo-text {
    color: white;
    font-weight: 600;
    font-size: 18px;
    margin-left: 15px;
    white-space: nowrap;
    opacity: 0;
    transition: opacity 0.3s ease 0.1s; /* Agregado delay */
}

.sidebar:hover .logo-text {
    opacity: 1;
}

.sidebar-menu {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    padding-top: 15px;
}

.menu-item {
    display: flex;
    align-items: center;
    padding: 15px 20px;
    color: var(--light-color);
    text-decoration: none;
    transition: var(--transition-normal);
    margin: 5px 0;
    border-left: 3px solid transparent;
}

.menu-item.active {
    background: rgba(255, 255, 255, 0.1);
    border-left: 3px solid var(--accent-color);
}

.menu-item:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
}

.menu-item i {
    font-size: 1.5rem;
    min-width: 30px;
    text-align: center;
}

.menu-item span {
    margin-left: 15px;
    white-space: nowrap;
    opacity: 0;
    transition: opacity 0.2s ease 0.1s;
}

.sidebar:hover .menu-item span {
    opacity: 1;
}
</style>