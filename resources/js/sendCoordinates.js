/**
 * Configurando os eventos de click dos botões para enviar as coordenadas
 */
document.querySelectorAll("button.modalBtn").forEach(item => {
    item.addEventListener('click', () => { sendCoordinates(item.id) });
});

/**
 * @type {Object}
 * Mapa dos estágios que podem ser escolhidos
 */
const stageMap = {
    pre_inscricao: {
        x: 1,
        y: 1
    },

    inscricao: {
        x: 2,
        y: 2
    },

    provas: {
        x: 3,
        y: 3
    }
};

/**
 * 
 * @param {String} stage Estágio que o player deseja iniciar o jogo
 * @returns {void}
 */
function sendCoordinates(stage) {
    const obj = {
        x: stageMap[stage].x,
        y: stageMap[stage].y,
        stage: stage,
        token: import.meta.env.VITE_APP_TOKEN
    }

    document.cookie = "stage=" + stage;
    localStorage.setItem('coordinates', JSON.stringify(obj));
    location.href = import.meta.env.VITE_JOGO_URL;
}