const images = document.querySelectorAll('.carousel img');
const prevButton = document.querySelector('.carousel .prev-button');
const nextButton = document.querySelector('.carousel .next-button');
let currentImageIndex = 0;

function showImage(index) {
    if (images && images.length > 0) {
      images.forEach(image => image.classList.remove('active'));
      images[index].classList.add('active');
    }
  }

showImage(currentImageIndex);

prevButton.addEventListener('click', () => {
  currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
  showImage(currentImageIndex);
});

nextButton.addEventListener('click', () => {
  currentImageIndex = (currentImageIndex + 1) % images.length;
  showImage(currentImageIndex);
});