import React from 'react';
import './footer.css';

function Footer() {
  return (

    <footer className="footer">

      <div className="footer-content">

        <div className='hal'>
          <a href="https://www.hal.ac.jp/nagoya?utm_source=google&utm_medium=banner&utm_content=hal&utm_campaign=DGN&gclid=Cj0KCQjwj_ajBhCqARIsAA37s0wCbAXhN5rMbK1pl2IurDFdxJeuFt_f2FO19tifTyXTB1hs-YnG4OUaAtkTEALw_wcB">
              <img src="images/hal.png" alt="画像の説明" />
          </a>
        </div>
        <div className="mb">
          <div className="mb-list">
            <a href='https://mvtk.jp/?vc_lpp=MSZiMDUxODAwZDdhJjY0N2Q5MmE0JjJhOWMxNCY2NGNjYWNhNCZaSDJTcEFBSDVqWjVjTWRid0tocHZNQ29hUTQtcUEmNAlaSDJTcEFBSDVqWjVjTWRid0tocHZNQ29hUTQtcUEJMDg4MTM4NTQzMTAyNTAwNDE1MjMwNjA1MDc0NTQwCQkJ&lp=https%3A%2F%2Fmvtk.jp%2F'>
              <img src="images/mvtk1.jpg" alt="画像の説明" />
            </a>
          </div>
          <div className="mb-list">
            <a href="https://www.dinos-cinemas.co.jp/">
              <img src="images/mvtk2.jpg" alt="画像の説明" />
            </a>
          </div>
          <div className="mb-list">
            <a href="https://www.myokosunshine.co.jp/index.php">
              <img src="images/mvtk3.jpg" alt="画像の説明" />
            </a>
          </div>
          <div className="mb-list">
            <a href="https://www.eigakan.org/">
              <img src="images/mvtk4.jpg" alt="画像の説明" />
            </a>
          </div>
        </div>
        
        <div>
          <p>劇場SNSアカウント</p>
        </div>
        <div className="sns_box">
            <div className='sns'>
              <a href='https://twitter.com/HAL_NAGOYA'>
                <img src="images/twitter.svg" />
              </a>
            </div>
            <div className='sns'>
              <a href='https://www.instagram.com/hal.ac.jp/'>
                <img src="images/instagram.png" />
              </a>
            </div>
            <div className='sns'>
              <a href='https://www.youtube.com/user/HALLOchannel'>
                <img src="images/youtube.svg" />
              </a>
            </div>
        </div>

        <div className="black">
          <img src="images/logo2.png" alt="画像の説明" />
          
          <p className="footer-copyright">
            Copy right &copy; 2023 HAL CINEMA<br></br>
            All rights reserved.
          </p>
        </div>
      </div>

    </footer>
  );
}

export default Footer;
