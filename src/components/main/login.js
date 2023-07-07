import React, { useState } from 'react';
import './login.css'; // CSSファイルのインポート
import SignupForm from './signupform';
import LoginForm from './loginform';

const Login = () => {
  
  const [isLoginForm, setIsLoginForm] = useState(false);

  const handleFormSwitch = () => {
    setIsLoginForm(!isLoginForm);
  };

  return (
    <div className="login-container">
      {isLoginForm ? <LoginForm /> : <SignupForm />}
      <button onClick={handleFormSwitch}>
        {isLoginForm ? 'Sign Up' : 'Log In'}
      </button>
    </div>
  );

};

export default Login;
