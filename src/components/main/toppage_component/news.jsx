import React from 'react';
import './access.css';

const News_Component = () => {
    const images = [
        { imageUrl: 'images/news1.jpg', text: 'セーラームーン公開' },
        { imageUrl: 'images/news2.jpg', text: '名探偵コナン' },
        { imageUrl: 'images/news3.jpg', text: 'fate効果' },
        { imageUrl: 'images/news3.jpg', text: 'グッズ頒布' },
        // { imageUrl: 'images/news3.jpg', text: 'Image 5' },
        // { imageUrl: 'images/news3.jpg', text: 'Image 6' },
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
