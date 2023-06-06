import React from 'react';
import MapGoogle from "./access_google";
import './access.css';

const Map = () => {
  return (
    <main>
      <h1>アクセス</h1>
          <div class="box">
            <div class="block">
              <p class="user">住所</p>
              <p class="price">〒450-0002 愛知県名古屋市中村区名駅４丁目２７−１ 総合校舎スパイラルタワーズ</p>
            </div>
          </div>
          <div class="box">
            <div class="block">
              <p class="user">電話番号</p>
              <p class="price">052-551-1001</p>
            </div>
          </div>
          <div class="box">
            <div class="block">
              <p class="user">営業時間</p>
              <p class="price">10:00~20:00</p>
            </div>
          </div>
      <div className='map'>
        <MapGoogle/>
      </div>
    </main>

  );
};

export default Map;