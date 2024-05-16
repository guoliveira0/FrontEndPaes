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
 * @param {String} JOGO_URL URL do jogo na plataforma PlayCanvas
 * @param {String} APP_TOKEN Token do APP Laravel
 * @returns {void}
 */
function sendCoordinates(stage, JOGO_URL, APP_TOKEN) {
    const obj = {
        x: stageMap[stage].x,
        y: stageMap[stage].y,
        stage: stage,
        token: APP_TOKEN
    }

    localStorage.setItem('coordinates', JSON.stringify(obj));
    location.href = JOGO_URL;
}