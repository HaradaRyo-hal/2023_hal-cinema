import React from 'react';

const TicketPurchaseComponent = () => {
  const ticketData = [
    {
      id: 1,
      movies: [
        {
          title: '名探偵コナン',
          showtimes: [
            { time: '08:30~10:30', theater: 'シアター１', availability: '〇購入可' },
            { time: '11:30~13:30', theater: 'シアター２', availability: '〇購入可' },
            { time: '14:00~16:00', theater: 'シアター３', availability: '〇購入可' }
          ]
        },
        {
          title: 'A',
          showtimes: [
            { time: '08:30~10:30', theater: 'シアター３', availability: '〇購入可' },
            { time: '11:30~13:30', theater: 'シアター３', availability: '〇購入可' },
            { time: '14:00~16:00', theater: 'シアター３', availability: '〇購入可' },
            { time: '16:30~18:30', theater: 'シアター３', availability: '〇購入可' },
            { time: '19:00~21:00', theater: 'シアター３', availability: '〇購入可' }
          ]
        },
        {
          title: 'B',
          showtimes: [
            { time: '08:30~10:30', theater: 'シアター１', availability: '〇購入可' },
            { time: '11:30~13:30', theater: 'シアター２', availability: '〇購入可' },
            { time: '14:00~16:00', theater: 'シアター３', availability: '〇購入可' }
          ]
        }
      ]
    },
    {
      id: 2,
      movies: [
        {
          title: '06/02 A',
          showtimes: [
            { time: '08:30~10:30', theater: 'シアター３', availability: '〇購入可' },
            { time: '11:30~13:30', theater: 'シアター３', availability: '〇購入可' },
            { time: '14:00~16:00', theater: 'シアター３', availability: '〇購入可' },
            { time: '16:30~18:30', theater: 'シアター３', availability: '〇購入可' },
            { time: '19:00~21:00', theater: 'シアター３', availability: '〇購入可' }
          ]
        },
        {
          title: '06/02 B',
          showtimes: [
            { time: '08:30~10:30', theater: 'シアター１', availability: '〇購入可' },
            { time: '11:30~13:30', theater: 'シアター２', availability: '〇購入可' },
            { time: '14:00~16:00', theater: 'シアター３', availability: '〇購入可' }
          ]
        },
        {
          title: '06/02 C',
          showtimes: [
            { time: '08:30~10:30', theater: 'シアター１', availability: '〇購入可' },
            { time: '11:30~13:30', theater: 'シアター２', availability: '〇購入可' },
            { time: '14:00~16:00', theater: 'シアター３', availability: '〇購入可' }
          ]
        }
      ]
    },
    // 他のコンテンツの映画データを追加
  ];

  const handleButtonClick = (theater) => {
    const url = `http://localhost:80/2023_hal-cinema/public/hal-cinema_pay/1.座席選択/step1.php?theater=${theater}`;
    window.open(url, '_blank');
  };
  
  

  return (
    <div>
      {ticketData.map((content) => (
        <div key={content.id} id={`content${content.id}`} className="content" style={{ display: 'none' }}>
          {content.movies.map((movie, index) => (
            <div key={index}>
              <h1>{movie.title}</h1>
              <div className="ticket_box">
                {movie.showtimes.map((showtime, i) => (
                  <button key={i} className="button-003" onClick={() => handleButtonClick(showtime.theater)}>
                    <p className="time">{showtime.time}</p>
                    <p className="theater">{showtime.theater}</p>
                    <p className="pay">{showtime.availability}</p>
                  </button>
                ))}
              </div>
            </div>
          ))}
        </div>
      ))}
    </div>
  );
};

export default TicketPurchaseComponent;
