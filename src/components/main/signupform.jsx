import React, { useState } from 'react';

function SignupForm() {
  const [formData, setFormData] = useState({
    f_user_id: '',
    f_login_name: '',//ネーム
    f_login_password: '',//
    f_news_subscribed: false,//メルマガ　いるかいらないか？
    f_birthday: '',// 誕生日
    f_postal_code: '',//郵便番号〒４００ー００００
    f_prefecture: '',//都道府県
    f_city: '',//名古屋市
    f_address1: '',//nakamutsku
    f_address2: '',//マンショん　//あるときないときある
    f_mail_address: '',//hal@gmail.com
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

      <label htmlFor="f_login_name">Login Name:</label>
      <input
        type="text"
        id="f_login_name"
        name="f_login_name"
        value={formData.f_login_name}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_login_password">Login Password:</label>
      <input
        type="password"
        id="f_login_password"
        name="f_login_password"
        value={formData.f_login_password}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_news_subscribed">Subscribe to News:</label>
      <input
        type="checkbox"
        id="f_news_subscribed"
        name="f_news_subscribed"
        checked={formData.f_news_subscribed}
        onChange={handleChange}
      />

      <label htmlFor="f_birthday">Birthday:</label>
      <input
        type="date"
        id="f_birthday"
        name="f_birthday"
        value={formData.f_birthday}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_postal_code">Postal Code:</label>
      <input
        type="text"
        id="f_postal_code"
        name="f_postal_code"
        value={formData.f_postal_code}
        onChange={handleChange}
        required
        pattern="[0-9]{3}-[0-9]{4}"
        placeholder="000-0000"
      />

      <label htmlFor="f_prefecture">Prefecture:</label>
      <input
        type="text"
        id="f_prefecture"
        name="f_prefecture"
        value={formData.f_prefecture}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_city">City:</label>
      <input
        type="text"
        id="f_city"
        name="f_city"
        value={formData.f_city}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_address1">Address 1:</label>
      <input
        type="text"
        id="f_address1"
        name="f_address1"
        value={formData.f_address1}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_address2">Address 2:</label>
      <input
        type="text"
        id="f_address2"
        name="f_address2"
        value={formData.f_address2}
        onChange={handleChange}
      />

      <label htmlFor="f_mail_address">Email Address:</label>
      <input
        type="email"
        id="f_mail_address"
        name="f_mail_address"
        value={formData.f_mail_address}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_full_name_kanji">Full Name (Kanji):</label>
      <input
        type="text"
        id="f_full_name_kanji"
        name="f_full_name_kanji"
        value={formData.f_full_name_kanji}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_full_name_kana">Full Name (Kana):</label>
      <input
        type="text"
        id="f_full_name_kana"
        name="f_full_name_kana"
        value={formData.f_full_name_kana}
        onChange={handleChange}
        required
      />

      <button type="submit">Submit</button>
    </form>
  );
};

export default SignupForm;
