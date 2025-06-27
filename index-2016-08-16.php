<?php
ini_set('SMTP','smtp.zoho.com');
ini_set('smtp_port',465);
ini_set('sendmail_from', 'lahirueranga@ngslanka.com');
$subjectPrefix = 'NGS Contact us form';
$emailTo = 'lahirueranga@ngslanka.com';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    if($name && $email && $emailIsValid && $subject && $message){
        /*$subject = "$subjectPrefix $subject";
        $body = "Name: $name <br /> Email: $email <br /> Telephone: $phone <br /> Message: $message";

        $headers .= sprintf( 'Return-Path: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'From: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'Reply-To: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'Message-ID: <%s@%s>%s', md5( uniqid( rand( ), true ) ), $_SERVER[ 'HTTP_HOST' ], PHP_EOL );
        $headers .= sprintf( 'X-Priority: %d%s', 3, PHP_EOL );
        $headers .= sprintf( 'X-Mailer: PHP/%s%s', phpversion( ), PHP_EOL );
        $headers .= sprintf( 'Disposition-Notification-To: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'MIME-Version: 1.0%s', PHP_EOL );
        $headers .= sprintf( 'Content-Transfer-Encoding: 8bit%s', PHP_EOL );
        $headers .= sprintf( 'Content-Type: text/html; charset="utf-8"%s', PHP_EOL );

        mail($emailTo, "=?utf-8?B?".base64_encode($subject)."?=", $body, $headers);*/
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Next Generation services</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/ekko-lightbox.min.css">
    <link rel="stylesheet" href="css/sss.css">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand " href="#home">Next Generation services</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav  animated fadeInDown">
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#needhelp">Need help with?</a></li>
                    <li><a href="#product">Our Products</a></li>
                    <li><a href="#services">Our services</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="#news">News Feed</a></li>
                    <li><a href="#client">Clients and Partners</a></li>
                    <li><a href="#careers">Careers</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div id="home"></div>
    <div id="startchange"></div>
    <section id="video" class="video">
        <!-- Wrapper for slides -->
        <div id="block" class="video-block" data-vide-bg="video/home" data-vide-options="position: 50% 50%">
<!--
           <header class="carousel-caption">
                    <h2>THE <span class="green">POWER</span> </h2>
                    <p>Power of imagination</p>
                    <p><a href="#services" class="btn btn-default btn-lg">Our Services</a></p>
                </header>
-->         
        </div>
    </section>
    
    <section class="about" id="about">
        <div>&nbsp;</div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-1">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a data-target="#abouts" aria-controls="abouts" role="tab" data-toggle="tab">About</a></li>
                        <li role="presentation"><a data-target="#vision" aria-controls="vision" role="tab" data-toggle="tab">Vision</a></li>
                        <li role="presentation"><a data-target="#mission" aria-controls="mission" role="tab" data-toggle="tab">Mission</a></li>
                        <li role="presentation"><a data-target="#values" aria-controls="values" role="tab" data-toggle="tab">Values</a></li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="abouts">
                            <h2>About Our Company</h2>
                            <p>Next Generation Services (Pvt) Ltd. is a software development and a managed services
company which solely provides complete solutions for information and communications
technology requirements. Incorporated in Sri Lanka, the company has grown rapidly in
providing detailed services to its clients in production, sales, marketing, and regarding of
consultancy.</p><p>
 
Our bespoke services have gone a long way in serving small and medium sized
businesses. Next Generation Services (Pvt) Ltd has gradually been expanding in the
world of information and communications technology. At NGS we are all about keeping
your business up and running doing our best in resolving any problem you may
encounter swiftly and efficiently, and providing you complete and reliable IT support at
every angle.</p><p>
 
At NGS our goal is to enable our clients to achieve excellence and steady output through
information and communication technology with service innovation. We pride ourselves
on the immaculate ability to help our clients to transform, capture and manage the
necessary information for the success of their business, making it completely accessible
whenever and wherever it is needed. NGS has sales, production, research &
development, support operations in many countries across the globe.</p><p>
 
Our aim is to ensure the complete satisfaction of our clients thereby establishing a longterm
relationship with them and keeping the relationship going. With our expertise in
both open source and proprietary development platforms, we understand that every
client's endeavor is an investment, which makes us analyze your business, and find out
your budget needs thereby proving you with the best advantage for your business at a
very fair cost. This goes a long way in ensuring that you gain nothing short of extreme
quality in every investment you make at all times.</p>
 
                        </div>
                        <div role="tabpanel" class="tab-pane" id="vision">
                            <h2>Our Vision</h2>
                            <p>Enable ultimate convenience in a collaborative ecosystem.</p>
                            <p>As human beings, we interact with the ecosystems that surround us (and upon which we depend) in numerous and complex ways. At Next Generation Services, we continuously practice collaborative mapping of ecosystem services to enable win-win situations. We strongly believe that the cooperation is a enabling fact of success and willing to make partnerships to drive collaborative ecosystems which cooperation leads to all participants benefiting.</p>
                            </div>
                        <div role="tabpanel" class="tab-pane" id="mission">
                            <h2>Our Mission</h2>
                            <p>NGS makes a significant contribution to the business world in its role<br> as a value-adding partner
to its clients. NGS continues to provide technologies that respond to customers need in increasingly sophisticated, divers and rapidly changing technological fields. We are flexible when it comes to product changes according to customer requirements and products are always designed to be future proof as much as possible using cutting edge technologies. Recognizing the people as the most important element of productivity in any organization; NGS is continuously committed to cultivate leaders of tomorrow by specializing in developing and implementing their own unique cooperate team culture.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="values">
                            <h2>Our Values</h2>
                            <p>Energetic</p>
                            <p>Cool Green</p>
                            <p>Collaboration</p>
                            <p>Synchronization</p>
                            <p>Work on basics</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-2 visible-lg">
                    Create </br>
                    <span class="lg-typ">systems</span> and </br>
                    <span class="lg-typ">applications</span> </br>
                    for </br>
                    <span class="lg-typ">better life</span></br>
                    <span class="lg-typ">style</span></br>
                    in a synchronised </br>
                    environment</br>
                </div>
            </div>
        </div>
    </section>
    <section class="need-help" id="needhelp">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h2>What do you need help with</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div><i class="icon star"></i></div>
                    <h3>Improve your business efficiency</h3>
                    <p>Tell us about your business, we will improve your business using technology</p>
                </div>
                <div class="col-md-3 col-sm-6 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div><i class="icon star"></i></div>
                    <h3>Process Optimization</h3>
                    <p>The discipline of adjusting a process so as to optimize some specified set of parameters while minimizing the cost and maximizing throughput.</p>
                </div>
                <div class="col-md-3 col-sm-6 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div><i class="icon star"></i></div>
                    <h3>When and how to use ICT?</h3>
                    <p>We are team ICT professionals with years of industry experience. Will tell exactly where, when and how to use it for your business.</p>
                </div>
                <div class="col-md-3 col-sm-6 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div><i class="icon star"></i></div>
                    <h3>Guidance and Consultancy</h3>
                    <p>We can provide expert advice in a many specialized areas suited for your business</p>
                </div>
                <div class="col-md-3 col-sm-6 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div><i class="icon star"></i></div>
                    <h3>Differentiation</h3>
                    <p>Do you want to look you different among the competitors? Will  assist you to get completive advantage.</p>
                </div>
                <div class="col-md-3 col-sm-6 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div><i class="icon star"></i></div>
                    <h3>Flexibility</h3>
                    <p>We are flexible when it comes to product changes according to customer requirement as well in defining commercial models</p>
                </div>
                <div class="col-md-3 col-sm-6 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div><i class="icon star"></i></div>
                    <h3>Customization</h3>
                    <p>We are flexible when it comes to product changes according to customer requirement</p>
                </div>
                <div class="col-md-3  col-sm-6 info-box revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div><i class="icon star"></i></div>
                    <h3>Future proof technology</h3>
                    <p>Our Solutions are always designed to be future proof as much as possible.</p>
                </div>
            </div>
    </section>
    
    <section class="product" id="product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Our Products</h2>
                </div>
            </div>
            <div class="row product-1 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                <div class="col-md-5 product-img nopadding">
                    <a href="https://youtu.be/wUCrxT3iMeA" data-toggle="lightbox" data-title="UTrack"><img src="img/Product-utrack.jpg" class="img-responsive" alt="product 1" /></a>
                    <div class="triangle-cover-left">
                        <div class="triangle-left"></div>
                    </div>
                </div>
                <div class="col-md-7 product-info nopadding">
                    <h3>Utrack  <span class="small-font">(One-STOP Place where You can Manage Your Fleet)</span></h3>
                    <p>Utrack is an excellent tool which gives top-notch improvement and productive output to your business, through the increase of the efficiency of your vehicle fleet. You would get complete access to the use of this product which would not only help to increase your vehicle fleet efficiency, but also enable you to personally manage your vehicle fleet with complete security.</p>
                    <a href="http://www.universaltrackers.com" target="_blank" class="btn btn-default btn-lg">Proceed to Site</a>
                </div>
            </div>
            <div class="row product-2 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                <div class="col-md-7 product-info nopadding">
                    <h3>Utaxi  <span class="small-font">(One-STOP Place where You can Manage Your Fleet)</span></h3>
                    <p>Here is one of the best apps currently available which offer users FREE Taxi finding solutions and completely user-friendly. The smart-click call allows users to make hassle-free calls with just one click, to the nearest taxi without entering mobile numbers. Users can view hire logs, set ratings, pay through the app and get e-invoice. Users can also view the platform via the web interface and so much more!
                    </p>
                    <a href="https://play.google.com/store/apps/details?id=com.pdrtaxi.utaxi" target="_blank" class="btn btn-default btn-lg">Proceed to Site</a>
                </div>
                <div class="col-md-5 product-img nopadding">
                    <img src="img/Product-Utaxi.jpg" class="img-responsive" alt="product 1" />
                    <div class="triangle-cover-right">
                        <div class="triangle-right"></div>
                    </div>
                </div>
            </div>
            <div class="row product-3 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                <div class="col-md-5 product-img nopadding">
                    <img src="img/Product-Communicator.jpg" class="img-responsive" alt="product 1" />
                    <div class="triangle-cover-left">
                        <div class="triangle-left"></div>
                    </div>
                </div>
                <div class="col-md-7 product-info nopadding">
                    <h3>NG Communicator</h3>
                    <p>Communication is a major challenge in any organization, having this is mind, the NG communicator has been developed to aid organizations, small and medium enterprises, and business firms bypass this challenge, thereby bringing an improvement to the way business is done.</p>
                    <a href="http://220.247.201.100:8080/RemoDisPro/login.htm" target="_blank" class="btn btn-default btn-lg">Proceed to Site</a>
                </div>
            </div>
            <div class="row product-4 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                <div class="col-md-7 product-info nopadding">
                    <h3>NGSchool</h3>
                    <p>Maximize the benefits of the educational media assets with the effective use of this brand new system that brings the learning and teaching experience to life! This brings a different dimension and definition of the educational system due to the classical mode of operations found in the product, and it’s user-friendly interface.</p>
                    <a href="https://play.google.com/store/apps/details?id=com.pdrtaxi.utaxi" target="_blank" class="btn btn-default btn-lg">Proceed to Site</a>
                </div>
                <div class="col-md-5 product-img nopadding">
                    <div class="slider">
                        <img src="img/Product-NGSchool.jpg" class="img-responsive" />
                        <img src="img/Product-NGSchool2.jpg" class="img-responsive" />
                        <img src="img/Product-NGSchool3.jpg" class="img-responsive" />
                    </div>
                    <div class="triangle-cover-right">
                        <div class="triangle-right"></div>
                    </div>
                </div>
            </div>
            <div class="row product-5 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400" >
                <div class="col-md-5 product-img nopadding">
                    <div class="slider">
                        <img src="img/Product-Next-Gen-Med.jpg" class="img-responsive" />
                        <img src="img/Product-Next-Gen-Med2.jpg" class="img-responsive" />
                    </div>
                    <div class="triangle-cover-left">
                        <div class="triangle-left"></div>
                    </div>
                </div>
                <div class="col-md-7 product-info nopadding">
                    <h3>Next Gen Med</h3>
                    <p>A Web-based Automated Process Management System which majorly focuses on total functionalities in the health care sector, giving individual clients steady access to health related functions and operations at an increased pace.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12 " >
                    <h2>Our services</h2>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-6 service-info sinfo-1 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Application Development</h3>
                    <p>With a deep rooted knowledge and years of professional experience in software development, our team of professional, are readily available as regards to development of applications and software based on the business needs of individual clients. This includes Android, Apple, and Windows Mobile application platforms.</p>

                </div>
                <div class="col-sm-6 service-info sinfo-2 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Application Support and Maintenance</h3>
                    <p>We professionally manage and maintain enterprise level application suit to ensure uptime and availability to cater for the business needs of clients. This comes with real-time support and update of applications to suit the needs of each client.</p>
                </div>
                <div class="col-sm-6 service-info sinfo-3 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Resources Outsourcing Services</h3>
                    <p>We aid all clients in boosting their companies’ organizational performance through the elimination of redundant functions, thereby increasing cost and competitive effectiveness, as this would go a long way in increasing efficiency of the core functions and aid the bringing out quality output.</p>
                </div>
                <div class="col-sm-6 service-info sinfo-4 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="400">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Customized Software Development</h3>
                    <p>We strive to meet the IT needs of growing businesses and complex industries, through the creation of custom software solutions, which are tailored to bring their imaginations to the limelight and foster problem-solving creativity. This gives businesses a higher edge over others making them scale greater heights and bringing out more output in the global village.</p>
                </div>
                <div class="col-sm-6 service-info sinfo-5 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="600">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Managed Services & Support</h3>
                    <p>We will fine tune processors and increase the operational efficiency of our clients' organization, also providing a dashboard which enables each user to monitor event logs (activities) while our service engineers manage your system and keep your operational expenditure low.</p>
                </div>
                <div class="col-sm-6 service-info sinfo-6 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="600">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Open source systems implementation, customization and support</h3>
                    <p>For individuals interested in lowering total cost of ownership (TCO) and increasing returns on investment, then the time has come to convert your systems to open source systems which would enable you to provide system implementation and training services for your customers at an affordable fee.</p>
                </div>
                <div class="col-sm-6 service-info sinfo-7 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="600">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>E commerce - total development for online purchasing solutions</h3>
                    <p>Our end to end e-commerce solutions enables small and medium businesses to sell products and accept payments online. Our capability and compatibility in integrating gateway solutions with major local banks, mobile cash solutions, PayPal, Paycrop, etc. is unequaled.</p>
                </div>
                <div class="col-sm-6 service-info sinfo-8 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="600">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Telecommunication Software development</h3>
                    <p>With professional experience and experts in Telco domain, NGS provides telecommunication solutions which include network/cloud solutions, value-added services, location based services and corporate solutions.</p>
                </div>
                <div class="col-sm-6 service-info sinfo-9 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Content Management Systems (CMS)</h3>
                    <p>With years of professional experience, our experts will take charge of the development of CMS based on every business needs of our individual clients from any part of the globe giving you relatively bespoke services and continuous access.</p>
                </div>
                <div class="col-sm-6 service-info sinfo-10 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Help desk and NOC services</h3>
                    <p>On customer request, NGS will dispense quality and reliable NOC services. These services are tailored to meet the needs of individual clients and help them build steady customer base with our excellent and top-notch services.</p>
                </div>
                <div class="col-sm-6 service-info sinfo-11 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Professional Services Automation (PSA)</h3>
                    <p>We pride ourselves with the steady provision of Professional Service Automation (PSA) to meet the multifaceted industry needs of growing small and medium businesses for individual clients. Individuals who understand the ever growing need of PSA would make use of this with hassle-free access every time of the day.  </p>
                </div>
                <div class="col-sm-6 service-info sinfo-12 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Agile Development</h3>
                    <p>With a set of principles for development, the NGS team brings about the rise of solutions which also evolve through thorough collaboration and self-organization, thereby bringing out steady and qualitative output on a regular basis.</p>
                </div>
                <div class="col-sm-6 service-info sinfo-13 revealOnScroll opacity-0" data-animation="fadeInUp" data-timeout="800">
                    <div class="icon-wrapper icon-arrow"></div>
                    <h3>Cloud Development</h3>
                    <p>With the development and implementation of cloud strategies, we tend to gain value from cloud deployments for businesses of our clients. Our team of professionals excels in the migration of existing systems and creation of customized applications to take good advantage of the cloud's flexibility, capacity, manageability and cost-effectiveness.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="news" id="news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>News Feed</h2>
                </div>
            </div>
            <div class="row news-item">
                <div class="col-md-12">
                    <div class="date"><span class="big">10</span> Mar 2016</div>
                    <h4><a a href="#">NGS expand their operations .Opened a sophisticated development Centre </a></h4>
                    <p>NGS expand their operations .Opened a sophisticated development Centre </p>
                </div>
            </div>
            <div class="row news-item">
                <div class="col-md-12">
                    <div class="date"><span class="big">14</span> Jan 2016</div>
                    <h4 ><a href="news/1/IMG_1923.jpg" data-toggle="lightbox">Kanthale Hospital -Automated Process Management System opening ceremony</a></h4>
                    <p>Kanthale Hospital -Automated Process Management System opening ceremony</p>
                    <div class="row">
                        <div class="thumb pull-left">
                            <a class="thumbnail" href="news/1/IMG_1923.jpg"  data-toggle="lightbox" data-title="Kanthale Hospital -Automated Process Management System opening ceremony" data-gallery="multiimages">
                                <img class="img-responsive" src="news/1/IMG_1923-thb.jpg" alt="">
                            </a>
                        </div>
                        <div class="thumb pull-left">
                            <a class="thumbnail" href="news/1/IMG_1929.jpg"  data-toggle="lightbox" data-title="Kanthale Hospital -Automated Process Management System opening ceremony" data-gallery="multiimages">
                                <img class="img-responsive" src="news/1/IMG_1929-thb.jpg" alt="">
                            </a>
                        </div>
                        <div class="thumb pull-left">
                            <a class="thumbnail" href="news/1/IMG_1936.jpg"  data-toggle="lightbox" data-title="Kanthale Hospital -Automated Process Management System opening ceremony" data-gallery="multiimages">
                                <img class="img-responsive" src="news/1/IMG_1936-thb.jpg" alt="">
                            </a>
                        </div>
                        <div class="thumb pull-left">
                            <a class="thumbnail" href="news/1/IMG_1946.jpg"  data-toggle="lightbox" data-title="Kanthale Hospital -Automated Process Management System opening ceremony" data-gallery="multiimages">
                                <img class="img-responsive" src="news/1/IMG_1946-thb.jpg" alt="">
                            </a>
                        </div>
                        <div class="thumb pull-left">
                            <a class="thumbnail" href="news/1/IMG_1948.jpg"  data-toggle="lightbox" data-title="Kanthale Hospital -Automated Process Management System opening ceremony" data-gallery="multiimages">
                                <img class="img-responsive" src="news/1/IMG_1948-thb.jpg" alt="">
                            </a>
                        </div>
                        <div class="thumb pull-left">
                            <a class="thumbnail" href="news/1/IMG_1950.jpg"  data-toggle="lightbox" data-title="Kanthale Hospital -Automated Process Management System opening ceremony" data-gallery="multiimages">
                                <img class="img-responsive" src="news/1/IMG_1950-thb.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="client" id="client">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Clients and Partners</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-6 client-1 revealOnScroll opacity-0" data-animation="fadeIn" data-timeout="300"></div>
                <div class="col-md-2 col-sm-3 col-xs-6 client-2 revealOnScroll opacity-0" data-animation="fadeIn" data-timeout="400"></div>
                <div class="col-md-2 col-sm-3 col-xs-6 client-3 revealOnScroll opacity-0" data-animation="fadeIn" data-timeout="500"></div>
                <div class="col-md-2 col-sm-3 col-xs-6 client-4 revealOnScroll opacity-0" data-animation="fadeIn" data-timeout="600"></div>
                <div class="col-md-2 col-sm-3 col-xs-6 client-5 revealOnScroll opacity-0" data-animation="fadeIn" data-timeout="700"></div>
                <div class="col-md-2 col-sm-3 col-xs-6 client-6 revealOnScroll opacity-0" data-animation="fadeIn" data-timeout="800"></div>
                <div class="col-md-2 col-sm-3 col-xs-6 client-7 revealOnScroll opacity-0" data-animation="fadeIn" data-timeout="900"></div>
                <div class="col-md-2 col-sm-3 col-xs-6 client-8 revealOnScroll opacity-0" data-animation="fadeIn" data-timeout="1000"></div>
                <div class="col-md-2 col-sm-3 col-xs-6 client-9 revealOnScroll opacity-0" data-animation="fadeIn" data-timeout="1100"></div>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Contact Us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                     <?php if(!empty($emailSent)): ?>
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-success text-center">Your message was sent successfully. Thanks.</div>
        </div>
    <?php else: ?>
        <?php if(!empty($hasError)): ?>
        <div class="col-md-5 col-md-offset-4">
            <div class="alert alert-danger text-center">Cannot send mail An error occurred while delivering this message</div>
        </div>
        <?php endif; ?>

    <!--<div >
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>#contact" id="contact-form" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="form-name" name="form-name" placeholder="Name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" class="form-control" id="form-email" name="form-email" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tel" class="col-lg-2 control-label">Telephone</label>
                <div class="col-lg-10">
                    <input type="tel" class="form-control" id="form-tel" name="form-tel" placeholder="Telephone">
                </div>
            </div>
            <div class="form-group">
                <label for="assunto" class="col-lg-2 control-label">Subject</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="form-assunto" name="form-assunto" placeholder="Subject" required>
                </div>
            </div>
            <div class="form-group">
                <label for="mensagem" class="col-lg-2 control-label">Message</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="form-mensagem" name="form-mensagem" placeholder="Message" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    </div>-->

    
    <?php endif; ?>
                </div>
                <div class="col-md-5">
                    <h3>Next Generation Services Pvt Ltd</h3>
                    <h4>Cooperate Office</h4>
                    <p>518/2/1 Kandy Road ,</br>Kelaniya, Sri Lanka.</p>
                    <h4>Development Centre</h4>
                    <p>2nd floor, APL Group Building,</br>NO 5 ,Kandy road, </br>Kelaniya, Sri Lanka.</p>
                    <p><b>Telephone :</b> +94 7111 688 68</br>
                    <b>Fax:</b> +94 11  2 986388</p>
                </div>
            </div>
        </div>
    </section>
    <section class="map" id="map">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div id="map"></div>
                </div>
            </div>
            
        </div>
    </section>
    <section class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  Copyright 2016, Next Generation services (Pvt) Ltd
                </div>
            </div>
            
        </div>
    </section>
    <div class="social">
        <img src="img/social.jpg" alt="social">
    </div>
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
    <script src="js/vendor/jquery.vide.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/ekko-lightbox.min.js"></script>
    <script src="js/vendor/sss.min.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
</body>
</html>