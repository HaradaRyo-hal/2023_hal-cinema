import React from 'react';
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';

const SlideShowComponent = () => {
  const images = [
    { imageUrl: 'images/konan2.jpg', alt: 'Image 1' },
    { imageUrl: 'images/mario.jpg', alt: 'Image 2' },
    { imageUrl: 'images/otona.jpg', alt: 'Image 3' },
    { imageUrl: 'images/rohan.jpg', alt: 'Image 4' },
    { imageUrl: 'images/tokyo.jpg', alt: 'Image 5' },
  ];

  const settings = {
    autoplay: true,
    autoplaySpeed: 5000,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: true,
    variableWidth: true,
    arrows: false,
    dots: true,
    className: 'slideshow',
  };

  return (
    <Slider {...settings}>
      {images.map((image, index) => (
        <div key={index}>
          <img src={image.imageUrl} alt={image.alt} />
        </div>
      ))}
    </Slider>
  );
};

export default SlideShowComponent;
