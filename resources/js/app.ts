import Vue from 'vue'
import store from './state'
import router from './router'
import App from './components/App.vue'

import './plugins'
import './components'

// Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
    store,
    router,
    ...App,
  }).$mount('#app')

