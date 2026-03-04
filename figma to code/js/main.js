// LOADER FUNCTIONS WITH PROGRESS
let currentProgress = 0;
const progressCircle = document.getElementById("progressCircle");
const progressPercent = document.getElementById("progressPercent");
const circumference = 282.7; // 2 * π * 45

function getProgressColor(progress) {
  if (progress < 25) {
    return "#ff6b6b"; // Red
  } else if (progress < 50) {
    return "#ff8c42"; // Orange
  } else if (progress < 75) {
    return "#ffd93d"; // Yellow
  } else if (progress < 100) {
    return "#6bcf7f"; // Green
  } else {
    return "#ff8787"; // Pink
  }
}

function updateProgress(target) {
  if (currentProgress < target) {
    // Increment gradually towards target
    const increment = (target - currentProgress) * 0.1 + (Math.random() * 5);
    currentProgress = Math.min(currentProgress + increment, target);
    
    // Calculate stroke-dashoffset
    const offset = circumference * (1 - currentProgress / 100);
    progressCircle.style.strokeDashoffset = offset;
    const displayProgress = Math.floor(currentProgress);
    progressPercent.textContent = displayProgress;
    progressPercent.style.color = getProgressColor(displayProgress);
  }
}

function showLoader() {
  const loaderContainer = document.getElementById("loaderContainer");
  if (loaderContainer) {
    loaderContainer.classList.remove("hidden");
    currentProgress = 10;
    updateProgress(10);
  }
}

function hideLoader() {
  const loaderContainer = document.getElementById("loaderContainer");
  if (loaderContainer) {
    // Finish to 100%
    progressCircle.style.strokeDashoffset = "0";
    progressPercent.textContent = "100";
    progressPercent.style.color = "#ff8787";
    
    setTimeout(() => {
      loaderContainer.classList.add("hidden");
    }, 300);
  }
}

// Show loader initially
showLoader();

// Simulate progress on DOMContentLoaded
document.addEventListener("DOMContentLoaded", function () {
  updateProgress(50);
});

// Simulate progress when images start loading
window.addEventListener("load", function () {
  updateProgress(90);
});

// Hide loader when everything is fully loaded
window.addEventListener("load", function () {
  setTimeout(() => {
    hideLoader();
    currentProgress = 0;
  }, 800);
});

// Update progress when images load
const images = document.querySelectorAll("img");
let loadedImages = 0;

images.forEach((img) => {
  img.addEventListener("load", function () {
    loadedImages++;
    const progressAmount = 50 + (loadedImages / images.length) * 40;
    updateProgress(Math.min(progressAmount, 90));
  });
});

const burgerMenu = document.getElementById("burgerMenu");
const mobileMenu = document.getElementById("mobileMenu");
const mobileMenuOverlay = document.getElementById("mobileMenuOverlay");
const promptInput = document.querySelector(".ai-prompt-input");
const submitBtn = document.querySelector(".input-submit-btn");

// Toggle mobile menu
burgerMenu.addEventListener("click", function () {
  this.classList.toggle("active");
  mobileMenu.classList.toggle("active");
  mobileMenuOverlay.classList.toggle("active");
  document.body.style.overflow =
    document.body.style.overflow === "hidden" ? "auto" : "hidden";
});

// Close menu when clicking overlay
mobileMenuOverlay.addEventListener("click", function () {
  burgerMenu.classList.remove("active");
  mobileMenu.classList.remove("active");
  mobileMenuOverlay.classList.remove("active");
  document.body.style.overflow = "auto";
});

// Trigger submit on Enter key
promptInput.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    submitBtn.click();
  }
});

// Submit button click handler
submitBtn.addEventListener("click", function () {
  const userInput = promptInput.value.trim();
  if (userInput) {
    console.log("User input:", userInput);
    // Add your submit logic here
  }
});

// Set current year in copyright
document.getElementById("year").textContent = new Date().getFullYear();

// Video play button functionality
const videoItems = document.querySelectorAll(".video-item");
const videoModal = document.getElementById("videoModal");
const videoModalPlayer = document.getElementById("videoModalPlayer");
const videoModalClose = document.getElementById("videoModalClose");

// Set initial frame at 1 second for all videos to avoid black frames
const allVideos = document.querySelectorAll(".video-item video");
allVideos.forEach((video) => {
  // Try with canplay event (more reliable on mobile)
  const setFrame = () => {
    try {
      video.currentTime = 0.5;
    } catch (e) {
      console.log("Cannot set currentTime yet");
    }
  };
  
  // Use canplay event which fires when enough data is loaded to play
  video.addEventListener("canplay", setFrame, { once: true });
  
  // Also try with loadedmetadata as fallback
  video.addEventListener("loadedmetadata", setFrame, { once: true });
});

videoItems.forEach((item) => {
  const video = item.querySelector("video");
  const playBtn = item.querySelector(".video-play-btn");

  if (playBtn && video) {
    playBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      
      // At 834px and above, open modal
      if (window.innerWidth >= 834) {
        videoModalPlayer.src = video.src;
        videoModalPlayer.addEventListener("loadedmetadata", function setInitialFrame() {
          videoModalPlayer.currentTime = 1;
          videoModalPlayer.removeEventListener("loadedmetadata", setInitialFrame);
        });
        videoModal.classList.add("active");
        videoModalPlayer.play();
        document.body.style.overflow = "hidden";
      } else {
        // On smaller screens, play inline
        if (video.paused) {
          // Pause other videos
          const allVideos = document.querySelectorAll(".video-item video");
          allVideos.forEach((otherVideo) => {
            if (otherVideo !== video) {
              otherVideo.pause();
              const otherPlayBtn = otherVideo.parentElement.querySelector(".video-play-btn");
              if (otherPlayBtn) {
                otherPlayBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
              }
            }
          });
          // Play this video
          video.play();
          playBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
        } else {
          // Pause this video
          video.pause();
          playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
        }
      }
    });

    // Update button icon when video pauses (for small screens)
    video.addEventListener("pause", function () {
      if (window.innerWidth < 834) {
        playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
      }
    });
  }
});

// Modal close button
videoModalClose.addEventListener("click", function () {
  videoModal.classList.remove("active");
  videoModalPlayer.pause();
  videoModalPlayer.src = "";
  document.body.style.overflow = "auto";
});

// Close modal when clicking outside the video
videoModal.addEventListener("click", function (e) {
  if (e.target === videoModal) {
    videoModal.classList.remove("active");
    videoModalPlayer.pause();
    videoModalPlayer.src = "";
    document.body.style.overflow = "auto";
  }
});

// Close modal with Escape key
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && videoModal.classList.contains("active")) {
    videoModal.classList.remove("active");
    videoModalPlayer.pause();
    videoModalPlayer.src = "";
    document.body.style.overflow = "auto";
  }
});

// Videos Slider Navigation
const videosSlider = document.getElementById("videosSlider");
const videosArrowPrev = document.getElementById("videosArrowPrev");
const videosArrowNext = document.getElementById("videosArrowNext");

if (videosSlider && videosArrowPrev && videosArrowNext) {
  const videoItems = document.querySelectorAll(".video-item");
  let currentVideoIndex = 0;

  videosArrowPrev.addEventListener("click", function () {
    if (currentVideoIndex > 0) {
      currentVideoIndex--;
      videoItems[currentVideoIndex].scrollIntoView({
        behavior: "smooth",
        block: "nearest",
        inline: "center"
      });
    }
  });

  videosArrowNext.addEventListener("click", function () {
    if (currentVideoIndex < videoItems.length - 1) {
      currentVideoIndex++;
      videoItems[currentVideoIndex].scrollIntoView({
        behavior: "smooth",
        block: "nearest",
        inline: "center"
      });
    }
  });
}

// FAQ Accordion functionality
const faqQuestions = document.querySelectorAll(".faq-question");

faqQuestions.forEach((question) => {
  question.addEventListener("click", function () {
    const faqItem = this.parentElement;
    const isActive = faqItem.classList.contains("active");

    // Close all other FAQ items
    faqQuestions.forEach((otherQuestion) => {
      const otherItem = otherQuestion.parentElement;
      if (otherItem !== faqItem) {
        otherItem.classList.remove("active");
      }
    });

    // Toggle current item
    if (isActive) {
      faqItem.classList.remove("active");
    } else {
      faqItem.classList.add("active");
    }
  });
});

// Reviews Slider functionality
const reviewsSlider = document.getElementById("reviewsSlider");
const reviewsArrowPrev = document.getElementById("reviewsArrowPrev");
const reviewsArrowNext = document.getElementById("reviewsArrowNext");

if (reviewsSlider && reviewsArrowPrev && reviewsArrowNext) {
  const reviewCards = document.querySelectorAll(".review-card");
  let currentReviewIndex = 0;

  reviewsArrowPrev.addEventListener("click", function () {
    if (currentReviewIndex > 0) {
      currentReviewIndex--;
      reviewCards[currentReviewIndex].scrollIntoView({
        behavior: "smooth",
        block: "nearest",
        inline: "center"
      });
    }
  });

  reviewsArrowNext.addEventListener("click", function () {
    if (currentReviewIndex < reviewCards.length - 1) {
      currentReviewIndex++;
      reviewCards[currentReviewIndex].scrollIntoView({
        behavior: "smooth",
        block: "nearest",
        inline: "center"
      });
    }
  });
}

// Availability Check functionality
const availabilityInput = document.querySelector(".availability-input");
const availabilityBtn = document.querySelector(".availability-btn");

if (availabilityBtn) {
  availabilityBtn.addEventListener("click", function () {
    const selectedDate = availabilityInput?.value;
    if (selectedDate) {
      console.log("Verificare disponibilitate pentru data:", selectedDate);
      // Add your availability check logic here
      // For now, just show a confirmation
      const originalText = this.textContent;
      this.textContent = "Se verifică...";
      this.disabled = true;

      // Simulate API call
      setTimeout(() => {
        this.textContent = "Verificat! ✓";
        this.style.backgroundColor = "#28a745";

        setTimeout(() => {
          this.textContent = originalText;
          this.style.backgroundColor = "";
          this.disabled = false;
        }, 2000);
      }, 1500);
    }
  });

  // Allow Enter key to trigger verification
  availabilityInput?.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();
      availabilityBtn.click();
    }
  });
}

// PANDA CHALLENGE GAME - MEMORY MATCHING
const gameStartBtn = document.getElementById("gameStartBtn");
const gameBoard = document.getElementById("gameBoard");
const gameTimer = document.getElementById("gameTimer");
const gameStartScreen = document.getElementById("gameStartScreen");
const gameFailScreen = document.getElementById("gameFailScreen");
const gameWinScreen = document.getElementById("gameWinScreen");
const gameRetryBtn = document.getElementById("gameRetryBtn");
const gameSendEmailBtn = document.getElementById("gameSendEmailBtn");
const gameUserEmail = document.getElementById("gameUserEmail");
const gameFormMsg = document.getElementById("gameFormMsg");

const gameIcons = ["🕶️", "🎩", "📸", "🎭", "👑", "🎈"];
let gameCards = [];
let flippedCards = [];
let matchedCards = 0;
let gameActive = false;
let timeLeft = 18;
let timerInterval = null;

// Initialize game
if (gameStartBtn) {
  gameStartBtn.addEventListener("click", startGame);
}

if (gameRetryBtn) {
  gameRetryBtn.addEventListener("click", resetToStart);
}

if (gameSendEmailBtn) {
  gameSendEmailBtn.addEventListener("click", sendEmailPHP);
}

function startGame() {
  gameStartScreen.classList.remove("active");
  gameFailScreen.style.display = "none";
  gameWinScreen.style.display = "none";
  gameBoard.style.display = "grid";
  
  gameActive = true;
  timeLeft = 18;
  flippedCards = [];
  matchedCards = 0;
  
  initializeBoard();
  startTimer();
}

function initializeBoard() {
  gameBoard.innerHTML = "";
  gameCards = [];
  
  // Create pairs of icons (shuffle)
  const icons = [...gameIcons, ...gameIcons];
  const shuffled = icons.sort(() => Math.random() - 0.5);
  
  shuffled.forEach((icon, index) => {
    const card = document.createElement("div");
    card.classList.add("memory-card");
    card.dataset.icon = icon;
    card.dataset.index = index;
    card.textContent = "?";
    card.addEventListener("click", flipCard);
    gameBoard.appendChild(card);
    gameCards.push(card);
  });
}

function startTimer() {
  clearInterval(timerInterval);
  timerInterval = setInterval(() => {
    timeLeft--;
    gameTimer.textContent = timeLeft;
    
    if (timeLeft <= 0) {
      clearInterval(timerInterval);
      endGame(false);
    }
  }, 1000);
}

function flipCard(event) {
  if (!gameActive) return;
  
  const card = event.target;
  
  // Prevent flipping same card twice
  if (flippedCards.includes(card) || card.classList.contains("matched")) return;
  
  card.classList.add("flipped");
  card.textContent = card.dataset.icon;
  flippedCards.push(card);
  
  // Check if we have 2 flipped cards
  if (flippedCards.length === 2) {
    gameActive = false;
    setTimeout(checkMatch, 600);
  }
}

function checkMatch() {
  const [card1, card2] = flippedCards;
  const isMatch = card1.dataset.icon === card2.dataset.icon;
  
  if (isMatch) {
    card1.classList.add("matched");
    card2.classList.add("matched");
    matchedCards += 2;
    
    // Check if all cards matched
    if (matchedCards === gameCards.length) {
      clearInterval(timerInterval);
      endGame(true);
      return;
    }
  } else {
    card1.classList.remove("flipped");
    card2.classList.remove("flipped");
    card1.textContent = "?";
    card2.textContent = "?";
  }
  
  flippedCards = [];
  gameActive = true;
}

function endGame(won) {
  gameActive = false;
  clearInterval(timerInterval);
  gameBoard.style.display = "none";
  
  if (won) {
    gameWinScreen.style.display = "block";
  } else {
    gameFailScreen.style.display = "block";
  }
}

function resetToStart() {
  gameWinScreen.style.display = "none";
  gameFailScreen.style.display = "none";
  gameStartScreen.classList.add("active");
  gameTimer.textContent = "18";
  gameUserEmail.value = "";
  gameFormMsg.textContent = "";
}

function sendEmailPHP() {
  const email = gameUserEmail.value.trim();
  
  if (!email.includes("@")) {
    gameFormMsg.textContent = "❌ Email invalid!";
    gameFormMsg.style.color = "#d35400";
    return;
  }
  
  gameFormMsg.textContent = "Se trimite... 🐼";
  gameFormMsg.style.color = "#666";
  gameSendEmailBtn.disabled = true;
  
  // Create form data
  const formData = new FormData();
  formData.append("email", email);
  formData.append("coupon", "PANDA10");
  
  // Send to server
  fetch("send_coupon.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    if (data.trim() === "success") {
      gameFormMsg.textContent = "✅ Trimis! Verifică email-ul.";
      gameFormMsg.style.color = "#4CAF50";
      gameUserEmail.disabled = true;
    } else {
      gameFormMsg.textContent = "❌ A apărut o problemă. Încearcă din nou.";
      gameFormMsg.style.color = "#d35400";
    }
    gameSendEmailBtn.disabled = false;
  })
  .catch(error => {
    console.error("Error:", error);
    gameFormMsg.textContent = "❌ Eroare de conexiune.";
    gameFormMsg.style.color = "#d35400";
    gameSendEmailBtn.disabled = false;
  });
}

// GO TO TOP BUTTON FUNCTIONALITY
const goToTopBtn = document.getElementById("goToTopBtn");

if (goToTopBtn) {
  // Arată/ascunde butonul când utilizatorul face scroll
  window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
      goToTopBtn.classList.add("show");
    } else {
      goToTopBtn.classList.remove("show");
    }
  });

  // Scroll smooth to top când se dă click pe buton
  goToTopBtn.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });
}
