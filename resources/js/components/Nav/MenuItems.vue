<template>
  <div class="flex flex-1 justify-between px-2">
    <ul
      class="list-reset flex justify-between flex-1 md:flex-none items-center font-bold"
    >
      <li
        class="nav__item-link nav__link-item__expand-center"
        v-bind:key="index"
        v-for="(link, index) in links"
      >
        <router-link
          :to="{ name: link.route }"
          class="inline-block py-2 px-4 no-underline bg-junglegreen"
          >{{ link.name }}
        </router-link>
      </li>
    </ul>
    <ul
      class="list-reset flex justify-between flex-1 md:flex-none items-center font-bold"
      v-if="loggedIn"
    >
      <li class="nav__item-link__user">
        <div class="nav__item__user-componenr__wrapper">
          <button
            class="user__component__button"
            @click="visible = !visible"
            v-if="user"
          >
            <span>
              {{ 'test' }}
            </span>
            <div class="arrow-down"></div>
          </button>
          <div class="user__component"></div>

          <div
            v-show="visible"
            @mouseover="showMenu"
            class="user__component__dropdown"
            aria-hidden="false"
            aria-expanded="true"
          >
            <div class="user__component__dropdown__header">
              <p class="text-secondary">
                {{ user.invoice ? `Vítej, ${user.invoice.jmeno}` : user.email }}
              </p>
            </div>
            <div class="user__component__dropdown__body">
              <div class="user__component__body__item">
                <a @click="$refs.modalSetting.openModal()"
                  class="user__component__item--link text-secondary bg-primary"
                >
                  <span class="user__component__item--link__span">
                    Nastavení
                  </span>
                </a>
              </div>
              <div class="user__component__body__item">
                <a
                  @click.prevent="toggleTheme"
                  class="user__component__item--link text-secondary bg-primary"
                >
                  <span class="user__component__item--link__span">
                    DarkMode
                  </span>
                </a>
              </div>
              <div class="user__component__body__item">
                <router-link
                  :to="{ name: 'logout' }"
                  class="user__component__item--link text-secondary bg-lightyellow"
                >
                  <span class="user__component__item--link__span">
                    Odhlásit se
                  </span>
                </router-link>
              </div>
            </div>
          </div>

          <!-- <Notifications :visible="visibleNotification" /> -->
        </div>
      </li>
        <Modal ref="modalSetting" title="Nastavení" class="font-normal">
            <template v-slot:body>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
                    porro reprehenderit laudantium recusandae ipsa, repudiandae voluptate
                    corrupti eum quod illo provident, veritatis, blanditiis fuga! Quisquam
                    laudantium autem quaerat perferendis labore?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
                    porro reprehenderit laudantium recusandae ipsa, repudiandae voluptate
                    corrupti eum quod illo provident, veritatis, blanditiis fuga! Quisquam
                    laudantium autem quaerat perferendis labore?
                </p>
            </template>
        </Modal>
    </ul>
    <ul
      class="list-reset flex justify-between flex-1 md:flex-none items-center font-bold"
      v-else
    >
      <li class="flex-1 md:flex-none">
        <router-link
          :to="{ name: 'login' }"
          class="inline-block py-2 px-4 no-underline bg-junglegreen"
          >Přihlásit</router-link
        >
      </li>
    </ul>
  </div>
</template>
<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import { SAVE_THEME } from "../../state/mutations-types";
@Component({
})
export default class MenuItems extends Vue {
  @Prop() readonly links!: Array<String>;
  @Prop() readonly user!: Array<String>;
  @Prop() readonly loggedInlinks!: any;
  @Prop({ default: false, type: Boolean }) readonly loggedIn!: Boolean;
  private visible?: Boolean = false;
  private visibleModal?: Boolean = false;
  showMenu() {
    this.visible = true;
  }
  hideMenu() {
    this.visible = false;
  }
  showModal() {
    this.visibleModal = true;
  }
  hideModal() {
    this.visibleModal = true;
  }
  THEME_DARK = "theme-dark";
  THEME_LIGHT = "theme-light";
  get theme(): string {
    return this.$store.getters.theme;
  }
  set theme(value: string) {
    localStorage.setItem("theme", value);
    this.$store.commit(SAVE_THEME, value);
  }
  created(): void {
    this.theme = localStorage.getItem("theme") || this.THEME_LIGHT;
  }
  toggleTheme() {
    this.theme =
      this.theme === this.THEME_LIGHT ? this.THEME_DARK : this.THEME_LIGHT;
  }
}
</script>
