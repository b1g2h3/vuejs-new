<template>
    <Container :loading="loadComponent">
        <Sidebar
            name="Objednávky"
            :items="orders.data"
            :renderHTML="renderHTML"
            type="name"
            :param="setParam"
        >
            <router-link :to="{ name: 'objednat' }" class="link text-center">
                <font-awesome-icon icon="plus" /> Přidat
            </router-link>
            <div v-show="orders.data.length === 0">Nemáte žádné objednávky</div>
            <template v-slot:bottom>
                <pagination :items="orders" />
            </template>
        </Sidebar>
        <router-view :key="$route.fullPath"></router-view>
    </Container>
</template>
<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import { mapGetters, mapMutations } from "vuex";
@Component({
    name: "allOrders",
    middleware: ["auth", "customer"],
    computed: mapGetters(["orders"]),
    methods: mapMutations(["fetchOrders"]),
    metaInfo() {
        return { title: "Všechny objednávky" };
    }
})
export default class allOrders extends Vue {
    loadComponent?: Boolean = false;
    faPen?: any =
        '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" class="svg-inline--fa fa-pen fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"/></svg>';
    faCheck?: any =
        '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>';

    renderHTML = order => {
        const icon = order.status == "rozpracovaná" ? this.faPen : this.faCheck;
        const html = `
                <span class="flex h-6">
                    <span>č. ${order.id} </span>
                    <div class="flex w-6 h-6 pl-2">
                        ${icon}
                    </div> 
                    <span class="pl-2">
                        Přidat 
                        ${order.created_at}
                    </span>
                </span>`;
        return html;
    };

    setParam = order => {
        return {
            name: "ShowOrder",
            params: { id: order.id }
        };
    };

    beforeMount() {
        this.loadComponent = true;
        this.$store
            .dispatch("fetchOrders", 1)
            .then(res => (this.loadComponent = false));
    }
}
</script>
