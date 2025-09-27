// resources/tidelib/js/carousel.js

function initializeCarousel(containerId, data, options = {}) {
    const carouselContainer = document.getElementById(containerId);
    const carouselInner = carouselContainer.querySelector('.carousel-inner');

    // Función para ajustar la altura del carrusel
    function adjustCarouselHeight() {
        if (options.variant === 'default') {
            // Para el carrusel principal, usamos el 20% de la altura de la ventana.
            let windowHeight = window.innerHeight;
            carouselContainer.style.height = `${windowHeight * 0.2}px`;
        } else if (options.variant === 'most-viewed') {
            // Para "los más leídos" se puede usar una altura fija o que se ajuste al contenido.
            if(options.fixedHeight) {
                carouselContainer.style.height = `${options.fixedHeight}px`;
            } else {
                carouselContainer.style.height = 'auto';
            }
        }
    }

    // Calcula cuántos ítems caben en el slide
    function getItemsPerSlide() {
        let containerWidth = carouselContainer.clientWidth;
        if (options.variant === 'default') {
            let containerHeight = carouselContainer.clientHeight;
            let minWidth = options.minWidthPerItem || 120;
            let minHeight = options.minHeightPerItem || 100;
            // Se usa Math.max para aprovechar el mayor número posible sin reducir demasiado el tamaño de la imagen.
            let itemsByWidth = Math.floor(containerWidth / minWidth);
            let itemsByHeight = Math.floor(containerHeight / minHeight);
            return Math.max(itemsByWidth, itemsByHeight);
        } else if (options.variant === 'most-viewed') {
            // Para "los más leídos", se asume un ancho fijo basado en el tamaño de la imagen.
            let minWidth = options.minWidthPerItem || 55;
            return Math.floor(containerWidth / minWidth);
        }
    }

    // Función para dividir el array en grupos
    function chunkArray(array, size) {
        return array.reduce((acc, _, i) => 
            i % size ? acc : [...acc, array.slice(i, i + size)]
        , []);
    }

    // Función para renderizar el carrusel
    function renderCarousel() {
        carouselInner.innerHTML = "";
        adjustCarouselHeight();
        let itemsPerSlide = getItemsPerSlide();
        let chunkedData = chunkArray(data, itemsPerSlide);
        let itemWidthPercent = 100 / itemsPerSlide;

        chunkedData.forEach((group, index) => {
            let activeClass = index === 0 ? "active" : "";
            let slideDiv = document.createElement("div");
            slideDiv.className = `carousel-item ${activeClass}`;
            let rowDiv = document.createElement("div");
            rowDiv.style.display = "flex";
            rowDiv.style.flexWrap = "nowrap";
            rowDiv.style.width = "100%";
            rowDiv.style.height = "100%";

            group.forEach(item => {
                let colDiv = document.createElement("div");
                colDiv.style.flex = `0 0 ${itemWidthPercent}%`;
                colDiv.style.maxWidth = `${itemWidthPercent}%`;
                colDiv.style.boxSizing = "border-box";
                colDiv.style.display = "flex";
                colDiv.style.flexDirection = "column";
                colDiv.style.justifyContent = "center";
                colDiv.style.alignItems = "center";
                colDiv.style.padding = options.padding || "0.5rem";

                if (options.variant === 'most-viewed') {
                    colDiv.innerHTML = `
                        <a href="/perfil/descripcion/${item.id}">
                            <img src="${item.imagen_portada}" 
                                 alt="${item.titulo}" 
                                 style="width: ${options.fixedSize || 55}px; height: ${options.fixedSize || 55}px; object-fit: cover; border-radius: 50%;">
                        </a>
                        <div class="titulo_lateral">${item.titulo}</div>
                    `;
                } else {
                    colDiv.innerHTML = `
                        <a href="/perfil/descripcion/${item.id}">
                            <img src="${item.imagen_portada}" 
                                 alt="${item.titulo}" 
                                 style="width: 100%; max-height: ${carouselContainer.clientHeight}px; object-fit: contain;">
                        </a>
                    `;
                }
                rowDiv.appendChild(colDiv);
            });
            slideDiv.appendChild(rowDiv);
            carouselInner.appendChild(slideDiv);
        });
    }

    renderCarousel();
    let resizeTimeout;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(renderCarousel, 300);
    });
}

// Hacer la función accesible globalmente
window.initializeCarousel = initializeCarousel;