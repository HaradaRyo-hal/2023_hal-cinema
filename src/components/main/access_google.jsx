import React from 'react';

const MapGoogle = () => {
  return (
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13046.155024811964!2d136.8856259!3d35.1681223!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600376de618547db%3A0x76435e49b7e59323!2zSEFM5ZCN5Y-k5bGL!5e0!3m2!1sja!2sjp!4v1685932443993!5m2!1sja!2sjp"
      width="1000"
      height="600"
      style={{ border: 0 }}
      allowFullScreen=""
      loading="lazy"
      referrerPolicy="no-referrer-when-downgrade"
      >
    </iframe>
  );
};

export default MapGoogle;