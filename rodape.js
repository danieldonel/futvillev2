// Funções para manipular a visibilidade de elementos laterais
function Aparecer() {
  var elemento = document.getElementById('lateral');
  if (elemento) {
      elemento.classList.add('animar');
  } else {
      console.error('Elemento não encontrado');
  }
}

function Fechar() {
  var elemento = document.getElementById('lateral');
  if (elemento) {
      elemento.classList.remove('animar');
  } else {
      console.error('Elemento não encontrado');
  }
}


function Aparecer2() {
  var elementoLateral2 = document.getElementById('lateral2');
  var elementoLateral = document.getElementById('lateral');

  if (elementoLateral2 && elementoLateral) {
    elementoLateral2.classList.add('animar2');
    elementoLateral.classList.remove('animar');
    elementoLateral2.classList.remove('animar3');
  } else {
    console.error('Elemento não encontrado');
  }
}

function Fechar2() {
  lateral2.classList.remove('animar2');
  lateral2.classList.add('animar3');
}

// Funções para manipular slides
function showSlide(index, slideArray) {
  slideArray.forEach((slide, i) => {
      slide.style.display = i === index ? 'block' : 'none';
  });
}

function nextSlide() {
  currentSlide = (currentSlide + 1) % slides.length;
  showSlide(currentSlide, slides);
}

function prevSlide() {
  currentSlide = (currentSlide - 1 + slides.length) % slides.length;
  showSlide(currentSlide, slides);
}

function nextFooterSlide() {
  currentFooterSlide = (currentFooterSlide + 1) % footerSlides.length;
  showSlide(currentFooterSlide, footerSlides);
}

document.addEventListener('DOMContentLoaded', function () {
  const slides = document.querySelectorAll('.carousel-slide');
  let currentSlide = 0;

  const footerSlides = document.querySelectorAll('.footer-slide');
  let currentFooterSlide = 0;

  // Configuração inicial
  showSlide(currentSlide, slides);
  showSlide(currentFooterSlide, footerSlides);

  // Event listeners para os botões de navegação
  document.getElementById('nextBtn').addEventListener('click', nextSlide);
  document.getElementById('prevBtn').addEventListener('click', prevSlide);

  // Carrossel automático no rodapé
  setInterval(nextFooterSlide, 3000); // Troca a cada 3 segundos (3000 milissegundos)
});
