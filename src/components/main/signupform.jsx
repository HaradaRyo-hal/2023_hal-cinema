import React, { useState } from 'react';

const SignupForm = () => {
  const [formData, setFormData] = useState({
    f_login_name: '', //名前
    f_login_password: '', // パスワード
    f_news_subscribed: false, //メルマガ いるかいらないか？
    f_birthday: '', // 誕生日
    f_postal_code: '', //郵便番号〒400-0000
    f_prefecture: '', //都道府県
    f_city: '', //市町村
    f_address1: '', //何丁目番地
    f_address2: '', //マンション部屋番号　//あるときないときある
    f_mail_address: '', //メールアドレス
    f_full_name_kanji: '', //漢字氏名
    f_full_name_kana: '', //カナ氏名
  });

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    let fieldValue = value;

    // 入力制限を追加
    if (name === 'f_postal_code') {
      // 数字のみの入力と3桁目と4桁目の間にハイフンの自動配置、最大文字数7文字
      fieldValue = value.replace(/\D/g, '').replace(/(\d{3})(\d{1,4})/, '$1-$2').slice(0, 8);
    } else if (name === 'f_prefecture' || name === 'f_full_name_kanji') {
      // 数字と英語の入力を制限
      fieldValue = value.replace(/[^ぁ-んァ-ン一-龥ー]/g, '');
    } else if (name === 'f_full_name_kana') {
      // カタカナのみの入力を制限
      fieldValue = value.replace(/[^ァ-ンー]/g, '');
    }

    const updatedFormData = {
      ...formData,
      [name]: fieldValue,
    };
    setFormData(updatedFormData);
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    // フォームのデータをサーバーに送信する処理を実装する
    console.log(formData);
  };

  return (
    <form onSubmit={handleSubmit}>
      {/* 各フィールドの入力フィールドを追加 */}
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
        pattern="\d{3}-?\d{0,4}"
        maxLength={8}
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

      <button type="submit">Submitここで登録する</button>
    </form>
  );
};

export default SignupForm;
