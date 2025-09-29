<template>
    <div class="right-sidebar">
        <div class="sidebar-content">
            <!-- Banner Mercado Play -->
            <div class="promo-banner mercado-play">
                <div class="banner-content">
                    <h4>¡Series y películas también en TV!</h4>
                    <span class="free-tag">GRATIS</span>
                    <button class="banner-btn">Ir a Mercado Play</button>
                </div>
                <div class="banner-image">
                    <div class="placeholder-image">
                        <v-icon name="bi-tv" scale="3" />
                        <p>TV + Series</p>
                    </div>
                </div>
            </div>

            <!-- Banner Disney+ -->
            <div class="promo-banner disney-plus">
                <div class="banner-content">
                    <div class="logo">Disney+</div>
                    <p>Disfruta todas tus películas y series favoritas, en el confort de tu living</p>
                </div>
                <div class="banner-image">
                    <div class="placeholder-image">
                        <v-icon name="bi-play-circle" scale="3" />
                        <p>Disney+</p>
                    </div>
                </div>
            </div>

            <!-- Banner Frávega -->
            <div class="promo-banner fravega">
                <div class="banner-content">
                    <div class="logo">Frávega</div>
                    <p>Disfruta todas ofertas para este verano... Frávega, los planes de financiación más convenientes para vos</p>
                </div>
                <div class="banner-image">
                    <div class="placeholder-image">
                        <v-icon name="bi-shop" scale="3" />
                        <p>Frávega</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
// Sidebar derecho con banners promocionales
</script>

<style scoped>
.right-sidebar {
    width: 20%;
    min-width: 250px;
    background-color: #fff;
    border-left: 1px solid #e0e0e0;
    position: fixed;
    right: 0;
    top: 70px; /* Altura del header */
    height: calc(100vh - 70px);
    overflow-y: auto;
    z-index: 100;
}

.sidebar-content {
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.promo-banner {
    border-radius: 8px;
    padding: 20px;
    color: #fff;
    position: relative;
    overflow: hidden;
    min-height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.mercado-play {
    background: linear-gradient(135deg, #000 0%, #333 100%);
}

.disney-plus {
    background: linear-gradient(135deg, #0066cc 0%, #004499 100%);
}

.fravega {
    background: linear-gradient(135deg, #8b5cf6 0%, #a855f7 100%);
}

.banner-content {
    z-index: 2;
    position: relative;
}

.banner-content h4 {
    font-size: 16px;
    font-weight: bold;
    margin: 0 0 10px 0;
    line-height: 1.3;
}

.banner-content p {
    font-size: 13px;
    margin: 0 0 15px 0;
    line-height: 1.4;
    opacity: 0.9;
}

.logo {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.free-tag {
    background-color: #00ff00;
    color: #000;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: bold;
    display: inline-block;
    margin-bottom: 15px;
}

.banner-btn {
    background-color: #fff;
    color: #000;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.banner-btn:hover {
    background-color: #f0f0f0;
}

.banner-image {
    position: absolute;
    bottom: 10px;
    right: 10px;
    opacity: 0.3;
}

.placeholder-image {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.placeholder-image p {
    font-size: 12px;
    margin-top: 5px;
    opacity: 0.8;
}

/* Responsive */
@media screen and (max-width: 1024px) {
    .right-sidebar {
        width: 25%;
        min-width: 200px;
    }
}

@media screen and (max-width: 768px) {
    .right-sidebar {
        width: 30%;
        min-width: 180px;
    }
    
    .sidebar-content {
        padding: 15px;
        gap: 15px;
    }
    
    .promo-banner {
        padding: 15px;
        min-height: 180px;
    }
    
    .banner-content h4 {
        font-size: 14px;
    }
    
    .banner-content p {
        font-size: 12px;
    }
}

@media screen and (max-width: 480px) {
    .right-sidebar {
        display: none; /* Ocultar en móviles muy pequeños */
    }
}
</style>
