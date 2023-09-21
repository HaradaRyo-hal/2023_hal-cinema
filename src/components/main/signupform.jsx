import React, { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import axios from 'axios';
import './signupform.css';

const SignUpForm = () => {
  const [formData, setFormData] = useState({
    f_user_id: 'test',//ユーザーID
    f_login_password: 'password', // パスワード
    f_news_subscribed: false, //メルマガ いるかいらないか？
    f_birthday: '', // 誕生日
    f_postal_code: '000-0000', //郵便番号〒000-0000
    f_prefecture: '岡山県', //都道府県
    f_city: '岡山市辰巳町', //市町村
    f_address1: '1丁目110番地', //何丁目番地
    f_address2: 'ソーシャルオオモリ2-205', //マンション部屋番号　//あるときないときある
    f_mail_address: 'tester@gmail.com', //メールアドレス
    f_full_name_kanji: '広瀬', //漢字氏名
    f_full_name_kana: '友哉', //カナ氏名
  });

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    let fieldValue = value;

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


  const navigate = useNavigate();

  const handoleSubmitPushAxios = async (e) => {
    e.preventDefault();
    
    try {

      const formDataJSON = JSON.stringify(formData);

      const response = await axios.post(
        'http://localhost:80/2023_hal-cinema/public/accountRegister/accountRegister.php',
        formDataJSON,
        {
          headers: {
            'Content-Type': 'application/json', // JSONデータを送信することをサーバーに伝える
          },
        }
        );
        if (response.status === 200){
          console.log('データが正常に挿入されました。');
          console.log(response.data);

          // リダイレクト先のURLを指定
          const redirectTo = '/'; // リダイレクト先のURL

          alert("登録完了しました。ログインフォームからログインしてください。");

          // リダイレクトを実行
          navigate(redirectTo);
        }else{
          console.error('データの挿入に失敗しました。');
        }
    } catch (error){
      console.error('エラー：', error);
    }
  };

  return (
    <div>
      
      <Link to="/login">ログイン画面に戻る</Link>
    
      <form onSubmit={handleSubmit}>
      {/* 各フィールドの入力フィールドを追加 */}
      <label htmlFor="f_user_id">ユーザーID</label>
      <input
        type="text"
        id="f_user_id"
        name="f_user_id"
        value={formData.f_user_id}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_login_password">パスワード:</label>
      <input
        type="password"
        id="f_login_password"
        name="f_login_password"
        value={formData.f_login_password}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_news_subscribed">メルマガ:</label>
      <input
        type="checkbox"
        id="f_news_subscribed"
        name="f_news_subscribed"
        checked={formData.f_news_subscribed}
        onChange={handleChange}
      />

      <label htmlFor="f_birthday">誕生日:</label>
      <input
        type="date"
        id="f_birthday"
        name="f_birthday"
        value={formData.f_birthday}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_postal_code">郵便番号:</label>
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

      <label htmlFor="f_prefecture">県:</label>
      <input
        type="text"
        id="f_prefecture"
        name="f_prefecture"
        value={formData.f_prefecture}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_city">市町村:</label>
      <input
        type="text"
        id="f_city"
        name="f_city"
        value={formData.f_city}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_address1">住所:</label>
      <input
        type="text"
        id="f_address1"
        name="f_address1"
        value={formData.f_address1}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_address2">マンション名:</label>
      <input
        type="text"
        id="f_address2"
        name="f_address2"
        value={formData.f_address2}
        onChange={handleChange}
      />

      <label htmlFor="f_mail_address">メールアドレス:</label>
      <input
        type="email"
        id="f_mail_address"
        name="f_mail_address"
        value={formData.f_mail_address}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_full_name_kanji">漢字:</label>
      <input
        type="text"
        id="f_full_name_kanji"
        name="f_full_name_kanji"
        value={formData.f_full_name_kanji}
        onChange={handleChange}
        required
      />

      <label htmlFor="f_full_name_kana">カタカナ:</label>
      <input
        type="text"
        id="f_full_name_kana"
        name="f_full_name_kana"
        value={formData.f_full_name_kana}
        onChange={handleChange}
        required
      />

      <button type="submit" onClick={handoleSubmitPushAxios}>登録する</button>

    </form>
    </div>
  );
};

export default SignUpForm;
