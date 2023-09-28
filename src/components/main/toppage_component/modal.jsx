// Modal.jsx

import React from "react";
import "./Modal.css"; // modal.cssをインポート

const Modal = ({
  isOpen,
  closeModal,
  movie,
  content,
  selectedMovieId,
  movieTitleId,
  movieRuntime,
  moviedata,
  genreId,
  movietitlejapan,
  movietitleforeign,
}) => {
  if (!isOpen) {
    return null;
  }
  const nomodal = (e) => {
    e.stopPropagation();
  };
  // moviedataが有効なURLかどうかをチェック
  const isURLValid = (url) => {
    try {
      new URL(url);
      return true;
    } catch (_) {
      return false;
    }
  };

  // moviedataが有効なURLの場合、iframeを表示
  const renderMovieDataIframe = () => {
    if (isURLValid(moviedata)) {
      return (
        <div className="”iframeWrap">
          {/* iframeを表示 */}
          <iframe
            width="560"
            height="315"
            src={moviedata}
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen
          ></iframe>
        </div>
      );
    }
    return null;
  };

  return (
    <div className="modal-background" onClick={closeModal}>
      <div className="modal-container">
        <div className="modal-content" onClick={nomodal}>
          <div className="modal-left">
            <img src={movie.imageUrl} alt={movie.alt} />
          </div>

          <div className="modal-right">
            <h2>{movie.title}</h2>
            <div>movieID: {selectedMovieId}</div>
            <div>movieTitleId: {movieTitleId}</div>
            <div>movieGenre: {genreId}</div>
            <div className="runtime">movieRuntime: {movieRuntime}分</div>
            <div className="title-japan">
              movieTitleJapan: {movietitlejapan}
            </div>
            <div className="title-foreign">
              movieTitleForeign: {movietitleforeign}
            </div>
            <p>content:{content}</p>

            {/* moviedataのiframeを表示 */}
            {renderMovieDataIframe()}
            {/* <div>
              moviedata:
              <iframe
                width="auto"
                height="auto"
                src={moviedata}
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
              ></iframe>
            </div> */}
            <div>
              <a href="https://github.com/TeppuSan">github</a>
            </div>
            <button className="close-modal" onClick={closeModal}>
              &times;
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Modal;
