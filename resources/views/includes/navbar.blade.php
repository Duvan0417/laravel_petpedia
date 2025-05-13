<div class="main-content">
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="toggle-sidebar mr-3">
            <i class="fas fa-bars"></i>
        </button>
        
        <a class="navbar-brand" href="#">
            <img src="{{asset('images/logo.jpg')}}" alt="Petpedia Logo">
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <i class="fas fa-th-large mr-2"></i>Categorías
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fas fa-drumstick-bite mr-2"></i>Alimentos</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-bone mr-2"></i>Juguetes</a>
                        <!-- Resto de categorías -->
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-percent mr-2"></i>Ofertas</a>
                </li>
                <!-- Resto de items -->
            </ul>
            
            <div class="d-flex align-items-center ml-auto nav-actions">
                <div class="search-container mr-3">
                    <input type="text" class="form-control search-input" placeholder="¿Qué estás buscando?">
                    <button class="btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                
                <a href="{{ route('shoppingcart.index') }}" class="cart-btn">
                    <i  class="fas fa-shopping-cart"></i>
                    <span  class="cart-badge">3</span>
                </a>
            </div>
        </div>
    </nav>
</div>

<style>
:root {
    --primary-color: #4E67EB;
    --secondary-color: #A1C6EA;
    --accent-color: #FF6B6B;
    --light-color: #F9F9F9;
    --dark-color: #2C3E50;
    --success-color: #4CAF50;
    --warning-color: #FFC107;
    --transition: all 0.3s ease;
}

.navbar {
    background: white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    padding: 0.8rem 2rem;
    margin-left: 80px; /* Ajustar dinámicamente con JS si el sidebar es toggleable */
    transition: var(--transition);
    position: sticky;
    top: 0;
    z-index: 900;
}

.navbar-brand img {
    height: 50px;
    transition: transform 0.3s ease;
}

.navbar-brand:hover img {
    transform: scale(1.05);
}

.search-container {
    position: relative;
    display: flex;
    align-items: center;
}

.search-input {
    border-radius: 30px;
    padding: 10px 20px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    transition: var(--transition);
    width: 250px;
    padding-right: 45px;
}

.search-input:focus {
    box-shadow: 0 0 0 3px rgba(78, 103, 235, 0.25);
    border-color: var(--primary-color);
}

.btn-search {
    position: absolute;
    right: 5px;
    background: var(--primary-color);
    color: white;
    border: none;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.btn-search:hover {
    background: #3955d8;
    transform: scale(1.1);
}

.cart-btn {
    position: relative;
    background: transparent;
    border: none;
    padding: 8px 12px;
    transition: var(--transition);
}

.cart-btn i {
    font-size: 1.5rem;
    color: var(--dark-color);
    transition: var(--transition);
}

.cart-btn:hover i {
    color: var(--primary-color);
    transform: translateY(-2px);
}

.cart-badge {
    position: absolute;
    top: 0;
    right: 0;
    background: var(--accent-color);
    color: white;
    font-size: 0.7rem;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

/* Responsive */
@media (max-width: 992px) {
    .navbar {
        margin-left: 0;
    }
    
    .search-container {
        width: 100%;
        margin: 10px 0;
    }
    
    .search-input {
        width: 100%;
    }
    
    .nav-actions {
        width: 100%;
        justify-content: space-between;
    }
}
</style>