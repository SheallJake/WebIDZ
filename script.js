const slider = document.querySelector('.slider');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');
const slides = Array.from(slider.querySelectorAll('img'));
const slideCount = slides.length;
let slideIndex = 0;
let autoSlideInterval;

prevButton.addEventListener('click', showPreviousSlide);
nextButton.addEventListener('click', showNextSlide);

function showPreviousSlide() {
  slideIndex = (slideIndex - 1 + slideCount) % slideCount;
  updateSlider();
  resetAutoSlide();
}

function showNextSlide() {
  slideIndex = (slideIndex + 1) % slideCount;
  updateSlider();
  resetAutoSlide();
}

function updateSlider() {
  slides.forEach((slide, index) => {
    if (index === slideIndex) {
      slide.style.display = 'block';
    } else {
      slide.style.display = 'none';
    }
  });
}

function startAutoSlide() {
  autoSlideInterval = setInterval(showNextSlide, 5000);
}

function stopAutoSlide() {
  if (autoSlideInterval) {
    clearInterval(autoSlideInterval);
    autoSlideInterval = null;
  }
}
function updateSlider() {
  slides.forEach((slide, index) => {
    if (index === slideIndex) {
      slide.classList.add('active');
    } else {
      slide.classList.remove('active');
    }
  });
}

function resetAutoSlide() {
  stopAutoSlide();
  startAutoSlide();
}
document.addEventListener('DOMContentLoaded', (event) => {
    let tabs = document.querySelectorAll('.tabs__item');
    let tabsContent = document.querySelectorAll('.tabs__block');

    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            let activeTabIndex = [...tabs].indexOf(tab);
            setActiveTab(activeTabIndex);
        });
    });

    function setActiveTab(activeTabIndex) {
        tabs.forEach((tab, i) => {
            if (i === activeTabIndex) {
                tab.classList.add('active');
                tabsContent[i].style.display = 'block';
            } else {
                tab.classList.remove('active');
                tabsContent[i].style.display = 'none';
            }
        });
    }

    // Set the first tab as active initially
    setActiveTab(0);
});

startAutoSlide();
updateSlider();
