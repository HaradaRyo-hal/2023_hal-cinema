import React from 'react';
import './header.css';
import Login from '@mui/icons-material/Login';
import {AddCircle} from '@mui/icons-material';

function Header() {
  return (
    <header>
        <div className="header-buttons">
            <button className="login-button">
              <Login />ログイン
            </button>
            <button className="signup-button">
              <AddCircle />新規登録
            </button>
        </div>
    </header>
  );
}

export default Header;
