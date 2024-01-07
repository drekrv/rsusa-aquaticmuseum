<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home_front.css">
   
    <title>Romblon State University</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Judson&display=swap');</style>

    <style> 

    
nav {
    position: fixed;
    top: 0;
    width: 100%;
    height: 53px;
    background: #fff;
    z-index: 1000; /* Ensure the navigation bar stays above other elements */
    
  }
  nav ul{
    display: flex;
    gap:1.8rem;
    justify-content: right;
    margin-right: 70px;
    align-items: center;
  }
  nav ul li{
    list-style: none;
    
  }
  nav ul li a{
    
    text-decoration: none;
    color: #000;
    font-size: large;
  }

  nav a{
    position: relative;
   
    z-index: 3;
  }


  .grad-bar {
    width: 100%;
    height: 5px;
    background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
    background-size: 400% 400%;
        -webkit-animation: gradbar 15s ease infinite;
      -moz-animation: gradbar 15s ease infinite;
      animation: gradbar 15s ease infinite;
    position: fixed;
  }
  
  @media screen and (max-width: 768px) {
    nav ul {
        flex-direction: column;
    }
  
    nav li {
        margin-bottom: 1rem;
    }
  }
</style>




</head>
<body>
    <nav>
        <ul>
            <li><a href="home-front.php">Home</a></li>
            <li><a href="collection-front.php">Explore</a></li>
            <li><a href="home-front.php#about-nav">About Us</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <div class="grad-bar"></div>
    </nav>
     


    <div class="featured" style="position: absolute; left: 191px; top: 518px; font-size: 30px; font-family: 'Judson', sans-serif;z-index: 1;">
  Featured Collections
</div>        
        
            <div class="image-container1" style="position: absolute; top: 70px; left: 50px; width: 1249px; bottom: 30px; height: 523px; background-color: #D9D9D9; overflow: hidden;">
    <img src="get-image.php" style="width: 100%; height: auto; object-fit: cover;" alt="Image">
</div>

        <div class="image-container2" style="position: absolute; left: 771px; top: 2613px; width: 403px; height: 959px; background-color: #D9D9D9;">
    </div>


    <div class="about-title"style="position: absolute; left: 177px; top: 965px; font-size: 30px; font-family: 'Judson', sans-serif;">
  About Us
</div>

<div class="about-title" style="position: absolute; left: 339px; top: 1043px; letter-spacing: 10px; font-size: 30px; font-family: 'Judson', ">
ROMBLON STATE UNIVERSITY
</div>

<div class="vission-title" style="position: absolute; left: 368px; top: 1601px; font-size: 40px; font-family: 'Judson', sans-serif;">
VISSION
</div>

<div class="mission-title" style="position: absolute; left: 844px; top: 1601px; font-size: 40px; font-family: 'Judson',sans-serif;">
MISSION
</div>

<div class="mandate-title" style="position: absolute; left: 443px; top: 2254px; letter-spacing: 10px; font-size: 30px; font-family: 'Judson', sans-serif;">
UNIVERSITY MANDATE
</div>

<div class="romblon-title" style="position: absolute; left: 175px; top: 2613px; letter-spacing: 10px; font-size: 50px;font-weight: bold; color: #0682A8; font-family: 'Inter', sans-serif;z-index: 1;">
ROMBLON
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249223.70992584864!2d122.11464488052077!3d12.57430742862991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a4893416dff243%3A0xc7604fd3da0a6fbf!2sRomblon!5e0!3m2!1sen!2sph!4v1703925042204!5m2!1sen!2sph" 
            style="position: absolute; left: 771px; top: 2613px; width: 403px; height: 959px; border: 2px solid #9BBBEB;" 
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>


<div class="about-container"></div>
<div class="mandate-container"></div>
<div class="romblon-container"></div>
<div class="corevalue-container"></div>
<div class="border1"></div>
<div class="border2"></div>

<div class="about-nav" id="about-nav"></div>

<div class="about-us"></div>
<div class="vission"></div>
<div class="mission"></div>
<div class="mandate"></div>
<div class="romblon"></div>

<?php include 'get-text.php'; ?>

<div class="featured-container"></div>
    <div class="featured-box">
    <h2 id="imageName"></h2>
    <p id="imageDescription"></p>
</div>


        </section>      
        <section id="about">
            
        </section> 
        <footer>
            <p>&copy; 2024 Romblon State University(San Agustin Campus). All rights reserved.</p>
        </footer>
    
<script>

const featuredBox = document.querySelector('.featured-box');
let featuredItems = JSON.parse(localStorage.getItem('featuredItems')) || [];
let currentIndex = 0;

function showFeaturedItem(index) {
  const currentItem = featuredItems[index];
  const featuredContent = document.createElement('div');
  featuredContent.classList.add('featured-content');
  featuredContent.setAttribute('id', `featuredContent${index}`);
  featuredContent.innerHTML = `
    <img src="data:image/png;base64,${currentItem.imageUrl}" alt="Featured Image" style="width: 300px; height: 300px; object-fit: cover; border-radius: 6px; border: 1px solid #999999; position: absolute; top: px; left: px;">
    <h3 style="position: absolute; top: 20px; left: 320px; font-size: 35px;">${currentItem.speciesName}</h3>
    <p style="position: absolute; top: 80px; left: 320px;  text-indent: 50px; width: 490px; height:100px; overflow: auto; word-wrap: break-word;">${currentItem.description}</p>
  `;
  return featuredContent;
}

function displayFeaturedItem(index) {
  const newFeaturedContent = showFeaturedItem(index);
  featuredBox.innerHTML = ''; // Clear previous content
  featuredBox.appendChild(newFeaturedContent);
}

if (featuredItems.length > 0) {
  displayFeaturedItem(currentIndex);

  const nextButton = document.createElement('button');
  nextButton.textContent = 'Next';
  nextButton.style.position = 'absolute';
  nextButton.style.left = '1090px';
  nextButton.style.top = '712px';
  nextButton.addEventListener('click', showNextItem);
  document.body.appendChild(nextButton);

  function showNextItem() {
    currentIndex = (currentIndex + 1) % featuredItems.length;
    displayFeaturedItem(currentIndex);
  }
}




</script>

</body>
</html>