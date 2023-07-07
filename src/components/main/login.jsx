import React, { useState } from 'react';
import './login.css'; // CSSファイルのインポート
import SignupForm from './signupform.jsx';
import LoginForm from './loginform.jsx';

const Login = () => {
  const [showLoginForm, setShowLoginForm] = useState(true);

  const toggleComponent = () => {
    setShowLoginForm(!showLoginForm);
    window.scrollTo(0, 0); // 画面を一番上にスクロール
  };

  return (
    <div>
      {showLoginForm ? <LoginForm /> : <SignupForm />}
      <button onClick={toggleComponent}>切り替え</button>
    </div>
  );
};

export default Login;