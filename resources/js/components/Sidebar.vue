<template>
    <aside class="sidebar w-full md:w-64">
        <div class="name flex justify-start pl-2">
            <span>
                {{ name }}
            </span>
            <div class="block ml-2 md:hidden" @click="visible = !visible">
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fas"
                    data-icon="bars"
                    class="svg-inline--fa fa-bar w-6 h-6 text-black cursor-pointer"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                >
                    <path
                        fill="currentColor"
                        d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"
                    />
                </svg>
            </div>
        </div>
        <div class="block md:hidden">
            <div
                v-show="visible"
                class="absolute h-screen bg-black top-0 right-0 opacity-75"
            >
                <slot />
                <div v-if="routerLink === true" @click="visible = !visible">
                    <router-link
                        v-for="item in items"
                        v-bind:key="item[_key]"
                        class="link block"
                        :to="param(item)"
                    >
                        <span class v-html="renderHTML(item)">{{
                            item[type]
                        }}</span>
                    </router-link>
                </div>
                <div v-else>
                    <div v-bind:key="item[_key]" v-for="item in items">
                        <div class="link" v-on:click="onSelect(item)">
                            {{ item[type] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden md:block">
            <div class="menu">
                <slot />
                <div v-if="routerLink === true">
                    <router-link
                        v-for="item in items"
                        v-bind:key="item[_key]"
                        class="link block"
                        :to="param(item)"
                    >
                        <span class v-html="renderHTML(item)">{{
                            item[type]
                        }}</span>
                    </router-link>
                </div>
                <div v-else>
                    <div v-bind:key="item[_key]" v-for="item in items">
                        <div class="link" v-on:click="onSelect(item)">
                            {{ item[type] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <slot name="bottom" />
    </aside>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
@Component({
    name: "Sidebar"
})
export default class Sidebar extends Vue {
    @Prop({ required: true, type: String }) readonly name!: String;
    @Prop({ default: true, type: Boolean }) readonly routerLink!: Boolean;
    @Prop({ required: true }) readonly items!: Array<any>;
    @Prop({ default: "name" }) readonly type!: String;
    @Prop({ default: "id" }) readonly _key!: String;
    @Prop() readonly onSelect?: Function;
    @Prop() readonly renderHTML?: Function;
    @Prop() param?: Function;
    public visible = false;
}
</script>
