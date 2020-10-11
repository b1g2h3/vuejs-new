<template>
    <div>
        <div class="top-banner bg-junglegreen">
            <div class="banner-left">
                <div class="banner-wrapper text-primary">
                    <h1>
                        Miroslav Šotola
                    </h1>
                    <p>
                        Ulehčuji kuchařům práci. Dodávám potraviny vysoké
                        kvality.
                    </p>
                    <div class="banner-button bg-button">
                        <router-link
                            :to="{ name: 'kontakt' }"
                            class="banner-link bg-button"
                            >Kontaktujte mně</router-link
                        >
                    </div>
                </div>
            </div>
            <div class="banner-right">
                <div class="cards-wrapper">
                    <div class="cards-wrapp">
                        <div class="cards-rotation">
                            <div class="card-two">
                                <div class="card card-1 text-primary bg-button">
                                    <div class="card-head bg-button">
                                        <span class=" pl-2">Zboží</span>
                                    </div>
                                    <div class="card-body bg-button">
                                        <div class="card-text">
                                            Vyberte si potraviny vysoké kvality.
                                        </div>
                                        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-1">
                                            <div style="height:40px;" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                            <div style="height:40px" class="card1-block bg-primary"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-2 text-primary bg-button">
                                    <div class="card-head bg-button">
                                        <span class=" pl-2">Detail zboží</span>
                                    </div>
                                    <div class="card-body bg-button">
                                       <div class="card-body bg-button">
                                       <div class="flex justify-center">
                                           <div style="height:40px;" class="card1-block w-2/5">
                                                <div style="height:10px" class="card1-block bg-primary w-full"></div>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card-two">
                                <div class="card card-1 text-primary bg-button">
                                    <div class="card-head bg-button">
                                        <span class=" pl-2">Objednávkový systém</span>
                                        <div class="flex-grow"></div>
                                        <button
                                            class="card__head__button bg-darkergreen text-secondary"
                                        >
                                            Objednat
                                        </button>
                                    </div>
                                    <div class="card-body bg-button">
                                        <div class="card3__block pl-4">
                                            <span
                                                style="width:13%"
                                                class="card3__block--mini  bg-red-400"
                                            ></span>
                                            <span
                                                style="width:9%"
                                                class="card3__block--mini  bg-red-400"
                                            ></span>
                                            <span
                                                style="width:9%"
                                                class="card3__block--mini  bg-red-400"
                                            ></span>
                                        </div>
                                        <div class="card3__block pl-6">
                                            <span
                                                style="width:15%"
                                                class="card3__block--mini  bg-black"
                                            ></span>
                                            <span
                                                style="width:9%"
                                                class="card3__block--mini  bg-yellow-100"
                                            ></span>
                                            <span
                                                style="width:13%"
                                                class="card3__block--mini  bg-red-400"
                                            ></span>
                                            <span
                                                style="width:9%"
                                                class="card3__block--mini  bg-red-400"
                                            ></span>
                                            <span
                                                style="width:9%"
                                                class="card3__block--mini  bg-red-400"
                                            ></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-2 text-primary bg-button">
                                    <div class="card-head bg-button">
                                        <span class=" pl-2">Objednávka</span>
                                        <div class="flex-grow"></div>
                                        <button
                                            class="card__head__button bg-green-500 text-secondary"
                                        >
                                            Potvrdit
                                        </button>
                                    </div>
                                    <div class="card-body bg-button">
                                        <div class="card-text"></div>
                                        <div class="card2__block">
                                            <div
                                                class="loading__spinner w-10 h-10"
                                            ></div>

                                            <span class="card2__block--mini ">
                                                Error
                                            </span>
                                            <span
                                                style="width:75%"
                                                class="card2__block--mini  bg-red-700 items-center"
                                            ></span>
                                        </div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head"></div>
                        <div class="card-body"></div>
                    </div>
                    <div class="card">
                        <div class="card-head"></div>
                        <div class="card-body"></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <section class="whoIam ">
                <div class="section__header">
                    <h2 class="text-xl text-center">Miroslav Šotola</h2>
                </div>
                <div class="section__body">
                    <picture>
                        <img
                            class="w-64 h-64"
                            src="/storage/images/retusovane.jpg"
                            alt
                        />
                    </picture>
                    <p class="mt-2">
                        Již několik let se zabývám distribucí konvenientnich
                        potravin pro gastrozarizeni. Dodávám širokou škálu
                        výrobku od několika mezinárodních výrobců. Jedna se o
                        koncentrované sypké směsi a pasty vhodné pro přípravu
                        polévek, zeleninových základů a omáček. Dále také různé
                        druhy příloh jako jsou těstoviny, rýže či luštěniny.
                    </p>
                    <p class="mt-2">
                        Výrobky obsahují čerstvě zpracované přírodní suroviny
                        jako je zelenina, bylinky, koření či mořská jodidovaná
                        sůl.
                    </p>
                    <p class="mt-2">
                        Při výrobě je kladen důraz na šetrné zpracování
                        základních potravin při použití nejmodernějších
                        technologií, tak aby bylo dosaženo nejvyšší kvality.
                        Mezi hlavní odběratele se řadí školní jídelny, kuchyně a
                        vývařovny zdravotních zařízení např, nemocnice, domy s
                        pečovatelskou službou a mnoho dalších.
                    </p>
                </div>
            </section>
        </div>
    </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
@Component({
    name: "Home",
    middleware: "guest",
    metaInfo() {
        return { title: "Hlavní stránka" };
    },
})
export default class Home extends Vue {
}
</script>
<style scoped>
.loading__spinner {
    border-color: white transparent;
}
</style>
