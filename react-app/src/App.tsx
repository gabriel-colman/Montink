import React, { useEffect, useState } from 'react';

// Componente principal que renderiza a interface
const App: React.FC = () => {
    const [templates, setTemplates] = useState<{ title: string; value: number }[]>([]);
    const [title, setTitle] = useState('');
    const [value, setValue] = useState<number | ''>('');

    // Função para buscar templates
    const fetchTemplates = async () => {
        try {
            const response = await fetch('http://localhost:8000/api/templates');
            const data = await response.json();
            setTemplates(data);
        } catch (error) {
            console.error('Erro ao obter templates:', error);
        }
    };

    // Função para salvar um novo template
    const saveTemplate = async () => {
        if (!title || value === '') return;

        const newTemplate = { title, value: Number(value) };

        try {
            const response = await fetch('http://localhost:8000/api/templates', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(newTemplate)
            });
            const data = await response.json();
            setTemplates(data.data); // Atualiza a lista de templates
            setTitle('');
            setValue('');
        } catch (error) {
            console.error('Erro ao salvar template:', error);
        }
    };

    useEffect(() => {
        fetchTemplates();  // Buscar templates ao carregar o componente
    }, []);

    return (
        <div>
            <h2>Adicionar Novo Template</h2>
            <label htmlFor="template-title">Título:</label>
            <input
                type="text"
                id="template-title"
                value={title}
                onChange={(e) => setTitle(e.target.value)}
                placeholder="Título do template"
            />
            <label htmlFor="template-value">Valor:</label>
            <input
                type="number"
                id="template-value"
                value={value}
                onChange={(e) => setValue(e.target.value === '' ? '' : Number(e.target.value))}
                placeholder="Valor do template"
            />
            <button onClick={saveTemplate}>Salvar Template</button>

            <h3>Lista de Templates:</h3>
            <ul>
                {templates.map((template, index) => (
                    <li key={index}>
                        {template.title}: {template.value}
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default App;
