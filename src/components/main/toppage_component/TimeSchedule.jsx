import React from 'react';

const TicketPurchaseComponent = () => {
    
  const ticketData = [
    {
      title: 'スーパーマリオ',
      showtimes: [
        { time: '08:30~10:30', theater: 'シアター３', availability: '〇購入可' },
        { time: '11:30~13:30', theater: 'シアター３', availability: '〇購入可' },
        { time: '14:00~16:00', theater: 'シアター３', availability: '〇購入可' },
        { time: '16:30~18:30', theater: 'シアター３', availability: '〇購入可' },
        { time: '19:00~21:00', theater: 'シアター３', availability: '〇購入可' }
      ]
    },
    {
      title: '名探偵コナン',
      showtimes: [
        { time: '08:30~10:30', theater: 'シアター３', availability: '〇購入可' },
        { time: '08:30~10:30', theater: 'シアター３', availability: '〇購入可' },
        { time: '08:30~10:30', theater: 'シアター３', availability: '〇購入可' }
      ]
    },
    // 他の映画のデータを追加
  ];

  return (
    <div>
      {ticketData.map((ticket, index) => (
        <div key={index} id={`content${index + 1}`} className="content" style={{ display: index === 0 ? 'block' : 'none' }}>
          <h1>{ticket.title}</h1>
          <div className="ticket_box">
            {ticket.showtimes.map((showtime, i) => (
              <button key={i} className="button-003">
                <p className="time">{showtime.time}</p>
                <p className="theater">{showtime.theater}</p>
                <p className="pay">{showtime.availability}</p>
              </button>
            ))}
          </div>
        </div>
      ))}
    </div>
  )
};

export default TicketPurchaseComponent;