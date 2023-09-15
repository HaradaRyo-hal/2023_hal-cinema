import React, { useState } from 'react';
import './login.css'; // CSSファイルのインポート
//import LoginForm from './loginform.jsx';
//import { Routes, Route } from 'react-router-dom';
import { Link, useNavigate } from 'react-router-dom';
import axios from 'axios';

function Login() {
  const [formData, setFormData] = useState({
    f_user_id: '',
    f_login_password: ''
  });

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    const fieldValue = type === 'checkbox' ? checked : value;
    setFormData((prevFormData) => ({
      ...prevFormData,
      [name]: fieldValue,
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    // フォームのデータをサーバーに送信する処理を実装する
    console.log(formData);
  };


  // Cookieを設定する関数
  function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); // 有効期限を設定
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/"; // Cookieを設定
  }


  const navigate = useNavigate()

  const handoleSubmitPushAxios = async (e) => {
    e.preventDefault();

    try {

      const formDataJSON = JSON.stringify(formData);

      const response = await axios.post(
        'http://localhost:80/2023_hal-cinema/public/accountRegister/loginfuncton.php',
        formDataJSON,
        {
          headers: {
            'Content-Type': 'application/json', // JSONデータを送信することをサーバーに伝える
          },
        }
      );
      if (response.status === 200) {
        console.log('データが正常に挿入されました。');
        console.log(response.data);
        setCookie("test", formData.f_user_id, 1);
        // リダイレクト先のURLを指定
        const redirectTo = '/'; // リダイレクト先のURL

        alert("ログイン完了しました。");

        // リダイレクトを実行
        navigate(redirectTo);
      } else {
        console.error('データの挿入に失敗しました。');
      }
    } catch (error) {
      console.error('エラー：', error);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <label htmlFor="f_user_id">User ID:</label>
      <input
        type="text"
        id="f_user_id"
        name="f_user_id"
        value={formData.f_user_id}
        onChange={handleChange}
        required
      />
      <br />

      <input
        type="text"
        id="f_login_password"
        name="f_login_password"
        value={formData.f_login_password}
        onChange={handleChange}
        required
      />
      
      <br />
      <button type="submit" onClick={handoleSubmitPushAxios}>Submit</button>

      <Link to="/signup">新規登録へ</Link>
    </form>
  );
}

export default Login;