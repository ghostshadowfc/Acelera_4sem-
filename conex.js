const mysql = require('mysql2');

const connection = mysql.createConnection({
  host: 'localhost',
  user: '',
  password: '',
  database: 'arduino',
});

connection.connect((err) => {
  if (err) {
    console.error('Erro ao conectar ao banco de dados: ' + err.stack);
    return;
  }
  console.log('Conexão bem-sucedida ao banco de dados.');
});
