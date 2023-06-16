import React, { useState , useEffect } from 'react';
import './movie.css';

const Movie = () => {
    const [activeTab, setActiveTab] = useState(1);
    const [underlineStyle, setUnderlineStyle] = useState({});
  
    useEffect(() => {
      const tabItem = document.getElementById(`tab-${activeTab}`);
      const tabItemWidth = tabItem.offsetWidth;
      const tabItemOffsetLeft = tabItem.offsetLeft;
      setUnderlineStyle({
        width: `${tabItemWidth}px`,
        transform: `translateX(${tabItemOffsetLeft}px)`,
        transition: 'transform 0.3s ease-in-out',
      });
    }, [activeTab]);
  
    const changeTab = (tabNumber) => {
      setActiveTab(tabNumber);
    };
  
    return (
      <div>
        <div>
            <h1>上映中</h1>
        </div>
        <div className="tab-header">
          <div
            id="tab-1"
            className={`tab-item ${activeTab === 1 ? 'active' : ''}`}
            onClick={() => changeTab(1)}
          >
            上映中
          </div>
          <div
            id="tab-2"
            className={`tab-item ${activeTab === 2 ? 'active' : ''}`}
            onClick={() => changeTab(2)}
          >
            上映予定
          </div>
          <div className="underline" style={underlineStyle}></div>
        </div>
        <div className="tab-content">
          {activeTab === 1 && 
            <div>
                <div className="image-with-text">
                    <img src="images/konan2.jpg" alt="" />
                    <div className="text-container">
                        <h2>名探偵コナン 黒鉄の魚影</h2>
                        <p>世界中の警察が管理する防犯カメラをつなぐための海洋施設「パシフィック・ブイ」が、東京・八丈島の近海に建設される。そのころ、江戸川コナンも鈴木園子の招待で八丈島を訪れていた。ユーロポールの職員が黒ずくめの組織に殺害されたという情報がコナンにもたらされ、不穏に思ったコナンがパシフィック・ブイに向かうと、そこで黒ずくめの組織によるエンジニアの誘拐事件が発生する。</p>
                    </div>
                </div>
                <div className="image-with-text">
                    <img src="images/konan2.jpg" alt="" />
                    <div className="text-container">
                        <h2>名探偵コナン 黒鉄の魚影</h2>
                        <p>世界中の警察が管理する防犯カメラをつなぐための海洋施設「パシフィック・ブイ」が、東京・八丈島の近海に建設される。そのころ、江戸川コナンも鈴木園子の招待で八丈島を訪れていた。ユーロポールの職員が黒ずくめの組織に殺害されたという情報がコナンにもたらされ、不穏に思ったコナンがパシフィック・ブイに向かうと、そこで黒ずくめの組織によるエンジニアの誘拐事件が発生する。</p>
                    </div>
                </div>
                <div className="image-with-text">
                    <img src="images/konan2.jpg" alt="" />
                    <div className="text-container">
                        <h2>名探偵コナン 黒鉄の魚影</h2>
                        <p>世界中の警察が管理する防犯カメラをつなぐための海洋施設「パシフィック・ブイ」が、東京・八丈島の近海に建設される。そのころ、江戸川コナンも鈴木園子の招待で八丈島を訪れていた。ユーロポールの職員が黒ずくめの組織に殺害されたという情報がコナンにもたらされ、不穏に思ったコナンがパシフィック・ブイに向かうと、そこで黒ずくめの組織によるエンジニアの誘拐事件が発生する。</p>
                    </div>
                </div>
                <div className="image-with-text">
                    <img src="images/rohan.jpg" alt="" />
                    <div className="text-container">
                        <h2>岸辺露伴　ルーヴルへ行く</h2>
                        <p>特殊能力を持つ、漫画家・岸辺露伴は、青年時代に淡い思いを抱いた女性からこの世で「最も黒い絵」の噂を聞く。それは最も黒く、そしてこの世で最も邪悪な絵だった。時は経ち、新作執筆の過程で、その絵がルーヴル美術館に所蔵されていることを知った露伴は取材とかつての微かな慕情 のためにフランスを訪れる。しかし、不思議なことに美術館職員すら「黒い絵」の存在を知らず、データベースでヒットした保管場所は、今はもう使われていないはずの地下倉庫「 Z 13 倉庫」だった。そこで露伴は「黒い絵」が引き起こす恐ろしい出来事に対峙することとなる…</p>
                    </div>
                </div>
                <div className="image-with-text">
                    <img src="images/rohan.jpg" alt="" />
                    <div className="text-container">
                        <h2>岸辺露伴　ルーヴルへ行く</h2>
                        <p>特殊能力を持つ、漫画家・岸辺露伴は、青年時代に淡い思いを抱いた女性からこの世で「最も黒い絵」の噂を聞く。それは最も黒く、そしてこの世で最も邪悪な絵だった。時は経ち、新作執筆の過程で、その絵がルーヴル美術館に所蔵されていることを知った露伴は取材とかつての微かな慕情 のためにフランスを訪れる。しかし、不思議なことに美術館職員すら「黒い絵」の存在を知らず、データベースでヒットした保管場所は、今はもう使われていないはずの地下倉庫「 Z 13 倉庫」だった。そこで露伴は「黒い絵」が引き起こす恐ろしい出来事に対峙することとなる…</p>
                    </div>
                </div>
                <div className="image-with-text">
                    <img src="images/rohan.jpg" alt="" />
                    <div className="text-container">
                        <h2>岸辺露伴　ルーヴルへ行く</h2>
                        <p>特殊能力を持つ、漫画家・岸辺露伴は、青年時代に淡い思いを抱いた女性からこの世で「最も黒い絵」の噂を聞く。それは最も黒く、そしてこの世で最も邪悪な絵だった。時は経ち、新作執筆の過程で、その絵がルーヴル美術館に所蔵されていることを知った露伴は取材とかつての微かな慕情 のためにフランスを訪れる。しかし、不思議なことに美術館職員すら「黒い絵」の存在を知らず、データベースでヒットした保管場所は、今はもう使われていないはずの地下倉庫「 Z 13 倉庫」だった。そこで露伴は「黒い絵」が引き起こす恐ろしい出来事に対峙することとなる…</p>
                    </div>
                </div>
                <div className="image-with-text">
                    <img src="images/mario.jpg" alt="" />
                    <div className="text-container">
                        <h2>ザ・スーパーマリオブラザーズ・ムービー</h2>
                        <p>任天堂とイルミネーションが贈る、スーパーマリオブラザーズの世界を原作とした新たなアニメーション映画。
監督は『ティーン・タイタンズGO！トゥ・ザ・ムービー』のアーロン・ホーヴァスとマイケル・ジェレニック、脚本は『レゴ® ムービー2』『ミニオンズ フィーバー』のマシュー・フォーゲルが担当。</p>
                    </div>
                </div>
            </div>
            }
          {activeTab === 2 && 
            <div>
                <div className="image-with-text">
                    <img src="images/rohan.jpg" alt="" />
                    <div className="text-container">
                        <h2>岸辺露伴　ルーヴルへ行く</h2>
                        <p>特殊能力を持つ、漫画家・岸辺露伴は、青年時代に淡い思いを抱いた女性からこの世で「最も黒い絵」の噂を聞く。それは最も黒く、そしてこの世で最も邪悪な絵だった。時は経ち、新作執筆の過程で、その絵がルーヴル美術館に所蔵されていることを知った露伴は取材とかつての微かな慕情 のためにフランスを訪れる。しかし、不思議なことに美術館職員すら「黒い絵」の存在を知らず、データベースでヒットした保管場所は、今はもう使われていないはずの地下倉庫「 Z 13 倉庫」だった。そこで露伴は「黒い絵」が引き起こす恐ろしい出来事に対峙することとなる…</p>
                    </div>
                </div>
                <div className="image-with-text">
                    <img src="images/rohan.jpg" alt="" />
                    <div className="text-container">
                        <h2>岸辺露伴　ルーヴルへ行く</h2>
                        <p>特殊能力を持つ、漫画家・岸辺露伴は、青年時代に淡い思いを抱いた女性からこの世で「最も黒い絵」の噂を聞く。それは最も黒く、そしてこの世で最も邪悪な絵だった。時は経ち、新作執筆の過程で、その絵がルーヴル美術館に所蔵されていることを知った露伴は取材とかつての微かな慕情 のためにフランスを訪れる。しかし、不思議なことに美術館職員すら「黒い絵」の存在を知らず、データベースでヒットした保管場所は、今はもう使われていないはずの地下倉庫「 Z 13 倉庫」だった。そこで露伴は「黒い絵」が引き起こす恐ろしい出来事に対峙することとなる…</p>
                    </div>
                </div>
                <div className="image-with-text">
                    <img src="images/rohan.jpg" alt="" />
                    <div className="text-container">
                        <h2>岸辺露伴　ルーヴルへ行く</h2>
                        <p>特殊能力を持つ、漫画家・岸辺露伴は、青年時代に淡い思いを抱いた女性からこの世で「最も黒い絵」の噂を聞く。それは最も黒く、そしてこの世で最も邪悪な絵だった。時は経ち、新作執筆の過程で、その絵がルーヴル美術館に所蔵されていることを知った露伴は取材とかつての微かな慕情 のためにフランスを訪れる。しかし、不思議なことに美術館職員すら「黒い絵」の存在を知らず、データベースでヒットした保管場所は、今はもう使われていないはずの地下倉庫「 Z 13 倉庫」だった。そこで露伴は「黒い絵」が引き起こす恐ろしい出来事に対峙することとなる…</p>
                    </div>
                </div>
            </div>
            }
        </div>
      </div>
    );
  };
  
  export default Movie;