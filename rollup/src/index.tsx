import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import pkg from '../package.json';

console.log(pkg.name);
console.log('Описание:', pkg.description);
console.log('Сайт:', pkg.repository.url);
console.log('Версия:', process.env.BUILD_VERSION);
console.log('Дата сборки:', new Date(process.env.BUILD_DATE!).toString());

ReactDOM.render(<App />, document.getElementById('root'));
