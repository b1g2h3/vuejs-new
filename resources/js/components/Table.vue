<template>
  <table class="w-full">
    <tableHead :columns="columns" :sortColumn="sortColumn" :onSort="onSort" />
    <tableBody :columns="columns" :data="data" :actions="actions"/>
  </table>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
@Component({
  name: "Table",
})
export default class Table extends Vue {
  @Prop({ required: false }) readonly actions!: any;
  @Prop({ required: true }) readonly columns!: any;
  @Prop({ required: true }) readonly sortColumn!: any;
  @Prop({ required: true }) readonly onSort!: Function;
  @Prop({ required: true }) readonly data!: any;
}
</script>
<style scoped>
  table {
    min-width: 20rem;
  }
</style>
