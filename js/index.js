function darkLight() {
  /* Dark class */
  if (localStorage.toggled != 'dark') {
    $('body').toggleClass('dark', true);
    localStorage.toggled = "dark";
  } else {
    $('body').toggleClass('dark', false);
    localStorage.toggled = "";
  }
  // Uppdatera Lottie src när dark mode ändras
  updateLottieSrc(false); // Passera false för att indikera att det inte är en pageload
}

feather.replace();

function updateLottieSrc(isPageLoad) {
  const lottiePlayer = document.querySelector('dotlottie-player');
  if (lottiePlayer) {
    if (isPageLoad) {
      lottiePlayer.classList.remove('show'); // Ta bort show-klassen för att starta fade-out
      setTimeout(() => {
        if ($('body').hasClass('dark')) {
          lottiePlayer.load('https://lottie.host/4aec4b13-43f9-4a22-aa14-32cb948a81b7/EvSRd2M2Uj.json');
        } else {
          lottiePlayer.load('https://lottie.host/b113da78-7867-4b2b-b9a8-1d4e3ad68c89/76cZBN7HhH.json');
        }
        lottiePlayer.classList.add('show'); // Lägg till show-klassen för att starta fade-in
      }, 500); // Vänta på att fade-out ska slutföras innan src ändras
    } else {
      // Uppdatera src utan fördröjning och fade-effekt vid knapptryck
      if ($('body').hasClass('dark')) {
        lottiePlayer.load('https://lottie.host/4aec4b13-43f9-4a22-aa14-32cb948a81b7/EvSRd2M2Uj.json');
      } else {
        lottiePlayer.load('https://lottie.host/b113da78-7867-4b2b-b9a8-1d4e3ad68c89/76cZBN7HhH.json');
      }
    }
  }
}

$(document).ready(function() {
  // Initial toggle för dark mode baserat på localStorage
  $('body').toggleClass(localStorage.toggled);

  // Initial uppdatering av Lottie src vid sidladdning
  setTimeout(() => updateLottieSrc(true), 500); // Passera true för att indikera att det är en pageload

  /* Lägg till 'checked' egenskap till input om bakgrund == mörk */
  if ($('body').hasClass('dark')) {
    $('#checkBox').prop("checked", true);
  } else {
    $('#checkBox').prop("checked", false);
  }

  const contentLinks = document.querySelectorAll('.content-link');

  contentLinks.forEach(function(contentLink) {
    contentLink.addEventListener('click', function() {
      // Hämta URL:en från data-attributet
      var postUrl = contentLink.getAttribute('data-url');

      // Hitta texten inuti knappen
      var buttonText = contentLink.querySelector('.button-text');

      // Använd Clipboard API för att kopiera URL:en till klippbordet
      navigator.clipboard.writeText(postUrl).then(function() {
        // Ändra texten i knappen vid lyckad kopiering
        buttonText.textContent = 'Länk kopierad';

        // Återställ texten efter 2 sekunder
        setTimeout(function() {
          buttonText.textContent = 'Kopiera länken';
        }, 2000); // Visa meddelandet i 2 sekunder
      }).catch(function(err) {
        // Hantera fel om kopieringen misslyckas
        console.error('Kopiering misslyckades', err);
      });
    });
  });

  // Facebook SDK initiering
  window.fbAsyncInit = function() {
    FB.init({
      appId: '1566000737283984',
      xfbml: true,
      version: 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  // Ladda Facebook SDK asynkront
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Funktion för att kontrollera om användaren är på mobil
  function isMobile() {
    const toMatch = [/Android/i, /webOS/i, /iPhone/i, /iPad/i, /iPod/i, /BlackBerry/i, /Windows Phone/i];
    return toMatch.some((toMatchItem) => navigator.userAgent.match(toMatchItem));
  }

  // Funktion för att dela på Messenger
  window.messengerShare = function() {
    const url = window.location.href;
    if (isMobile()) {
      window.location.href = "fb-messenger://share/?link=" + encodeURIComponent(url);
    } else {
      FB.ui({
        method: 'send',
        link: url,
        redirect_uri: url
      });
    }
  };

  // Vänta tills DOM är färdig innan vi binder klickhändelser
  document.addEventListener('DOMContentLoaded', function() {
    // Kontrollera att knappen finns och lägg till klickhändelse
    const messengerButton = document.getElementById('content-messenger');
    if (messengerButton) {
      messengerButton.addEventListener('click', window.messengerShare);
    } else {
      console.error('Knappen med ID "content-messenger" hittades inte.');
    }
  });

  // Lyssna på klassändringar på body
  const classObserver = new MutationObserver(() => {
    updateLottieSrc(false); // Passera false för att indikera att det inte är en pageload
  });
  classObserver.observe(document.body, { attributes: true, attributeFilter: ['class'] });

  window.addEventListener('scroll', function() {
    // Håll koll på tidigare scrollposition
    let prevScrollPos = window.pageYOffset;

    window.addEventListener('scroll', function() {
      // Aktuell scrollposition
      const currentScrollPos = window.pageYOffset;

      if (currentScrollPos >= 100) {
        // Kontrollera scrollriktningen
        if (prevScrollPos > currentScrollPos) {
          // Användaren har scrollat upp
          document.querySelector('#nav-header').classList.remove('hide');
          document.querySelector('#nav-header').classList.add('show');
        } else {
          // Användaren har scrollat ner
          document.querySelector('#nav-header').classList.remove('show');
          document.querySelector('#nav-header').classList.add('hide');
        }
      }

      // Uppdatera tidigare scrollposition
      prevScrollPos = currentScrollPos;

      // Kontrollera om användaren är högst upp på sidan
      if (currentScrollPos === 0) {
        // Utför åtgärd när användaren är högst upp
        // Exempel: Visa ett meddelande eller lägg till en klass till ett element
        document.querySelector('#nav-header').classList.remove('show');
      }
    });
  });

function toggleNav() {
  var navMenuChoice = document.getElementById("nav-items");
  var htmlElement = document.documentElement; // Detta refererar till <html>-elementet

  if (navMenuChoice.classList.contains("is-active")) {
    navMenuChoice.classList.remove("is-active");
    document.body.classList.remove("body-overflow-hidden");
    htmlElement.classList.remove("body-overflow-hidden"); // Ta bort klassen från <html>
  } else {
    navMenuChoice.classList.add("is-active");
    document.body.classList.add("body-overflow-hidden");
    htmlElement.classList.add("body-overflow-hidden"); // Lägg till klassen till <html>
  }
}

// Kontrollera att elementen finns och lägg till event listeners
var navMenu = document.getElementById("nav-menu");
var navItemsClose = document.getElementById("nav-items-close");

if (navMenu) {
  navMenu.addEventListener("click", toggleNav);
} else {
  console.error('Elementet med ID "nav-menu" hittades inte.');
}

if (navItemsClose) {
  navItemsClose.addEventListener("click", toggleNav);
} else {
  console.error('Elementet med ID "nav-items-close" hittades inte.');
}

function checkViewportWidth() {
  var navMenuChoice = document.getElementById("nav-items");
  var htmlElement = document.documentElement; // Detta refererar till <html>-elementet

  if (window.innerWidth > 999) {
    navMenuChoice.classList.remove("is-active");
    document.body.classList.remove("body-overflow-hidden");
    htmlElement.classList.remove("body-overflow-hidden"); // Ta bort klassen från <html>
  }
}

window.addEventListener("resize", checkViewportWidth);

// Check viewport width on initial load
checkViewportWidth();


  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();

      // Fånga målelementet
      const targetElement = document.querySelector(this.getAttribute('href'));
      
      // Få målelementets topp-position relativt till dokumentet
      const elementPosition = targetElement.getBoundingClientRect().top;
      
      // Justera positionen med en offset
      const offsetPosition = elementPosition + window.pageYOffset - 50;

      // Scrolla till den justerade positionen
      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });
    });
  });

  // Toggle filtering
  const filterButton = document.getElementById("filter-button");
  if (filterButton) {
    filterButton.addEventListener("click", function() {
      var filterMenuChoice = document.getElementById("review-filtering");
      var filterMenu = document.getElementById("filtering-wrapper");
      var filterText = document.getElementById("filter-text");

      filterMenuChoice.classList.toggle("is-active");
      filterMenu.classList.toggle("is-active");
      filterMenu.classList.toggle("marg-medium");

      // Toggle button text
      if (filterMenuChoice.classList.contains("is-active")) {
        filterText.textContent = "Dölj filtrering";
      } else {
        filterText.textContent = "Visa filtrering";
      }
    });
  }
});
