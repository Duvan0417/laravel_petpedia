<footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5>PetPedia</h5>
            <p>Tu plataforma integral para el cuidado y bienestar de tus mascotas.</p>
            <div class="social-icons">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
          <div class="col-md-2">
            <h5>Explorar</h5>
            <ul class="footer-links">
              <li><a href="#">Inicio</a></li>
              <li><a href="#">Tienda</a></li>
              <li><a href="#">Veterinaria</a></li>
              <li><a href="#">Adopciones</a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <h5>Soporte</h5>
            <ul class="footer-links">
              <li><a href="#">Centro de ayuda</a></li>
              <li><a href="#">Contacto</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h5>Suscríbete a nuestro boletín</h5>
            <p>Mantente al día con las últimas noticias y consejos para tus mascotas.</p>
            <div class="footer-newsletter">
              <input type="email" placeholder="Tu email">
              <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </div>
          </div>
        </div>
        <div class="copyright">
          <p>&copy; 2025 PetPedia. Todos los derechos reservados.</p>
          <ul class="policy-links">
            <li><a href="#">Términos de uso</a></li>
            <li><a href="#">Política de privacidad</a></li>
            <li><a href="#">Cookies</a></li>
          </ul>
        </div>
      </div>
    </footer>

<style>
    .footer {
  background: var(--dark-color);
  color: var(--light-color);
  padding: 50px 0 20px;
  margin-top: auto;
}

.footer h5 {
  color: white;
  margin-bottom: 20px;
  font-size: 1.1rem;
}

.footer p {
  opacity: 0.8;
  font-size: 0.9rem;
  line-height: 1.6;
}

.social-icons {
  display: flex;
  gap: 15px;
  margin-top: 20px;
}

.social-icons a {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  transition: all var(--transition-speed) ease;
}

.social-icons a:hover {
  background: var(--accent-color);
  transform: translateY(-3px);
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 12px;
}

.footer-links a {
  color: var(--gray-400);
  font-size: 0.9rem;
  transition: all var(--transition-speed) ease;
}

.footer-links a:hover {
  color: white;
  padding-left: 5px;
}

.footer-newsletter {
  position: relative;
  margin-top: 15px;
}

.footer-newsletter input {
  width: 100%;
  padding: 10px 50px 10px 15px;
  border: none;
  border-radius: 30px;
  background: rgba(255, 255, 255, 0.1);
  color: white;
}

.footer-newsletter input::placeholder {
  color: var(--gray-400);
}

.footer-newsletter input:focus {
  outline: none;
  background: rgba(255, 255, 255, 0.15);
}

.footer-newsletter button {
  position: absolute;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  background: var(--accent-color);
  border: none;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all var(--transition-speed) ease;
}

.footer-newsletter button:hover {
  background: var(--accent-light);
}

.copyright {
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  padding-top: 20px;
  margin-top: 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

.copyright p {
  margin: 0;
  font-size: 0.85rem;
}

.policy-links {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
}

.policy-links li {
  margin-left: 20px;
}

.policy-links a {
  color: var(--gray-400);
  font-size: 0.85rem;
}

.policy-links a:hover {
  color: white;
}
</style>
    