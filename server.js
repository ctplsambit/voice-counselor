const express = require('express');
const cors = require('cors');
const fetch = require('node-fetch');
const path = require('path');

const app = express();
app.use(cors());
app.use(express.json());
app.use(express.static(path.join(__dirname, '2')));

const API_CONFIG = {
    URL: 'https://f0dswhkb15.execute-api.us-east-1.amazonaws.com/dev/counselor-status',
    API_KEY: '0BAR6wTBIx4VMi1F7DgCj8VLbGNZwJy55ZOKiX0H'
};

app.post('/api/counselor-status', async (req, res) => {
    try {
        const response = await fetch(API_CONFIG.URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'x-api-key': API_CONFIG.API_KEY
            },
            body: JSON.stringify(req.body)
        });

        const data = await response.json();
        res.json(data);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

const PORT = 3001;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
}); 