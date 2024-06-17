<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .slider-container {
      width: 90% ;
      overflow: hidden;
      position: relative;
      margin: 0 auto;
    }

    .slider-wrapper {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .card-a{
      width: 100%;
      box-sizing: border-box;
      padding: 20px;
      margin: 0 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<div class="slider-container">
  <div class="slider-wrapper">
    <div class="card-a">
        <img src="MTL-images/williamss.jpg" alt="" height="150" width="150" style="margin: 0 0 5px 14px; border-radius: 50%;";>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, ad.</p>
        
    </div>
    <div class="card-a">
        <img src="MTL-images/RK-narayan.jpg" alt="" height="150" width="150" style="margin: 0 0 5px 14px; border-radius: 50%;";>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, ad.</p>
        
    </div>
    <div class="card-a">
        <img src="MTL-images/rabindranath_tagore.webp" alt="" height="150" width="150" style="margin: 0 0 5px 14px; border-radius: 50%;";>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, ad.</p>
        
    </div>
    <div class="card-a">
        <img src="MTL-images/ramanujan.jpeg" alt="" height="150" width="150" style="margin: 0 0 5px 14px; border-radius: 50%;";>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, ad.</p>
        
    </div>
    <div class="card-a">
        <img src="MTL-images/RK-Narayan.jpg" alt="" height="150" width="150" style="margin: 0 0 5px 14px; border-radius: 50%;";>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, ad.</p>
        
    </div>
    <div class="card-a">
        <img src="MTL-images/rabindranath_tagore.webp" alt="" height="150" width="150" style="margin: 0 0 5px 14px; border-radius: 50%;";>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, ad.</p>
        
    </div>
    <div class="card-a">
        <img src="MTL-images/ramanujan.jpeg" alt="" height="150" width="150" style="margin: 0 0 5px 14px; border-radius: 50%;";>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, ad.</p>
        
    </div>
    <div class="card-a">
        <img src="MTL-images/lizabeth-zindel-photo-u1.jpeg" alt="" height="150" width="150" style="margin: 0 0 5px 14px; border-radius: 50%;";>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, ad.</p>
        
    </div>
    <div class="card-a">
        <img src="MTL-images/williamss.jpg" alt="" height="150" width="150" style="margin: 0 0 5px 14px; border-radius: 50%;";>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, ad.</p>
        
    </div>
    <div class="card-a">
        <img src="MTL-images/williamss.jpg" alt="" height="150" width="150" style="margin: 0 0 5px 14px; border-radius: 50%;";>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, ad.</p>
        
    </div>

  </div>
</div>

<script>
  let currentIndex = 0;
  const sliderWrapper = document.querySelector('.slider-wrapper');
  const cards = document.querySelectorAll('.card-a');
  const cardWidth = cards[0].offsetWidth + 20; // Including margin

  function updateSlider() {
    const transformValue = -currentIndex * cardWidth + 'px';
    sliderWrapper.style.transform = 'translateX(' + transformValue + ')';
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % cards.length;
    updateSlider();
  }

  function prevSlide() {
    currentIndex = (currentIndex - 1 + cards.length) % cards.length;
    updateSlider();
  }

  setInterval(nextSlide, 3000); // Change slide every 3 seconds

  document.addEventListener('DOMContentLoaded', updateSlider);

  </script>
</body>
</html>
