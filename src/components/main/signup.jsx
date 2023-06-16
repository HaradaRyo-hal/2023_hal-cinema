import React, { useState } from 'react';
import { TextField, Button } from '@mui/material';

function Signup() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleEmailChange = (event) => {
    setEmail(event.target.value);
  };

  const handlePasswordChange = (event) => {
    setPassword(event.target.value);
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    // 登録処理をここに追加する
    console.log('Email:', email);
    console.log('Password:', password);
  };

  return (
    <form onSubmit={handleSubmit} className="signup-form">
      <TextField
        type="email"
        label="メールアドレス"
        value={email}
        onChange={handleEmailChange}
        required
      />
      <TextField
        type="password"
        label="パスワード"
        value={password}
        onChange={handlePasswordChange}
        required
      />
      <Button type="submit" variant="contained" color="primary">
        登録
      </Button>
    </form>
  );
}

export default Signup;
