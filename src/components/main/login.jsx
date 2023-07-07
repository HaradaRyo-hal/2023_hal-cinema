import React, { useState } from 'react';
import './login.css'; // CSSファイルのインポート
//import LoginForm from './loginform.jsx';
//import { Routes, Route } from 'react-router-dom';
import { Link } from 'react-router-dom';

function Login() {
  const [formData, setFormData] = useState({
    f_user_id: '',
    f_login_name: '',
    f_login_password: '',
    f_news_subscribed: false,
    f_birthday: '',
    f_postal_code: '',
    f_prefecture: '',
    f_city: '',
    f_address1: '',
    f_address2: '',
    f_mail_address: '',
    f_full_name_kanji: '',
    f_full_name_kana: '',
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

      <button type="submit">Submit</button>

      <Link to="/signup">新規登録へ</Link>
    </form>
  );
}

export default Login;