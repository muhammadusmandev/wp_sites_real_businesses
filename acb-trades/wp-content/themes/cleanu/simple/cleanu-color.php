<?php 
if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
  global $cleanu_option; 

function cleanu_customize_css() { 
    global $cleanu_option; if (!empty($cleanu_option['main_color_cleanu']) && $cleanu_option['main_color_cleanu'] == 2) { 
?>
	<style>
	:root {
  --color-primary: <?php echo esc_html($cleanu_option['colorcode']); ?>;
  --color-secondary: <?php echo esc_html($cleanu_option['sec_colorcode']); ?>;
  --dark: <?php echo esc_html($cleanu_option['primary_dark']); ?>;
  }

a:hover {
  color:var(--color-primary);
}


.bg-dark {
  background-color:var(--dark) !important;
}

.bg-dark-secondary {
  background-color:var(--dark-secondary) !important;
}

.bg-theme {
  background-color:var(--color-primary);
}

.bg-theme-secondary {
  background-color:var(--color-secondary);
}


.gradient-bg {
  background-image: linear-gradient(90deg, rgba(74, 196, 243, 1) 23%, rgba(9, 168, 228, 1) 100%);
  background-color:var(--color-primary);
}



.shadow.dark::after {
  background: var(--dark);
  content: "";
  height: 100%;
  left: 0;
  opacity: 0.6;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -1;
}

.shadow.dark-hard::after {
  background: var(--dark);
  content: "";
  height: 100%;
  left: 0;
  opacity: 0.7;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -1;
}

.shadow.theme::after {
  background-color:var(--color-primary);
  content: "";
  height: 100%;
  left: 0;
  opacity: 0.5;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -1;
}

.shadow.theme-hard::after {
  background-color:var(--color-primary);
  content: "";
  height: 100%;
  left: 0;
  opacity: 0.7;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -1;
}


.btn.btn-gradient::after {
  position: absolute;
  left: 0;
  top: 0;
  content: "";
  height: 100%;
  width: 100%;
  background-image:var(--bg-gradient);
  background-size: 200% auto;
  text-transform: uppercase;
  display: inline-block;
  color: var(--white) !important;
  background-color:var(--color-primary);
  z-index: -1;
  transition: all 0.35s ease-in-out;
}


.btn.btn-light.effect::before {
  position: absolute;
  left: 0;
  bottom: 0;
  content: "";
  height: 100%;
  width: 0;
  background:var(--color-primary);
  z-index: -1;
  transition: all 0.35s ease-in-out;
}

.btn.btn-light.effect:hover {
  border: 2px solid var(--color-primary);
  color: var(--white);
  background: transparent;
}



.btn.btn-theme.effect {
  color: var(--white);
  border: 2px solid var(--color-primary);
  overflow: hidden;
  position: relative;
  z-index: 1;
}

.btn.btn-theme.effect.secondary {
  color: var(--color-heading);
  border: 2px solid var(--color-secondary);
}

.btn.btn-theme.effect::after {
  position: absolute;
  left: 0;
  bottom: 0;
  content: "";
  height: 100%;
  width: 100%;
  background:var(--color-primary);
  z-index: -1;
  transition: all 0.35s ease-in-out;
}

.btn.btn-theme.effect.secondary::after {
  background:var(--color-secondary);
}

.btn.btn-theme.effect::before {
  position: absolute;
  left: 0;
  bottom: 0;
  content: "";
  height: 100%;
  width: 0;
  background: var(--color-secondary);
  z-index: -1;
  transition: all 0.35s ease-in-out;
}

.btn.btn-theme.secondary.effect::before {
  background: var(--dark-secondary);
}



.btn.btn-theme.effect:hover {
  border: 2px solid var(--color-secondary);
  color: var(--color-heading);
  background: transparent;
}

.btn.btn-theme.secondary.effect:hover {
  border: 2px solid var(--dark-secondary);
  color: var(--white);
}

.shadow .btn.btn-theme.effect:hover {
  border: 2px solid var(--white);
  color:var(--color-heading);
  background: transparent;
}

.btn.btn-theme.effect:hover::after {
  width: 0;
}

.btn.btn-theme.effect:hover::before {
  width: 100%;
}

.btn.btn-dark.effect {
  color: var(--white);
  border: 2px solid var(--dark);
  box-shadow: 0 10px 30px 0 rgb(44 130 237 / 40%);
  overflow: hidden;
  position: relative;
  background: transparent;
  z-index: 1;
}

.btn.btn-dark.secondary.effect {
  border: 2px solid var(--dark-secondary);
}

.btn.btn-dark.effect::after {
  position: absolute;
  left: 0;
  bottom: 0;
  content: "";
  height: 100%;
  width: 100%;
  background: var(--dark);
  z-index: -1;
  transition: all 0.35s ease-in-out;
}

.btn.btn-dark.secondary.effect::after {
  background: var(--dark-secondary);
}

.btn.btn-dark.effect::before {
  position: absolute;
  left: 0;
  bottom: 0;
  content: "";
  height: 100%;
  width: 0;
  background:var(--color-secondary);
  z-index: -1;
  transition: all 0.35s ease-in-out;
}

.btn.btn-dark.effect:hover {
  border: 2px solid var(--color-secondary);
  color: var(--color-heading);
}


.btn-theme-border {
  border: 2px solid var(--color-primary);
  overflow: hidden;
  position: relative;
  z-index: 1;
}

.btn-theme-border::after {
  position: absolute;
  left: 0;
  top: 0;
  content: "";
  height: 100%;
  width: 0;
  background:var(--color-primary);
  z-index: -1;
  transition: all 0.25s ease-in-out;
}



.btn-dark-border {
  border: 2px solid var(--dark);
  overflow: hidden;
  position: relative;
  z-index: 1;
}

.btn-dark-border::after {
  position: absolute;
  left: 0;
  top: 0;
  content: "";
  height: 100%;
  width: 0;
  background: var(--dark);
  z-index: -1;
  transition: all 0.25s ease-in-out;
}



.btn-theme-effect {
  border: 2px solid var(--color-primary);
  overflow: hidden;
  position: relative;
  z-index: 1;
  color: var(--white);
}

.btn-theme-effect::after {
  position: absolute;
  left: -10%;
  top: -10%;
  content: "";
  height: 120%;
  width: 120%;
  background:var(--color-primary);
  z-index: -1;
  transition: all 0.35s ease-in-out;
}



.btn-theme-effect:hover {
  color:var(--color-heading);
}




/* Start Site Heading */

.site-heading h4 {
  text-transform: uppercase;
  font-weight: 500;
  color: var(--color-primary);
  position: relative;
  z-index: 1;
  display: inline-block;
}

.sub-heading {
  text-transform: uppercase;
  font-weight: 500;
  color:var(--color-primary);
  position: relative;
  z-index: 1;
  display: inline-block;
  font-size: 22px;
}

.heading {
  

.site-heading .devider {
  display: inline-block;
  width: 50px;
  height: 2px;
  background:var(--color-primary);
  position: relative;
  z-index: 1;
  left: 10px;
}



.site-heading .devider:before {
  position: absolute;
  left: -15px;
  top: 0;
  content: "";
  height: 2px;
  width: 10px;
  background:var(--color-primary);
}



.heading-left h5 {
  text-transform: uppercase;
  font-weight: 500;
  color:var(--color-primary);
  position: relative;
  z-index: 1;
  display: inline-block;
}


.top-bar-area .info li i {
    margin-right: 5px;
    color: var(--color-primary);
    font-weight: 100;
    font-size: 20px;
    position: relative;
    top: 2px;
}


.top-bar-area .info-colums ul li .icon i {
  color:var(--color-primary);
}



.banner-area .carousel-indicators li {
  display: block;
  height: 20px;
  width: 20px;
  margin: 10px 5px;
  border: 6px solid var(--color-primary);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  background: transparent;
  position: relative;
  z-index: 1;
}


.banner-area .carousel-indicators li.active {
  border: 6px solid var(--color-primary);
}

.banner-area .carousel-indicators.theme li.active {
  border: 6px solid var(--color-primary);
}

.banner-area .carousel-indicators li::after {
  position: absolute;
  left: 50%;
  top: 50%;
  content: "";
  height: 5px;
  width: 5px;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  background:var(--color-primary);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}

.banner-area .carousel-indicators.theme li::after {
  background:var(--color-primary);
}




.video-play-button {
  color:var(--color-secondary);
  font-size: 30px;
  left: 50%;
  padding-left: 7px;
  position: absolute;
  top: 50%;
  transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -ms-transform: translateX(-50%) translateY(-50%);
  -o-transform: translateX(-50%) translateY(-50%);
  z-index: 1;
}



.video-play-button.theme:before,
.video-play-button.theme:after {
  background:var(--color-primary) repeat scroll 0 0;
}

.video-play-button.theme.secondary:before,
.video-play-button.theme.secondary:after {
  background:var(--color-secondary) repeat scroll 0 0;
}

.video-play-button i {
  display: block;
  position: relative;
  z-index: 3;
  color:var(--color-primary);
}

.about-style-one .thumb img:nth-child(2) {
  position: absolute;
  right: 0;
  bottom: -65px;
  width: 50%;
  border-radius: 50%;
  border: 10px solid var(--color-secondary);
}

.about-style-one .thumb h2 {
  font-size: 100px;
    font-weight: 900;
    margin: 0;
    line-height: 105px;
    text-shadow: -5px 5px 0px #eceefe;
    color: var(--color-primary);
}





.about-style-one .bottom-info .contact i {
  display: inline-block;
  font-size: 40px;
  margin-right: 15px;
  color:var(--color-primary);
}



.about-style-one blockquote {
  background: var(--white);
  box-shadow: 0 0 25px rgb(0 0 0 / 8%);
  padding: 30px !important;
  border-left: 5px solid var(--color-primary) !important;
  margin-bottom: 30px !important;
  font-size: 20px;
  line-height: 32px;
  color:var(--color-heading) !important;
  font-weight: 400;
  font-style: italic;
}

 .services-style-one ul li::after {
  position: absolute;
    left: 0;
    top: 50%;
    content: "\f00c";
    font-family: "Font Awesome 5 Pro";
    font-size: 16px;
    color: var(--color-secondary);
    transform: translateY(-50%);
    font-weight: 400;
}

.services-style-one .content i {
  display: inline-block;
  color:var(--color-primary);
}


.services-style-one .thumb h4::before {
    position: absolute;
    left: 0;
    top: 0;
    content: "";
    height: 100%;
    width: 100%;
    background: var(--dark);
    z-index: -1;
    transform: skewX(-10deg);
    box-shadow: 0 0 25px rgb(0 0 0 / 8%);
    border-left: 3px solid var(--color-secondary);
    border-radius: 8px;
}



.services-style-one .thumb h4 strong span {
    color:var(--color-secondary);
}



.services-details-items .services-sidebar .widget-title::after {
  position: absolute;
  left: 0;
  bottom: 0;
  content: "";
  height: 2px;
  width: 50px;
  border-bottom: 2px solid var(--color-primary);
}

.services-details-items .services-sidebar .services-list a::before {
  position: absolute;
  left: 0;
  top: 0;
  content: "";
  height: 100%;
  width: 60%;
  background:var(--color-primary);
  z-index: -1;
  transition: all 0.35s ease-in-out;
  opacity: 0;
  visibility: hidden;
}

.services-details-items .services-sidebar .single-widget.quick-contact .content i {
  display: inline-block;
  font-size: 25px;
  color: var(--white);
  margin-bottom: 35px;
  height: 70px;
  width: 70px;
  line-height: 70px;
  background:var(--color-secondary);
  border-radius: 50%;
  position: relative;
  z-index: 1;
  text-align: center;
  font-weight: 100;
}

.services-details-items .services-sidebar .single-widget.quick-contact .content i::after {
  position: absolute;
  left: -10%;
  top: -10%;
  content: "";
  height: 120%;
  width: 120%;
  background:var(--color-secondary);
  z-index: -1;
  border-radius: 50%;
  opacity: 0.3;
}


.services-details-items .services-sidebar .single-widget.brochure a:hover {
  color:var(--color-primary);
}

.services-details-area .features i {
  display: inline-block;
  font-size: 50px;
  color:var(--color-primary);
  margin-right: 25px;
}

.services-more .item i {
  display: inline-block;
  font-size: 50px;
  color:var(--color-primary);
  margin-bottom: 30px;
}

.award .item h4 {
    font-weight: 600;
    color: var(--white);
    display: block;
    padding: 10px 30px;
    background: var(--color-primary);
    border: 2px solid var(--white);
    border-radius: 10px;
    position: relative;
}

.award .item h4::after {
    height: 150px;
    width: 150px;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background: var(--color-primary);
    content: "";
    position: absolute;
    z-index: -1;
    border-radius: 50%;
    border: 2px solid #ffffff;
}

.feature-style-three .top i {
  display: inline-block;
  font-size: 60px;
  margin-bottom: 25px;
  color:var(--color-primary);
  position: relative;
  z-index: 1;
}


.process-style-one span {
  display: inline-block;
  text-align: center;
  height: 60px;
  width: 60px;
  line-height: 60px;
  background:var(--color-primary);
  color: var(--white);
  font-weight: 900;
  border-radius: 50%;
  font-size: 20px;
  position: absolute;
  z-index: 1;
  margin-bottom: 19px;
  transition: all 0.35s ease-in-out;
  bottom: 20px;
  right: -5px;
  -wekit-clip-path: polygon(45% 1.33975%, 46.5798% 0.60307%, 48.26352% 0.15192%, 50% 0%, 51.73648% 0.15192%, 53.4202% 0.60307%, 55% 1.33975%, 89.64102% 21.33975%, 91.06889% 22.33956%, 92.30146% 23.57212%, 93.30127% 25%, 94.03794% 26.5798%, 94.48909% 28.26352%, 94.64102% 30%, 94.64102% 70%, 94.48909% 71.73648%, 94.03794% 73.4202%, 93.30127% 75%, 92.30146% 76.42788%, 91.06889% 77.66044%, 89.64102% 78.66025%, 55% 98.66025%, 53.4202% 99.39693%, 51.73648% 99.84808%, 50% 100%, 48.26352% 99.84808%, 46.5798% 99.39693%, 45% 98.66025%, 10.35898% 78.66025%, 8.93111% 77.66044%, 7.69854% 76.42788%, 6.69873% 75%, 5.96206% 73.4202%, 5.51091% 71.73648%, 5.35898% 70%, 5.35898% 30%, 5.51091% 28.26352%, 5.96206% 26.5798%, 6.69873% 25%, 7.69854% 23.57212%, 8.93111% 22.33956%, 10.35898% 21.33975%);
  clip-path: polygon(45% 1.33975%, 46.5798% 0.60307%, 48.26352% 0.15192%, 50% 0%, 51.73648% 0.15192%, 53.4202% 0.60307%, 55% 1.33975%, 89.64102% 21.33975%, 91.06889% 22.33956%, 92.30146% 23.57212%, 93.30127% 25%, 94.03794% 26.5798%, 94.48909% 28.26352%, 94.64102% 30%, 94.64102% 70%, 94.48909% 71.73648%, 94.03794% 73.4202%, 93.30127% 75%, 92.30146% 76.42788%, 91.06889% 77.66044%, 89.64102% 78.66025%, 55% 98.66025%, 53.4202% 99.39693%, 51.73648% 99.84808%, 50% 100%, 48.26352% 99.84808%, 46.5798% 99.39693%, 45% 98.66025%, 10.35898% 78.66025%, 8.93111% 77.66044%, 7.69854% 76.42788%, 6.69873% 75%, 5.96206% 73.4202%, 5.51091% 71.73648%, 5.35898% 70%, 5.35898% 30%, 5.51091% 28.26352%, 5.96206% 26.5798%, 6.69873% 25%, 7.69854% 23.57212%, 8.93111% 22.33956%, 10.35898% 21.33975%);
}



.process-style-one .item:hover span, 
.process-style-one:nth-child(2n) .item span {
  transform: scale(1.2);
  background: var(--color-secondary);
  color: var(--white);
  right: -45px;
}


.appoinment-form form button::after {
  position: absolute;
  left: 0;
  top: 0;
  content: "";
  height: 100%;
  width: 100%;
  background-size: 200% auto;
  text-transform: uppercase;
  display: inline-block;
  background-color:var(--color-secondary);
  transition: all 0.35s ease-in-out;
}

.appoinment-form form button:hover::after {
  background: var(--color-primary);
}


.fun-fact .counter {
  position: relative;
  display: flex;
  align-items: center;
  font-size: 68px;
  font-weight: 700;
  color:var(--color-heading);
  line-height: 1;
  margin-bottom: 5px;
  justify-content: center;
}

.fun-fact .counter .operator {
  font-size: 35px;
  margin-left: 2px;
  position: relative;
  top: -20px;
  color:var(--color-primary);
}

.bg-dark .fun-fact .counter .operator,
.bg-theme .fun-fact .counter .operator {
  color:var(--color-secondary);
}



.pricing-area .pricing-item li i.fa-times-circle {
  color:var(--color-secondary);
}


.pricing-area .pricing-item.active li i.fa-times-circle {
    color:var(--color-secondary);
}



.project-style-one .info h4,
.project-style-one .info a {
  color: var(--color-heading);
  font-weight: 500;
  margin-bottom: 0;
}

.project-style-one .info span {
  transition: all 0.35s ease-in-out;
  position: relative;
  font-size: 14px;
  text-transform: uppercase;
  font-weight: 600;
  display: inline-block;
  color: var(--color-heading);
  -webkit-transition: all 0.35s ease-in-out;
  -moz-transition: all 0.35s ease-in-out;
  -ms-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
}

.projects-area .project-items .owl-nav .owl-prev,
.projects-area .project-items .owl-nav .owl-next {
  background: transparent none repeat scroll 0 0;
  color:var(--color-primary);
  font-size: 25px;
  height: 50px;
  left: 100px;
  line-height: 60px;
  margin: -20px 0 0;
  padding: 0;
  position: absolute;
  top: 50%;
  width: 50px;
  transition: all 0.35s ease-in-out;
  display: inline-block;
  text-align: center;
  background: var(--white);
  border-radius: 50%;
  box-shadow: 0 0 1px 1px rgb(20 23 28 / 10%), 0 3px 1px 0 rgb(20 23 28 / 10%);
  opacity: 0;
}



.project-style-two .info span {
    color: var(--color-secondary);
    font-size: 16px;
}

.project-details-area .project-info h3::after {
    position: absolute;
    left: 0;
    bottom: 0;
    content: "";
    height: 2px;
    width: 50px;
    border-bottom: 2px solid var(--color-primary);
}

.project-details-area .project-info>ul li {
    font-weight: 600;
    font-size: 16px;
    color: var(--color-heading);
    margin-top: 15px;
}


.project-details-area .project-info>ul li span {
  font-weight: 400;
  position: relative;
  display: block;
  color:var(--color-paragraph);
}



  .project-style-one .info span {
    display: inline-block;
    padding: 6px 15px;
    background-color:var(--color-secondary);
    color: var(--black);
  }

  

.testimonials-area .testimonial-carousel.owl-carousel .owl-dots .owl-dot span {
  background:var(--color-primary);
  height: 10px;
  width: 10px;
  padding: 0;
  margin: 0;
  opacity: 0.3;
  transition: all 0.35s ease-in-out;
}



.estimate-area .estimate-form::after {
  position: absolute;
  right: 0;
  top: 0;
  content: "";
  height: 100%;
  width: 300%;
  background: var(--color-secondary);
  z-index: -1;
}




.estimate-area .estimate-form button::after {
  position: absolute;
  left: 0;
  top: 0;
  content: "";
  height: 100%;
  width: 100%;
  background-size: 200% auto;
  text-transform: uppercase;
  display: inline-block;
  background-color: var(--color-primary);
  z-index: -1;
  transition: all 0.35s ease-in-out;
  border-radius: 5px;
}


.features-style-two-box {
  background: var(--color-primary);
  z-index: 9;
  position: relative;
  padding: 80px 50px;
  margin-top: 35px;
}



.item-carousel.feature-service-carousel.owl-carousel.owl-theme .owl-dots .owl-dot.active span {
  background: var(--color-secondary);
  height: 15px;
  width: 15px;
  position: relative;
  top: 2px;
}

a.btn-regular:hover {
  color: var(--color-secondary);
}

a.btn-regular:hover i::after {
  background: var(--color-secondary);
}



.feature-list i {
    display: inline-block;
    text-align: center;
    border-radius: 5px;
    margin-right: 25px;
    color: var(--color-secondary);
    font-size: 65px;
    position: relative;
    z-index: 1;
}





.sevices-style-two i {
  display: inline-block;
  font-size: 70px;
  text-align: center;
  border-radius: 50%;
  margin-bottom: 30px;
  color:var(--color-primary);
}



.services-style-two-area .services-4-col-carousel.owl-carousel .owl-item.center .sevices-style-two i {
    color: var(--color-secondary);
}


.services-style-two-area .services-4-col-carousel .owl-nav .owl-prev,
.services-style-two-area .services-4-col-carousel .owl-nav .owl-next {
  background: transparent none repeat scroll 0 0;
  font-size: 25px;
  height: 50px;
  left: 100px;
  line-height: 60px;
  margin: -20px 0 0;
  padding: 0;
  position: absolute;
  top: 50%;
  width: 50px;
  transition: all 0.35s ease-in-out;
  display: inline-block;
  text-align: center;
  background: var(--color-secondary);
  border-radius: 50%;
  box-shadow: 0 0 1px 1px rgb(20 23 28 / 10%), 0 3px 1px 0 rgb(20 23 28 / 10%);
  opacity: 0;
  color: var(--black);
}




.team-style-one .item .thumb::before {
  position: absolute;
  left: 0;
  top: 0;
  content: "";
  height: 60%;
  width: 100%;
  transition: all 0.35s ease-in-out;
  background:var(--color-primary);
  opacity: 0;
  visibility: hidden;
}


.share-button {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 45px;
    height: 45px;
    color: var(--white);
    background-color: var(--color-primary);
    border-radius: 10px;
    box-shadow: 0px 0px 0px 2px #ffffff;
    cursor: pointer;
    transition: .3s ease;
    transform: rotate(45deg);
}



.team-single-area .team-content-top .right-info span {
  display: block;
  text-transform: uppercase;
  color:var(--color-primary);
  font-weight: 500;
  margin-bottom: 25px;
}



.team-single-area .right-info ul li {
  margin-top: 10px;
  color:var(--color-heading);
}

.team-single-area .right-info ul li a:hover {
  color:var(--color-primary);
}


.team-single-area .right-info .social .share-link>i {
  display: inline-block;
  height: 45px;
  background: var(--white);
  box-shadow: 0 0 10px #cccccc;
  line-height: 45px;
  width: 45px;
  text-align: center;
  border-radius: 50%;
  cursor: pointer;
  color:var(--color-primary);
}


.search-service-box .input-box .nice-select::after {
  border-color:var(--color-primary);
  height: 10px;
  width: 10px;
}


.search-service-box .input-box button {
  float: right;
  line-height: 60px;
  min-height: 65px;
  padding: 0 30px;
  background:var(--color-secondary);
  color: var(--black);
  text-transform: uppercase;
  font-weight: 600;
}

  
  .blog-area .thumb .date {
  position: absolute;
  right: 30px;
  bottom: -31px;
  background: var(--white);
  color: var(--color-heading);
  font-size: 20px;
  text-align: center;
  display: inline-block;
  line-height: 32px;
  font-weight: 600;
  }
  
  .blog-area .thumb .date strong {
  display: block;
  font-weight: 800;
  font-size: 14px;
  text-transform: uppercase;
  background: var(--color-primary);
  color: var(--white);
  padding: 0 21px;
  }
  
  
  
  .blog-area.full-blog .item .info .meta ul li a:hover {
  color: var(--color-primary);
  }
  
  
  .blog-area .item .info .meta ul li a:hover {
  color: var(--color-primary);
  }
  
  
  
  .blog-area .item .info h2 a:hover,
  .blog-area .item .info h3 a:hover,
  .blog-area .item .info h4 a:hover {
  color: var(--color-primary);
  }
  

  
  .blog-area .item .info .content h4 a:hover {
  color: var(--color-primary);
  }
  
  
  
  .pagi-area .pagination li a {
  display: inline-block;
  padding: 15px 20px;
  border-radius: 5px;
  margin: 0 2px;
  margin-top: 5px;
  color: var(--color-heading);
  font-weight: 800;
  }
  
  .pagi-area .pagination li.active a {
  background: var(--color-primary);
  border-color: var(--color-primary);
  }
  
  /
  
  .blog-area .sidebar .title h4::after {
  position: absolute;
  left: 0;
  bottom: 0;
  content: "";
  height: 2px;
  width: 50px;
  border-bottom: 2px solid var(--color-primary);
  }
  

  
  .blog-area .sidebar button[type="submit"] {
    border: none;
    color: var(--white);
    font-weight: 500;
    letter-spacing: 1px;
    min-height: 50px;
    width: 50px;
    position: absolute;
    right: 5px;
    text-transform: uppercase;
    top: 5px;
    -webkit-transition: all 0.35s ease-in-out;
    -moz-transition: all 0.35s ease-in-out;
    -ms-transition: all 0.35s ease-in-out;
    -o-transition: all 0.35s ease-in-out;
    transition: all 0.35s ease-in-out;
    font-size: 16px;
    background: var(--color-primary);
    border-radius: 8px;
  }
  
  .blog-area .sidebar button[type="submit"]:hover {
  background: var(--color-secondary);
  }
  
  
  
  .blog-area .sidebar .sidebar-item li a:hover {
  color: var(--color-primary);
  }
  
  .blog-area .sidebar .sidebar-item.category li a span {
    font-size: 12px;
    margin-left: 5px;
    background: var(--white);
    min-width: 40px;
    padding: 2px 5px;
    text-align: center;
    border-radius: 30px;
    margin: 3px 0;
    font-weight: 600;
  }
  
  
  
  .sidebar-item.recent-post li a {
  color: var(--color-heading);
  display: block;
  font-weight: 700;
  }
  
  
  
  .sidebar-item.recent-post li a:hover {
  color: var(--color-primary);
  }
  
  .sidebar-item.recent-post li a span {
  display: inline-block;
  color: var(--dark);
  }
  

  
  .sidebar-item.tags ul li a:hover {
  color: var(--color-primary);
  }
  

  
  .blog-area .sidebar .sidebar-item.add-banner .sidebar-info::after {
  position: absolute;
  left: 0;
  top: 0;
  content: "";
  height: 100%;
  width: 100%;
  background: var(--color-primary);
  z-index: -1;
  opacity: 0.7;
  }
  
  .wp-block-tag-cloud a:hover {
  color: var(--white) !important;
  background: var(--color-primary);
  }

  
  /* Blog Single */
  .blog-area.single .item .content-box span {
  background: var(--color-primary) none repeat scroll 0 0;
  color: var(--white);
  display: inline-block;
  font-weight: 600;
  letter-spacing: 1px;
  padding: 3px 20px;
  text-transform: uppercase;
  }
  
  
  .blog-area .blog-content .share li a {
  display: inline-block;
  color: var(--color-primary);
  }
  

  
  .pagination li a {
  display: inline-block;
  padding: 15px 20px;
  border-radius: 5px;
  margin: 0 2px;
  color: var(--color-primary);
  font-weight: 800;
  }
  
  .pagination li.page-item.active a {
  background: var(--color-primary);
  border-color: var(--color-primary);
  }
  
.contact-content form button::after {
  position: absolute;
  left: 0;
  top: 0;
  content: "";
  height: 100%;
  width: 100%;
  background-size: 220% 150%;
  text-transform: uppercase;
  display: inline-block;
  color: var(--black) !important;
  background-color:var(--color-secondary);
  z-index: -1;
  transition: all 0.35s ease-in-out;
  border-radius: 5px;
}


.contact-content .content {
  position: relative;
  padding: 50px;
  border-radius: 10px;
  background: var(--color-primary);
}



.contact-content .content i {
  display: inline-block;
  font-size: 45px;
  margin-bottom: 15px;
  color:var(--color-secondary);
  font-weight: 600;
}



.maps-area::after {
  position: absolute;
  left: 0;
  bottom: -300px;
  content: "";
  height: 80%;
  width: 100%;
  background: var(--color-primary);
  z-index: -1;
  transform: skewY(-5deg);
}

footer .f-items .f-item form button {
  position: absolute;
  right: 0;
  top: 0;
  height: 50px;
  width: 50px;
  background:var(--color-secondary);
  color:var(--white);
  font-size: 25px;
  border-radius: 0 5px 5px 0;
}



footer .f-items .f-item.link li a:hover {
  color:var(--color-primary);
  margin-left: 10px;
}

footer .f-items .f-item .address li .content,
footer .f-items .f-item .address li .content a {
  color:var(--color-paragraph);
  font-weight: 400;
}



footer .f-items .f-item .address li i {
  display: inline-block;
  margin-right: 20px;
  color: var(--white);
  font-size: 24px;
  color:var(--color-primary);
  position: relative;
  top: 5px;
}

.appinment-forms h2 {
  color: var(--color-heading);
  font-weight: 600;
  margin-bottom: 5px;
}

.appinment-forms p {
  color: var(--color-paragraph);
  padding: 0;
  margin-bottom: 30px;
}



.appinment-forms button {
  width: 100%;
  background: var(--color-primary);
  color: var(--white);
  font-weight: 600;
  border: none !important;
  padding: 13px 15px;
  border-radius: 5px;
}



.video-btn i {
    display: inline-block;
    height: 55px;
    width: 55px;
    text-align: center;
    line-height: 55px;
    background: var(--color-primary);
    border-radius: 50%;
    position: relative;
    z-index: 1;
    margin-right: 20px;
    color: var(--white);
    font-weight: 500;
}

.video-btn.theme i {
  color: var(--color-primary);
  background: var(--white);
}

.video-btn i::after {
    content: "";
    position: absolute;
    z-index: 0;
    left: 50%;
    top: 50%;
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    display: block;
    width: 60px;
    height: 60px;
    background: var(--color-primary);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    -webkit-animation: pulse-border 1500ms ease-out infinite;
    animation: pulse-border 1500ms ease-out infinite;
    z-index: -1;
}



.services-style-three .item::after {
  position: absolute;
  left: 0;
  top: 0;
  content: "";
  height: 0;
  width: 100%;
  background: var(--color-primary);
  z-index: -1;
  transition: all 0.55s ease-in-out;
  border-radius: 10px;
}



.about-style-two .thumb .fun-fact {
    background: var(--color-secondary);
    display: inline-block;
    color: var(--color-heading);
    padding: 30px;
    position: absolute;
    left: 30px;
    top: 20px;
    height: 160px;
    width: 160px;
    text-align: center;
    border-radius: 50%;
    font-weight: 700;
    padding-top: 45px;
}
.about-style-two .thumb .fun-fact .operator {
    top: 0;
    color: var(--color-heading);
    font-size: 45px;
    font-weight: 600;
}

.about-style-three ul li {
  float: left;
  width: 50%;
  color: var(--color-heading);
  font-weight: 500;
  font-size: 18px;
  line-height: 36px;
  position: relative;
  padding-left: 25px;
}



.about-style-three ul li::after {
  position: absolute;
  left: 0;
  top: 50%;
  content: "\f00c";
  font-family: "Font Awesome 5 Pro";
  transform: translateY(-50%);
  color: var(--color-secondary);
  font-size: 16px;
}


  
  .blue .faq-area .faq-content .card .card-header h4 {
  background: var(--color-primary);
  }

  
  .faq-area .faq-content .card .card-header h4 strong {
  display: inline-block;
  height: 40px;
  width: 40px;
  text-align: center;
  line-height: 40px;
  background: var(--color-primary);
  color: var(--white);
  border-radius: 50%;
  margin-right: 20px;
  position: relative;
  min-width: 40px;
  }
  
  .faq-area .faq-content .card .card-header h4 strong::after {
  position: absolute;
  left: -10%;
  top: -10%;
  content: "";
  height: 120%;
  width: 120%;
  background: var(--color-primary);
  z-index: -1;
  border-radius: 50%;
  opacity: 0.3;
  }
  
  .faq-area .faq-content .card .card-header h4 {
  background: var(--color-primary);
  color: var(--white);
  padding: 20px;
  padding-right: 45px;
  border-radius: 0 0 15px 0;
  }
  
  .faq-area .faq-content .card .card-header h4.collapsed {
  background: transparent;
  color: var(--color-heading);
  padding-right: 45px;
  border: 1px solid #e7e7e7;
  background-color: var(--white);
  }
  

.pricing-style-two .pricing-item>i {
  display: inline-block;
  position: absolute;
  right: 50px;
  font-size: 60px;
  height: 100px;
  width: 100px;
  line-height: 120px;
  background: #f9f9f9;
  text-align: center;
  border-radius: 50%;
  color: var(--color-primary);
}

.pricing-style-two .pricing-item.active>i {
  background: var(--color-secondary);
  color: var(--white);
}


.award .item h4 {
    font-weight: 600;
    color: var(--white);
    display: block;
    padding: 10px 30px;
    background: var(--color-primary);
    border: 2px solid var(--white);
    border-radius: 10px;
    position: relative;
}

.award .item h4::after {
    height: 150px;
    width: 150px;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background: var(--color-primary);
    content: "";
    position: absolute;
    z-index: -1;
    border-radius: 50%;
    border: 2px solid #ffffff;
}


.feature-style-four .item .top i {
  display: inline-block;
  font-size: 60px;
  margin-bottom: 25px;
  color:var(--color-primary);
  position: relative;
  z-index: 1;
}

}
 	</style>

<?php 
}
}
add_action('wp_head', 'cleanu_customize_css');

}

?>