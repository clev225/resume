<?php
    $title = "Home | eProfile Personal Profile Generator";
    require './assets/includes/header.php';
    require './assets/includes/navbar_signedOut.php';

    $fn->authPage();
    $resumes = $db->query("SELECT * FROM resumes WHERE user_id=".$fn->Auth()['id']." ORDER BY id DESC");
    $resumes = $resumes->fetch_all(1);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>

<main role="main">

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <div class="row featurette" style="margin-top: 30px;">
      <div class="col-md-7">
        <h1 class="featurette-heading" style="font-size: 75px; font-weight: bold">Make</h1>
        <h1 class="featurette-heading1" style="margin-top: 2rem;">your own</h1>
        <h1 class="featurette-heading2" style="margin-top: 2rem;">Profile</h1>
        </div>
      <div class="col-md-5">
        <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> -->
        <img src="./assets/images/landing1.png" alt="landing" style="width: 500px; height: 500px;">      
      </div>

      <div class="buttons">
          <a class="buttons" href="#more-info"
            style="margin: 3px; display: inline-block; padding: 5px 10px; background: linear-gradient(313deg, rgba(255,255,255,1) 0%, rgba(24,197,199,0.7646708341539741) 100%); color: black; border-radius: 8px; text-align: center; font-weight: bold; font-size: 25px;">Learn More → 
          </a>
      </div>
    </div>

    <!-- START THE FEATURETTES -->
    <hr class="featurette-divider">

    <div class="row featurette" id="more-info">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading" style="font-weight: bold; margin-left: 4rem;">Welcome to eProfile!</h2>
        <p class="lead" style="margin-left: 4rem;">At eProfile, we understand that crafting a compelling resume is essential for career success. Whether you’re a seasoned professional or just starting out, our website is here to help you stand out from the crowd.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> -->
        <img src="./assets/images/landing2.jpg" alt="landing" style="width: 500px; height: 500px">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading" style="font-weight: bold;">eProfile Offers</h2>
        <ul class="lead">
          <li>Easy-to-Use Interface: Our intuitive platform guides you through each step of the resume-building process, ensuring you include all the essential information without any hassle.</li>
          <li>Customization Options: Choose from a variety of professionally designed templates and customize your resume to reflect your personal style and the requirements of your desired job.</li>
          <li>Download and Print: Once your resume is complete, you can easily download it in various formats, ready for printing or online submission.</li>
          <li>Data Security: We prioritize your privacy and ensure that all your personal information is securely stored and protected.</li>
        </ul>
    </div>
      <div class="col-md-5">
        <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> -->
        <img src="./assets/images/landing3.jpg" alt="landing" style="width: 500px; height: 500px">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy;BSIT - 3rd Year &middot; Palma, Sulit, Toque, Lazo, Javier</a></p>
  </footer>
</main>
</html>

<style>
    /* GLOBAL STYLES
-------------------------------------------------- */
/* Padding below the footer and lighter body text */

/* body {

} */

/* CUSTOMIZE THE CAROUSEL
-------------------------------------------------- */

/* Carousel base class */
.carousel {
  margin-bottom: 4rem;
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  bottom: 3rem;
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel-item {
  height: 32rem;
}
.carousel-item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 32rem;
}


/* MARKETING CONTENT
-------------------------------------------------- */

/* Center align the text within the three columns below the carousel */
.marketing .col-lg-4 {
  margin-bottom: 1.5rem;
  text-align: center;
}
.marketing h2 {
  font-weight: 400;
}
.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}


/* Featurettes
------------------------- */

.featurette-divider {
  margin: 5rem 0; /* Space out the Bootstrap <hr> more */
}

/* Thin out the marketing headings */
.featurette-heading {
  font-size: 75px;
  font-weight: 300;
  line-height: 1;
  letter-spacing: 1rem;
}

.featurette-heading1 {
  font-size: 75px;
  font-weight: bold;
  line-height: 1;
  letter-spacing: 1rem;
}

.featurette-heading2 {
  font-size: 75px;
  font-style: italic;
  font-weight: bold;
  line-height: 1;
  letter-spacing: 1rem;
  color: #18c5c7;
}

/* RESPONSIVE CSS
-------------------------------------------------- */

@media (min-width: 40em) {
  /* Bump up size of carousel content */
  .carousel-caption p {
    margin-bottom: 1.25rem;
    font-size: 1.25rem;
    line-height: 1.4;
  }

  .featurette-heading {
    font-size: 50px;
  }
}

@media (min-width: 62em) {
  .featurette-heading {
    margin-top: 5rem;
  }
}
</style>

<script>
  function confirmDelete(id) {
      Swal.fire({
          title: 'Are you sure you want to delete?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = 'actions/deleteresume.action.php?id=' + id;
          }
      });
  }
</script>

<?php
    require './assets/includes/footer.php';
?>
