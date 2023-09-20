import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import axios from "axios";
import { useState, useEffect } from "react";

const SlideShowComponent = () => {
  const [content, setContent] = useState("");
  const [selectedMovieId, setSelectedMovieId] = useState(null);
  const [movieTitleId, setMovieTitleId] = useState("");
  const [genreId, setGenreId] = useState("");
  const [moviedata, setMovieData] = useState("");
  const [movietitlejapan, setMovieTitleJapan] = useState("");
  const [movietitleforeign, setMovieTitleForeign] = useState("");
  const [movieRuntime, setMovieRuntime] = useState(0);

  const images = [
    { f_movie_id: "MV000001", imageUrl: "images/konan2.jpg", alt: "Image 1" },
    { f_movie_id: "MV000002", imageUrl: "images/mario.jpg", alt: "Image 2" },
    { f_movie_id: "MV000003", imageUrl: "images/otona.jpg", alt: "Image 3" },
    { f_movie_id: "MV000002", imageUrl: "images/rohan.jpg", alt: "Image 4" },
    { f_movie_id: "MV000001", imageUrl: "images/tokyo.jpg", alt: "Image 5" },
  ];

  // 画像クリック時の処理
  const handleImageClick = (imageIndex) => {
    const movieId = images[imageIndex].f_movie_id; // クリックされた画像に対応するf_movie_idを取得

    // movieIdをPHPに送信
    axios
      .post("http://localhost:80/halcinema/slidedb.php", { id: movieId }) // "id"プロパティを含める
      .then((response) => {
        const data = response.data;
        setContent(data.f_content);
        setSelectedMovieId(data.f_movie_id);
        setMovieTitleId(data.f_movie_title_id);
        setGenreId(data.f_genre_id);
        setMovieRuntime(data.f_movie_runtime_min);
        setMovieData(data.f_movie_data);
        setMovieTitleJapan(data.f_movie_title_japan);
        setMovieTitleForeign(data.f_movie_title_foreign);
      })
      .catch((error) => {
        console.error("Error fetching content:", error);
      });
  };

  const settings = {
    autoplay: true,
    autoplaySpeed: 1000,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: true,
    variableWidth: true,
    arrows: false,
    dots: true,
    className: "slideshow",
  };

  return (
    <div>
      <Slider {...settings}>
        {images.map((image, index) => (
          <div key={index} onClick={() => handleImageClick(index)}>
            <img src={image.imageUrl} alt={image.alt} />
          </div>
        ))}
      </Slider>

      {/* 取得したデータを表示 */}
      <div>Content:{content}</div>
      <div>movieID:{selectedMovieId}</div>
      <div>movieTitleId:{movieTitleId}</div>
      <div>movieRuntime:{movieRuntime}分</div>
      <div>moviedata:{moviedata}</div>
      <div>movieGenre:{genreId}</div>
      <div>movieTitleJapan:{movietitlejapan}</div>
      <div>movieTitleForeign:{movietitleforeign}</div>
    </div>
  );
};

export default SlideShowComponent;
