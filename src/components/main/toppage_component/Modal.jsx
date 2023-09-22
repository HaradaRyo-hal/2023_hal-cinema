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

  return (
    <div className="modal-background" onClick={closeModal}>
      <div className="modal-container">
        <div className="modal-content">
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
            <div>moviedata: {moviedata}</div>
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
