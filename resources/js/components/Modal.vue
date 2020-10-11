<template>
    <div v-show="showModal" class="component__modal__wrapper">
        <transition name="fade" appear>
            <div    class="component__modaL__background" @click="closeModal()" />
        </transition>
        <transition name="pop" appear>
            <div class="component__modal">
                <div class="component__modal__header">
                    <h2 class="component__modal__body__title">
                        {{ title }}
                    </h2>
                    <slot name="head" />
                </div>
                <div class="component__modal__body">
                    <slot name="body" />
                </div>
                <div class="component__modal__footer">
                    <button type="button" class="component__modal__footer__close__button" @click="closeModal()">
                        Close
                    </button>
                    <slot name="footer" />
                </div>
            </div>
        </transition>
    </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
@Component({
    name: "Modal"
})
export default class Modal extends Vue {
    @Prop() title?: string;
    showModal?: Boolean = false

    closeModal() {
        this.showModal = false;
        document.querySelector('.component__modal__wrapper').classList.remove("overflow-hidden");
    }

    openModal() {
        this.showModal = true;
        document.querySelector(".component__modal__wrapper").classList.add("overflow-hidden");
    }
}
</script>
<style scoped>
.component__modaL__background {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.8);
    z-index: 9050;
}
.component__modal__wrapper {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 9051;
    padding: 0 20px;
    overflow-y: auto;
    overflow-x: hidden;
}
.component__modal {
    position: relative;
    width: 600px;
    background-color: #ffffff;
    border-radius: 5px;
    margin: 50px auto;
    display: flex;
    flex-direction: column;
    z-index: 9053;
}

.component__modal__header {
    display: flex;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.2);
    position: relative;
    color: #02203c;
}
.component__modal__body {
    background-color: #f6f9fc;
    padding: 20px;
    color: #02203c;
}
.component__modal__body__title {
    flex: 1 auto;
    margin: 0;
    font-size: 30px;
    text-align: left;
}
.component__modal__body > p {
    margin: 0 0 20px;
    text-align: left;
    line-height: 1.7;
    font-size: inherit;
}
.component__modal__footer {
    background-color: #f6f9fc;
    padding: 20px;
    text-align: right;
}
.component__modal__footer__close__button {
    background: white;
    box-shadow: 0 2px 4px rgba(50,50,93,.1);
    padding: 0 20px;
    height: 50px;
    color: black;
}


/* ---------------------------------- */
.fade-enter-active,
.fade-leave-active {
    transition: opacity .4s linear;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}


.pop-enter-active,
.pop-leave-active {
    transition: transform 0.4s cubic-bezier(0.5, 0, 0.5, 1), opacity 0.4s linear;
}

.pop-enter,
.pop-leave-to {
    opacity: 0;
    transform: scale(0.3) translateY(-50%);
}
</style>
