import React, { useState } from 'react';
import './login.css'; // CSSファイルのインポート

const Login = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [showRegistration, setShowRegistration] = useState(false);
  const [newEmail, setNewEmail] = useState('');
  const [newPassword, setNewPassword] = useState('');

  const handleLogin = (e) => {
    e.preventDefault();
    // ログイン処理
    console.log('ログイン:', email, password);
    // ここでサーバーとの通信などの実際のログイン処理を行う
  };

  const handleRegistration = (e) => {
    e.preventDefault();
    // 新規登録処理
    console.log('新規登録:', newEmail, newPassword);
    // ここでサーバーとの通信などの実際の新規登録処理を行う
  };

  const handleRegistrationSwitch = () => {
    setShowRegistration(!showRegistration);
  };

  return (
    <main>
      <div className="login-container">
        {showRegistration ? (
          <div>
            <h2>新規登録</h2>
            <form onSubmit={handleRegistration}>
              <div>
                <label>Email:</label>
                <input
                  type="email"
                  value={newEmail}
                  onChange={(e) => setNewEmail(e.target.value)}
                />
              </div>
              <div>
                <label>Password:</label>
                <input
                  type="password"
                  value={newPassword}
                  onChange={(e) => setNewPassword(e.target.value)}
                />
              </div>
              <button type="submit">登録</button>
            </form>
            <button onClick={handleRegistrationSwitch}>ログイン画面に切り替え</button>
          </div>
        ) : (
          <div>
            <h2>ログイン</h2>
            <form onSubmit={handleLogin}>
              <div>
                <label>Email:</label>
                <input
                  type="email"
                  value={email}
                  onChange={(e) => setEmail(e.target.value)}
                />
              </div>
              <div>
                <label>Password:</label>
                <input
                  type="password"
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                />
              </div>
              <button type="submit">ログイン</button>
            </form>
            <button onClick={handleRegistrationSwitch}>新規登録画面に切り替え</button>
          </div>
        )}
      </div>
    </main>
  );
};

export default Login;
