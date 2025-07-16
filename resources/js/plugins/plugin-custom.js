"use strict";
document.addEventListener("DOMContentLoaded", function () {
  let onboardingStepsSlider = document.querySelectorAll(
    ".onboarding-steps-slider"
  );
  const swiperNavButtonText = document.querySelector(".nextButton");

  onboardingStepsSlider &&
    onboardingStepsSlider.forEach(function (onboardingStepsSlider) {
      const swiper = new Swiper(onboardingStepsSlider, {
        slidesPerView: 1,
        slidesToShow: 1,
        paginationClickable: true,
        spaceBetween: 4,
        pagination: {
          el: ".onBoardingsliderPagingation",
          clickable: true,
        },
        navigation: {
          nextEl: onboardingStepsSlider.querySelector(".ara-next"),
        },
      });

      swiper.on("reachEnd", function () {
        swiperNavButtonText.innerHTML = `<a href="./sign-up.html" class="text-white py-4 bg-p2 font-semibold block rounded-full text-center px-6 text-base text-nowrap ">Get Started</a>`;
      });
    });

  let bestPlayerSlider = document.querySelectorAll(".best-player-slider");
  bestPlayerSlider &&
    bestPlayerSlider.forEach(function (bestPlayerSlider) {
      const swiper = new Swiper(bestPlayerSlider, {
        slidesPerView: 2.2,
        slidesToShow: 1,
        spaceBetween: 8,
      });
    });

  let upcomingContestSlider = document.querySelectorAll(
    ".upcoming-contest-slider"
  );
  upcomingContestSlider &&
    upcomingContestSlider.forEach(function (upcomingContestSlider) {
      const swiper = new Swiper(upcomingContestSlider, {
        slidesPerView: 1.1,
        slidesToShow: 1,
        spaceBetween: 16,
      });
    });
});
