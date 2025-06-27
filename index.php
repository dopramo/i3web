
<?php
require_once 'class/cls_mail.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = stripslashes(trim($_POST['form-name']));
    $email   = stripslashes(trim($_POST['form-email']));
    $phone   = stripslashes(trim($_POST['form-tel']));
    $subject = stripslashes(trim($_POST['form-assunto']));
    $message = stripslashes(trim($_POST['form-mensagem']));
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
        die("Header injection detected");
    }

    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($name && $email && $emailIsValid && $subject && $message) {

        $ngs_mail = new ngs_mail();
        

        $result = $ngs_mail->sendmail($name, $email, $phone, $message);
        if ($result==true){

          $emailSent=true;
        }
        else{
          $emailSent=false;
        }

    } else {
        $hasError = true;
        echo 'error';
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>I3Cubes-CorporateSite</title>

    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link rel="stylesheet" href="assets/css/style-starter1.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/fontawsome.min.css">
    <link rel="stylesheet" href="css/all.min.css">

  </head>
  <body>
<div class="w3l-bootstrap-header fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light p-2">
    <div class="container">
      <!--<a class="navbar-brand" href="index.html"><span class="fa fa-diamond"></span>I3Cubes</a>-->
      <a href="#" onclick="scrollToTop()">
  <img class="logo" src="assets/images/i3_LOGO_23.png" alt="logo">
</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#NeedHelp">Need Help With?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Products">Our Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Services">Our Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Clients">Clients and Partners</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Contact">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<section class="w3l-index-block10">
  <div class="new-block top-bottom">
    <div class="container">
      <div class="middle-section">
        <div class="link-list-menu"> 
        <div class="second-frame">
        <div class="banner-img">
      </div>

 <!--******************************About Section Start****************************-->
  <div class="about-box">
    <div class="row">
  </div>
<section>
  <div class="about-container">
    <!-------------------Second Card---------------------->
    <div class="FirstCard" id="secondCard">
      <div class="FirstCard-content">
        <h2>Vision</h2><br>
          <p class="FirstCard-text">
            We foster collaborative ecosystems for ultimate convenience. We believe in leveraging partnerships to create win-win situations, ensuring all participants benefit from cooperative efforts.
          </p>
          <button type="submit" class="btn" onclick="openPopup('popup2')">See More</button>
      </div>
    </div>
    <div class="popup" id="popup2">
      <img src="assets/images/achivements.jpg" alt="image"> 
      <div>
      <img class="grabbing" class="popup-icon" src="assets/images/multiply.png" alt="Close Popup" style="width: 34px; height: 28px; margin-left:98%; margin-top:-114px;" onclick="closePopup('popup2')">
      </div>     
      <p>Enable ultimate convenience in a collaborative ecosystem.</p>
      <p>As human beings, we interact with the ecosystems that surround us (and upon which we depend) in numerous and complex ways. At I3C, we continuously practice collaborative mapping of ecosystem services to enable win-win situations. We strongly believe that the cooperation is a enabling fact of success and willing to make partnerships to drive collaborative ecosystems which cooperation leads to all participants benefiting.</p>
    </div>
    <!---------------First card---------------->
    <div class="FirstCard" id="firstCard">
      <div class="FirstCard-content">
        <h2  id="about">About Us</h2><br>
          <p class="FirstCard-text">
            I3CUBES (pvt) Ltd, based in Sri Lanka, offers tailored software development and managed ICT services globally. We empower small and medium-sized businesses with reliable IT support and innovative solutions. Our expertise spans open source and proprietary platforms, ensuring cost-effective, quality solutions. Choose us for unmatched ICT expertise and reliability.
          </p>
          <button type="submit" class="btn" onclick="openPopup('popup1')">See More</button>
      </div>
    </div>
    <div class="popup" id="popup1">
      <img src="assets/images/achivements.jpg" alt="image"> 
      <div>
      <img class="grabbing"  class="popup-icon" src="assets/images/multiply.png" alt="Close Popup" style="width: 34px; height: 28px; margin-left:98%; margin-top:-114px;" onclick="closePopup('popup1')">
      </div> 

      <p class="FirstCard-pop-text">I3CUBES (pvt) Limited is a software development and a managed services
        company which solely provides complete solutions for information and communications
        technology requirements. Incorporated in Sri Lanka, the company has grown rapidly in
        providing detailed services to its clients in production, sales, marketing, and regarding of
        consultancy.</p>
        <p class="FirstCard-pop-text">
        Our bespoke services have gone a long way in serving small and medium sized
        businesses. I3CUBES (pvt) Limited has gradually been expanding in the
        world of information and communications technology. At I3C we are all about keeping
        your business up and running doing our best in resolving any problem you may
        encounter swiftly and efficiently, and providing you complete and reliable IT support at
        every angle.</p>
        <p class="FirstCard-pop-text">
        At I3C our goal is to enable our clients to achieve excellence and steady output through
        information and communication technology with service innovation. We pride ourselves
        on the immaculate ability to help our clients to transform, capture and manage the
        necessary information for the success of their business, making it completely accessible
        whenever and wherever it is needed. I3C has sales, production, research &
        development, support operations in many countries across the globe.</p>
        <p class="FirstCard-pop-text">
        Our aim is to ensure the complete satisfaction of our clients thereby establishing a longterm
        relationship with them and keeping the relationship going. With our expertise in
        both open source and proprietary development platforms, we understand that every
        client's endeavor is an investment, which makes us analyze your business, and find out
        your budget needs thereby proving you with the best advantage for your business at a
        very fair cost. This goes a long way in ensuring that you gain nothing short of extreme
        quality in every investment you make at all times.</p>
    </div>
    <!-------------------Third Card---------------------->
    <div class="FirstCard" id="thirdCard">
      <div class="FirstCard-content">
        <h2>Mission</h2><br>
          <p class="FirstCard-text">
            Partnering in business, delivering responsive tech. Flexibility meets customer needs with cutting-edge products. Cultivating tomorrow's leaders.
          </p>
          <button type="submit" class="btn" onclick="openPopup('popup3')">See More</button>
      </div>
    </div>
    <div class="popup" id="popup3">
      <img src="assets/images/achivements.jpg" alt="image">      
      <div>
      <img class="grabbing"  class="popup-icon" src="assets/images/multiply.png" alt="Close Popup" style="width: 34px; height: 28px; margin-left:98%; margin-top:-114px;" onclick="closePopup('popup3')">
      </div> 
     <p>
      I3C makes a significant contribution to the business world in its role
as a value-adding partner to its clients. I3C continues to provide technologies that respond to customers need in increasingly sophisticated, divers and rapidly changing technological fields. We are flexible when it comes to product changes according to customer requirements and products are always designed to be future proof as much as possible using cutting edge technologies. Recognizing the people as the most important element of productivity in any organization; I3C is continuously committed to cultivate leaders of tomorrow by specializing in developing and implementing their own unique cooperate team culture.
     </p>
    </div>
    </div>
<script>
  function openPopup(popupId) {
    let popup = document.getElementById(popupId);
    popup.classList.add('open-popup');
  }
  function closePopup(popupId) {
    let popup = document.getElementById(popupId);
    popup.classList.remove('open-popup');
  }
</script>
<script>
  let openPopups = []; 

  function openPopup(popupId) {
    closeOpenPopups();

    let popup = document.getElementById(popupId);
    popup.classList.add('open-popup');
    openPopups.push(popupId);
  }

  function closePopup(popupId) {
    let popup = document.getElementById(popupId);
    popup.classList.remove('open-popup');
    openPopups = openPopups.filter(id => id !== popupId);
  }

  function closeOpenPopups() {
    openPopups.forEach(popupId => {
      let popup = document.getElementById(popupId);
      popup.classList.remove('open-popup');
    });
    openPopups = [];
  }
</script>

</section>
 <!--******************************About Section Start****************************-->


<!--*******************************Need help section Start************************-->
    <section class="need-help" id="needhelp">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h2 id="NeedHelp">What do you need help with??</h2>
                </div></br></br></br>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div><i class="icon star"></i></div>
                    <h3>Improve your business efficiency</h3>
                    <p>Tell us about your business, we will improve your business using technology</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div><i class="icon star"></i></div>
                    <h3>Process Optimization</h3>
                    <p>The discipline of adjusting a process so as to optimize some specified set of parameters while minimizing the cost and maximizing throughput.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div><i class="icon star"></i></div>
                    <h3>When and how to use ICT?</h3>
                    <p>We are team ICT professionals with years of industry experience. Will tell exactly where, when and how to use it for your business.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div><i class="icon star"></i></div>
                    <h3>Guidance and Consultancy</h3>
                    <p>We can provide expert advice in a many specialized areas suited for your business</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div><i class="icon star"></i></div>
                    <h3>Differentiation</h3>
                    <p>Do you want to look you different among the competitors? Will  assist you to get completive advantage.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div><i class="icon star"></i></div>
                    <h3>Flexibility</h3>
                    <p>We are flexible when it comes to product changes according to customer requirement as well in defining commercial models</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div><i class="icon star"></i></div>
                    <h3>Customization</h3>
                    <p>We are flexible when it comes to product changes according to customer requirement</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div><i class="icon star"></i></div>
                    <h3>Future proof technology</h3>
                    <p>Our Solutions are always designed to be future proof as much as possible.</p>
                </div>
            </div>
		</div>
    </section>
<!--******************************* Need help section End ************************-->

<!--****************************** Products section start ************************-->
   <section class="product-body">
    <div class="product-box-container">
    <div class="product-box">
    <div class="row">
      <div class="col-md-12 12 text-center">
        <h2 id="Products">OUR PRODUCTS</h2>
      </div></br></br></br>
    </div>
    <section class="articles">

    <article>
      <div class="article-wrapper">
        <figure>
          <img class="product-image" src="assets/images/Product-utrack.jpg" alt="" />
        </figure>
        <div class="article-body">
          <h5>HIS <span class="small-font">(Hospital Information System)</span> </h5>
          <p class="product-text">
          HIS boosts business productivity by enhancing vehicle fleet efficiency. Gain full access to this tool for improved fleet management and security, ensuring top-notch performance and increased business output.
          </p><br><br>
          <a href="#" class="read-more">
          PROCEED TO SITE <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
          </a>
        </div>
      </div>
    </article>

    <article>
      <div class="article-wrapper">
        <figure>
          <img class="product-image" src="assets/images/Product-Utaxi.jpg" alt="" />
        </figure>
        <div class="article-body">
          <h5>1990 Mobile App  <span class="small-font"></span></h5>
          <p class="product-text">
          Discover one of the best apps offering FREE, user-friendly taxi solutions. With smart-click calling, users can easily connect to nearby taxis without entering numbers. Features include hire logs, ratings, in-app payment, e-invoices, and web access.
          </p><br><br>
          <a href="#" class="read-more">
          PROCEED TO SITE <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
          </a>
        </div>
      </div>
    </article>

    <article>
      <div class="article-wrapper">
        <figure>
          <img class="product-image" src="assets/images/Product-Communicator.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h5>Recruitment Management System</h5>
        <p class="product-text">
        Communication is a major challenge in any organization, having this is mind, the NG communicator has been developed to aid organizations, small and medium enterprises, and business firms bypass this challenge, thereby bringing an improvement to the way business is done.
        </p>
        <a href="#" class="read-more">
         PROCEED TO SITE <span class="sr-only">about this is some title</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
        </a>
      </div>
    </div>
  </article>
  <article>
    <div class="article-wrapper">
      <figure>
        <img class="product-image" src="assets/images/Product-NGSchool.jpg" alt="" />
      </figure>
      <div class="article-body">
      <h5>Process Management Systems</h5>
        <p class="product-text">
        Maximize educational media benefits with this new system, enhancing learning and teaching experiences. It revolutionizes education with its classical operations and user-friendly interface.
        </p><br><br>
        <a href="#" class="read-more">
         PROCEED TO SITE <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>

</section>
    </div>
    </div>

   </section>
<!--**************************** Product section end ****************************-->

<!--*************************** Service section start *************************-->
<section class="services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12 " >
                <br>
                    <h2 id="Services">Our services</h2>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-1 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Application Development</h3>
                    <p>With a deep rooted knowledge and years of professional experience in software development, our team of professional, are readily available as regards to development of applications and software based on the business needs of individual clients. This includes Android, Apple, and Windows Mobile application platforms.</p>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-2 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Application Support and Maintenance</h3>
                    <p>We professionally manage and maintain enterprise level application suit to ensure uptime and availability to cater for the business needs of clients. This comes with real-time support and update of applications to suit the needs of each client.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-3 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Resources Outsourcing Services</h3>
                    <p>We aid all clients in boosting their companies’ organizational performance through the elimination of redundant functions, thereby increasing cost and competitive effectiveness, as this would go a long way in increasing efficiency of the core functions and aid the bringing out quality output.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-4 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Customized Software Development</h3>
                    <p>We strive to meet the IT needs of growing businesses and complex industries, through the creation of custom software solutions, which are tailored to bring their imaginations to the limelight and foster problem-solving creativity. This gives businesses a higher edge over others making them scale greater heights and bringing out more output in the global village.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-5 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="600">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Managed Services & Support</h3>
                    <p>We will fine tune processors and increase the operational efficiency of our clients' organization, also providing a dashboard which enables each user to monitor event logs (activities) while our service engineers manage your system and keep your operational expenditure low.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-6 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="600">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Open source systems implementation, customization and support</h3>
                    <p>For individuals interested in lowering total cost of ownership (TCO) and increasing returns on investment, then the time has come to convert your systems to open source systems which would enable you to provide system implementation and training services for your customers at an affordable fee.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-7 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="600">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>E commerce - total development for online purchasing solutions</h3>
                    <p>Our end to end e-commerce solutions enables small and medium businesses to sell products and accept payments online. Our capability and compatibility in integrating gateway solutions with major local banks, mobile cash solutions, PayPal, Paycrop, etc. is unequaled.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-8 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="600">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Telecommunication Software development</h3>
                    <p>With professional experience and experts in Telco domain, I3C provides telecommunication solutions which include network/cloud solutions, value-added services, location based services and corporate solutions.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-9 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Content Management Systems (CMS)</h3>
                    <p>With years of professional experience, our experts will take charge of the development of CMS based on every business needs of our individual clients from any part of the globe giving you relatively bespoke services and continuous access.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-10 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Help desk and NOC services</h3>
                    <p>On customer request, I3C will dispense quality and reliable NOC services. These services are tailored to meet the needs of individual clients and help them build steady customer base with our excellent and top-notch services.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-11 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Professional Services Automation (PSA)</h3>
                    <p>We pride ourselves with the steady provision of Professional Service Automation (PSA) to meet the multifaceted industry needs of growing small and medium businesses for individual clients. Individuals who understand the ever growing need of PSA would make use of this with hassle-free access every time of the day.  </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-12 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Agile Development</h3>
                    <p>With a set of principles for development, the I3C team brings about the rise of solutions which also evolve through thorough collaboration and self-organization, thereby bringing out steady and qualitative output on a regular basis.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  service-info sinfo-13 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Cloud Development</h3>
                    <p>With the development and implementation of cloud strategies, we tend to gain value from cloud deployments for businesses of our clients. Our team of professionals excels in the migration of existing systems and creation of customized applications to take good advantage of the cloud's flexibility, capacity, manageability and cost-effectiveness.</p>
                </div>
            </div>
        </div>
    </section>
<!--**************************** Service section end ****************************-->

<!--**************************** client section start ***************************-->
<!-- local client section start -->
<section>
<div class="row">
        <div class="col-md-12 text-center">
          <br>
          <h3 id="Clients" style="color:#00cdfd">CLIENTS AND PARTNERS</h3>
        </div>
      </div>
  <div class="clients-container">
    <div class="clients-box">
      <div class="main-slider-div">
        <div class="mySwiper swiper">
          <div class="swiper-container">
            <div class="swiper-wrapper"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Model-->
<div id="myModal1" class="modal1">
  <div class="modal-content1">
    <span class="close1">&times;</span>
    <div id="modalContent1" class="grid-container1"></div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const clientsArray = [
      {
        imgSrc: "assets/images/client-1-hover.jpg",
        companyName: "Suwasariya",
        imgPosition: null,
        imgTop: null,
        imgHeight: "100%",
        borderRadius: "30px",
        imgWidth:"75%",
        imgPadding: null,
        imageLeft:"16px"
      },
      {
        imgSrc: "assets/images/client-2-hover.jpg",
        companyName: "Auto Bavariya",
        imgPosition: "relative",
        imgTop: "6%",
        imgHeight: "89%",
        borderRadius: "30px",
        imgWidth:"61%",
        imgPadding: null,
        imageLeft:"29px"
      },
      {
        imgSrc: "assets/images/client-3-hover.jpg",
        companyName: "Redox Chemical Industries. Ltd",
        imgPosition: null,
        imgTop: null,
        imgHeight: "100%",
        borderRadius: "30px",
        imgWidth:"75%",
        imgPadding: null,
        imageLeft:"16px"
      },
      {
        imgSrc: "assets/images/client-4-hover.jpg",
        companyName: "Energynet",
        imgPosition: null,
        imgTop: null,
        imgHeight: "100%",
        borderRadius: "30px",
        imgWidth:"75%",
        imgPadding: null,
        imageLeft:"16px"
      },
      {
        imgSrc: "assets/images/client-5-hover.jpg",
        companyName: "Hayleys Fentons Ltd",
        imgPosition: null,
        imgTop: null,
        imgHeight: "100%",
        borderRadius: "30px",
        imgWidth:"75%",
        imgPadding: null,
        imageLeft:"16px"
      },
      {
        imgSrc: "assets/images/client-6-hover.jpg",
        companyName: "LeoSys Corporation (Pvt) Ltd",
        imgPosition: "relative",
        imgTop: null,
        imgHeight: "100%",
        borderRadius: "0px",
        imgWidth:"81%",
        imgPadding: null,
        imageLeft:"16px"
      },
      {
        imgSrc: "assets/images/client-8-hover.jpg",
        companyName: "National Transport Commission",
        imgPosition: null,
        imgTop: null,
        imgHeight: "100%",
        borderRadius: "30px",
        imgWidth:"65%",
        imgPadding: null,
        imageLeft:"26px"
      },
      {
        imgSrc: "assets/images/client-7-hover.jpg",
        companyName: "Orel Corporation",
        imgPosition: "relative",
        imgTop: null,
        imgHeight: "100%",
        borderRadius: "0px",
        imgWidth:"76%",
        imgPadding: null,
        imageLeft:"16px"
      },
      {
        imgSrc: "assets/images/client-9-hover.jpg",
        companyName: "Cinnamon Life",
        imgPosition: null,
        imgTop: null,
        imgHeight: "100%",
        borderRadius: "30px",
        imgWidth:"75%",
        imgPadding: null,
        imageLeft:"16px"
      }
    ];
    const popupArray = [
      {
        imgSrc: "assets/images/client-1-hover.jpg",
        companyName: "Suwasariya",
        imgPosition: null,
        imgTop: null,
        imgHeight: "80px", 
        imgWidth: "94px" 
      },
      {
        imgSrc: "assets/images/client-2-hover.jpg",
        companyName: "Auto Bavariya",
        imgPosition: null,
        imgTop: null,
        imgHeight: "80px", 
        imgWidth: "94px"
      },
      {
        imgSrc: "assets/images/client-3-hover.jpg",
        companyName: "Redox Chemical Industries. Ltd",
        imgPosition: null,
        imgTop: null,
        imgHeight: "80px", 
        imgWidth: "94px",
        cardWidth:"200px"
      },
      {
        imgSrc: "assets/images/client-4-hover.jpg",
        companyName: "Energynet",
        imgPosition: null,
        imgTop: null,
        imgHeight: "80px",
        imgWidth: "93px",
        cardWidth:"200px" 
      },
      {
        imgSrc: "assets/images/client-5-hover.jpg",
        companyName: "Hayleys Fentons Ltd",
        imgPosition: "relative",
        imgTop: null,
        imgHeight: "80px", 
        imgWidth: "94px",
        cardWidth:"200px"
      },
      {
        imgSrc: "assets/images/client-6-hover.jpg",
        companyName: "LeoSys Corporation (Pvt) Ltd",
        imgPosition: "relative",
        imgTop: "3px",
        imgHeight: "75px",
        imgWidth: "94px",
        cardWidth:"200px" 
      },
      {
        imgSrc: "assets/images/client-7-hover.jpg",
        companyName: "Orel Corporation",
        imgPosition: "relative",
        imgTop: "4px",
        imgHeight: "73px",
        imgWidth: "94px",
        cardWidth:"200px"
      },
      {
        imgSrc: "assets/images/client-8-hover.jpg",
        companyName: "National Transport Commission",
        imgPosition: "relative",
        imgTop: null,
        imgHeight: "79px",
        imgWidth: "95px",
        cardWidth:"200px"
      },
      {
        imgSrc: "assets/images/client-9-hover.jpg",
        companyName: "Cinnamon Life",
        imgPosition: "relative",
        imgTop: null,
        imgHeight: "79px",
        imgWidth: "94px",
        cardWidth:"200px"
      },
    ];

    const swiperWrapper = document.querySelector('.swiper-wrapper');
    clientsArray.forEach((client, index) => {
      const card = document.createElement('div');
      card.classList.add('swiper-slide');
      card.innerHTML = `
        <div class="card" data-index="${index}">
          <div class="client-card-image">
          <img class="card-img-top" src="${client.imgSrc}" alt="Card image cap" style="height: ${client.imgHeight};width: ${client.imgWidth};top: ${client.imgTop}; margin-left: ${client.imageLeft}; position: ${client.imgPosition}; border-radius:${client.borderRadius2}; padding:${client.imgPadding}"> 
          </div>
          <div class="card-body">
            <span class="cursor-text">${client.companyName}</span>
          </div>
        </div>
      `;
      swiperWrapper.appendChild(card);
    });
        
    var swiperOptions = {
      loop: true,
      freeMode: true,
      spaceBetween: 10,
      grabCursor: true,
      slidesPerView: 'auto',
      loop: true,
      autoplay: {
        delay: 1,
        disableOnInteraction: true
      },

      freeMode: true,
      speed: 5000,
      freeModeMomentum: false
    };

    var swiper = new Swiper(".swiper-container", swiperOptions);

    let wrapper = document.querySelector(".swiper-wrapper");
    let transformValue;
/*
    wrapper.addEventListener("mouseenter", (event) => {
      swiper.autoplay.stop();
      transformValue = wrapper.style.transform;
      wrapper.style.transitionDuration = "0ms";
      wrapper.style.transform =
        "translate3d(" + swiper.getTranslate() + "px, 0px, 0px)";
    });*/

    wrapper.addEventListener("mouseleave", (event) => {
      wrapper.style.transitionDuration = swiper.params.speed + "ms";
      wrapper.style.transform = transformValue;
      swiper.autoplay.start();
    });

/*************** POPUP SCRIPTS1 ********************/
const modal1 = document.getElementById("myModal1");
const modalContent1 = document.getElementById("modalContent1");
const closeBtn1 = document.querySelector(".close1");
const cards1 = document.querySelectorAll('.swiper-container .card');

cards1.forEach(card => {
  card.addEventListener('click', function() {
    closeOpenPopups();
    modalContent1.innerHTML = "";
    popupArray.forEach(client => {
      const cardDiv = document.createElement('div');
      cardDiv.classList.add('card');
      cardDiv.innerHTML = `
        <div class="client-card-image-popup" style="width: ${client.cardWidth};">
          <img class="card-img-top-pop" src="${client.imgSrc}" alt="Card image cap" style="height: ${client.imgHeight};width: ${client.imgWidth};top: ${client.imgTop}; border-radius:${client.borderRadius2}; position: ${client.imgPosition};"> 
        </div>
      `;
      modalContent1.appendChild(cardDiv);
    });
    modal1.style.display = "block";

    if (modalContent1.scrollHeight > modalContent1.clientHeight) {
      modalContent1.style.overflowy = "scroll";
      //modal1.style.display = "none";
    } else {
      modalContent1.style.overflowy = "hidden";
    }
  });
});

closeBtn1.onclick = function() {
  modal1.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}
  });
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<!-- local client section end -->

<!-- international client section start --> 
<section>
  <div class="row">
    <div class="col-md-12 text-center">
      <br>
      <h3 id="InternationalClients" style="color:#00cdfd"> INTERNATIONAL CLIENTS AND PARTNERS</h3>
    </div>
  </div>
  <div class="clients-container">
    <div class="clients-box2">
      <div class="main-slider-div2">
        <div class="mySwiper2 swiper">
          <div class=" swiper-container-international">
            <div class="swiper-wrapper swiper-wrapper-international"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal-international clients -->
<div id="myModal2" class="modal2">
  <div class="modal-content2">
    <span class="close2">&times;</span>
    <div id="modalContent2" class="grid-container2"></div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const clientsArrayInternational = [
      {
        imgSrc: "assets/images/client-f4-hover.jpg",
        companyName: "TradeNet",
        imgPosition: null,
        imgTop: null,
        imgHeight: "101%",
        borderRadius: "30px",
        imgWidth:"82%",
        imgPadding: "17px",
        imageLeft:"12px",
        borderRadiusA: "0px"
      },
      {
        imgSrc: "assets/images/client-f1-hover.jpg",
        companyName: "C2M TechSolutions",
        imgHeight: "100%",
        imgWidth: "100%",
        imgTop: null,
        imgPosition: "relative",
        borderRadius: null,
        imgPadding: null
      },
      {
        imgSrc: "assets/images/client-f2-hover.jpg",
        companyName: "Diamond Dental Center",
        imgHeight: "100%",
        imgWidth: "100%",
        imgTop: null,
        imgPosition: "relative",
        borderRadius: null,
        imgPadding: null
      },
      {
        imgSrc: "assets/images/client-f3-hover.png",
        companyName: "Gaash Lighting",
        imgHeight: "100%",
        imgWidth: "100%",
        imgTop: null,
        imgPosition: "relative",
        borderRadius: null,
        imgPadding: null
      },
      {
        imgSrc: "assets/images/client-f4-hover.jpg",
        companyName: "TradeNet",
        imgPosition: null,
        imgTop: null,
        imgHeight: "101%",
        borderRadius: "30px",
        imgWidth:"82%",
        imgPadding: "17px",
        imageLeft:"12px",
        borderRadiusA: "0px"
      },
      {
        imgSrc: "assets/images/client-f1-hover.jpg",
        companyName: "C2M TechSolutions",
        imgHeight: "100%",
        imgWidth: "100%",
        imgTop: null,
        imgPosition: "relative",
        borderRadius: null,
        imgPadding: null
      },
      {
        imgSrc: "assets/images/client-f2-hover.jpg",
        companyName: "Diamond Dental Center",
        imgHeight: "100%",
        imgWidth: "100%",
        imgTop: null,
        imgPosition: "relative",
        borderRadius: null,
        imgPadding: null
      },
      {
        imgSrc: "assets/images/client-f3-hover.png",
        companyName: "Gaash Lighting",
        imgHeight: "100%",
        imgWidth: "100%",
        imgTop: null,
        imgPosition: "relative",
        borderRadius: null,
        imgPadding: null
      },
      {
        imgSrc: "assets/images/client-f4-hover.jpg",
        companyName: "TradeNet",
        imgPosition: null,
        imgTop: null,
        imgHeight: "101%",
        borderRadius: "30px",
        imgWidth:"82%",
        imgPadding: "17px",
        imageLeft:"12px",
        borderRadiusA: "0px"
      },
      {
        imgSrc: "assets/images/client-f1-hover.jpg",
        companyName: "C2M TechSolutions",
        imgHeight: "100%",
        imgWidth: "100%",
        imgTop: null,
        imgPosition: "relative",
        borderRadius: null,
        imgPadding: null
      },
      {
        imgSrc: "assets/images/client-f2-hover.jpg",
        companyName: "Diamond Dental Center",
        imgHeight: "100%",
        imgWidth: "100%",
        imgTop: null,
        imgPosition: "relative",
        borderRadius: null,
        imgPadding: null
      },
      {
        imgSrc: "assets/images/client-f3-hover.png",
        companyName: "Gaash Lighting",
        imgHeight: "100%",
        imgWidth: "100%",
        imgTop: null,
        imgPosition: "relative",
        borderRadius: null,
        imgPadding: null
      },
    ];

    const popupArrayInternational = [
  {
        imgSrc: "assets/images/client-f1-hover.jpg",
        companyName: "C2M TechSolutions",
        imgPosition: "relative",
        imgTop: null,
        imgHeight: "83%",
        imgWidth: "49%",
        cardWidth:"200px",
        borderRadiusA: "10px"
      },
      {
        imgSrc: "assets/images/client-f2-hover.jpg",
        companyName: "Diamond Dental Center",
        imgPosition: "relative",
        imgTop: null,
        imgHeight: "83%",
        imgWidth: "49%",
        cardWidth:"200px",
        borderRadiusA: "10px"
      },
      {
        imgSrc: "assets/images/client-f3-hover.png",
        companyName: "Gaash Lighting",
        imgPosition2: "fixed",
        imgPosition: "relative",
        imgTop: null,
        imgHeight: "83%",
        imgWidth: "49%",
        cardWidth:"200px",
        borderRadiusA: "10px"
      },
      {
        imgSrc: "assets/images/client-f4-hover.jpg",
        companyName: "TradeNet",
        imgPosition: "relative",
        imgTop:null,
        imgHeight: "83%",
        imgWidth: "49%",
        cardWidth:"200px",
        borderRadiusA: "10px"
      },
    ];

    const swiperWrapperInternational = document.querySelector('.swiper-wrapper-international');
    clientsArrayInternational.forEach((client, index) => {
      const card = document.createElement('div');
      card.classList.add('swiper-slide');
      card.innerHTML = `
        <div class="card" data-index="${index}">
          <div class="client-card-image">
            <img class="card-img-top" src="${client.imgSrc}" alt="Card image cap" style="height: ${client.imgHeight};width: ${client.imgWidth};top: ${client.imgTop}; margin-left: ${client.imageLeft}; position: ${client.imgPosition}; border-radius:${client.borderRadius2}; padding:${client.imgPadding}"> 
          </div>
          <div class="card-body">
            <span class="cursor-text">${client.companyName}</span>
          </div>
        </div>
      `;
      swiperWrapperInternational.appendChild(card);
    });

    var swiperOptionsInternational = {
      loop: true,
      freeMode: true,
      spaceBetween: 10,
      grabCursor: true,
      slidesPerView: 'auto',
      loop: true,
      autoplay: {
        delay: 1,
        disableOnInteraction: true
      },
      freeMode: true,
      speed: 5000,
      freeModeMomentum: false
    };

    var swiperInternational = new Swiper(".swiper-container-international", swiperOptionsInternational);

let wrapperInternational = document.querySelector(".swiper-wrapper-international");
let transformValueInternational;

wrapperInternational.addEventListener("mouseleave", (event) => {
  wrapperInternational.style.transitionDuration = swiperInternational.params.speed + "ms";
  wrapperInternational.style.transform = transformValueInternational;
  swiperInternational.autoplay.start();
});

    /*************** POPUP SCRIPTS ********************/
    const modal2 = document.getElementById("myModal2");
    const modalContent2 = document.getElementById("modalContent2");
    const closeBtn2 = document.querySelector(".close2");
    const cards2 = document.querySelectorAll('.swiper-container-international .card');

    cards2.forEach(card => {
        card.addEventListener('click', function () {

          closeOpenPopups();
            modalContent2.innerHTML = "";
            popupArrayInternational.forEach(client => {
                const cardDiv = document.createElement('div');
                cardDiv.classList.add('card');
                cardDiv.innerHTML = `
        <div class="client-card-image-popup" style="width: ${client.cardWidth};">
          <img class="card-img-top-pop" src="${client.imgSrc}" alt="Card image cap" style="height: ${client.imgHeight};width: ${client.imgWidth};top: ${client.imgTop}; border-radius:${client.borderRadiusA}; position: ${client.imgPosition};"> 
        </div>
      `;
                modalContent2.appendChild(cardDiv);
            });
            modal2.style.display = "block";

            if (modalContent2.scrollHeight > modalContent2.clientHeight) {
                modalContent2.style.overflowy = "scroll";
            } else {
                modalContent2.style.overflowy = "hidden";
            }
        });
    });

    closeBtn2.onclick = function () {
        modal2.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
});
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<!-- international client section end --> 
<!--****************** Client section end *****************-->

<!--****************** Contact start *****************-->
<section class="contact" id="contact"><br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="contact-font" id="Contact">Contact Us</h2>
      </div>
    </div>
  <div class="row">
    <div class="col-md-6 col-lg-6">
      <?php if(!empty($emailSent)): ?>
      <div class="col-md-6 col-md-offset-3">
        <div class="alert alert-success text-center">
          Your message was sent successfully. Thanks.
        </div>
      </div>
    <?php else: ?>
    <?php if(!empty($hasError)): ?>
      <div class="col-md-5 col-md-offset-4">
        <div class="alert alert-danger text-center">
          Cannot send mail An error occurred while delivering this message
        </div>
        </div>
        <?php endif; ?>
    <div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>#contact" id="contact-form" class="form-horizontal" role="form" method="post" >
        <div class="form-group">
          <div class="col-lg-12">
            <input type="text" class="form-control" id="form-name" name="form-name" placeholder="Name" required autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <div class="placeHolder col-lg-12">
            <input type="email" class="form-control" id="form-email" name="form-email" placeholder="Email" required autocomplete="off">
           </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12">
            <input type="tel" class="form-control" id="form-tel" name="form-tel" placeholder="Telephone" autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12">
            <input type="text" class="form-control" id="form-assunto" name="form-assunto" placeholder="Subject" required autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="form-mensagem" name="form-mensagem" placeholder="Message" required autocomplete="off"></textarea>
          </div>
        </div>
        <div class="form-group text-center"> 
          <div class="col-lg-offset-3 col-lg-12"> 
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
    </div>
    <?php endif; ?>
    </div>
    <div class="map-boarder col-md-6 col-lg-6">
      <section class="map" id="map2">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div id="map"></div>
            </div>
          </div>   
        </div>
      </section>
    </div>
  </div>
</div><br><br>
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="container">
          <h5>I3CUBES (pvt) Ltd</h5>
          <span class="contact-id">No. 617</span></br>
          <span class="contact-id">Jana Jaya City</span></br>
          <span class="contact-id">Rajagiriya Sri Lanka.</span></br></br>
          <span class="contact-id"><b>Telephone :</b> +94 71 922 9233 </br></span>
          <a class="contact-id" style="letter-spacing: 2px;" href="mailto:info@i3cubes.com"><b>E-mail : </b> info@i3cubes.com</br></a>
          <div class="row"></div>
        </div>
      </div>
    </div>
  </section>
  </div>
</section>
    <script>
      (function ($, window, document, undefined) {
    'use strict';

    function hasFormValidation () {
        return (typeof document.createElement('input').checkValidity === 'function');
    };

    function addError (el) {
        return el.parent().addClass('has-error');
    };

    if (!hasFormValidation()) {
        $('#contact-form').submit(function () {
            var hasError = false,
                name     = $('#form-name'),
                mail     = $('#form-email'),
                subject  = $('#form-assunto'),
                message = $('#form-mensagem'),
                testmail = /^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_-]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/,
                $this    = $(this);

            $this.find('div').removeClass('has-error');

            if (name.val() === '') {
                hasError = true;
                addError(name);
            }

            if (!testmail.test(mail.val())) {
                hasError = true;
                addError(mail);
            }

            if (subject.val() === '') {
                hasError = true;
                addError(subject);
            }

            if (message.val() === '') {
                hasError = true;
                addError(message);
            }

            if (hasError === false) {
                return true;
            }

            return false;
        });
    }
}(jQuery, window, document));
    </script>
 
<!--************************** contact section end **************************-->
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- move top -->
   <button onclick="topFunction()" id="movetop" title="Go to top">
   <i class="fa fa-arrow-up" aria-hidden="true"></i>
  </button>
    <script>
      window.onscroll = function () {
      scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
           document.getElementById("movetop").style.display = "block";
        } else {
            document.getElementById("movetop").style.display = "none";
            }
          }
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
          }
    </script>
    </section>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.js"></script>
    <script>
      $(function () {
        $('.navbar-toggler').click(function () {
          $('body').toggleClass('noscroll');
        })
      });
    </script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-67427841-1', 'auto');
  ga('send', 'pageview');
</script>
<!--logo function-->
<script>
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' });}
</script>
<script>
    function initMap() {
        var myLatLng = {lat: 6.908735396530885, lng: 79.89634321995959};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: myLatLng,
            mapTypeId: "satellite",
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'I3CUBES (PVT) LTD',
            label: {
                text: 'I3CUBES (PVT) LTD',
                color: '#f6f350',
                fontWeight: 'bold'  
            }
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyBG9B3zdoqLsxv2ZApP_gk2vPy5O6WBQW0" >
</script>
    
</body>
</html>