import React from 'react';

const News_Component = () => {
    const images = [
        { imageUrl: 'images/news1.jpg', text: 'Image 1' },
        { imageUrl: 'images/news2.jpg', text: 'Image 2' },
        { imageUrl: 'images/news3.jpg', text: 'Image 3' },
        { imageUrl: 'images/news3.jpg', text: 'Image 4' },
        { imageUrl: 'images/news3.jpg', text: 'Image 5' },
        { imageUrl: 'images/news3.jpg', text: 'Image 6' },
    ];

    return (
        <div className="news_main">
            <h1>NEWS</h1>
            <div>
                <div className="image-gallery-container">
                    {images.map((image, index) => (
                        <div key={index} className="image-item">
                            <img src={image.imageUrl} alt="Image" className="image" />
                            <p className="image-text">{image.text}</p>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
};

export default News_Component;
