// Función para cambiar el estado del sensor (Encender / Apagar)
function toggleSensor(sensorId, stateElementId, imageElementId) {
    const status = document.getElementById(stateElementId);
    const image = document.getElementById(imageElementId);

    // Cambiar el estado y la imagen según el estado actual del sensor
    if (status.textContent.includes('Apagado')) {
        status.textContent = "Estado: Encendido";
        image.src = `images/${sensorId}-on.png`;  // Cambia la imagen a "on"
    } else {
        status.textContent = "Estado: Apagado";
        image.src = `images/${sensorId}-off.png`; // Cambia la imagen a "off"
    }

    // Enviar la acción de cambio al servidor
    sendSensorAction(sensorId, status.textContent.includes('Encendido') ? 'Encender' : 'Apagar');
}

// Función para verificar humo (solo simulación en este caso)
function checkSmoke() {
    const status = document.getElementById('smokeStatus');
    status.textContent = "Estado: Sin humo detectado."; // Actualizar el estado de humo
    sendSensorAction('Humo', 'Sin humo detectado');
}

// Función para verificar sonido (simulando la detección de sonido fuerte)
function checkSound() {
    const status = document.getElementById('soundStatus');
    status.textContent = "Estado: Sonido fuerte detectado."; // Simulación de detección de sonido fuerte

    // Después de 3 segundos, volver al estado normal
    setTimeout(() => {
        status.textContent = "Estado: Sin sonido fuerte.";
        sendSensorAction('Sonido', 'Sin sonido fuerte');
    }, 3000);

    // Enviar la acción al servidor
    sendSensorAction('Sonido', 'Sonido fuerte detectado');
}

// Función para cargar los datos de los sensores desde el servidor
function loadSensorData() {
    fetch('backend/getSensors.php') // Llamada al archivo PHP para obtener datos del sensor
        .then(response => response.json()) // Convierte la respuesta a JSON
        .then(data => {
            console.log(data); // Muestra los datos en la consola (para depuración)
            
            // Aquí puedes actualizar el HTML con los datos del sensor
            data.forEach(sensor => {
                const sensorElement = document.getElementById(sensor.sensor_type);
                if (sensorElement) {
                    sensorElement.innerHTML = `${sensor.value} (Última lectura: ${sensor.timestamp})`;
                }
            });
        })
        .catch(error => console.error('Error al cargar los datos del sensor:', error));
}

// Llamada periódica para cargar los datos cada 5 segundos (puedes modificar el intervalo)
setInterval(loadSensorData, 5000);

// Función para enviar la acción de un sensor al servidor y recibir el correo
function sendSensorAction(sensor, accion) {
    // Llamada POST a 'getSensors.php' para procesar la acción
    fetch('backend/getSensors.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', // El tipo de datos enviados es JSON
        },
        body: JSON.stringify({ sensor: sensor, accion: accion }), // Enviar datos en formato JSON
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            alert("Acción realizada y correo enviado.");
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(error => {
        alert("Error en la conexión: " + error.message);
    });
}
