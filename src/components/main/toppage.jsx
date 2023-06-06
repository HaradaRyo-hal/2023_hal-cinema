import React, { useEffect } from 'react';
import './toppage.css';
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';

const Home = () => {
  const changeColor = (element, contentId) => {
    const contentDivs = document.getElementsByClassName('content');
    const items = document.getElementsByClassName('item');
    for (let i = 0; i < items.length; i++) {
      items[i].style.backgroundColor = '';
    }
    element.style.backgroundColor = '#9b7d4d';

    for (let i = 0; i < contentDivs.length; i++) {
      contentDivs[i].style.display = 'none';
    }
    const selectedContent = document.getElementById(contentId);
    selectedContent.style.display = 'block';

    // selectedItem変数を定義する（必要な場合にのみ使用する）
    const selectedItem = element;
  };

  useEffect(() => {
    document.addEventListener('DOMContentLoaded', () => {
      const defaultItem = document.getElementsByClassName('item')[0];
      const defaultContentId = defaultItem.getAttribute('data-content');
      changeColor(defaultItem, defaultContentId);
    });
  }, []);

  return (
      <main>
        <Slider
          autoplay={true} // 自動再生を有効にする
          autoplaySpeed={5000} // 自動再生の速度を設定する（ミリ秒単位）
          infinite={true} // 無限ループする
          slidesToShow={1} // 表示するスライドの数
          slidesToScroll={1} // スクロールするスライドの数
          prevArrow={<div className="slick-prev"></div>} // 前のスライドに移動するボタンの要素
          nextArrow={<div className="slick-next"></div>} // 次のスライドに移動するボタンの要素
          centerMode={true} // 現在のスライドを中央に配置する
          variableWidth={true} // スライドの幅を可変にする
          dots={true} // ドットインジケーターを表示する
          className="slideshow" // スライダーのクラス名
        >
          <div><img src="images/konan2.jpg" alt="" /></div>
          <div><img src="images/mario.jpg" alt="" /></div>
          <div><img src="images/otona.jpg" alt="" /></div>
          <div><img src="images/rohan.jpg" alt="" /></div>
          <div><img src="images/tokyo.jpg" alt="" /></div>
        </Slider>

        <Slider
          infinite={false}//有限スクロール
          arrows={true}
          speed={300}
          slidesToShow={7}
          slidesToScroll={7}
          dots={true}
          prevArrow={<div class="slick-prev"></div>}//矢印部分PreviewのHTMLを変更
          nextArrow={<div class="slick-next"></div>}//矢印部分NextのHTMLを変更
          className="slider" // スライダーのクラス名
        >
          <div className="item" onClick={(e) => changeColor(e.target, 'content1')} data-content="content1">６月１日(木)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content2')} data-content="content2">６月２日(金)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content3')} data-content="content3">６月３日(土)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content4')} data-content="content4">６月４日(日)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content5')} data-content="content5">６月５日(月)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content6')} data-content="content6">６月６日(火)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content7')} data-content="content7">６月７日(水)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content8')} data-content="content8">６月８日(木)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content9')} data-content="content9">６月９日(金)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content10')} data-content="content10">６月１０日(土)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content11')} data-content="content11">６月１１日(日)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content12')} data-content="content12">６月１２日(月)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content13')} data-content="content13">６月１３日(火)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content14')} data-content="content14">６月１４日(水)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content15')} data-content="content15">６月１５日(木)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content16')} data-content="content16">６月１６日(金)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content17')} data-content="content17">６月１７日(土)</div>
          <div className="item" onClick={(e) => changeColor(e.target, 'content18')} data-content="content18">６月１８日(日)</div>
        </Slider>


        <div id="content1" className="content">
          <div>
            <h1>スーパーマリオ</h1>
            <button className="button-003">
              08:30~10:30<br />
              シアター３<br />
              〇購入可
            </button>
            <button className="button-003">
              08:30~10:30<br />
              シアター３<br />
              〇購入可
            </button>
            <button className="button-003">
              08:30~10:30<br />
              シアター３<br />
              〇購入可
            </button>
          </div>
          <div>
            <h1>名探偵コナン</h1>
            <button className="button-003">
              08:30~10:30<br />
              シアター３<br />
              〇購入可
            </button>
            <button className="button-003">
              08:30~10:30<br />
              シアター３<br />
              〇購入可
            </button>
            <button className="button-003">
              08:30~10:30<br />
              シアター３<br />
              〇購入可
            </button>
          </div>
          <div>
            <h1>ワイルドスピード</h1>
            <button className="button-003">
              08:30~10:30<br />
              シアター３<br />
              〇購入可
            </button>
            <button className="button-003">
              08:30~10:30<br />
              シアター３<br />
              〇購入可
            </button>
            <button className="button-003">
              08:30~10:30<br />
              シアター３<br />
              〇購入可
            </button>
          </div>
        </div>
        <div id="content2" className="content" style={{ display: 'none' }}>
          <h1>要素2の内容</h1>
          <p>ここに要素2の詳細な情報やコンテンツを記述します。</p>
        </div>
        <div id="content3" className="content" style={{ display: 'none' }}>
          <h1>要素3の内容</h1>
          <p>ここに要素3の詳細な情報やコンテンツを記述します。</p>
        </div>
        <div id="content4" className="content" style={{ display: 'none' }}>
          <h1>要素4の内容</h1>
          <p>ここに要素4の詳細な情報やコンテンツを記述します。</p>
        </div>
        <div id="content5" className="content" style={{ display: 'none' }}>
          <h1>要素5の内容</h1>
          <p>ここに要素5の詳細な情報やコンテンツを記述します。</p>
        </div>
        <div id="content6" className="content" style={{ display: 'none' }}>
          <h1>要素6の内容</h1>
          <p>ここに要素6の詳細な情報やコンテンツを記述します。</p>
        </div>
        <div id="content7" className="content" style={{ display: 'none' }}>
          <h1>要素7の内容</h1>
          <p>ここに要素7の詳細な情報やコンテンツを記述します。</p>
        </div>
        <div id="content8" className="content" style={{ display: 'none' }}>
          <h1>要素8の内容</h1>
          <p>ここに要素7の詳細な情報やコンテンツを記述します。</p>
        </div>

    </main>
  );
}

export default Home;