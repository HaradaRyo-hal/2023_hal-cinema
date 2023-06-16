import React from 'react';
import './ticket.css';

function Ticket() {
  return (
    <main>
      <h1>チケット</h1>
      <div>
        <h3>入場料金</h3>
          <div class="box">
            <div class="block">
              <p class="user">一般</p>
              <p class="price">¥1,900</p>
            </div>
          </div>
          <div class="box">
            <div class="block">
              <p class="user">大学生</p>
              <p class="price">¥1,500</p>
            </div>
            <p class="small">※要学生証</p>
          </div>
          <div class="box">
            <div class="block">
              <p class="user">小学生・中学生・高校生</p>
              <p class="price">¥1,000</p>
            </div>
            <p class="small">※高校生は要学生証</p>
          </div>
          <div class="box">
            <div class="block">
              <p class="user">幼児(3歳以上)</p>
              <p class="price">¥1,900</p>
            </div>
            <p class="small">※作品によっては2歳以上の場合がございます。</p>
          </div>
          <div class="box">
            <div class="block">
              <p class="user">シニア(60歳以上)</p>
              <p class="price">¥1,200</p>
            </div>
          </div>
          <div class="box">
            <div class="block">
              <p class="user">ハンディキャップ</p>
              <p class="price">¥1,000</p>
            </div>
            <p class="small">※障がい者手帳をお持ちのご本人様。<br></br>
                            ※付き添いの方1名様まで同じ料金になります。<br></br>
                            ※障がい者手帳、療育手帳、療育手帳、身体障がい者手帳、精神障がい者保健福祉手帳。<br></br>
                            もしくは障がい者手帳アプリ「ミライロID」要提示（障がい者手帳アプリ「ミライロID」詳細はこちら）</p>
          </div>
        <h3>スペシャルシート</h3>
          <div class="box">
            <div class="block">
              <p class="user">プレミアムクラス</p>
              <p class="price">入場料金 + ¥800</p>
            </div>
          </div>
      </div>
    </main>
  );
}

export default Ticket;