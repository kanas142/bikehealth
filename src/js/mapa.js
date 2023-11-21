
(function () {

    function mapa() {
        if (document.querySelector('#mapa')) {
            const lat = 4.6844661;
            const lng = -74.0859752;
            const zoom = 12;

            // Crear el mapa
            const map = L.map('mapa').setView([lat, lng], zoom);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            const customIcon = L.icon({
                iconUrl: '/build/img/logo.ico', // Ruta a tu archivo de icono personalizado
                iconSize: [30, 25], // Ajusta el tamaño del icono [ancho, alto]
                iconAnchor: [15, 30], // Ajusta el punto de anclaje del icono [puntoX, puntoY]
                popupAnchor: [0, -30] // Ajusta el punto de anclaje del popup [puntoX, puntoY]
            });

            async function obtenerPuntos() {

                const url = `/api/incidencia`;
    
                const respuesta = await fetch(url);
                const resultado = await respuesta.json();
    
                marcarMapa(resultado);
    
            }
    
    
            function marcarMapa(arrayPuntos = []) {
                arrayPuntos.map(punto => {
                    L.marker([punto.latitud, punto.longitud], { icon: customIcon }).addTo(map)
                    .bindPopup(`
                        <h2 class="mapa__heading">${punto.direccion}</h2>
                        <p class="mapa__texto">${punto.fecha} - ${punto.hora}</p> 
                    `)
                    .openPopup();
                })

    
            }

            obtenerPuntos();

        }



    }


    mapa();

    function loadMapScenario() {
        $(document).ready(function () {
          const searchInput = $('#direccion');
      
          // Configuración de la búsqueda
          searchInput.autocomplete({
            source: function (request, response) {
              const apiKey = 'Aj0NY2lXkOEheiTEFUMlY8GdvpKnSjupCUZq74Hfsr8KEhyUQN9pE9YJyU1CxcxW';
              const searchTerm = request.term;
      
              // Agrega la ciudad a la cadena de búsqueda
              const city = 'Bogotá';
              const apiUrl = `https://dev.virtualearth.net/REST/v1/Locations?q=${encodeURIComponent(searchTerm)},${encodeURIComponent(city)}&key=${apiKey}`;
      
              $.ajax({
                url: apiUrl,
                dataType: 'jsonp',
                jsonp: 'jsonp',
                success: function (data) {
                  if (data.resourceSets.length > 0 && data.resourceSets[0].resources.length > 0) {
                    const places = data.resourceSets[0].resources.map(function (item) {
                      // Utiliza solo la dirección, sin código postal u otros detalles
                      const address = item.address && item.address.addressLine ? item.address.addressLine : '';
                      return {
                        label: `${address}`,
                        lat: item.point.coordinates[0],
                        lon: item.point.coordinates[1]
                      };
                    });
                    const limitedPlaces = places.slice(0, 1);
                    response(limitedPlaces);
                  } else {
                    response([]);
                  }
                }
              });
            },
            minLength: 5,
            select: function (event, ui) {
              document.querySelector('#longitud').value =  ui.item.lon
              document.querySelector('#latitud').value =  ui.item.lat             
            }
          });
        });
      }
      
      loadMapScenario();
      

})();

