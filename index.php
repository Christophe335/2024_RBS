<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>gestion d'articles</title>
</head> 
<body>
    <header>
    <?php include 'header.php' ?>
    </header>

<div class="espace"></div>
<!-- galerie d'images -->
<div class="gallery">
    <!-- image 1 -->
    <div class="slide active">
      <img src="/images/gallery/1-france-bg-slide.jpg" alt="Image 1">
      <div class="content">
        <h1>Titre 1</h1>
        <h1>Titre 2</h1>
        <h1>Titre 3</h1>
        <div class="small-images">
          <img src="/images/3000xt.jpg" alt="Small 1">
          <img src="/images/3000xt.jpg" alt="Small 2">
          <img src="/images/3000xt.jpg" alt="Small 3">
        </div>
        <h3><a href="#">Sous-titre 1</a></h3>
        <h3><a href="#">Sous-titre 2</a></h3>
        <h3><a href="#">Sous-titre 3</a></h3>
      </div>
    </div>
    <!-- image 2 -->
    <div class="slide">
      <img src="/images/gallery/2-revo-office-nouveau-prix-2021.jpg" alt="Image 1" style="width:100%">
      <div class="content">
        <h1>Titre 1</h1>
        <h1>Titre 2</h1>
        <h1>Titre 3</h1>
        <div class="small-images">
          <img src="/images/3000xt.jpg" alt="Small 1">
          <img src="/images/3000xt.jpg" alt="Small 2">
          <img src="/images/3000xt.jpg" alt="Small 3">
        </div>
        <h3><a href="#">Sous-titre 1</a></h3>
        <h3><a href="#">Sous-titre 2</a></h3>
        <h3><a href="#">Sous-titre 3</a></h3>
      </div>
    </div>
    <!-- image 3 -->
    <!-- <div class="slide active">
      <img src="/images/gallery/3-rbs-france-salon-graphitec-2017.jpg" alt="Image 1">
      <div class="content">
        <h1>Titre 1</h1>
        <div class="small-images">
          <img src="https://via.placeholder.com/50" alt="Small 1">
          <img src="https://via.placeholder.com/50" alt="Small 2">
          <img src="https://via.placeholder.com/50" alt="Small 3">
        </div>
        <h3><a href="#">Sous-titre 1</a></h3>
      </div>
    </div> -->
    <!-- image 4 -->
    <!-- <div class="slide active">
      <img src="/images/gallery/4-rbs-salon-drupa.jpg" alt="Image 1">
      <div class="content">
        <h1>Titre 1</h1>
        <div class="small-images">
          <img src="https://via.placeholder.com/50" alt="Small 1">
          <img src="https://via.placeholder.com/50" alt="Small 2">
          <img src="https://via.placeholder.com/50" alt="Small 3">
        </div>
        <h3><a href="#">Sous-titre 1</a></h3>
      </div>
    </div> -->
    <!-- image 5 -->
    <!-- <div class="slide active">
      <img src="/images/gallery/5-rhino-bg-slide.jpg" alt="Image 1">
      <div class="content">
        <h1>Titre 1</h1>
        <div class="small-images">
          <img src="https://via.placeholder.com/50" alt="Small 1">
          <img src="https://via.placeholder.com/50" alt="Small 2">
          <img src="https://via.placeholder.com/50" alt="Small 3">
        </div>
        <h3><a href="#">Sous-titre 1</a></h3>
      </div>
    </div> -->
    <!-- image 6 -->
    <!-- <div class="slide active">
      <img src="/images/gallery/6-thermo-bg-slide.jpg" alt="Image 1">
      <div class="content">
        <h1>Titre 1</h1>
        <div class="small-images">
          <img src="https://via.placeholder.com/50" alt="Small 1">
          <img src="https://via.placeholder.com/50" alt="Small 2">
          <img src="https://via.placeholder.com/50" alt="Small 3">
        </div>
        <h3><a href="#">Sous-titre 1</a></h3>
      </div>
    </div> -->
    <!-- image 7 -->
    <!-- <div class="slide active">
      <img src="/images/gallery/7-slide_thermo_one.png" alt="Image 1">
      <div class="content">
        <h1>Titre 1</h1>
        <div class="small-images">
          <img src="https://via.placeholder.com/50" alt="Small 1">
          <img src="https://via.placeholder.com/50" alt="Small 2">
          <img src="https://via.placeholder.com/50" alt="Small 3">
        </div>
        <h3><a href="#">Sous-titre 1</a></h3>
      </div>
    </div> -->
    <!-- image 8 -->
    <!-- <div class="slide active">
      <img src="/images/gallery/8-rbs-france-destcko-LX.jpg" alt="Image 1">
      <div class="content">
        <h1>Titre 1</h1>
        <div class="small-images">
          <img src="https://via.placeholder.com/50" alt="Small 1">
          <img src="https://via.placeholder.com/50" alt="Small 2">
          <img src="https://via.placeholder.com/50" alt="Small 3">
        </div>
        <h3><a href="#">Sous-titre 1</a></h3>
      </div>
    </div> -->
    
  </div>
    
    <?php include 'promotions.php' ?>
   
    <?php include 'footer.php' ?>
    <script>
        document.querySelectorAll('.small-images img').forEach(img => {
  console.log(`Image: ${img.src}, Dimensions: ${img.width}x${img.height}`);
});

        document.querySelectorAll('.small-images img').forEach((img) => {
  img.onload = () => console.log(`Image ${img.alt} chargée`);
});

document.querySelectorAll('.small-images img').forEach(img => {
  img.style.opacity = '1'; // Forcer la visibilité
  img.style.zIndex = '20'; // Priorité d'affichage
});

    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;

    function showNextSlide() {
        slides[currentSlide].classList.remove('active');
      setTimeout(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
      }, 600); // Pause avant d'afficher la nouvelle slide
    }

    setInterval(showNextSlide, 3500);
  </script>
</body>
</html>