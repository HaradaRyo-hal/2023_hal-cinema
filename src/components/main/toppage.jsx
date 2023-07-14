import React from 'react';
import './toppage.css';
import SlideShowComponent from './toppage_component/SlideShow';
import News_Component from './toppage_component/news';
import ScheduleComponent from './toppage_component/schedule';

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