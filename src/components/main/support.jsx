import React from 'react';
import './support.css';

function Support() {
  return (
    <div>
      <h1>サポート</h1>
      <div className="Form">
        <div className="Form-Item">
          <p className="Form-Item-Label"><span className="Form-Item-Label-Required">必須</span>お名前</p>
          <input type="text" className="Form-Item-Input" placeholder="例）山田太郎" />
        </div>
        <div className="Form-Item">
          <p className="Form-Item-Label"><span className="Form-Item-Label-Required">必須</span>電話番号</p>
          <input type="text" className="Form-Item-Input" placeholder="例）000-0000-0000" />
        </div>
        <div className="Form-Item">
          <p className="Form-Item-Label"><span className="Form-Item-Label-Required">必須</span>メールアドレス</p>
          <input type="email" className="Form-Item-Input" placeholder="例）example@gmail.com" />
        </div>
        <div className="Form-Item">
          <p className="Form-Item-Label isMsg"><span className="Form-Item-Label-Required">必須</span>お問い合わせ内容</p>
          <textarea className="Form-Item-Textarea"></textarea>
        </div>
        <input type="submit" className="Form-Btn" value="送信する" />
      </div>
    </div>
  );
}

export default Support;
