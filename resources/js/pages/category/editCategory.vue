<template>
    <Content title="Upravit kategorii">
        <div class="table">
            <Form :succesMessage="successMessage" enctype="multipart/form-data">
                <FormInput
                    v-model="category.name"
                    :error="errors.name"
                    label="Název kategorie"
                    name="name"
                    autofocus="true"
                />
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="ares-label" for="name"
                            >Obrázek kategorie</label
                        >
                        <input @change="processFile($event)" type="file" />
                        <p
                            class="text-red-500 text-xs italname"
                            v-if="errors.image"
                        >
                            {{ errors.image[0] }}
                        </p>
                    </div>
                </div>
                <FormButton
                    :onClick="editCategory"
                    name="Upravit kategorii"
                    :loading="loading"
                />
            </Form>
        </div>
    </Content>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import { mapGetters, mapMutations } from "vuex";
@Component({
    name: "editCategory",
    middleware: ["auth", "admin"],
    computed: mapGetters(["category"]),
    methods: mapMutations(["fetchCategory"]),
    metaInfo() {
        return { title: "Upravit kategorii" };
    }
})
export default class editCategory extends Vue {
    @Prop() successMessage!: any;
    @Prop() id!: any;
    public errors = {};
    loading?: Boolean = false;
    get category() {
        return this.$store.getters.category;
    }
    created() {
        this.$store.dispatch("fetchCategory", this.id);
    }
    processFile(event) {
        this.category.image = event.target.files[0];
    }
    editCategory() {
        this.errors = [];
        this.loading = true;
        let fd = new FormData();
        fd.append("_method", "PUT");
        fd.set("name", this.category.name);
        fd.append("image", this.category.image);
        this.axios
            .post(`category/${this.category.id}`, fd, {
                headers: {
                    "Content-Type":
                        "multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                }
            })
            .then(response => {
                this.loading = false;
                // this.$router.push({ name: "zbozi" });
            })
            .catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                } else if (error.response.status == 404) {
                    this.errors = error.response.data.errors;
                }
                this.loading = false;
            });
    }
}
</script>
