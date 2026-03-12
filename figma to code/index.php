
<!doctype html>
<html lang="ro">
  <?php 
  $page_title = "Cabina foto cu AI"; 
  $page_description = "Cabina foto PandaBooth pentru nunți, botezuri și evenimente corporate în Iași.";
  ?>
  
  <?php include 'include/head.php'; ?>
  <body>
    <!-- LOADER -->
    <div class="loader-container" id="loaderContainer">
      <div class="loader-content">
        <div class="circular-progress">
          <svg viewBox="0 0 100 100">
            <defs>
              <linearGradient id="progressGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#ff6b6b;stop-opacity:1" />
                <stop offset="25%" style="stop-color:#ff8c42;stop-opacity:1" />
                <stop offset="50%" style="stop-color:#ffd93d;stop-opacity:1" />
                <stop offset="75%" style="stop-color:#6bcf7f;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#ff8787;stop-opacity:1" />
              </linearGradient>
            </defs>
            <circle cx="50" cy="50" r="45" class="progress-circle-bg"></circle>
            <circle cx="50" cy="50" r="45" class="progress-circle" id="progressCircle"></circle>
          </svg>
          <div class="progress-text">
            <span id="progressPercent">0</span>%
          </div>
        </div>
        <p class="loader-text">Se încarcă...</p>
      </div>
    </div>

    <?php include 'include/navbar.php'; ?>

    <!-- Wrapper general pozicionat relativ ca sa iasa cardul in afara -->
    <div class="hero-wrapper">
      <!-- VIDEO CU MASCA -->
      <div class="hero-video-container hero-mask">
        <video
          autoplay
          muted
          loop
          playsinline
          src="media/video-hero.mp4"
          class="hero-video"
        ></video>

        <div class="hero-video-overlay"></div>
      </div>

      <!-- MOBILE VIDEO 480px -->
      <div class="hero-mobile-video-480">
        <video
          autoplay
          muted
          loop
          playsinline
          src="media/video-hero.mp4"
        ></video>
      </div>

      <!-- CONTINUT HERO -->
      <div class="hero-content">
        <!-- Google Reviews Badge -->
        <div class="google-reviews-badge">
          <img
            class="google-logo"
            src="media/google-logo.png"
            alt="Google Reviews"
            width="24"
            height="24"
          />
          <div class="google-reviews-text">
            <span class="google-label">Google Reviews</span>
            <div class="google-rating">
              <span class="rating-score">5.0</span>
              <span class="rating-stars">★★★★★</span>
            </div>
          </div>
        </div>

        <h1 class="hero-title">Cabina Foto cu AI</h1>
        <p class="hero-description">
          O experiență sofisticată, cu fotografii create instant și rafinate
          prin <span class="glass-highlight">inteligență</span>
          <span class="glass-highlight">artificială</span>. Perfectă pentru
          nunți, gale, evenimente corporate și momente ce merită un strop de
          exclusivitate.
        </p>
        <div class="hero-buttons">
          <button class="btn-primary">
            <span>Rezervă Experiența</span>
            <i class="fa-solid fa-calendar-check"></i>
          </button>
          <button class="btn-secondary">
            Verifică disponibilitatea <i class="fa-regular fa-calendar"></i>
          </button>
        </div>
      </div>

      <!-- CARD MAGENTA — pozitionat sa iasa din hero in treapta dreapta-jos -->
      <!-- In design: left=1110px din 1440 = 77.08%, top=468px din 588 = 79.59% -->
      <!-- Cardul are 330x120px, deci iese cu ~(588-468-120)=0px sub hero, perfect in treapta -->
      <div class="card-magenta">
        <!-- Stanga: iconite social -->
        <div class="card-magenta-left">
          <div class="card-magenta-left-top"></div>
          <div class="card-magenta-left-bottom">
            <!-- Facebook icon -->
            <button class="social-btn">
              <i class="fa-brands fa-square-facebook"></i>
            </button>
            <!-- Instagram icon -->
            <button class="social-btn">
              <i class="fa-brands fa-square-instagram"></i>
            </button>
          </div>
        </div>

        <!-- Dreapta: titlu + text -->
        <div class="card-magenta-right">
          <div class="card-magenta-title">
            Zâmbește!
            <div class="card-magenta-heart-icon">
              <svg
                viewBox="0 0 24 24"
                fill="white"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"
                />
              </svg>
            </div>
          </div>
          <div class="card-magenta-text">
            Alege-ți accesoriile și creează amintiri instantanee.
            <br />Distracția începe aici!
          </div>
        </div>
      </div>
    </div>

    <!-- SERVICII SECTION -->
    <section class="servicii-section">
      <div class="servicii-container">
        <div class="servicii-header">
          <p class="servicii-label">Servicii</p>
          <h2 class="servicii-title">Ce te așteaptă la eveniment?</h2>
          <p class="servicii-description">
            <span class="spanBold">Panda Booth</span> ți-a pregătit o experiență plină de energie, unde momentele memorabile se împletesc cu surprizele la tot pasul. De la decoruri instagramabile la interacțiuni autentice, fiecare detaliu este gândit să te inspire. Pregătește-te să colecționezi zâmbete și povești noi!
          </p>
        </div>

        <div class="servicii-cards">
          <!-- Card 1 -->
          <div class="servicii-card">
            <div class="servicii-card-image">
              <img src="media/card-1.jpg" alt="Cabină foto modernă cu AI" />
            </div>
            <div class="servicii-card-content">
              <div class="servicii-card-title-wrapper">
                <h3 class="servicii-card-title">Cabină foto modernă cu AI</h3>
                <span class="servicii-tag servicii-tag-blue">Tehnologie</span>
              </div>
              <p class="servicii-card-text">
                Venim cu echipamente de generație nouă și software cu licență pentru fiecare eveniment.
              </p>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="servicii-card">
            <div class="servicii-card-image">
              <img src="media/card-2.jpg" alt="Accesorii variate și creative" />
            </div>
            <div class="servicii-card-content">
              <div class="servicii-card-title-wrapper">
                <h3 class="servicii-card-title">Accesorii variate și creative</h3>
                <span class="servicii-tag servicii-tag-green">Divertisment</span>
              </div>
              <p class="servicii-card-text">
                Pălării, ochelari, perici, props-uri haoase și alte accesorii care te vor transforma în starul petrecerii.
              </p>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="servicii-card">
            <div class="servicii-card-image">
              <img src="media/card-3.jpg" alt="Tipărire sau download instant" />
            </div>
            <div class="servicii-card-content">
              <div class="servicii-card-title-wrapper">
                <h3 class="servicii-card-title">Tipărire sau download instant</h3>
                <span class="servicii-tag servicii-tag-purple">Rapiditate</span>
              </div>
              <p class="servicii-card-text">
                Invitații tăi vor primi amintiri fizice în căteva secunde, gata de luat acasă.
              </p>
            </div>
          </div>
        </div>

        <div class="servicii-explore-wrapper">
          <button class="btn-explore">
            <span class="btn-explore-text">Explorează</span>
            <img src="media/logo-icon.png" alt="Panda" class="btn-explore-panda" />
          </button>
        </div>
      </div>
    </section>

    <!-- PROCES SECTION -->
    <section class="proces-section">
      <div class="proces-background-shape"></div>
      <div class="proces-container">
        <p class="proces-label">Procesul</p>
        <h2 class="proces-title">Trei pași simpli pentru a începe.</h2>
        <p class="proces-description">
          Rezervarea este foarte simplă și ușoară. Verifică doar disponibilitatea instant cu ajutorul asistentului nostru AI, apoi alege pachetul potrivit evenimentului și lasă restul pe seama ursulețului Panda.
        </p>

        <div class="proces-steps">
          <!-- Step 1 -->
          <div class="proces-step">
            <div class="proces-step-icon">
              <i class="fa-solid fa-hand-peace"></i>
            </div>
            <h3 class="proces-step-title">Verifică disponibilitatea cu AI</h3>
            <p class="proces-step-text">
              Sistemul nostru inteligent îți arată instant dacă data este sau nu disponibilă.
            </p>
          </div>

          <!-- Step 2 -->
          <div class="proces-step">
            <div class="proces-step-icon">
              <i class="fa-solid fa-shopping-cart"></i>
            </div>
            <h3 class="proces-step-title">Alege pachetul potrivit</h3>
            <p class="proces-step-text">
              Selectează din opțiunile noastre personalizate și adaptează experiența la bugetul dorit.
            </p>
          </div>

          <!-- Step 3 -->
          <div class="proces-step">
            <div class="proces-step-icon">
              <i class="fa-solid fa-champagne-glasses"></i>
            </div>
            <h3 class="proces-step-title">Bucură-te de ziua ta</h3>
            <p class="proces-step-text">
              Panda are totul pregătit. Rămâne doar să obținem amintiri de la cei prezenți.
            </p>
          </div>
        </div>

        <div class="proces-button-wrapper">
          <button class="btn-check-date">
            <span class="btn-check-date-text">Verifică data</span>
            <img src="media/logo-icon.png" alt="Panda" class="btn-check-date-panda" />
          </button>
        </div>
      </div>
    </section>

    <!-- AI SECTION -->
    <section class="ai-section">
      <div class="ai-container">
        <p class="ai-label">AI - Inteligență Artificială</p>
        <h2 class="ai-title">Mesaje generate automat pentru fiecare print</h2>
        <p class="ai-description">
         <span class="spanBold">Panda Booth AI</span> învață stilul evenimentului și generează automat mesaje pentru fiecare invitat.
        </p>

        <div class="ai-content">
          <div class="ai-card">
            <p class="ai-card-label">Smart</p>
            <h3 class="ai-card-title">Sistemul nostru scrie automat texte pentru invitații</h3>
            <p class="ai-card-text">
              Fiecare mesaj se simte autentic pentru că este conceput pentru povestea evenimentului. Panda Booth AI înțelege tonul, umorul și natura celor prezenți. Invitații tăi vor pleca cu “profeții” amuzante scrise pe fotografiile printate pe loc. Și dacă vrei să personalizezi mesajele, poți adăuga un input suplimentar pentru a ghida AI-ul în generarea textelor.
            </p>
            <button class="btn-ai-contact">Contact</button>
          </div>

          <div class="ai-image">
            <img src="media/panda-just-married.jpg" alt="Panda Just Married" />

      </div>
    </section>

    <!-- PRICING SECTION -->
    <section class="pricing-section">
      <div class="pricing-container">
        <p class="pricing-label">Planuri</p>
        <h2 class="pricing-title">Magia noastră este incompletă fără tine</h2>
        <p class="pricing-description">
          Ești gata pentru un strop de magie? Alege momentul tău și hai să punem planul în aplicare! Nu suntem doar un serviciu, suntem o stare de spirit. Hai alături de noi și alege pachetul care îți face inima să sară de bucurie! ❤️
        </p>

        <div class="pricing-cards">
          <!-- Card 1: Clasic -->
          <div class="pricing-card">
            <h3 class="pricing-card-title">Clasic</h3>
            <div class="pricing-card-price">€ 250</div>
            <ul class="pricing-card-features">
              <li><i class="fa-solid fa-check"></i> prezență 4 ore</li>
              <li><i class="fa-solid fa-check"></i> fotografii printate limitate</li>
              <li><i class="fa-solid fa-check"></i> propsuri basic</li>
              <li><i class="fa-solid fa-check"></i> download direct inclus</li>
              <li><i class="fa-solid fa-check"></i> template personalizat</li>
              <li><i class="fa-solid fa-check"></i> asistență pe tot parcursul evenimentului</li>
              <li><i class="fa-solid fa-check"></i> plicuri pentru fotografii</li>
            </ul>
            <button class="pricing-card-button">Rezervă</button>
          </div>

          <!-- Card 2: Sufletul Petrecerii (Featured) -->
          <div class="pricing-card pricing-card-featured">
            <div class="pricing-card-banner">Most Wanted</div>
            <h3 class="pricing-card-title">Sufletul Petrecerii</h3>
            <div class="pricing-card-price">€ 500</div>
            <ul class="pricing-card-features">
              <li><i class="fa-solid fa-check"></i> prezență 6 ore</li>
              <li><i class="fa-solid fa-check"></i> AI integrat inclusiv mesajele haioase</li>
              <li><i class="fa-solid fa-check"></i> fotografii printate nelimitate</li>
              <li><i class="fa-solid fa-check"></i> propsuri basic</li>
              <li><i class="fa-solid fa-check"></i> download direct inclus</li>
              <li><i class="fa-solid fa-check"></i> template personalizat</li>
              <li><i class="fa-solid fa-check"></i> asistență pe tot parcursul evenimentului</li>
              <li><i class="fa-solid fa-check"></i> plicuri pentru fotografii</li>
              <li><i class="fa-solid fa-check"></i> magneți pentru fiecare print</li>
            </ul>
            <button class="pricing-card-button">Rezervă</button>
          </div>

          <!-- Card 3: Magie fără limite -->
          <div class="pricing-card">
            <h3 class="pricing-card-title">Magie fără limite</h3>
            <div class="pricing-card-price">€ 800</div>
            <ul class="pricing-card-features">
              <li><i class="fa-solid fa-check"></i> prezență 7 ore</li>
              <li><i class="fa-solid fa-check"></i> AI integrat inclusiv mesajele haioase</li>
              <li><i class="fa-solid fa-check"></i> fotografii printate nelimitate</li>
              <li><i class="fa-solid fa-check"></i> propsuri premium și în ton cu evenimentul</li>
              <li><i class="fa-solid fa-check"></i> download direct inclus</li>
              <li><i class="fa-solid fa-check"></i> template personalizat</li>
              <li><i class="fa-solid fa-check"></i> asistență pe tot parcursul evenimentului</li>
              <li><i class="fa-solid fa-check"></i> plicuri și magneți pentru fotografii</li>
              <li><i class="fa-solid fa-check"></i> album mărturii inclus</li>
            </ul>
            <button class="pricing-card-button">Rezervă</button>
          </div>
        </div>
      </div>
    </section>

    <!-- VIDEOS SLIDER SECTION -->
    <section class="videos-section">
      <div class="videos-container">
        <div class="videos-header">
          <h2 class="videos-title">Vezi cabina foto Panda Booth în acțiune</h2>
        </div>

        <div class="videos-slider-wrapper">
          <button class="videos-arrow videos-arrow-prev" id="videosArrowPrev">
            <i class="fa-solid fa-chevron-left"></i>
          </button>

          <div class="videos-slider" id="videosSlider">
            <div class="video-item">
              <video src="media/cabina-foto-2.mp4" poster="media/cabina-foto-2.jpg" playsinline preload="metadata"></video>
              <button class="video-play-btn"><i class="fa-solid fa-play"></i></button>
            </div>
            <div class="video-item">
              <video src="media/cabina-foto-3.mp4" poster="media/cabina-foto-3.jpg" playsinline preload="metadata"></video>
              <button class="video-play-btn"><i class="fa-solid fa-play"></i></button>
            </div>
            <div class="video-item">
              <video src="media/cabina-foto-4.mp4" poster="media/cabina-foto-4.jpg" playsinline preload="metadata"></video>
              <button class="video-play-btn"><i class="fa-solid fa-play"></i></button>
            </div>
            <div class="video-item">
              <video src="media/cabina-foto-5.mp4" poster="media/cabina-foto-5.jpg" playsinline preload="metadata"></video>
              <button class="video-play-btn"><i class="fa-solid fa-play"></i></button>
            </div>
            <div class="video-item">
              <video src="media/cabina-foto-6.mp4" poster="media/cabina-foto-6.jpg" playsinline preload="metadata"></video>
              <button class="video-play-btn"><i class="fa-solid fa-play"></i></button>
            </div>
            <div class="video-item">
              <video src="media/cabina-foto-7.mp4" poster="media/cabina-foto-7.jpg" playsinline preload="metadata"></video>
              <button class="video-play-btn"><i class="fa-solid fa-play"></i></button>
            </div>
            <div class="video-item">
              <video src="media/cabina-foto-8.mp4" poster="media/cabina-foto-8.jpg" playsinline preload="metadata"></video>
              <button class="video-play-btn"><i class="fa-solid fa-play"></i></button>
            </div>
          </div>

          <button class="videos-arrow videos-arrow-next" id="videosArrowNext">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="faq-section" id="faqs">
      <div class="faq-container">
        <div class="faq-left">
          <h2 class="faq-title">Întrebări adresate frecvent</h2>
          <p class="faq-description">
            Am pregătit un set de întrebări primite mai des din partea celor care au dorit să colaboreze cu noi. Mai jos se regăsește tot ce trebuie să știi despre cabina foto <span class="spanBold">Panda Booth AI</span> înainte de a lua o decizie.<br />
            Nu găsești răspunsul? Suntem aici pentru a te ajuta 24/7.
          </p>
          <button class="faq-contact-btn">Contactează suportul!</button>
        </div>

        <div class="faq-right">
          <div class="faq-item">
            <button class="faq-question">
              <span>Cât timp este disponibilă cabina foto la eveniment?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Durata standard este de obicei între 4 și 7 ore, însă putem adapta pachetul în funcție de nevoile tale.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              <span>Ce tipuri de evenimente acoperiți?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Cabina foto este potrivită pentru nunți, botezuri, aniversări, petreceri corporate, baluri, lansări de produse și orice alt tip de eveniment unde vrei să adaugi un plus de distracție.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              <span>Oferiți printuri nelimitate?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Da, majoritatea pachetelor includ printuri nelimitate pe durata evenimentului, astfel încât fiecare invitat să plece acasă cu o amintire.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              <span>Putem personaliza template-ul fotografiilor?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Absolut. Putem integra numele, data, logo-ul sau tema evenimentului pentru un design unic.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              <span>Aveti recuzita (props)?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Da, venim cu o gamă variată de accesorii amuzante: pălării, ochelari, pancarte, măști și multe altele.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              <span>Cât spațiu este necesar pentru instalarea cabinei foto?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>În general, avem nevoie de aproximativ 2×2 metri și o priză în apropiere.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              <span>Cât timp durează montarea și demontarea?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Montarea durează aproximativ 20–30 de minute, iar demontarea în jur de 15 minute. Acestea nu sunt incluse în timpul de funcționare al cabinei.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              <span>Primesc și fotografiile în format digital?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Da, la finalul evenimentului îți oferim toate fotografiile în format digital prin link online.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              <span>Este prezent un operator pe durata evenimentului?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Da, un operator se ocupă de cabina foto pe tot parcursul evenimentului pentru a se asigura că totul funcționează perfect.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question">
              <span>Ce face AI-ul?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>AI‑ul îmbunătățește automat fotografiile și transformă imaginile sau mesajele alese în rezultate creative și personalizate, gata de printat sau distribuit.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

     <!-- CONTACT CTA SECTION -->
    <section class="contact-cta-section">
      <div class="contact-cta-container">
        <h3 class="contact-cta-title">Ai alte întrebări?</h3>
        <p class="contact-cta-description">Suntem aici pentru orice neclaritate apare.</p>
        <a href="tel:0726144144" class="contact-cta-btn">
          <i class="fa-solid fa-phone"></i>
          <span>Sună acum: 0726 144 144</span>
        </a>
      </div>
    </section>

    <!-- REVIEWS SECTION -->
    <section class="reviews-section">
      <div class="reviews-wrapper">
        <!-- Google Reviews Badge -->
        <div class="reviews-badge">
          <div class="badge-left">
            <div class="badge-google-logo">
              <img src="media/google-logo.png" alt="Google" />
            </div>
            <div class="badge-text">
              <p class="badge-label">Excelent pe Google</p>
              <div class="badge-rating">
                <span class="rating-score">5.0</span>
                <span class="rating-stars">★★★★★</span>
                <span class="rating-count">(40)</span>
              </div>
            </div>
          </div>
          <button class="badge-btn">Lasă-ne un review!</button>
        </div>

        <!-- Reviews Slider -->
        <div class="reviews-slider-container">
          <button class="reviews-arrow reviews-arrow-prev" id="reviewsArrowPrev">
            <i class="fa-solid fa-chevron-left"></i>
          </button>

          <div class="reviews-slider" id="reviewsSlider">
            <!-- Review 1 -->
            <div class="review-card">
              <div class="review-stars">★★★★★</div>
              <p class="review-text">Am colaborat cu Panda Booth la un botez si au fost unul din principalele puncte de atractie ale evenimentului.</p>
              <a href="#" class="review-more">Read more...</a>
              <div class="review-author">
                <img src="media/avatar-1.jpg" alt="Andreea Strateanu" class="review-avatar" />
                <div class="review-author-info">
                  <p class="review-name">Andreea Strateanu</p>
                  <p class="review-date">3 months ago</p>
                </div>
              </div>
            </div>

            <!-- Review 2 -->
            <div class="review-card">
              <div class="review-stars">★★★★★</div>
              <p class="review-text">Am colaborat cu Panda Booth la un botez si a fost unul din principalele puncte de atractie ale evenimentului.</p>
              <a href="#" class="review-more">Read more...</a>
              <div class="review-author">
                <img src="media/avatar-1.jpg" alt="Andreea Strateanu" class="review-avatar" />
                <div class="review-author-info">
                  <p class="review-name">Andreea Strateanu</p>
                  <p class="review-date">3 months ago</p>
                </div>
              </div>
            </div>

            <!-- Review 3 -->
            <div class="review-card">
              <div class="review-stars">★★★★★</div>
              <p class="review-text">Am colaborat cu Panda Booth la un botez si a fost unul din principalele puncte de atractie ale evenimentului.</p>
              <a href="#" class="review-more">Read more...</a>
              <div class="review-author">
                <img src="media/avatar-1.jpg" alt="Andreea Strateanu" class="review-avatar" />
                <div class="review-author-info">
                  <p class="review-name">Andreea Strateanu</p>
                  <p class="review-date">3 months ago</p>
                </div>
              </div>
            </div>

            <!-- Review 4 -->
            <div class="review-card">
              <div class="review-stars">★★★★★</div>
              <p class="review-text">Am colaborat cu Panda Booth la un botez si a fost unul din principalele puncte de atractie ale evenimentului.</p>
              <a href="#" class="review-more">Read more...</a>
              <div class="review-author">
                <img src="media/avatar-1.jpg" alt="Andreea Strateanu" class="review-avatar" />
                <div class="review-author-info">
                  <p class="review-name">Andreea Strateanu</p>
                  <p class="review-date">3 months ago</p>
                </div>
              </div>
            </div>
          </div>

          <button class="reviews-arrow reviews-arrow-next" id="reviewsArrowNext">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>

        <!-- Availability Check Section -->
        <div class="availability-check">
          <h3 class="availability-title">Verifică disponibilitatea instant</h3>
          <p class="availability-subtitle">Alege data evenimentului și primești instant răspunsul.</p>
          <div class="availability-form">
            <input type="date" class="availability-input" id="reviewsAvailabilityInput" 
                   name="event-date" required />
            <button class="availability-btn" id="reviewsAvailabilityBtn">Verifică</button>
          </div>
          <div id="reviewsAvailabilityResponse" class="availability-response" style="display: none; margin-top: 16px;">
            <p id="reviewsAvailableMsg" class="availability-available" style="display: none; margin: 0; padding: 12px 16px; background-color: #d4edda; color: #155724;">
              ✅ <strong>Data este disponibilă!</strong> Contactează-ne pentru a finaliza rezervarea.
            </p>
            <p id="reviewsUnavailableMsg" class="availability-unavailable" style="display: none; margin: 0; padding: 12px 16px; background-color: #f8d7da; color: #721c24;">
              ❌ <strong>Data nu este disponibilă.</strong> Te rugăm alege o altă dată.
            </p>
          </div>
          <p class="availability-disclaimer">Prin selectarea datei ești de acord cu Termenii și Condițiile noastre</p>
        </div>
      </div>
    </section>

    <!-- PANDA CHALLENGE GAME SECTION -->
    <section class="game-section">
      <div class="game-container">
        <div class="game-header">
          <div class="game-title-wrapper">
            <img src="media/logo-icon.png" alt="Panda Booth" class="panda-emoji" />
            <h2 class="game-title">Panda Speed Challenge</h2>
          </div>
          <div class="game-timer-wrapper" id="gameTimerWrapper">
            <span class="timer-icon">⏰</span>
            <span class="game-timer" id="gameTimer">18</span>
            <span class="timer-unit">s</span>
          </div>
        </div>

        <div class="game-content">
          <p class="game-description">Găsește toate perechile în 18 secunde și câștigi reducere de 10%!</p>
          
          <!-- Start Screen -->
          <div id="gameStartScreen" class="game-screen active">
            <button class="game-start-btn" id="gameStartBtn">Pornește Provocarea! 🚀</button>
          </div>

          <!-- Game Board -->
          <div class="game-board" id="gameBoard"></div>

          <!-- Fail Screen -->
          <div id="gameFailScreen" class="game-screen" style="display: none;">
            <p class="fail-message">⏰ Timpul a expirat!</p>
            <button class="game-start-btn" id="gameRetryBtn">Mai încearcă o dată</button>
          </div>

          <!-- Win Screen -->
          <div id="gameWinScreen" class="game-screen" style="display: none;">
            <p class="win-message">🎉 Felicitări! Ai fost super rapid!</p>
            <p class="reward-subtitle">Codul tău de reducere 10% este:</p>
            <div class="coupon-box" id="generatedCouponCode">PANDA10</div>
            <p class="email-subtitle">Codul devine activ in momentul in care se trimite catre adresa de email.</p>
            <div class="email-input-group">
              <input type="email" id="gameUserEmail" class="game-email-input" placeholder="Adresa ta de email" />
              <button class="game-send-email-btn" id="gameSendEmailBtn">Trimite-mi email 📩</button>
            </div>
            <p id="gameFormMsg" class="form-msg"></p>
          </div>
        </div>
      </div>
    </section>

    <!-- VIDEO MODAL -->
    <div class="video-modal" id="videoModal">
      <div class="video-modal-content">
        <button class="video-modal-close" id="videoModalClose">&times;</button>
        <video id="videoModalPlayer" controls playsinline></video>
      </div>
    </div>

    <?php include 'include/footer.php'; ?>

    <!-- GO TO TOP BUTTON -->
    <button id="goToTopBtn" class="go-to-top" title="Mergi sus">
      <i class="fa-solid fa-arrow-up"></i>
    </button>

    <script src="js/main.js"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ro.js"></script>

    <!-- DATE AVAILABILITY CHECKER -->
    <script>
      console.log('✅ Script încărcat - Inițializare checker de disponibilitate');
      
      // Initialize checker when DOM is ready
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeDateChecker);
      } else {
        // DOM is already loaded
        initializeDateChecker();
      }

      function initializeDateChecker() {
        console.log('🔧 Inițializare checker...');
        let debounceTimer;
        const inputElements = document.querySelectorAll('.ai-prompt-input');
        
        console.log('🔍 Inputuri găsite:', inputElements.length);
        
        if (inputElements.length === 0) {
          console.warn('⚠️ Nu au fost găsite inputuri .ai-prompt-input');
          return;
        }
        
        inputElements.forEach((input, index) => {
          console.log('📌 Input', index, '- Event listeners adăugate');
          
          // Listen for input changes
          input.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            
            const dateInput = this.value.trim();
            
            // Verifică dacă data conține un an (4 cifre consecutive)
            const yearRegex = /\d{4}/;
            const hasYear = yearRegex.test(dateInput);
            
            if (dateInput.length < 3 || !hasYear) {
              hideAvailabilityResponse();
              return;
            }
            
            // Debounce to avoid too many requests
            debounceTimer = setTimeout(() => {
              checkDateAvailability(dateInput, this);
            }, 500);
          });

          // Check on Enter key
          input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
              clearTimeout(debounceTimer);
              checkDateAvailability(this.value.trim(), this);
            }
          });
        });
        
        console.log('✅ Checker inițializat cu succes!');
      }

      function checkDateAvailability(dateInput, inputElement) {
        console.log('📡 Verificare dată:', dateInput);
        
        const container = inputElement.closest('.navbar-prompt') || inputElement.closest('.navbar-prompt-mobile-320');
        const availabilityContainer = container ? container.querySelector('.availability-container') : null;
        
        if (!availabilityContainer) {
          console.error('❌ Containerul de disponibilitate nu a fost găsit');
          return;
        }
        
        const apiUrl = 'api_check_date.php?data=' + encodeURIComponent(dateInput);
        console.log('🌐 URL API:', apiUrl);
        
        fetch(apiUrl)
          .then(response => {
            console.log('📥 Status HTTP:', response.status);
            if (!response.ok) {
              throw new Error('HTTP ' + response.status);
            }
            return response.json();
          })
          .then(data => {
            console.log('✅ Răspuns API:', data);
            
            // Selectează elementele prin cu querySelectorAll pentru a evita :not() issues
            const disponibilitatea = availabilityContainer.querySelectorAll('.disponibilitate');
            const availableMsg = disponibilitatea[0];   // Prima = mesaj disponibil
            const unavailableMsg = disponibilitatea[1]; // A doua = mesaj indisponibil
            const reserveBtn = availabilityContainer.querySelector('.btn-reserve-now');
            
            console.log('🔍 Available msg:', availableMsg, 'Unavailable msg:', unavailableMsg, 'Reserve btn:', reserveBtn);
            
            if (data.available) {
              // Data is AVAILABLE
              if (availableMsg) {
                availableMsg.classList.remove('hidden');
                console.log('✅ Arătând mesaj DISPONIBIL');
              }
              if (unavailableMsg) unavailableMsg.classList.add('hidden');
              if (reserveBtn) reserveBtn.classList.remove('hidden');
              console.log('✅ Data DISPONIBILĂ!');
            } else {
              // Data is NOT AVAILABLE
              if (availableMsg) availableMsg.classList.add('hidden');
              if (unavailableMsg) {
                unavailableMsg.classList.remove('hidden');
                console.log('✅ Arătând mesaj INDISPONIBIL');
              }
              if (reserveBtn) reserveBtn.classList.add('hidden');
              console.log('❌ Data NU este disponibilă');
            }
          })
          .catch(error => {
            console.error('❌ Eroare:', error);
            hideAvailabilityResponse();
          });
      }

      function hideAvailabilityResponse() {
        const containers = document.querySelectorAll('.availability-container');
        containers.forEach(container => {
          const disponibilitatea = container.querySelectorAll('.disponibilitate');
          const availableMsg = disponibilitatea[0];
          const unavailableMsg = disponibilitatea[1];
          const reserveBtn = container.querySelector('.btn-reserve-now');
          
          if (availableMsg) availableMsg.classList.add('hidden');
          if (unavailableMsg) unavailableMsg.classList.add('hidden');
          if (reserveBtn) reserveBtn.classList.add('hidden');
        });
      }
    </script>

    <!-- REVIEWS SECTION AVAILABILITY CHECKER -->
    <script>
      console.log('🔧 Inițializare Reviews Availability Checker...');
      
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeReviewsAvailabilityChecker);
      } else {
        initializeReviewsAvailabilityChecker();
      }

      function initializeReviewsAvailabilityChecker() {
        const dateInput = document.getElementById('reviewsAvailabilityInput');
        const checkBtn = document.getElementById('reviewsAvailabilityBtn');
        
        // Initialize Flatpickr
        flatpickr(dateInput, {
          locale: 'ro',
          dateFormat: 'Y-m-d',
          minDate: 'today',
          theme: 'light',
          animate: true,
          showMonths: 1
        });
        
        if (!dateInput || !checkBtn) {
          console.warn('⚠️ Reviews availability checker nu a găsit elementele necesare');
          return;
        }
        
        // Event listener for date selection
        dateInput.addEventListener('change', function() {
          if (this.value) {
            checkReviewsDateAvailability(this.value);
          }
        });
        
        // Event listener for button click
        checkBtn.addEventListener('click', function() {
          if (dateInput.value) {
            checkReviewsDateAvailability(dateInput.value);
          }
        });
        
        console.log('✅ Reviews Checker inițializat cu succes!');
      }

      function checkReviewsDateAvailability(selectedDate) {
        console.log('📡 Verificare dată Reviews:', selectedDate);
        
        const responseDiv = document.getElementById('reviewsAvailabilityResponse');
        const availableMsg = document.getElementById('reviewsAvailableMsg');
        const unavailableMsg = document.getElementById('reviewsUnavailableMsg');
        
        if (!responseDiv || !availableMsg || !unavailableMsg) {
          console.error('❌ Nu au fost găsite elementele de răspuns');
          return;
        }
        
        // Convert date format from yyyy-mm-dd to dd.mm.yyyy for API
        const [year, month, day] = selectedDate.split('-');
        const formattedDate = `${day}.${month}.${year}`;
        
        const apiUrl = 'api_check_date.php?data=' + encodeURIComponent(formattedDate);
        console.log('🌐 URL API:', apiUrl);
        
        fetch(apiUrl)
          .then(response => {
            if (!response.ok) {
              throw new Error('HTTP ' + response.status);
            }
            return response.json();
          })
          .then(data => {
            console.log('✅ Răspuns API:', data);
            
            if (data.available) {
              availableMsg.style.display = 'block';
              unavailableMsg.style.display = 'none';
              responseDiv.style.display = 'block';
              console.log('✅ Data DISPONIBILĂ!');
            } else {
              availableMsg.style.display = 'none';
              unavailableMsg.style.display = 'block';
              responseDiv.style.display = 'block';
              console.log('❌ Data NU este disponibilă');
            }
          })
          .catch(error => {
            console.error('❌ Eroare:', error);
            availableMsg.style.display = 'none';
            unavailableMsg.innerHTML = '❌ <strong>Eroare la verificare.</strong> Te rugăm încearcă din nou.';
            unavailableMsg.style.display = 'block';
            responseDiv.style.display = 'block';
          });
      }
    </script>
  </body>
</html>
