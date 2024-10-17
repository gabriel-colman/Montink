import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';

// Importando os estilos existentes
import '../assets/bootstrap.min.css';
import '../assets/font-awesome.min.css';
import '../assets/style.css';  // Caso tenha um estilo customizado

const root = ReactDOM.createRoot(document.getElementById('root') as HTMLElement);
root.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
