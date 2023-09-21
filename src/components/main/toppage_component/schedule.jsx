import React, { useEffect } from "react";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import TicketPurchaseComponent from "./TimeSchedule";

const ScheduleComponent = () => {
  const changeColor = (element, contentId) => {
    const contentDivs = document.getElementsByClassName("content");
    const items = document.getElementsByClassName("item");
    for (let i = 0; i < items.length; i++) {
      items[i].style.backgroundColor = "";
    }
    element.style.backgroundColor = "#9b7d4d";

    for (let i = 0; i < contentDivs.length; i++) {
      contentDivs[i].style.display = "none";
    }
    const selectedContent = document.getElementById(contentId);
    selectedContent.style.display = "block";

    // selectedItem変数を定義する（必要な場合にのみ使用する）
    const selectedItem = element;
  };

  //初期値の管理。ロードすると最初は６月１日が出る
  useEffect(() => {
    document.addEventListener("DOMContentLoaded", () => {
      const defaultItem = document.getElementsByClassName("item")[0];
      const defaultContentId = defaultItem.getAttribute("data-content");
      changeColor(defaultItem, defaultContentId);
    });
  }, []);

  const settings = {
    infinite: false, //有限スクロール
    arrows: true,
    speed: 300,
    slidesToShow: 7,
    slidesToScroll: 7,
    dots: true,
    prevArrow: <div class="slick-prev"></div>, //矢印部分PreviewのHTMLを変更
    nextArrow: <div class="slick-next"></div>, //矢印部分NextのHTMLを変更
    className: "slider", // スライダーのクラス名
  };

  return (
    <div>
      <h1>劇場スケジュール</h1>
      <Slider {...settings}>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content1")}
          data-content="content1"
        >
          ６月１日(木)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content2")}
          data-content="content2"
        >
          ６月２日(金)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content3")}
          data-content="content3"
        >
          ６月３日(土)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content4")}
          data-content="content4"
        >
          ６月４日(日)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content5")}
          data-content="content5"
        >
          ６月５日(月)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content6")}
          data-content="content6"
        >
          ６月６日(火)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content7")}
          data-content="content7"
        >
          ６月７日(水)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content8")}
          data-content="content8"
        >
          ６月８日(木)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content9")}
          data-content="content9"
        >
          ６月９日(金)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content10")}
          data-content="content10"
        >
          ６月１０日(土)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content11")}
          data-content="content11"
        >
          ６月１１日(日)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content12")}
          data-content="content12"
        >
          ６月１２日(月)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content13")}
          data-content="content13"
        >
          ６月１３日(火)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content14")}
          data-content="content14"
        >
          ６月１４日(水)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content15")}
          data-content="content15"
        >
          ６月１５日(木)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content16")}
          data-content="content16"
        >
          ６月１６日(金)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content17")}
          data-content="content17"
        >
          ６月１７日(土)
        </div>
        <div
          className="item"
          onClick={(e) => changeColor(e.target, "content18")}
          data-content="content18"
        >
          ６月１８日(日)
        </div>
      </Slider>

      <h1>チケット購入</h1>
      <TicketPurchaseComponent />
    </div>
  );
};

export default ScheduleComponent;
