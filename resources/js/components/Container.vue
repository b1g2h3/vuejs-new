<template>
    <main class="flex flex-wrap justify-center">
        <div
            class="h-full w-full flex justify-center items-center m-20"
            v-if="loading"
        >
            <div class="loading__spinner w-32 h-32"></div>
        </div>
        <slot v-else></slot>
    </main>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
@Component({
    name: "box"
})
export default class Box extends Vue {
    @Prop() readonly title!: String;
    @Prop({ default: false, type: Boolean }) readonly loading!: Boolean;
    created() {
        this.loading;
    }
}
</script>
<style>
.loading__spinner {
    border-color: black transparent;
}
</style>
