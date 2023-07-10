import React, { useEffect , useState } from 'react';
import './toppage.css';
import SlideShowComponent from './toppage_component/SlideShow';
import News_Component from './toppage_component/news';
import ScheduleComponent from './toppage_component/schedule';

import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';

const Home = () => {

  return (
      <main>
        <SlideShowComponent/>
        <News_Component/>
        <ScheduleComponent/>
    </main>
  );
}

export default Home;