    <!-- Mobile Menu Drawer -->
    <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
    <div class="mobile-menu" id="mobileMenu">
      <nav class="mobile-menu-nav">
        <a href="#" class="mobile-menu-link">Acasa</a>
        <a href="#" class="mobile-menu-link">De pe la evenimente</a>
        <a href="#" class="mobile-menu-link">Despre noi</a>
        <a href="#" class="mobile-menu-link">Contact</a>
      </nav>

      <button class="mobile-menu-reserve-btn">
        <span>Rezervă Experiența</span>
        <i class="fa-solid fa-calendar-check"></i>
      </button>

      <div class="copyright-mobile-menu">
        &copy; <span id="year"></span> Panda Booth. Toate drepturile rezervate.
      </div>

      <!-- Navbar Prompt for Mobile 320px -->
    </div>

    <!-- NAVIGATION BAR -->
    <nav class="navbar">
      <!-- Logo -->
      <div class="navbar-logo">
        <img
          src="media/logo-panda-booth.png"
          alt="Panda Booth"
          class="logo-img"
        />
      </div>

      <!-- AI Prompt -->
      <div class="navbar-prompt">
        <div class="input-wrapper">
          <input
            type="text"
            class="ai-prompt-input"
            placeholder="Scrie data si Panda cauta daca este liberă (ex: 20.08.2026 sau 12 august 2026)..."
          />
          <button class="input-submit-btn" type="submit">
            <i class="fa-solid fa-arrow-right"></i>
          </button>
        </div>
        <div class="availability-container">
          <div class="navbar-phone">
            <span class="phone-number">
              <i class="fa-solid fa-square-phone"></i> <a href="tel:+40726144144" style="color: inherit; text-decoration: none; cursor: pointer;">0726.144.144</a></span
            >
          </div>
          <p class="disponibilitate hidden">
            <i class="fa-solid fa-check"></i> Data este disponibilă!
          </p>
          <button class="btn-reserve-now hidden">
            <span>Rezervă acum</span>
            <i class="fa-solid fa-calendar-check"></i>
          </button>
          <p class="disponibilitate hidden">
            <i class="fa-solid fa-ban"></i> Data nu este disponibilă!
          </p>
        </div>
      </div>

      <!-- Phone Number - Visible only at 320px -->
      <div class="navbar-phone-320">
        <span class="phone-number">
          <i class="fa-solid fa-square-phone"></i> <a href="tel:+40726144144" style="color: inherit; text-decoration: none; cursor: pointer;">0726.144.144</a></span
        >
      </div>

      <!-- Right Section: Phone + Burger -->
      <div class="navbar-right">
        <!-- Burger Menu -->
        <button class="burger-menu" id="burgerMenu">
          <span class="burger-line"></span>
          <span class="burger-line"></span>
          <span class="burger-line"></span>
        </button>
      </div>
    </nav>

    <!-- Mobile Prompt for 320px - Under Navbar -->
    <div class="navbar-prompt-mobile-320">
      <div class="input-wrapper">
        <input
          type="text"
          class="ai-prompt-input"
          placeholder="Scrie data si Panda cauta daca este liberă (ex: 20.08.2026 sau 12 august 2026)..."
        />
        <button class="input-submit-btn" type="submit">
          <i class="fa-solid fa-arrow-right"></i>
        </button>
      </div>

      <div class="availability-container">
        <p class="disponibilitate hidden">
          <i class="fa-solid fa-check"></i> Data este disponibilă!
        </p>
        <button class="btn-reserve-now hidden">
          <span>Rezervă acum</span>
          <i class="fa-solid fa-calendar-check"></i>
        </button>
        <p class="disponibilitate hidden">
          <i class="fa-solid fa-ban"></i> Data nu este disponibilă!
        </p>
      </div>
    </div>
