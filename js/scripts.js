function toggleSensor(sensorId, stateElementId, imageElementId) {
    const status = document.getElementById(stateElementId);
    const image = document.getElementById(imageElementId);

    if (status.textContent.includes('Apagado')) {
        status.textContent = "Estado: Encendido";
        image.src = `images/${sensorId}-on.png`;
    } else {
        status.textContent = "Estado: Apagado";
        image.src = `images/${sensorId}-off.png`;
    }
}

function checkSmoke() {
    const status = document.getElementById('smokeStatus');
    status.textContent = "Estado: Sin humo detectado.";
}

function checkSound() {
    const status = document.getElementById('soundStatus');
    status.textContent = "Estado: Sonido fuerte detectado.";
    setTimeout(() => {
        status.textContent = "Estado: Sin sonido fuerte.";
    }, 3000);
}
