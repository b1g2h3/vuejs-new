<template>
    <Container>
        <div class="w-full">
            <div class="top-banner bg-junglegreen items-center">
                <div class="banner items-center">
                    <div class="banner-wrapper text-primary">
                        <h1>
                            Přehled zboží
                        </h1>
                        <p>
                            Dodávám potraviny vysoké kvality.
                        </p>
                        <div class="banner-button bg-button">
                            <router-link
                                :to="{ name: 'register' }"
                                class="banner-link bg-button"
                                >Zaregistrujte se</router-link
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto">
                <div
                    class="bg-primary w-full border-t border-b text-center border-junglegreen text-success md:px-4 md:py-3"
                    v-if="successMessage"
                >
                    <p class="font-bold">{{ successMessage }}</p>
                </div>
                <div class="flex justify-center">
                    <Sidebar
                        name="Kategorie"
                        :items="categories"
                        :param="setParam"
                        :renderHTML="renderHTML"
                        v-show="!['zbozi'].includes($route.name)"
                    />
                    <router-view />
                </div>
                <div
                    v-show="['zbozi'].includes($route.name)"
                    class="p-20 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6"
                >
                    <div
                        class="category__item w-full m-0 md:m-2 lg:m-2"
                        v-bind:key="category.id"
                        v-for="category in categories"
                    >
                        <router-link
                            :to="{
                                name: 'category_show',
                                params: {
                                    id: category.id,
                                    slug: setSlug(category.name)
                                }
                            }"
                        >
                            <h2
                                class="lg:text-xl lg text-secondary  text-center font-bold"
                            >
                                {{ category.name }}
                            </h2>
                            <img
                                class="object-cover h-64 w-full"
                                :src="`/storage/${category.imagePath}`"
                            />
                        </router-link>
                        <div v-show="loggedIn && admin">
                            <router-link
                                :to="{
                                    name: 'editCategory',
                                    params: { id: category.id }
                                }"
                                class="btn-edit w-full inline-block text-center"
                                >Upravit</router-link
                            >
                            <a
                                @click="deleteCategory(category.id)"
                                class="btn-delete w-full inline-block text-center"
                                >Odstranit</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Container>
</template>
<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import { mapGetters, mapMutations } from "vuex";
const { urlSlug } = require("../../utils/urlSlug");
@Component({
    name: "AllCategories",
        computed: mapGetters(["categories", "loggedIn", "admin"]),
        methods: mapMutations(["fetchCategories"]),
    metaInfo() {
        return { title: "Všechny kategorie" };
    }
})
export default class AllCategories extends Vue {
    @Prop() successMessage?: String;
    errors!: [];

    created(): void {
        this.$store.dispatch("fetchCategories");
    }

    setParam = ({ id, name }) => {
        return {
            name: "category_show",
            params: {
                id,
                slug: this.setSlug(name)
            }
        };
    };

    renderHTML = category => {
        return category.name;
    };

    setSlug(name) {
        return urlSlug(name);
    }

    deleteCategory(id) {
        this.errors = [];
        this.successMessage = "";
        this.$store
            .dispatch("deleteCategory", id)
            .then(response => {
                this.successMessage = "Úspěšně jste odstranili kategorii";
            })
            .catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
            });
    }
}
</script>
