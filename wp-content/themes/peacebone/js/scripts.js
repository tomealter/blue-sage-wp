// Custom scripts file

jQuery(document).ready(function ($) {

  'use strict';

  // Generic function that runs on window resize.
  function resizeStuff() {
    closeMobileMenu();
  }

  // Runs function once on window resize.
  var TO = false;
  $(window).resize(function () {
    if (TO !== false) {
      clearTimeout(TO);
    }

    // 200 is time in miliseconds.
    TO = setTimeout(resizeStuff, 200);
  }).resize();

  
  /*********************************************/
  // Gallery
  /*********************************************/
  const gallery = $('.gallery');
  const galleryLink = $('.gallery__thumbnail');
  const galleryMain = $('.gallery__main img');

  galleryLink.on('click', function (e) {
    e.preventDefault();
    galleryMain.attr('src', $(this).attr('data-src'));
    galleryMain.attr('alt', $(this).attr('data-alt'));
    galleryLink.removeClass('is-active');
    $(this).addClass('is-active');
  });


  /*********************************************/
  // Hero
  /*********************************************/
  const hero = $('.hero');
  const heroImages = $('.hero__image');

  const lazyLoadHeroImage = function(image) {
    const src = image.attr('data-src');
    image.attr('src', src);
    image.addClass('image-loaded');
  };

  const rotateHero = function() {
    const activeImage = $('.hero__image.is-active');
    if (activeImage.next().length) {
      var nextImage = activeImage.next();
      console.log('Has next image');
    } else {
      var nextImage = $('.hero__image:first-child');
      console.log('Next image is null');
    }
    activeImage.removeClass('is-active');
    if (!nextImage.hasClass('image-loaded')) {
      lazyLoadHeroImage(nextImage);
    }
    nextImage.addClass('is-active');
  };

  // If hero exists, rotate hero image on a timer
  if (hero.length && heroImages.length > 1) {
    setInterval(function() {
      rotateHero();
    }, 7500)
  }


  /*********************************************/
  // Mobile Menu
  /*********************************************/
  const mobileMenuButton = $('.mobile-menu-button');
  const mobileMenu = $('.mobile-menu');
  const mobileMenuLinks = $('.mobile-menu .menu--main');
  const mobileMenuLink = $('.mobile-menu .menu__link');

  mobileMenuButton.on('click', function (e) {
    e.preventDefault();

    if ($(this).hasClass('is-active')) {
      // $(this).removeClass('is-active');
      closeMobileMenu();
    }
    else {
      // $(this).addClass('is-active');
      openMobileMenu();
      TweenMax.staggerFrom(mobileMenuLink, .2, {
        x: '-=50',
        opacity: '0'
      }, 0.1);
    }
  });

  // Close mobile menu when user clicks on a mobile menu link
  mobileMenuLinks.on('click', function (e) {
    closeMobileMenu();
  });

  // Function for Opening Mobile Menu
  const openMobileMenu = function () {
    mobileMenu.addClass('is-active');
    mobileMenuButton.addClass('is-active');
  }

  // Function for Closing Mobile menu
  const closeMobileMenu = function () {
    mobileMenu.removeClass('is-active');
    mobileMenuButton.removeClass('is-active');
  }

  mobileMenuLink.on('click', function (e) {
    e.preventDefault();
    mobileMenuButton.removeClass('is-active');
    mobileMenu.removeClass('is-active');
  });


  /*********************************************/
  // Back To Top
  /*********************************************/
  $('.back-to-top').on('click', function (e) {
    e.preventDefault();

    $('html, body').animate({
      scrollTop: (0)
    }, 500);
  });

});
