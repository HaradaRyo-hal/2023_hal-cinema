import React from 'react';
import { Link } from 'react-router-dom';
import LoginIcon from '@mui/icons-material/Login';
import AddCircleIcon from '@mui/icons-material/AddCircle';
import './header.css';

function Header() {
  return (
    <header>
      <div className="header-buttons">
        <Link to="/login" className="login-button">
          <LoginIcon />ログイン
        </Link>
        <Link to="/signup" className="signup-button">
          <AddCircleIcon />新規登録
        </Link>
      </div>
    </header>
  );
}

export default Header;

