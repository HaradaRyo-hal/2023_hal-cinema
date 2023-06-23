import React from 'react';
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

const ContinuousSlider = () => {
  const settings = {
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 6900,
    infinite: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    cssEase: 'linear',
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  };

  return (
    <div className="slider-wrapper">
      <Slider {...settings}>
        <div className="swiper_box">
          <img src="images/_2a815abbd6.webp" alt="Slide 1" />
        </div>
        <div className="swiper_box">
          <img src="images/_7b2fe27c66.webp" alt="Slide 2" />
        </div>
        <div className="swiper_box">
          <img src="images/_dc8b829169.webp" alt="Slide 3" />
        </div>
      </Slider>
    </div>
  );
};

export default ContinuousSlider;
